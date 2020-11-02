<?php

$siteurl = "http://localhost/Training/projects/admin";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "gue55me";
$dbname = "online_exam";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>