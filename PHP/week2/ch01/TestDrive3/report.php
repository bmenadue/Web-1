
<html>
<head>
</head>
<body>
    <title>Aliens abducted me - Report an abduction</title>
    <h2 >Aliens abducted me - Report an abduction</h2>
<?php 
echo 2;

    $when_it_happens = $_POST['whenithappened'];
    echo 22;
    $how_long = $_POST['howlong'];
    $alien_description = $_POST['aliendescription'];
    $fang_spotted = $_POST['fangspotted'];
    $email = $_POST['email'];

echo 3;

    echo 'Thanks for submitting the form.<br/>';
    echo 'You were abducted ' . $when_it_happens;
    echo ' and were gone for ' . $how_long . '<br/>';
    echo 'Describe them: ' . $alien_description . '<br/>';
    echo 'Was Fang there?' . $fang_spotted . '<br/>';
    echo 'Your email address is ' . $email;
echo 4;
?>

    </body>
</html>