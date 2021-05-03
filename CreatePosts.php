<?php
    $userID = $_POST["user_id"];
    $post = $_POST["post"];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query2 = "SELECT user_id FROM Users";
    $query = "INSERT INTO Posts (content,author_id) VALUES ('$post', '$userID')";
    
    $inUsers = false;

    if($userID==""||$post =="")
    {
        echo '<script>alert("Invalid Input\nPlease fill all fields")</script>';
    }
    else{
        if($result = $mysqli->query($query2)){
            while($row = $result->fetch_assoc()){
                if($row["user_id"]==$userID){
                    $inUsers = true;
                    if($result2 = $mysqli->query($query)){
                        echo "New post successfully added.<br>";
                    }
                    else{
                        echo '<script>alert("Unable to upload post.")</script>';
                    }
                }
            }
            if($inUsers==false){
                echo "User doesn't exist<br>Create a new user<br>";
            }
        }
        else{
            echo '<script>alert("Unable to upload post.")</script>';
        }
    }

    $mysqli->close();
?>