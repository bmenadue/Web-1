<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Add Your High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <div class="header">
  <h2>Guitar Wars - Add Your High Score</h2>
</div>
<br>
  <div class="scores">

<?php
require_once('appvars.php');
require_once('connectvars.php');

if (isset($_POST['submit'])) {
      // Grab the score data from the POST
  $name = $_POST['name'];
  $score = $_POST['score'];
  $screenshot = $_FILES['screenshot']['name'];
  $screenshot_type = $_FILES['screenshot']['type'];
  $screenshot_size = $_FILES['screenshot']['size']; 

    // Establish DB connection
  $username = "bmenadue";
  $password = "bmenadue";
  $hostname = "softdev.mstclab.com";
  $database = "bmenadue";

  if (!empty($name) && !empty($score) && !empty($screenshot) && ctype_alpha($name)) {
    if (strlen($score) < 10 && strlen($name) < 76){
              // Make sure the file is the correct format/size.
        if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
          && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
          if ($_FILES['screenshot']['error'] == 0) {
              // Move the file to the target upload folder
            $target = GW_UPLOADPATH . $screenshot;
            if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
                // Establish DB connection
              try {
                $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
                  
                // Try to insert new record
              try {
                $query = "INSERT INTO gwdb VALUES (0, NOW(), '$name', '$score', '$screenshot')";
                $connection->exec($query);
              } catch (PDOException $i) {
                echo "Failed to insert record: " . $i->getMessage();
              }
                  
                // Confirm success with the user
              echo '<p>Thanks for adding your new high score!</p>';
              echo '<p><strong>Name:</strong> ' . $name . '<br />';
              echo '<strong>Score:</strong> ' . $score . '</br>';
              echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
              echo '<p><a href="index.php">Back to high scores</a></p>';
                  
                // Clear the score data to clear the form
              $name = "";
              $score = "";
              $screenshot = "";
              $connection = null;
            }

          } else {
            echo '<p class="error">Sorry, there was an error uploading your screen shot.</p>';
          }

        } else {
          echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no ' . 'greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
        }
    } else {
      echo '<p class="error">Your score must be less than 10 characters and your name less than 76 Characters</p>';
    }
    // try to delete the temp screen shot 
    @unlink($_FILES['screenshot']['tmp_name']);

  } else {
    echo '<p class="error">Please enter all of the information to add your high score. Your name can only contain letters, no spaces or special characters.</p>';
  }
}

?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
    <label for="score">Score:</label>
    <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" /><br />
    <label for="screenshot">Screen shot:</label>
    <input type="file" id="screenshot" name="screenshot" />
    <hr />
    <input type="submit" value="Add Score" name="submit" />
  </form>
  <p>Back to <a href="index.php">Home</a></p>

</div>
</body> 
</html>
