
<html>
<head>
</head>
    <body>
        <title>Aliens abducted me - Report an abduction</title>
        <h2 >Aliens abducted me - Report an abduction</h2>
<?php 
    $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $when_it_happens = $_POST['whenithappened'];
    $how_long = $_POST['howlong'];
    $alien_description = $_POST['aliendescription'];
    $fang_spotted = $_POST['fangspotted'];
    $email = $_POST['email'];
    $how_many = $_POST['howmany'];
    $whattheydid = $_POST['whattheydid'];
    $other = $_POST['other'];

    $to = 'bryce.menadue98@gmail.com';
    $subject = 'Aliens Abducted Me - Abduction Report';
    $msg = "$name was abducted $when_it_happens and was gone for $how_long.\n" .
        "Number of aliens: $how_many\n" . 
        "Alien description: $alien_description\n" .
        "What they did: $whattheydid\n" . 
        "Fang spotted: $fang_spotted\n" .
        "Other comments: $other";
    mail($to, $subject, $msg, 'From:' . $email);

    echo 'Thanks for submitting the form.<br/>';
    echo 'You were abducted ' . $when_it_happens;
    echo ' and were gone for ' . $how_long . '<br/>';
    echo 'Number of Aliens: ' . $how_many . '<br/>';
    echo 'Describe them: ' . $alien_description . '<br/>';
    echo 'The Aliens did this: ' . $whattheydid . '<br/>';
    echo 'Was Fang there? ' . $fang_spotted . '<br/>';
    echo 'Other comments: ' . $other . '<br/>';
    echo 'Your email address is ' . $email;
?>
    </body>
</html>