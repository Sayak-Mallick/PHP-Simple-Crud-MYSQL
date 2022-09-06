<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "mydb";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error);
} else {
    #echo "Connection Established";
    echo '<script>console.log("Connection Established");</script>';
}