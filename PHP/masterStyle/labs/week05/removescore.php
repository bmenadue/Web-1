<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Remove a High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="scores">
  <h2>Guitar Wars - Remove a High Score</h2>

<?php
require_once('appvars.php');
require_once('connectvars.php');
    // Establish DB connection
$username = "bmenadue";
$password = "bmenadue";
$hostname = "softdev.mstclab.com";
$database = "bmenadue";


if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot'])) {
    // Grab the score data from the GET
    $id = $_GET['id'];
    $date = $_GET['date'];
    $name = $_GET['name'];
    $score = $_GET['score'];
    $screenshot = $_GET['screenshot'];
} else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
    // Grab the score data from the POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $score = $_POST['score'];
} else {
    echo '<p class="error">Sorry, no high score was specified for removal.</p>';
}

if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
      // Delete the screen shot image file from the server
        @unlink(GW_UPLOADPATH . $screenshot);

        // Establish DB connection
        try {
            $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Delete the score data from the database
            $query = "DELETE FROM gwdb WHERE id = $id LIMIT 1";

            $connection->exec($query);
            // Confirm success with the user
            echo '<p>The high score of ' . $score . ' for ' . $name . ' was successfully removed.';
            $connection = null;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        echo '<p class="error">The high score was not removed.</p>';
    }
} else if (isset($id) && isset($name) && isset($date) && isset($score)) {
    echo '<p>Are you sure you want to delete the following high score?</p>';
    echo '<p><strong>Name: </strong>' . $name . '<br /><strong>Date: </strong>' . $date .
        '<br /><strong>Score: </strong>' . $score . '</p>';
    echo '<form method="post" action="removescore.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $name . '" />';
    echo '<input type="hidden" name="score" value="' . $score . '" />';
    echo '</form>';
}

echo '<p><a href="admin.php">Back to admin page</a></p>';
?>
</div>
</body> 
</html>
