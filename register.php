<?php

include_once 'dbconfig.php';
include_once 'blockchain.php'; 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];

    $user_id = uniqid('user_', true);

    $sql_users = "INSERT INTO Users (user_id, username, password, email) VALUES ('$user_id', '$username', '$password', '$email')";
    if ($conn->query($sql_users) === TRUE) {
        $_SESSION['user_id'] = $user_id;

        echo "Registration successful!";

        $blockchain = new Blockchain();
        $blockchain->logVoteTransaction($username, $candidate);

        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
