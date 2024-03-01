<?php 
    include 'include/conn.php';
    $sql = "SELECT * FROM room WHERE status != '1'";
    $query = $conn->query($sql);

    echo "$query->num_rows";

?>