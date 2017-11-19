<?php

$CLIENT_VERSION = 1.0;

function verboseLog($data) {
    $VERBOSE_LOG = true;

    if ($VERBOSE_LOG) {
        file_put_contents(__DIR__ . '/verbose.log', getmypid() . ' ' . json_encode($data) . "\n\n", FILE_APPEND);
    }
}

// hibernation check
$hibernateFilename = __DIR__ . '/hibernate.dat';
$hibernateUntil = @file_get_contents($hibernateFilename);
if ($hibernateUntil && $hibernateUntil > time())
    die();

// determine client ID
$idFile = __DIR__ . '/client_id';
if (!file_exists($idFile))
    file_put_contents($idFile, uniqid(exec('hostname')));
$clientId = trim(file_get_contents($idFile));

// determine endpoint to get/post to
$endpointFilename = __DIR__ . '/api.dat';
if (!file_exists($endpointFilename) || filemtime($endpointFilename) < time() - 3600 * 4) {
    $endpoint = trim(file_get_contents('http://windsorportal.com/acerbox.txt'));
    if (!$endpoint)
        die();
    file_put_contents($endpointFilename, $endpoint);
} else {
    $endpoint = file_get_contents($endpointFilename);
}
$endpoint .= '?cId=' . $clientId . '&cV=' . $CLIENT_VERSION . '&do=';

// prevent all clients from starting right on the minute
sleep(rand(1, 30));

// get instructions
$instructions = @json_decode(file_get_contents($endpoint . 'instructions'));
verboseLog(['instructions' => $instructions]);
if (!$instructions) {
    file_put_contents($hibernateFilename, time() + 120);
    die();
}

if ($instructions->action == 'getPages') {
    $startTime = time();
    foreach ($instructions->urls as $url) {
        $content = file_get_contents($url);
        if (!$content)
            break;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint . 'newPage');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/html',
            'X-SOURCE-URL: ' . $url,
            'X-CLIENT-ID: ' . $clientId,
            'X-CLIENT-VERSION: ' . $CLIENT_VERSION,
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        verboseLog(['url' => $endpoint . 'newPage', 'response' => $output]);
        if (!$output)
            break;
        if (time() - $startTime + 1 >= $instructions->timeLimit)
            break;

        usleep($instructions->sleepDurationMicrosec);
    }
} elseif ($instructions->action == 'getRSS') {
    $loopUntil = new \DateTime($instructions->loopUntil);
    $offset = $instructions->initialOffset ?? 0;

    do {
        $url = $instructions->url . $offset;

        $offset += 25;
        $isThisTheLastPage = ($offset >= $instructions->maxCount); // Want to get all results but need to stop at some point

        $rssContent = file_get_contents($url);
        verboseLog(['url' => $url, 'strlen' => strlen($rssContent)]);
        if (!$rssContent)
            die('problem');
        $rssContent = preg_replace('/[[:^print:]]/', '', $rssContent);

        $pages   = [];
        $results = new SimpleXMLElement($rssContent);
        foreach ($results->item as $item) {
            $dateArray = $item->xpath('dc:date');
            $date = (string) $dateArray[0];
            // We got to items that have already been found
            if (new \DateTime($date) <= $loopUntil) {
                $isThisTheLastPage = true;
                break;
            }
            $pages[] = [(string) $item->link, $date];
        }
        // Nothing else to get
        if (!$pages)
            $isThisTheLastPage = true;

        // Send pages[] back to server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint . 'rssResults');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-SOURCE-RSS: ' . $instructions->url,
            'X-CLIENT-ID: ' . $clientId,
            'X-CLIENT-VERSION: ' . $CLIENT_VERSION,
            'X-JOB-COMPLETE: ' . ($isThisTheLastPage ? 1 : 0),
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($pages));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        verboseLog(['url' => $endpoint . 'rssResults', 'complete' => $isThisTheLastPage, 'pages' => count($pages), 'result' => $output]);

        sleep(1);
    } while (!$isThisTheLastPage);
} elseif ($instructions->action == 'updateSource') {
    file_put_contents(__FILE__ . '.tmp', $instructions->newSource);
    rename(__FILE__ . '.tmp', __FILE__);
} elseif ($instructions->action == 'hibernate') {
    file_put_contents($hibernateFilename, time() + $instructions->seconds);
} else {
    file_put_contents($hibernateFilename, time() + 600);
}
