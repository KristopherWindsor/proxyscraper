<?php

$DISABLED = false;

$ALL_RSS_SOURCES = [
    "https://redding.craigslist.org/search/cta?nearbyArea=1&nearbyArea=12&nearbyArea=187&nearbyArea=189&nearbyArea=216&nearbyArea=233&nearbyArea=373&nearbyArea=454&nearbyArea=456&nearbyArea=459&nearbyArea=675&nearbyArea=707&nearbyArea=708&nearbyArea=92&nearbyArea=94&nearbyArea=96&nearbyArea=97&searchNearby=2&sort=date&format=rss&s=",
    "https://bakersfield.craigslist.org/search/cta?nearbyArea=102&nearbyArea=103&nearbyArea=104&nearbyArea=191&nearbyArea=208&nearbyArea=209&nearbyArea=26&nearbyArea=285&nearbyArea=346&nearbyArea=43&nearbyArea=62&nearbyArea=7&nearbyArea=709&nearbyArea=710&nearbyArea=8&searchNearby=2&sort=date&format=rss&s=",
    "https://saltlakecity.craigslist.org/search/cta?nearbyArea=292&nearbyArea=351&nearbyArea=448&nearbyArea=469&nearbyArea=652&searchNearby=2&sort=date&format=rss&s=",
    "https://stgeorge.craigslist.org/search/cta?nearbyArea=565&searchNearby=2&sort=date&format=rss&s=",
    "https://yakima.craigslist.org/search/cta?nearbyArea=2&nearbyArea=217&nearbyArea=232&nearbyArea=321&nearbyArea=322&nearbyArea=324&nearbyArea=325&nearbyArea=350&nearbyArea=368&nearbyArea=461&nearbyArea=466&nearbyArea=655&nearbyArea=9&nearbyArea=95&searchNearby=2&sort=date&format=rss&s=",
    "https://phoenix.craigslist.org/search/cta?nearbyArea=244&nearbyArea=370&nearbyArea=419&nearbyArea=455&nearbyArea=468&nearbyArea=57&nearbyArea=651&searchNearby=2&sort=date&format=rss&s=",
    "https://butte.craigslist.org/search/cta?nearbyArea=424&nearbyArea=52&nearbyArea=654&nearbyArea=656&nearbyArea=657&nearbyArea=658&nearbyArea=659&nearbyArea=660&nearbyArea=662&searchNearby=2&sort=date&format=rss&s=",
    "https://cosprings.craigslist.org/search/cta?nearbyArea=13&nearbyArea=197&nearbyArea=218&nearbyArea=287&nearbyArea=288&nearbyArea=315&nearbyArea=319&nearbyArea=320&nearbyArea=568&nearbyArea=669&nearbyArea=687&nearbyArea=713&searchNearby=2&sort=date&format=rss&s=",
    "https://roswell.craigslist.org/search/cta?nearbyArea=132&nearbyArea=267&nearbyArea=268&nearbyArea=269&nearbyArea=334&nearbyArea=50&nearbyArea=653&searchNearby=2&sort=date&format=rss&s=",
    "https://bismarck.craigslist.org/search/cta?nearbyArea=192&nearbyArea=195&nearbyArea=196&nearbyArea=435&nearbyArea=667&nearbyArea=680&nearbyArea=681&nearbyArea=682&searchNearby=2&sort=date&format=rss&s=",
    "https://grandisland.craigslist.org/search/cta?nearbyArea=280&nearbyArea=282&nearbyArea=341&nearbyArea=347&nearbyArea=428&nearbyArea=55&nearbyArea=668&nearbyArea=679&nearbyArea=688&nearbyArea=690&nearbyArea=99&searchNearby=2&sort=date&format=rss&s=",
    "https://sanangelo.craigslist.org/search/cta?nearbyArea=15&nearbyArea=270&nearbyArea=327&nearbyArea=364&nearbyArea=449&nearbyArea=53&nearbyArea=647&nearbyArea=648&searchNearby=2&sort=date&format=rss&s=",
    "https://lawton.craigslist.org/search/cta?nearbyArea=21&nearbyArea=308&nearbyArea=365&nearbyArea=433&nearbyArea=54&nearbyArea=649&nearbyArea=650&nearbyArea=70&searchNearby=2&sort=date&format=rss&s=",
    "https://eauclaire.craigslist.org/search/cta?nearbyArea=165&nearbyArea=19&nearbyArea=241&nearbyArea=243&nearbyArea=255&nearbyArea=262&nearbyArea=316&nearbyArea=362&nearbyArea=363&nearbyArea=369&nearbyArea=421&nearbyArea=458&nearbyArea=47&nearbyArea=552&nearbyArea=553&nearbyArea=571&nearbyArea=631&nearbyArea=663&nearbyArea=664&nearbyArea=665&nearbyArea=692&nearbyArea=693&searchNearby=2&sort=date&format=rss&s=",
    "https://columbiamo.craigslist.org/search/cta?nearbyArea=190&nearbyArea=221&nearbyArea=224&nearbyArea=225&nearbyArea=29&nearbyArea=293&nearbyArea=30&nearbyArea=307&nearbyArea=339&nearbyArea=340&nearbyArea=344&nearbyArea=345&nearbyArea=423&nearbyArea=425&nearbyArea=445&nearbyArea=566&nearbyArea=567&nearbyArea=569&nearbyArea=689&nearbyArea=691&nearbyArea=694&nearbyArea=695&nearbyArea=696&nearbyArea=697&nearbyArea=698&nearbyArea=699&nearbyArea=98&searchNearby=2&sort=date&format=rss&s=",
    "https://victoriatx.craigslist.org/search/cta?nearbyArea=23&nearbyArea=263&nearbyArea=264&nearbyArea=265&nearbyArea=266&nearbyArea=271&nearbyArea=326&nearbyArea=470&nearbyArea=645&searchNearby=2&sort=date&format=rss&s=",
    "https://monroe.craigslist.org/search/cta?nearbyArea=100&nearbyArea=134&nearbyArea=199&nearbyArea=206&nearbyArea=230&nearbyArea=283&nearbyArea=284&nearbyArea=31&nearbyArea=358&nearbyArea=359&nearbyArea=374&nearbyArea=375&nearbyArea=46&nearbyArea=641&nearbyArea=642&nearbyArea=643&nearbyArea=644&searchNearby=2&sort=date&format=rss&s=",
    "https://muskegon.craigslist.org/search/cta?nearbyArea=11&nearbyArea=129&nearbyArea=172&nearbyArea=212&nearbyArea=22&nearbyArea=223&nearbyArea=226&nearbyArea=228&nearbyArea=259&nearbyArea=260&nearbyArea=261&nearbyArea=309&nearbyArea=426&nearbyArea=434&nearbyArea=555&nearbyArea=563&nearbyArea=572&nearbyArea=627&nearbyArea=628&nearbyArea=630&searchNearby=2&sort=date&format=rss&s=",
    "https://owensboro.craigslist.org/search/cta?nearbyArea=133&nearbyArea=202&nearbyArea=220&nearbyArea=227&nearbyArea=229&nearbyArea=32&nearbyArea=342&nearbyArea=348&nearbyArea=360&nearbyArea=361&nearbyArea=377&nearbyArea=45&nearbyArea=465&nearbyArea=558&nearbyArea=58&nearbyArea=670&nearbyArea=671&nearbyArea=672&nearbyArea=674&searchNearby=2&sort=date&format=rss&s=",
    "https://columbusga.craigslist.org/search/cta?nearbyArea=127&nearbyArea=14&nearbyArea=186&nearbyArea=200&nearbyArea=203&nearbyArea=207&nearbyArea=231&nearbyArea=256&nearbyArea=257&nearbyArea=258&nearbyArea=371&nearbyArea=372&nearbyArea=467&nearbyArea=559&nearbyArea=560&nearbyArea=562&nearbyArea=635&nearbyArea=636&nearbyArea=637&nearbyArea=640&searchNearby=2&sort=date&format=rss&s=",
    "https://zanesville.craigslist.org/search/cta?nearbyArea=131&nearbyArea=194&nearbyArea=204&nearbyArea=251&nearbyArea=252&nearbyArea=27&nearbyArea=33&nearbyArea=35&nearbyArea=42&nearbyArea=436&nearbyArea=437&nearbyArea=438&nearbyArea=439&nearbyArea=440&nearbyArea=441&nearbyArea=442&nearbyArea=443&nearbyArea=573&nearbyArea=632&nearbyArea=700&nearbyArea=701&nearbyArea=703&nearbyArea=706&searchNearby=2&sort=date&format=rss&s=",
    "https://fayetteville.craigslist.org/search/cta?nearbyArea=101&nearbyArea=128&nearbyArea=171&nearbyArea=253&nearbyArea=254&nearbyArea=272&nearbyArea=274&nearbyArea=289&nearbyArea=290&nearbyArea=291&nearbyArea=323&nearbyArea=335&nearbyArea=336&nearbyArea=353&nearbyArea=36&nearbyArea=366&nearbyArea=367&nearbyArea=41&nearbyArea=446&nearbyArea=447&nearbyArea=457&nearbyArea=462&nearbyArea=464&nearbyArea=48&nearbyArea=60&nearbyArea=61&nearbyArea=634&nearbyArea=712&searchNearby=2&sort=date&format=rss&s=",
    "https://fairbanks.craigslist.org/search/cta?sort=date&format=rss&s=",
    "https://rochester.craigslist.org/search/cta?nearbyArea=130&nearbyArea=201&nearbyArea=247&nearbyArea=248&nearbyArea=275&nearbyArea=337&nearbyArea=40&nearbyArea=452&nearbyArea=453&nearbyArea=683&nearbyArea=684&nearbyArea=685&nearbyArea=704&searchNearby=2&sort=date&format=rss&s=",
    "https://orlando.craigslist.org/search/cta?nearbyArea=125&nearbyArea=20&nearbyArea=205&nearbyArea=219&nearbyArea=237&nearbyArea=238&nearbyArea=330&nearbyArea=331&nearbyArea=332&nearbyArea=333&nearbyArea=37&nearbyArea=376&nearbyArea=427&nearbyArea=557&nearbyArea=570&nearbyArea=638&nearbyArea=639&nearbyArea=80&searchNearby=2&sort=date&format=rss&s=",
    "https://baltimore.craigslist.org/search/cta?nearbyArea=10&nearbyArea=166&nearbyArea=167&nearbyArea=17&nearbyArea=170&nearbyArea=193&nearbyArea=276&nearbyArea=277&nearbyArea=278&nearbyArea=279&nearbyArea=286&nearbyArea=328&nearbyArea=329&nearbyArea=349&nearbyArea=355&nearbyArea=356&nearbyArea=357&nearbyArea=444&nearbyArea=460&nearbyArea=463&nearbyArea=556&nearbyArea=561&nearbyArea=633&nearbyArea=705&nearbyArea=711&searchNearby=2&sort=date&format=rss&s=",
    "https://worcester.craigslist.org/search/cta?nearbyArea=168&nearbyArea=169&nearbyArea=173&nearbyArea=198&nearbyArea=239&nearbyArea=249&nearbyArea=250&nearbyArea=281&nearbyArea=3&nearbyArea=338&nearbyArea=354&nearbyArea=378&nearbyArea=38&nearbyArea=4&nearbyArea=44&nearbyArea=451&nearbyArea=59&nearbyArea=686&nearbyArea=93&searchNearby=2&sort=date&format=rss&s=",
];

