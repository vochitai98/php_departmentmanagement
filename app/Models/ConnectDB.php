<?php
include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/includes/config.php';
$servername = DB_HOST;
$database = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}

?>