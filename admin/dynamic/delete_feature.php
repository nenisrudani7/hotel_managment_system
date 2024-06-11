<?php
session_start();
include '../include/conn.php';

// Redirect to login page if admin is not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Check if ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $feature_id = $_GET['id'];

    // Prepare SQL DELETE statement
    $sql = "DELETE FROM hotelfeatures WHERE id = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameter
        $stmt->bind_param("i", $feature_id);

        // Execute statement
        if ($stmt->execute()) {
            // Deletion successful, redirect to features page
            header("Location: hotel_features.php");
            exit;
        } else {
            // Deletion failed
            echo "Error deleting feature: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error in preparing statement
        echo "Error: " . $conn->error;
    }
} else {
    // ID parameter not provided
    echo "Feature ID not provided.";
}

// Close connection
$conn->close();
?>
