<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #ffffff;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Include dbconfig.php to establish database connection
        include_once 'dbconfig.php';

        // Query to fetch the total votes for each candidate
        $sql = "SELECT candidate_id, COUNT(*) AS total_votes FROM Votes GROUP BY candidate_id";
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            echo "<h2>Voting Results</h2>";
            echo "<table>";
            echo "<tr><th>Candidate</th><th>Total Votes</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Display candidate names based on candidate ID
                $candidate = ($row["candidate_id"] == 'candidate1') ? 'Candidate 1: Alexander Stubb' : 'Candidate 2: Pekka Haavisto';
                echo "<tr><td>" . $candidate . "</td><td>" . $row["total_votes"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No voting results available.</p>";
        }

        // Close database connection
        $conn->close();
        ?>

        <!-- Logout Button Form -->
        <form action="index.html" method="post">
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
