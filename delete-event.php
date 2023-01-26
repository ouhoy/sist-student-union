<?php

$event_id = $_GET["event-id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_events_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['event-id'];
$sql = "DELETE  FROM event_details  WHERE event_id=$id ";

if ($conn->query($sql)) {
    header("Location: dashboard.php");
    exit;

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();