class Datastore {
    public $data, $filename;

    public function __construct() {
        $this->filename = __DIR__ . '/data/datastore.json';
        $content = @file_get_contents($this->filename);
        $this->data = @json_decode($content, true) ?: [
            'pageQueue'   => [],
            'rssSources'  => [],
            'clients'     => [],
            'rssBurst'    => [],
            'stats'       => [],
            'clientRules' => [],
            'enableRssScraping'   => true,
            'enableReplyScraping' => true,
        ];
    }

    public function addRssSource($indexInAllSourcesList) {
        global $ALL_RSS_SOURCES;

        if (empty($ALL_RSS_SOURCES[$indexInAllSourcesList])) {
            return;
        }
        $url = $ALL_RSS_SOURCES[$indexInAllSourcesList];

        if (empty($this->data['rssSources'][$url])) {
            $this->data['rssSources'][$url] = [
                // Last time a client got the instruction to query the source, or a client provided results for the source
                'lastActivity' => null,
                // Last time a client provided results for the source and indicated that it was done querying the source
                'lastComplete' => null,
                // Newest item found in the source -- date/time comes from the RSS
                'newestItem'   => null,
            ];
        }
    }

    public function removeRssSource($indexInAllSourcesList) {
        global $ALL_RSS_SOURCES;

        if (empty($ALL_RSS_SOURCES[$indexInAllSourcesList])) {
            return;
        }
        $url = $ALL_RSS_SOURCES[$indexInAllSourcesList];

        if (isset($this->data['rssSources'][$url])) {
            unset($this->data['rssSources'][$url]);
        }
    }

