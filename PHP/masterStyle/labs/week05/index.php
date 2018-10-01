<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="header">
  <h2>Guitar Wars - High Scores</h2>
  <p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="addscore.php">add your own score</a>.</p>
    </div>
    <br/>
  <div class="scores">

<?php

require_once('appvars.php');
require_once('connectvars.php');

    // Establish DB connection
$username = "bmenadue";
$password = "bmenadue";
$hostname = "softdev.mstclab.com";
$database = "bmenadue";

    // Establish DB connection
try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {

    $i = 0;

            // Retrieve the score data from MySQL
    $query = "SELECT * FROM gwdb";
    foreach ($connection->query($query, PDO::FETCH_ASSOC) as $row) {

            // Loop through the array of score data, formatting it as HTML
        echo '<table>';
                // Display the score data
        if ($i == 0) {
            echo '<tr><td colspan="2" class="topscoreheader"> Top Score: ' .
                $row['score'] . '</td></tr>';
        }

        echo '<tr><td class="scoreinfo">';
        echo '<span class="score">' . $row['score'] . '</span><br />';
        echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
        echo '<strong>Date:</strong> ' . $row['date'] . '</td>';
        if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
            echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
        } else {
            echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
        }
        $i++;
    }
} catch (PDOException $i) {
    echo "Failed to retrieve records: " . $i->getMessage();
}

echo '</table>';

$connection = null;
?>
</div>

<p class="admin">Admin <a href="admin.php">site</a></p>
<p class="home">Back to Week 5 <a href="week5home.html">Home</a></p>


</body> 
</html>
