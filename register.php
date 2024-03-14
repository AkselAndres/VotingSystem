<?php
// Include dbconfig.php to establish database connection
include_once 'dbconfig.php';
include_once 'blockchain.php'; // Include blockchain class

// Start session to store user ID
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Plain password
    $email = $_POST['email'];

    // Generate a random hash for user_id
    $user_id = uniqid('user_', true);

    // Insert user data into Users table with random hash as user_id
    $sql_users = "INSERT INTO Users (user_id, username, password, email) VALUES ('$user_id', '$username', '$password', '$email')";
    if ($conn->query($sql_users) === TRUE) {
        // Store user_id in session
        $_SESSION['user_id'] = $user_id;

        // Provide feedback to the user
        echo "Registration successful!";

        // Log vote in blockchain
        $blockchain = new Blockchain();
        $blockchain->addBlock($username); // Log username as vote

        // Redirect to index.html or any other appropriate page
        header("Location: index.html");
        exit();
    } else {
        // Registration failed
        echo "Error: " . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
