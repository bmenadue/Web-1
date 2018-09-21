<<!DOCTYPE html>
<html>
<head>

    <title>Page Title</title>
</head>
<body>
    <title>Aliens abducted me - Report an abduction</title>


<?php 
    $when_it_happens = $_POST('whenithappens');
    $how_long = $_POST('howlong');
    $alien_description = $_POST('description');
    $fang_spotted = $_POST('fangspotted');
    $email = $_POST('email');

    echo 'Thanks for submitting the form.<br/>';
    echo 'You were abducted ' . $when_it_happens;
    echo ' and were gone for ' . $how_long . '<br/>';
    echo 'Describe them: ' . $alien_description . '<br/>';
    echo 'Was Fang there?' . $fang_spotted . '<br/>';
    echo 'Your email address is ' . $email;

?>

    </body>
</html>