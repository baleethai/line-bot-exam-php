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

    $html = '<!DOCTYPE html><html><head><style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Users</h2>

<table>
  <tr>
    <th>Name</th>
    <th>UserId</th>
    <th>Job</th>
  </tr>';

    $sql = "SELECT * FROM users ";
    foreach ($conn->query($sql) as $row) {
        
        $html .= '<tr>';
        $displayName = json_decode($row['name'], true);
        $html .= '<td><img src="' . $displayName['pictureUrl'] . '" width="50">  ' . $displayName['displayName'] . '</td>';
        $html .= '<td>' . $row['user_id'] . '</td>';
        if ($row['position'] == 1) {
            $html .= '<td>PHP Web Developer</td>';
        } else {
            $html .= '<td>Junior Frontend Developer</td>';
        }

        $html .= '</tr>';
    }
    $html .= '</table></body>
</html>';
    
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

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<h2>ส่งงาน</h2>
<form action="./botpush.php" method="POST">
  ตำแหน่งงาน:<br>
  <select name="position">
      <option value="1">PHP Web Developer</option>
      <option value="2">Junior Frontend Developer</option>
  </select>
  <br>
  รายละเอียดงาน:<br>
  <textarea type="text" name="description" rows="8"></textarea><br>
  * เช่น มีตำแหน่งงานใหม่ PHP Web Developer
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>






