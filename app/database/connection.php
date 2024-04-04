<?php

$host = "localhost";
$username = "dbadmin";
$password = "DBadmin123!";
$dbname = "recipes";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    // echo("Connection Success!");
}

?>