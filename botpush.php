<?php

require "vendor/autoload.php";

$access_token = 'bKpDXfpmaoOOpVw3pa550Y86IJEeA3fiLLq6wkvRWGEUfv5aVAYQSNXF+A7t+QvH9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74snEPH6/q8FouU+9KSzi4boTJnAyiymcAhzZqOwvvLj0AdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

$customers = array(
	array(
		'id' => 1,
		'name' => 'Pak',
		'pushId' => 'U28aa0979914c25158af0c800f5d1153c' // Pak
	),
	array(
		'id' => 2,
		'name' => 'Tum',
		'pushId' => 'U5c1187ba2b5c3fd86adfd3667dd2c3f2' // Tum
	),
);

// $pushID = 'U28aa0979914c25158af0c800f5d1153c';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$message = 'มีตำแหน่งงาน PHP Web Developer ใหม่ <br><a href="https://demo-job.leovel.com/" target="_blank">เพิ่มเติม</a>';
foreach ($customers as $key => $value) {
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$response = $bot->pushMessage($value['pushId'], $textMessageBuilder);
}

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();






