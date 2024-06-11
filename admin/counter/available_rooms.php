<?php 
include 'include/conn.php';
$sql = "SELECT COUNT(*) AS null_status_rooms FROM room WHERE status IS NULL";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo $row['null_status_rooms'];
} else {
    echo "Error: " . $conn->error;
}
?>
