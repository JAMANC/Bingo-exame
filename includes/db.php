<?php
$host = 'localhost';       // MySQL host
$dbUsername = 'root'; // MySQL username
$dbPassword = ''; // MySQL password
$dbName = 'exam_user_app';   // MySQL database name

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


