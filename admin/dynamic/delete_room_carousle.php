<?php
session_start();
include '../include/conn.php';

// Check if admin user is logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Check if ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare DELETE query
    $sql = "DELETE FROM room_page WHERE id = ?";

    // Prepare and bind the DELETE statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the DELETE statement
    if ($stmt->execute()) {
        // Redirect back to the room entries page after deletion
        header("Location: room_carousle.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
