<?php
$servername = "localhost";
$username = "sannisth";
$password = "heisenberg9";
$dbname = "market_new";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>