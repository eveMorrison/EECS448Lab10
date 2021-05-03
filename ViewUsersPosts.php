<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    $user = $_POST["users"];

    
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM Posts WHERE author_id = '$user' ORDER BY 'post_id'";

    echo "<table class='users', border='1px'>";
    echo "<tr>";
    echo "<th>Post ID</th>";
    echo "<th>Post</th>";
    echo "<th>Author</th>";
    echo "</tr>";
    if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" .$row['post_id']. "</td>"; // Print a single column data
            echo "<td>" .$row['content']. "</td>";
            echo "<td>" .$row['author_id']. "</td>";
            echo "</tr>";
        }   
    }
    
    /* free result set */
    $result->free();

    $mysqli->close();
?>