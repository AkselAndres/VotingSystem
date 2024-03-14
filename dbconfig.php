<?php
$servername = "mariadb.vamk.fi";
$username = "e2203655";
$password = "wEtQRa85nKn";
$dbname = "e2203655_projekti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