    public function sortRssSourcesByScore() {
        uasort($this->data['rssSources'], function ($a, $b) {
            $aScore = getRssSourcePriorityQueueScore($a);
            $bScore = getRssSourcePriorityQueueScore($b);

            if ($aScore == $bScore) return 0;
            return ($aScore > $bScore) ? -1 : 1;
        });
    }

    public function getMaxRssScore() {
        $this->sortRssSourcesByScore();
        foreach ($this->data['rssSources'] as $rssSource)
            return getRssSourcePriorityQueueScore($rssSource);
        return 0;
    }

    public function save() {
        $tmpname = uniqid();
        file_put_contents($this->filename . $tmpname, json_encode($this->data));
        rename($this->filename . $tmpname, $this->filename);
    }
}

class LogRequest {
    public $requestHeaders, $requestBody;

    public function __construct($requestHeaders, $requestBody) {
        $this->requestHeaders = $requestHeaders;
        $this->requestBody    = $requestBody;
    }

    public function logWithResponse($code, $response) {
        file_put_contents(__DIR__ . '/data/requestresponse.log', json_encode([
            'date'       => date(\DateTime::ATOM),
            'request'    => $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'],
            'reqHeaders' => $this->requestHeaders,
            'reqBody'    => strlen($this->requestBody) > 5000 ? '<snip ' . strlen($this->requestBody) . ' chars>' : $this->requestBody,
            'resCode'    => $code,
            'resBody'    => @json_decode($response) ?: $response,
        ]) . "\n", FILE_APPEND);
    }
}

