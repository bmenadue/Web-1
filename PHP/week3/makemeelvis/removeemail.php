<?php

    $dbc = mysqli_connect('softdev.mstclab.com', 'bmenadue', 'bmenadue', 'bmenadue')
    or die('Error connecting to MySQL server.');

    $email = $_POST['email'];

    $query = "DELETE FROM email_list WHERE email = '$email'";
    mysqli_query($dbc, $query)
        or die('Error query database.');

    echo 'Customer removed: ' . $email;

    mysqli_close($dbc);

    ?>
