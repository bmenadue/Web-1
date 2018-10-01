<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores Administration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="header">

  <h2>Guitar Wars - High Scores Administration</h2>

  <p>Below is a list of all Guitar Wars high scores. Use this page to remove scores as needed.</p>
  </div>
<div class="scores">

<?php
  require_once('appvars.php');
  require_once('connectvars.php');
    // Establish DB connection
    $username = "bmenadue";
    $password = "bmenadue";
    $hostname = "softdev.mstclab.com";
    $database = "bmenadue";

  // Connect to the database 
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    try{
        // Retrieve the score data from MySQL
        $query = "SELECT * FROM gwdb ORDER BY score DESC, date ASC";
        
        foreach ($connection->query($query, PDO::FETCH_ASSOC) as $row) {
        // Loop through the array of score data, formatting it as HTML 
        echo '<table>';
            // Display the score data
            echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['score'] . '</td>';
            echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
            '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
            '&amp;screenshot=' . $row['screenshot'] . '">Remove</a></td></tr>';
        }
        echo '</table>';

        $connection = null;

    }
    catch (PDOException $i) {
        echo "Failed to retrieve records: " . $i->getMessage();
    }

?>
  <p>Back to <a href="index.php">Home</a></p>
</div>
</body> 
</html>