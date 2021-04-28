<?php
    $userID = $_POST["user_id"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM Users";

    if($userID=="")
    {
        echo '<script>alert("Invalid User ID\nUnable to add user to database")</script>';
    }

    echo "User ID: " . $userID . "<br>";

    $mysqli->close();
?>