
<html>
<head>
    <title>Exercise Tracker</title>
    <link rel="stylesheet"  href="style.css">
</head>

<body class="showcase">
    <h2 class="showcase-text">Activity Tracker</h2>
    <?php
    $dbc = mysqli_connect('localhost', 'root', '', 'exercisetracker')
        or die('Error connecting to MySQL server.');

    $query = "SELECT firstName, lastName, sessionDate, exerciseDuration FROM gymsession";

    $result = mysqli_query($dbc, $query)
        or die('Error querrying database.');

    ?>

    <table border='1px solid;'>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Session Date</th>
            <th>Exercise Duration</th>
        </tr>
    <?php 
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr><td>' . $row['firstName'] . '</td><td>'
            . $row['lastName'] . '</td><td>'
            . $row['sessionDate'] . '</td><td>'
            . $row['exerciseDuration'] . '</td></tr>';
    }
    mysqli_close($dbc);
    ?>
    </table>
    

</body>

</html>