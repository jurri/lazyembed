<?php
if (!isset($_GET['uri'])) {
    throw new \Exception('No URI given', 1527067951);
}

$uri = $_GET['uri'];
$contentType = 'image/jpeg';

if (!isset($_GET['contentType'])) {
    $contentType = $_GET['contentType'];
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

header('Pragma: public');
header('Cache-Control: max-age=86400');
header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
header('Content-type: ' . $contentType);

echo $output;
