<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include 'include/conn.php';

$query = "SELECT * FROM user WHERE a_name = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();

    // Check if the room type ID is provided in the URL
    if (isset($_GET['id'])) {
        $room_type_id = $_GET['id'];

        // Delete the room type from the database
        $delete_sql = "DELETE FROM room_types WHERE room_type_id = $room_type_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Room type deleted successfully</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error deleting room type: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Room type ID not provided</div>';
    }
} else {
    echo "User data not found.";
}
?>
