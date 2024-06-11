<?php
session_start();
include '../include/conn.php';

// Redirect to login page if not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Check if ID parameter is set in URL for deleting
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute DELETE statement
    $delete_query = "DELETE FROM interior_images WHERE id=?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $id);

    if ($delete_stmt->execute()) {
        // Redirect back to manage page after successful delete
        header("Location: interior_images.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing.";
    exit;
}
?>
