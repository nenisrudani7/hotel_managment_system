<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['admin_uname']) || empty($_SESSION['admin_uname'])) {
    header("location: signup.php");
    exit; // Stop further execution
}

include '../include/conn.php';

// Check if ID parameter is set in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute DELETE statement
    $sql = "DELETE FROM gallery_header WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Deletion successful, redirect back to display page
        header("Location: index.php");
        exit;
    } else {
        // Deletion failed
        echo "Error: " . $conn->error;
    }
} else {
    // ID parameter is not set in URL
    echo "No ID specified for deletion.";
}
?>

