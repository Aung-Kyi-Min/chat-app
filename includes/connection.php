<?php
$servername = "localhost";
$username = "root";
$password = "aungkyi1000";
$dbname = "chat_app";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connection Successfull";
}