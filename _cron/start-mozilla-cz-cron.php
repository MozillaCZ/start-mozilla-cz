<?php
/*
This script should be run by cron at minute 0 and 30, with delay of 5 minutes
allowed. To avoid concurrent CI builds, DO NOT run it with interval shorter
than 5 minutes.
*/

$hrs = idate('H');
$min = idate('i');

$is_day = $hrs>=6 && $hrs<22;
$is_even_hour = $hrs%2 === 0;

$is_full_hour = $min>=0 && $min<=5;
$is_half_hour = $min>=30 && $min<=35;

if ($is_day && ($is_full_hour || $is_half_hour)) {
    trigger_travis_ci();
} else if ($is_even_hour && $is_full_hour) {
    trigger_travis_ci();
}

function trigger_travis_ci() {
    $url = 'https://api.travis-ci.com/repo/MozillaCZ%2Fstart-mozilla-cz/requests';
    $body = '{ "request": {
        "branch": "master",
        "message": "Cron: ' . date('Y-m-d H:i') . '"
    } }';
    // $token = 'xxx';
    $opts = array(
        'http' => array(
            'method'  => 'POST',
            'header' =>
                "Content-Type: application/json\r\n" .
                "Content-Length: " . strlen($body) . "\r\n" .
                "Accept: application/json\r\n" .
                "Travis-API-Version: 3\r\n" .
                "Authorization: token " . $token . "\r\n",
            'content' => $body,
        ),
    );
    $context = stream_context_create($opts);
    file_get_contents($url, false, $context);
}
