<?php
include_once('include/conn.php');

$query = "SELECT COUNT(room_id) AS booked_rooms_count FROM booking";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['booked_rooms_count'];
} else {
    echo "No bookings found.";
}

mysqli_close($conn);
?>
