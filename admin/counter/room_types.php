<?php 
    include 'include/conn.php';
    $sql = "SELECT room_type FROM room_type";
    $query = $conn->query($sql);

    echo "$query->num_rows";

?>