<?php



require "vendor/autoload.php";

$access_token = 'bKpDXfpmaoOOpVw3pa550Y86IJEeA3fiLLq6wkvRWGEUfv5aVAYQSNXF+A7t+QvH9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74snEPH6/q8FouU+9KSzi4boTJnAyiymcAhzZqOwvvLj0AdB04t89/1O/w1cDnyilFU=';

$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

$pushID = 'U28aa0979914c25158af0c800f5d1153c';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('มีตำแหน่งงาน PHP Web Developer ใหม่');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







