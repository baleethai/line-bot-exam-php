<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'eGALRJLlwI8mFeBcXwogFHTQelElURwB1EK2V5/L+ZIK58JHz30DTsm3ty9sxHR+9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74u7SukJiRHwTeSnlDS0kOjBapmDqxhYu4r+2oYcFLmRJAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['events'])) {
	
	// Loop through each event
	foreach ($events['events'] as $event) {
	
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

		
			$servername = "localhost";
			$username = "job_demo";
			$password = "job_demo";
			try {
				
				// Get text sent
				$userId = $event['source']['userId'];

			    $conn = new PDO("mysql:host=$servername;dbname=job_demo", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    
			    $res = $conn->query('SELECT user_id FROM users WHERE user_id = {$userId}', PDO::FETCH_ASSOC);                
			    
			    if ($res->rowCount() == 0) {

				    // prepare sql and bind parameters
				    $stmt = $conn->prepare("INSERT INTO users (user_id, name, position) 
				    VALUES (:user_id, :name, :position)");
				    $stmt->bindParam(':user_id', $user_id);
				    $stmt->bindParam(':name', $name);
				    $stmt->bindParam(':position', $position);

				    // insert a row
				    $user_id = $userId;
				    $name = $userId;
				    $position = rand(1, 2);
				    $stmt->execute();
				}

			} catch(PDOException $e) {
			    echo "Connection failed: " . $e->getMessage();
			}

			// Get replyToken
			// $replyToken = $event['replyToken'];

			// Build message to reply back
			// $messages = [
			// 	'type' => 'text',
			// 	'text' => 'สวัสดี '
			// ];

			// Make a POST Request to Messaging API to reply to sender
			// $url = 'https://api.line.me/v2/bot/message/reply';
			// $data = [
			// 	'replyToken' => $replyToken,
			// 	'messages' => [$messages],
			// ];
			// $post = json_encode($data);
			// $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			// $ch = curl_init($url);
			// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			// $result = curl_exec($ch);
			// curl_close($ch);
			// echo $result . "\r\n";
		}
	}
}



