<?php
$url = 'https://api.travis-ci.org/repo/MozillaCZ%2Fstart-mozilla-cz/requests';
$body = '{ "request": { "branch":"master" } }';
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

/*
<?php
// $url = 'https://api.netlify.com/build_hooks/...';
$opts = array(
    'http' => array(
        'method'  => 'POST',
        'header' =>
          "Content-Type: application/x-www-form-urlencoded\r\n" .
          "Content-Length: 0",
        'content' => ''
    ),
);
$context = stream_context_create($opts);
file_get_contents($url, false, $context);
*/
