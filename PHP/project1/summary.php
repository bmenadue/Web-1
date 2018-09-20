<html>
<head>
    <title>Workout Summary</title>
</head>

<body>
<h2>Summary</h2>

<?php
echo "0";
$first_name = $_POST['firstName'];
$last_name  = $_POST['lastName'];
$session_date = $_POST['sessionDate'];
$pre_workout = $_POST['preWorkout'];
$exercise_type = $_POST['exerciseType'];
$exercise_duration = $_POST['exerciseDuration'];
$music = $_POST['musicPlayed'];
$program = $_POST['programFollowed'];

$dbc = mysqli_connect('localhost', 'root', '', 'exercisetracker')
or die('Error connecting to MySQL server.');

echo "1";

$query = "INSERT INTO gymsession (firstName, lastName, sessionDate, preWorkout, exerciseType, exerciseDuration, musicPlayed, programFollowed) " .
    "VALUES ('$first_name', '$last_name', '$session_date', '$pre_workout', '$exercise_type', '$exercise_duration', '$music', '$program' )";

    echo "2";

$result = mysqli_query($dbc, $query)
or die('Error querying database.');

echo "3";

mysqli_close($dbc);

echo "4";

echo "Hi " . $first_name . " " . $last_name . ". Good job on your workout today. You spent " 
. $exercise_duration . "hours doing " . $exercise_type . "while listening to " . $music . ". How long have you been following " 
. $program . "?";
?>
</body>
</html>