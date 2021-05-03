<?php
    $userID = $_POST["user_id"];
    $post = $_POST["post"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query2 = "SELECT EXISTS(SELECT user_id FROM Users WHERE user_id = '$userID')";
    $query = "INSERT INTO Posts (content,author_id) VALUES ('$post', '$userID')";
    

    if($userID==""||$post =="")
    {
        echo '<script>alert("Invalid Input\nPlease fill all fields")</script>';
    }
    else{
        $result = $mysqli->query($query);
        $result2 = $mysqli->query($query2);
        if(!$result){
            echo '<script>alert("This user does not exist\nCreate a new user")</script>';
        }
        else{
            echo "New post successfully added.<br>";
        }
        
    }

    echo "User ID: " . $userID . "<br>";
    echo "Post: " . $post . "<br>";

    $mysqli->close();
?>