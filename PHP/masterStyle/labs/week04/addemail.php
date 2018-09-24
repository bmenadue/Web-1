

    <?php
    $dbc = mysqli_connect('softdev.mstclab.com', 'bmenadue', 'bmenadue', 'bmenadue')
    or die('Error connecting to MySQL server.');

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];

    $query = "INSERT INTO email_list(first_name, last_name, email)" .
        "VALUES('$first_name', '$last_name', '$email')";

    mysqli_query($dbc, $query)
    or die('Error querying database');

    echo 'Customer added. Go <a href="week4home.html"> Home </a>';

    mysqli_close($dbc);

    ?>



