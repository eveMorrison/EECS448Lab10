<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "evamorrison", "aipa9The", "evamorrison");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM Users ORDER BY user_id";

    echo "<table class='users', border='1px'>";
    echo "<tr>";
    echo "<th>Users</th>";
    echo "</tr>";
    if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" .$row['user_id']. "</td>"; // Print a single column data
            echo "</tr>";
        }   
    }
    
    /* free result set */
    $result->free();

    $mysqli->close();
?>