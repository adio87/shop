<?php

$db_hostname = 'localhost';
$db_database = 'im_market_db';
$db_username = 'root';
$db_password = '1111';

try {
    $dbh = new PDO("mysql:host=$db_hostname;dbname=$db_database", $db_username, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$dbh = null;

echo 'success';