class ExclusiveLock {
    public $fileHandle, $isLocked;

    public function lock() {
        $this->fileHandle = fopen(__DIR__ . '/data/lock.txt', 'r+');
        if (!$this->fileHandle)
            $this->failRequest();
        if (!flock($this->fileHandle, LOCK_EX)) {
            fclose($this->fileHandle);
            $this->failRequest();
        }
        $this->isLocked = true;
    }

    public function failRequest() {
        http_response_code(503);
        echo "Try again...";
        die();
    }

    public function cleanup() {
        if ($this->isLocked) {
            flock($this->fileHandle, LOCK_UN);
            fclose($this->fileHandle);
            $this->fileHandle =
            $this->isLocked = null;
        }
    }
}

function logEvent($event) {
    file_put_contents(__DIR__ . '/data/events.log', date(\DateTime::ATOM) . "\t" . $event . "\n", FILE_APPEND);
}



$requestBody    = file_get_contents('php://input');
$requestHeaders = getallheaders();
$contentType    = $requestHeaders['Content-Type'] ?? '';
$logRequest     = new LogRequest($requestHeaders, $requestBody);
$action         = $_GET['do'] ?? null;
$clientId       = $_GET['cId'] ?? null;

// Use exclusive locking so we don't have 2 processes edit the data file at the same time
$exLock         = new ExclusiveLock();
if ($action == 'instructions' || $action == 'rssResults' || $action == 'newPage' || $action == 'manage' || $action == 'reportError')
    $exLock->lock();
$datastore      = new Datastore();

