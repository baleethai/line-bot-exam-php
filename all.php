<?php

require "vendor/autoload.php";

$access_token = 'eGALRJLlwI8mFeBcXwogFHTQelElURwB1EK2V5/L+ZIK58JHz30DTsm3ty9sxHR+9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74u7SukJiRHwTeSnlDS0kOjBapmDqxhYu4r+2oYcFLmRJAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);






