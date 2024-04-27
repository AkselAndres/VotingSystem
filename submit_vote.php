<?php
include_once 'dbconfig.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    $candidate_id = $_POST['candidate'];

    $vote_id = uniqid();

    $sql_vote = "INSERT INTO Votes (vote_id, user_id, candidate_id, timestamp) VALUES ('$vote_id', '$user_id', '$candidate_id', NOW())";

    if ($conn->query($sql_vote) === TRUE) {

        header("Location: votingresults.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