if ($DISABLED) {
    $response = provideHibernateResponse();
} elseif ($action == 'stats') {
    $response = provideStats($requestBody, $requestHeaders, $datastore);
} elseif ($action == 'instructions') {
    $response = provideInstructions($requestBody, $requestHeaders, $datastore, $clientId);
} elseif ($action == 'rssResults' && $contentType == 'application/json') {
    $response = acceptRss($requestBody, $requestHeaders, $datastore, $clientId);
} elseif ($action == 'newPage' && $contentType == 'text/html') {
    $response = acceptPage($requestBody, $requestHeaders, $datastore, $clientId);
} elseif ($action == 'reportError') {
    $response = reportError($requestBody, $requestHeaders, $datastore, $clientId);
} elseif ($action == 'manage') {
    $response = doManagement($requestBody, $requestHeaders, $datastore, $clientId);
} else {
    http_response_code(400);
    $response = 'bad request';
}

$exLock->cleanup();

echo $response;
$logRequest->logWithResponse(http_response_code(), $response);

function provideHibernateResponse($duration = 300) {
    return json_encode(['action' => 'hibernate', 'seconds' => $duration]);
}

function provideStats($requestBody, $requestHeaders, $datastore) {
    $datastore->sortRssSourcesByScore();

    $bursts = [];
    foreach ($datastore->data['rssBurst'] as $url => list($size, $timestamp))
        $bursts[] = [$url, $size, $timestamp];

    $pageQueueSize = count($datastore->data['pageQueue']);
    $maxRssScore   = $datastore->getMaxRssScore();

    $tags = array_filter([
        'QUEUE_ALMOST_FULL' => $pageQueueSize > 7000,
        'QUEUE_FULL'        => $pageQueueSize > 8000,
        'QUEUE_FLOOD'       => $pageQueueSize > 12000,
        'RSS_STALE_WARN'    => $maxRssScore > 1800,
        'RSS_STALE_ERR'     => $maxRssScore > 3600,
        'WARNING_A'         => $pageQueueSize > 8000 || $maxRssScore > 1800,
    ]);

    $clients = $datastore->data['clients'];
    ksort($clients);

    header('Content-Type: application/json');
    return json_encode([
        'pageQueueSize'               => $pageQueueSize,
        'pageQueueSizeWithoutPending' => count(getPageQueueWithoutPendingPages($datastore)),
        'maxRssScore'                 => $maxRssScore,
        'clients'                     => $clients,
        'rssBursts'                   => $bursts,
        'otherStats'                  => @$datastore->data['stats'],
        'tags'                        => $tags,
    ]);
}

function getPageQueueWithoutPendingPages($datastore) {
    return array_filter($datastore->data['pageQueue'], function ($item) {
        if (!$item)
            return true;
        return new \DateTime($item) < new \DateTime();
    });
}

function provideInstructions($requestBody, $requestHeaders, $datastore, $clientId) {
    if (!$clientId) {
        http_response_code(400);
        return 'missing client ID';
    }

    if (empty($datastore->data['clients'][$clientId])) {
        $datastore->data['clients'][$clientId] = [
            'initTime'      => time(),
            'lastActive'    => null,
            'hibernate'     => null,
            'downUntil'     => null,
            'pagesProvided' => 0,
            'errors'        => 0,
            'lastState'     => 'functional',
        ];
    }
    $datastore->data['clients'][$clientId]['lastActive'] = time();
    $datastore->data['clients'] = array_filter($datastore->data['clients'], function ($item) {
        return $item['lastActive'] > time() - 3600 * 24 * 5 && isset($item['initTime']); // remove entries that don't have newest field
    });

    header('Content-Type: application/json');

    // Sort RSS sources -- priority queue
    $datastore->sortRssSourcesByScore();

    // Find "real" page queue (not counting pending pages)
    $queue = getPageQueueWithoutPendingPages($datastore);

    // Some clients are made to sleep until the queue reaches a certain size (ie. either for peak hours or when other clients have gone offline)
    $hibernateDuration = shouldClientSleep($clientId, count($queue), $datastore);
    if (!$hibernateDuration) {
        // Invariant: at least priority 1 or priority 2 applies in the case where the client should not sleep

        // Priority 1 -- keep the page queue full to avoid the nothing-to-do/hibernate case
        if (count($queue) < 8000 && $rssInstructions = provideInstructionsForRss($datastore, count($queue), $clientId))
            return $rssInstructions;

        // Priority 2 -- process queue
        $howManyToGive = (int) (30 + count($queue) / 50);
        $urls          = [];
        foreach ($queue as $pageUrl => $_) {
            $datastore->data['pageQueue'][$pageUrl] = date(DateTime::ATOM, time() + $howManyToGive * 3);
            $urls[] = $pageUrl;
            if (count($urls) >= $howManyToGive)
                break;
        }
        $datastore->save();

        $proxyIp   = $datastore->data['clientRules'][$clientId]['proxyIp'] ?? null;
        $proxyPort = $datastore->data['clientRules'][$clientId]['proxyPort'] ?? null;

        return json_encode([
            'action'                => 'getPages',
            'sleepDurationMicrosec' => 500 * 1000,
            'urls'                  => $urls,

            // The pages will be reserved at this time, so the client should stop
            'timeLimit'             => $howManyToGive * 3,

            'proxyIp'               => $proxyIp,
            'proxyPort'             => $proxyPort,

            'clientRules'           => $datastore->data['clientRules'][$clientId],
        ]);
    }

    // Nothing to do --> hibernate
    $datastore->data['clients'][$clientId]['hibernate'] = time() + $hibernateDuration;
    $datastore->save();
    return provideHibernateResponse($hibernateDuration);
}

