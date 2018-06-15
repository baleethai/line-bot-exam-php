<?php

$access_token = 'bKpDXfpmaoOOpVw3pa550Y86IJEeA3fiLLq6wkvRWGEUfv5aVAYQSNXF+A7t+QvH9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74snEPH6/q8FouU+9KSzi4boTJnAyiymcAhzZqOwvvLj0AdB04t89/1O/w1cDnyilFU=';
$userId = 'U5c1187ba2b5c3fd86adfd3667dd2c3f2';

$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

