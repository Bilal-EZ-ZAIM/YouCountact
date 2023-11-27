<?php

$host = 'localhost';
$user = 'root';
$password = '';
$nomdatabase = 'youcontact';
$conn = mysqli_connect($host, $user, $password, $nomdatabase);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>