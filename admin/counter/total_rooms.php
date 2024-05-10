<?php 
    include 'include/conn.php';
    $sql = "SELECT room_no FROM room";
    $query = $conn->query($sql);

    echo "$query->num_rows";

?>