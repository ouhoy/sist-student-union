<?php

$host = "localhost";
$dbname = "my_events_db";
$db_username = "root";
$password = "";

$mysqli = new mysqli($host, $db_username, $password, $dbname);



if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;