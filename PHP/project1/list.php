<html>
<head>
    <title>Exercise Tracker</title>
    <link rel="stylesheet"  href="style.css">
</head>

<body>

    <h2 class="showcase-text">Activity Tracker</h2>
    <?php
    $dbc = mysqli_connect('localhost', 'root', '', 'exercisetracker')
        or die('Error connecting to MySQL server.');

    $query = "SELECT firstName, lastName, sessionDate, exerciseDuration FROM gymsession";

    $result = mysqli_query($dbc, $query)
        or die('Error querrying database.');
    ?>

<table border='1px solid;'>

    <?php 
    while ($row = mysqli_fetch_array($result)) {
    echo "<input type='checkbox' name='record1' value='value1'>" 
        . $row['firstName'] 
        . $row['lastName']
        . $row['sessionDate'] 
        . $row['exerciseDuration'] 
        . "</input>" 
        . "<br>";
    }
    ?>
</table>

<form action="list.php" method="POST">
<input name="tableBTN" type="submit" action="list.php">Display in a table</input>
</form>


<?php 

if (isset($_POST['tableBTN'])){?>

<table border='1px solid;'>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Session Date</th>
            <th>Exercise Duration</th>
        </tr>
<?php

mysqli_data_seek($result, 0);

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr><td>' . $row['firstName'] . '</td><td>'
            . $row['lastName'] . '</td><td>'
            . $row['sessionDate'] . '</td><td>'
            . $row['exerciseDuration'] . '</td></tr>';
    }

    mysqli_close($dbc);

   echo "</table>";
}
?>