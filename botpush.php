<?php

require "vendor/autoload.php";

$access_token = 'eGALRJLlwI8mFeBcXwogFHTQelElURwB1EK2V5/L+ZIK58JHz30DTsm3ty9sxHR+9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74u7SukJiRHwTeSnlDS0kOjBapmDqxhYu4r+2oYcFLmRJAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

// Databases
$customers = array(
	array(
		'id' => 1,
		'name' => 'Tum',
		'pushId' => 'U5c1187ba2b5c3fd86adfd3667dd2c3f2' // Tum
	)
);

// $pushID = 'U28aa0979914c25158af0c800f5d1153c';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$message = 'มีตำแหน่งงาน PHP Web Developer ใหม่';
foreach ($customers as $key => $value) {
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$response = $bot->pushMessage($value['pushId'], $textMessageBuilder);
}

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







