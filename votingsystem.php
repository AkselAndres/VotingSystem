<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    margin-bottom: 20px;
}

label {
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="radio"] {
    margin-right: 10px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"] {
    background-color: #28a745;
    margin-right: 10px;
}

button[type="submit"]:hover,
button[type="submit"]:focus,
button[type="submit"]:active {
    background-color: #218838;
}

button[type="submit"]:last-child {
    margin-right: 0;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Voting System</h2>
        <form action="submit_vote.php" method="post">
            <label for="candidate1">Alexander Stub:</label>
            <input type="radio" id="candidate1" name="candidate" value="candidate1">
            <label for="candidate2">Pekka Haavisto:</label>
            <input type="radio" id="candidate2" name="candidate" value="candidate2">
            <button type="submit">Submit Vote</button>
        </form>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
