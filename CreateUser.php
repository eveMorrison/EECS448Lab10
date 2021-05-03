<?php
    $userID = $_POST["user_id"];
    $post = $_POST["post"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "INSERT INTO Users (user_id) VALUES ('$userID')";

    if($userID=="")
    {
        echo '<script>alert("Invalid User ID\nPlease fill all fields.\nUnable to add user to database")</script>';
    }
    else{
        $result = $mysqli->query($query);
        if(!$result){
            echo '<script>alert("User already exists\nUnable to add user to database")</script>';
        }
        else{
            echo "New user successfully added.<br>";
        }
    }

    echo "User ID: " . $userID . "<br>";

    $result->free();

    $mysqli->close();
?>