// Get score used to sort the RSS sources in a priority queue
// The score will be 0 if the source does not need to be queried; positive if it does. Larger score means source has higher priority for querying.
function getRssSourcePriorityQueueScore($rssSource) {
    $thirtySecAgo  = new \DateTime('30 seconds ago');
    $fiveMinAgo    = new \DateTime('5 minutes ago');
    $lastActivity = new \DateTime($rssSource['lastActivity'] ?: '1 hour ago');
    $lastComplete = new \DateTime($rssSource['lastComplete'] ?: '1 hour ago');

    $score = 0;
    if ($lastActivity > $lastComplete) {
        if ($lastActivity < $thirtySecAgo) {
            // The fetching has timed out and should be restarted
            $score = time() - $lastComplete->getTimeStamp();
        }
    } elseif ($lastComplete < $fiveMinAgo) {
        $score = time() - $lastComplete->getTimeStamp();
    }

    // Prevent big jump from 0 to 300 (mostly for monitoring graph)
    if ($score > 0 && $score < 375)
        $score = ($score - 299) * 5;

    logEvent('rss scored: ' . $score . ' lastActivity= ' . $rssSource['lastActivity'] . ' lastComplete=' . $rssSource['lastComplete']);
    return $score;
}

function shouldClientSleep($clientId, $pageQueueSize, $datastore) {
    $limits = $datastore->data['clientRules'];

    // The default client thresholds here make the client moderately active
    $pageQueueThreshold = $limits[$clientId]['pageQueue'] ?? 250;
    $rssScoreThreshold  = $limits[$clientId]['rssScore']  ?? 500;

    if ($pageQueueThreshold < $pageQueueSize) {
        logEvent("shouldClientSleep true page queue large $pageQueueSize vs. " . $pageQueueThreshold);
        return false;
    }

    $highscore = $datastore->getMaxRssScore();
    if ($rssScoreThreshold < $highscore) {
        logEvent("shouldClientSleep true large RSS score $highscore vs. " . $rssScoreThreshold);
        return false;
    }

    // An active client has a low rssScore threshold and should sleep for a small time accordingly
    return 120 + intval($rssScoreThreshold / 3);
}

function provideInstructionsForRss($datastore, $availableQueueSize, $clientId) {
    if (empty($datastore->data['enableRssScraping']))
        return null;

    foreach ($datastore->data['rssSources'] as $rssSource => $data) {
        if (!getRssSourcePriorityQueueScore($data))
            break;

        $proxyIp   = $datastore->data['clientRules'][$clientId]['proxyIp'] ?? null;
        $proxyPort = $datastore->data['clientRules'][$clientId]['proxyPort'] ?? null;

        $datastore->data['rssSources'][$rssSource]['lastActivity'] = date(\DateTime::ATOM);
        $datastore->save();
        return json_encode([
            'action'    => 'getRSS',
            'url'       => $rssSource,
            'loopUntil' => $data['newestItem'] ?: (new \DateTime('7 days ago'))->format(\DateTime::ATOM),
            'maxCount'  => 2000,

            // Skip the first results under high load, because they have a higher
            // chance of being edited soon anyway
            'initialOffset' => 25 * intval($availableQueueSize / 1000),

            'proxyIp'   => $proxyIp,
            'proxyPort' => $proxyPort,

            'clientRules' => $datastore->data['clientRules'][$clientId],
        ]);
    }
    return null;
}

