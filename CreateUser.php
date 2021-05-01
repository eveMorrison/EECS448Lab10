<?php
    $userID = $_POST["user_id"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "INSERT INTO Users (user_id) VALUES ('$userID')";
    $result = $mysqli->query($query);

    if($userID==""||!($result))
    {
        echo '<script>alert("Invalid User ID\nUnable to add user to database")</script>';
    }
    else{
        echo "New user successfully added.<br>";
    }

    echo "User ID: " . $userID . "<br>";

    $mysqli->close();
?>