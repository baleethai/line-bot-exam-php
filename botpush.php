<?php

require "vendor/autoload.php";

$access_token = 'eGALRJLlwI8mFeBcXwogFHTQelElURwB1EK2V5/L+ZIK58JHz30DTsm3ty9sxHR+9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74u7SukJiRHwTeSnlDS0kOjBapmDqxhYu4r+2oYcFLmRJAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

if ($_POST) {
	$servername = "localhost";
	$username = "job_demo";
	$password = "job_demo";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=job_demo", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $customers = array();
	    $sql = "SELECT DISTINCT user_id FROM users";
	    foreach ($conn->query($sql) as $row) {
	    	$customers[] = array(
	    		'user_id' => $row['user_id']
	    	);
	    }
	} catch(PDOException $e) {
	    echo "Connection failed: " . $e->getMessage();
	}
}

// $pushID = 'U28aa0979914c25158af0c800f5d1153c';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

foreach ($customers as $key => $value) {
	$message = 'xx';
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$response = $bot->pushMessage($value['user_id'], $textMessageBuilder);
}
?>
<script type="text/javascript">
	window.alert("success");
	window.location.href = "./all.php";
</script>

<?php
// header("Location: all.php");
die();
// echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>








