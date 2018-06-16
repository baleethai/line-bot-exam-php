<?php
try {
	$user = 'job_demo';
	$pass = 'job_demo';
    $dbh = new PDO('mysql:host=localhost;dbname=job_demo', $user, $pass);
    foreach($dbh->query('SELECT * from users') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>