function acceptPage($requestBody, $requestHeaders, $datastore, $clientId) {
    $sourceUrl = $requestHeaders['X-SOURCE-URL'] ?? null;
    if (!$sourceUrl || empty($datastore->data['pageQueue'][$sourceUrl]) || !$clientId) {
        http_response_code(400);
        return '';
    }

    // Return 2xx because the client has done everything correctly;
    // but we leave the page in the queue to try again later.
    if (strpos($requestBody, 'An error has occurred. Please try again later') > 0) {
        @$datastore->data['stats']['replyPageRejections']++;
        $datastore->save();
        http_response_code(200);
        return 'ok';
    }

    $sourceHttpCode = $requestHeaders['X-SOURCE-HTTP-CODE'] ?? 200;

    if ($sourceHttpCode == 200) {
        $filename = __DIR__ . '/pages/' . urlencode($sourceUrl);
        $alreadyExists = file_exists($filename);

        // Stats
        @$datastore->data['stats'][$alreadyExists ? 'pageEdits' : 'pageAdds']++;
        if ($alreadyExists) {
            $pageAge = time() - filemtime($filename);
            @$datastore->data['stats']['pageAge'][(int) log($pageAge ?: 1)]++;
        }

        // Save page
        file_put_contents($filename, $requestBody);

        // If the page has a reference to the "reply" page, queue that for scraping
        if (@$datastore->data['enableReplyScraping'])
            if ($replyPageUrl = getReplyPageUrlFromPage($sourceUrl, $requestBody)) {
                if (empty($datastore->data['pageQueue'][$replyPageUrl])) {
                    $datastore->data['pageQueue'][$replyPageUrl] = null;
                    logEvent('replyPageQueued ' . $replyPageUrl . ' from ' . $sourceUrl);
                    @$datastore->data['stats']['replyPagesQueued']++;
                }
            }

        if (strpos($requestBody, 'class="reply-tel"') > 0)
            @$datastore->data['stats']['totalPhonesScraped']++;
    }

    // Track client activity
    @$datastore->data['clients'][$clientId]['pagesProvided']++;
    $datastore->data['clients'][$clientId]['lastActive'] = time();
    $datastore->data['clients'][$clientId]['lastState']  = 'functional';

    // Take page out of pending queue
    unset($datastore->data['pageQueue'][$sourceUrl]);
    $datastore->save();

    http_response_code(201);
    return 'created';
}

function getReplyPageUrlFromPage($pageUrl, $pageContent) {
    $pre = '<a id="replylink" href="';
    $pos = strpos($pageContent, $pre);
    if (!$pos)
        return null;

    $parsedUrl = parse_url($pageUrl);

    $sub = substr($pageContent, $pos + strlen($pre));
    return $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . substr($sub, 0, strpos($sub, '"'));
}

