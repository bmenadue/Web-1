<?php 
    $from = 'bryce.menadue98@gmail.com';
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];
    
    $dbc = mysqli_connect('softdev.mstclab.com', 'bmenadue', 'bmenadue', 'bmenadue')
    or die('Error connecting to MySQL server.');

    $query = "SELECT * FROM email_list";
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    while($row = mysqli_fetch_array($result)) {
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];

        $msg = "Dear $first_name $last_name, \n $text";

        $to = $row['email'];

        mail($to, $subject, $msg, 'From:' . $from);

        echo 'Email sent to: ' . $to . '<br/>';
    }

    mysqli_close($dbc);

?>