<?php
// Include dbconfig.php to establish database connection
include_once 'dbconfig.php';

// Start session to retrieve user ID
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: index.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];

    // Get candidate selection from the form
    $candidate_id = $_POST['candidate'];

    // Generate a unique vote ID
    $vote_id = uniqid();

    // Insert vote into Votes table with the generated vote_id
    $sql_vote = "INSERT INTO Votes (vote_id, user_id, candidate_id, timestamp) VALUES ('$vote_id', '$user_id', '$candidate_id', NOW())";

    if ($conn->query($sql_vote) === TRUE) {
        // Vote submission successful
        // Redirect to votingresults.php after successful vote submission
        header("Location: votingresults.php");
        exit();
    } else {
        // Vote submission failed
        echo "Error: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
