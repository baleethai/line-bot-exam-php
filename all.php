<?php

require "vendor/autoload.php";

$access_token = 'eGALRJLlwI8mFeBcXwogFHTQelElURwB1EK2V5/L+ZIK58JHz30DTsm3ty9sxHR+9Bx5z2GW5UbkwZviwR724oKlMyV8q+gvsr+mBBnD74u7SukJiRHwTeSnlDS0kOjBapmDqxhYu4r+2oYcFLmRJAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0c409b000897d0e406a4c0407b9b1423';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$servername = "localhost";
$username = "job_demo";
$password = "job_demo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=job_demo", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM users";
    $html = '<table width="100"><tr><th>Name</th><th>User ID</th></tr>';
    foreach ($conn->query($sql) as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['user_id'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    
    // prepare sql and bind parameters
    // $stmt = $conn->prepare("INSERT INTO users (user_id, name) 
    // VALUES (:user_id, :name)");
    // $stmt->bindParam(':user_id', $user_id);
    // $stmt->bindParam(':name', $name);

    // // insert a row
    // $user_id = "1214sljflkjhhh";
    // $name = "John";
    // $stmt->execute();

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

echo $html;






