<?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");
    $toDelete = $_POST["toDelete"];
    if(empty($toDelete)) 
    {
        echo("Please make a selection");
    } 
    else 
    {
        $N = count($toDelete);

        for($i=0; $i < $N; $i++){
            $query = "DELETE FROM Posts WHERE post_id = $toDelete[$i]";
            $result = $mysqli->query($query);
            if(!result){
                echo '<script>alert("Unable to delete post.")</script>';
            }
            else{
                echo "Post " .$toDelete[$i] . " deleted<br>";
            }
        }
    }
?>