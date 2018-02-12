<?php
#$url = 'https://api.netlify.com/build_hooks/...';
$opts = array(
    'http' => array(
        'method'  => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\nContent-Length: 0",
        'content' => ''
    ),
);
$context = stream_context_create($opts);
$result = file_get_contents($url, false, $context);
