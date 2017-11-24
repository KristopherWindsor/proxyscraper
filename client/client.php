<?php

$CLIENT_VERSION = 1.0;

function verboseLog($data) {
    global $clientId;

    $VERBOSE_LOG = true;

    if ($VERBOSE_LOG) {
        file_put_contents(__DIR__ . '/verbose-' . $clientId . '.log', getmypid() . ' ' . json_encode($data) . "\n\n", FILE_APPEND);
    }
}

function reportErrorAndQuit($hibernateFilename) {
    // TODO tell server we have a problem
    file_put_contents($hibernateFilename, time() + 3600 * 4);
    die();
}

// determine client ID
if ($argc >= 2) {
    $clientId = $argv[1];
} else {
    $idFile = __DIR__ . '/client_id';
    if (!file_exists($idFile)) {
        file_put_contents($idFile, uniqid(exec('hostname')));
    }
    $clientId = trim(file_get_contents($idFile));
}

// hibernation check
$hibernateFilename = __DIR__ . '/' . $clientId . 'hibernate.dat';
$hibernateUntil = @file_get_contents($hibernateFilename);
if ($hibernateUntil && $hibernateUntil > time())
    die();

// determine endpoint to get/post to
$endpointFilename = __DIR__ . '/api.dat';
if ($argc >= 3) {
    $endpoint = $argv[2];
} elseif (!file_exists($endpointFilename) || filemtime($endpointFilename) < time() - 3600 * 4) {
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
verboseLog(['endpoint' => $endpoint . 'instructions', 'instructions' => $instructions]);
if (!$instructions) {
    file_put_contents($hibernateFilename, time() + 120);
    die();
}

if ($instructions->action == 'getPages') {
    $startTime = time();
    foreach ($instructions->urls as $url) {
        // Scrape page
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (isset($instructions->proxyIp) && isset($instructions->proxyPort)) {
            curl_setopt($ch, CURLOPT_PROXY, $instructions->proxyIp);
            curl_setopt($ch, CURLOPT_PROXYPORT, $instructions->proxyPort);
        }
        $content = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpcode == 403)
            reportErrorAndQuit($hibernateFilename);
        // Need to send results for 404's otherwise, we keep retrying them
        $ok = (($httpcode == 200 && $content) || $httpcode == 404);
        if (!$ok)
            break;

        // Send to server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint . 'newPage');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/html',
            'X-SOURCE-URL: ' . $url,
            'X-SOURCE-HTTP-CODE: ' . $httpcode,
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
    $offset = isset($instructions->initialOffset) ? $instructions->initialOffset : 0;

    do {
        $url = $instructions->url . $offset;

        $offset += 25;
        $isThisTheLastPage = ($offset >= $instructions->maxCount); // Want to get all results but need to stop at some point

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (isset($instructions->proxyIp) && isset($instructions->proxyPort)) {
            curl_setopt($ch, CURLOPT_PROXY, $instructions->proxyIp);
            curl_setopt($ch, CURLOPT_PROXYPORT, $instructions->proxyPort);
        }
        $rssContent = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        verboseLog([
            'url' => $url,
            'strlen' => strlen($rssContent),
            'httpCode' => $httpcode,
            'proxyPort' => $instructions->proxyPort,
            'proxyIp' => $instructions->proxyIp,
        ]);
        if ($httpcode == 403)
            reportErrorAndQuit($hibernateFilename);
        if (!$rssContent || $httpcode != 200)
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
