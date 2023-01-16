<?php

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    echo json_encode(['error' => 'Bad Request Method. Only POST is available']);
    die;
}

$access_token = "ae7b109e7e5764eefc8c2148394f611b55593efc";
$tag = $_POST['tag'];
$asin = $_POST['asin'];
$version = "v3";
$method = 'shorten';

$params = [
    'access_token' => $access_token,
    'format' => 'json',
    'longUrl' => "http://www.amazon.fr/dp/" . $asin . "/?tag=" . $tag
];

$endpoint = "https://api-ssl.bitly.com/" . $version . "/$method?" . http_build_query($params);

$curl = curl_init($endpoint);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);

echo $result;
die;