function acceptRss($requestBody, $requestHeaders, $datastore, $clientId) {
    $rssSource = $requestHeaders['X-SOURCE-RSS'] ?? null;
    $isComplete = $requestHeaders['X-JOB-COMPLETE'] ?? null;
    $pages = @json_decode($requestBody, true);
    if (!is_array($pages) || !$rssSource || empty($datastore->data['rssSources'][$rssSource])) {
        http_response_code(400);
        return '';
    }

    logEvent(count($pages) . ' pages fetched from RSS ' . $rssSource);
    // Add to the count if we're still on the same query
    if (isset($datastore->data['rssBurst'][$rssSource]) && $datastore->data['rssBurst'][$rssSource][1] > time() - 30) {
        $datastore->data['rssBurst'][$rssSource] = [count($pages) + $datastore->data['rssBurst'][$rssSource][0], time()];
    } else {
        $datastore->data['rssBurst'][$rssSource] = [count($pages), time()];
    }

    foreach ($pages as list($url, $dateUpdated)) {
        if (!$dateUpdated)
            logEvent('Empty date item=' . $url . ' rss=' . $rssSource);

        // Put new page in the queue
        if (empty($datastore->data['pageQueue'][$url]))
            $datastore->data['pageQueue'][$url] = null;
    }

    $datastore->data['clients'][$clientId]['lastActive'] = time();
    $datastore->data['clients'][$clientId]['lastState']  = 'functional';

    $datastore->data['rssSources'][$rssSource]['lastActivity'] = date(\DateTime::ATOM);
    if ($isComplete) {
        $datastore->data['rssSources'][$rssSource]['lastComplete'] = date(\DateTime::ATOM);

        // Suppose an RSS source has 5 new pages of results. The newestItem will be on page #1, but we don't want to commit it until all 5 pages have been
        // scraped successfully.
        $newestItem = $requestHeaders['X-NEWEST-ITEM'] ?? null;
        if ($newestItem) {
            if (!$datastore->data['rssSources'][$rssSource]['newestItem'] || new \DateTime($newestItem) > new \DateTime($datastore->data['rssSources'][$rssSource]['newestItem'])) {
                $datastore->data['rssSources'][$rssSource]['newestItem'] = (new \DateTime($newestItem))->format(\DateTime::ATOM);
            }
        }
    }
    $datastore->save();

    return 'ok';
}

function reportError($requestBody, $requestHeaders, $datastore, $clientId) {
    header('Content-Type: application/json');

    $lastState = $datastore->data['clients'][$clientId]['lastState'] ?? 'functional';
    if ($lastState == 'functional')
        $errorNumber = 1;
    else
        $errorNumber = 1 + explode(':', $datastore->data['clients'][$clientId]['lastState'])[1];
    $cooldown = 60 * pow(2, $errorNumber);

    @$datastore->data['clients'][$clientId]['errors']++;
    $datastore->data['clients'][$clientId]['lastState'] = 'error:' . $errorNumber;
    $datastore->data['clients'][$clientId]['downUntil'] = $datastore->data['clients'][$clientId]['hibernate'] = time() + $cooldown;
    $datastore->save();

    return json_encode(['hibernateSeconds' => $cooldown]);
}

function doManagement($requestBody, $requestHeaders, $datastore, $clientId) {
    $change = $_GET['change'] ?? null;

    if ($change == 'addRssSource' && isset($_GET['index'])) {
        $datastore->addRssSource((int) $_GET['index']);
        $datastore->save();
        return 'added';
    } elseif ($change == 'removeRssSource' && isset($_GET['index'])) {
        $datastore->removeRssSource((int) $_GET['index']);
        $datastore->save();
        return 'removed';
    } elseif ($change == 'setClientRules' && $clientId) {
        $pageQueue = $_GET['pageQueue'] ?? 0;
        $rssScore = $_GET['rssScore'] ?? 0;

        $proxyIp = $_GET['proxyIp'] ?? null;
        $proxyPort = $_GET['proxyPort'] ?? null;
        $proxyUser = $_GET['proxyUser'] ?? null;
        $proxyPassword = $_GET['proxyPassword'] ?? null;

        $doRepeat = $_GET['doRepeat'] ?? null;
        $continueWhenForbidden = $_GET['continueWhenForbidden'] ?? null;
        if ($pageQueue || $rssScore || ($proxyIp && $proxyPort)) {
            $datastore->data['clientRules'][$clientId] = [
                'pageQueue' => (int) $pageQueue,
                'rssScore'  => (int) $rssScore,
                'proxyIp'   => $proxyIp,
                'proxyPort' => (int) $proxyPort,
                'proxyUser' => $proxyUser,
                'proxyPassword' => $proxyPassword,
                'doRepeat'  => (bool) $doRepeat,
                'continueWhenForbidden' => (bool) $continueWhenForbidden,
            ];
        } else {
            unset($datastore->data['clientRules'][$clientId]);
        }
        $datastore->save();
        return 'set';
    } elseif ($change == 'resetClientStats') {
        $datastore->data['clients'] = [];
        $datastore->save();
        return 'reset';
    } elseif ($change == 'enableRssScraping' || $change == 'enableReplyScraping') {
        $datastore->data['enableRssScraping'] = !empty($_GET['enable']);
        $datastore->save();
        return 'ok';
    }
}
