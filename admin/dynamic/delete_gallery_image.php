<?php
// Start session and include database connection
session_start();
include '../include/conn.php';

// Check if user is logged in as admin
if (!isset($_SESSION["admin_uname"])) {
    // Redirect to login page if not logged in
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit; // Stop further execution
}

// Check if 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $image_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to select image details
    $query = "SELECT image_path FROM gym_images WHERE id = $image_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch image path
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete image record from database
        $delete_query = "DELETE FROM gym_images WHERE id = $image_id";
        if ($conn->query($delete_query)) {
            // Image record deleted successfully

            // Delete image file from filesystem
            if (file_exists("../" . $image_path)) {
                unlink("../" . $image_path); // Delete the image file
            }

            // Redirect back to gallery management page
            header("Location: gym_image.php");
            exit; // Stop further execution
        } else {
            // Error deleting image record
            echo "Error: " . $conn->error;
        }
    } else {
        // Image with provided ID not found
        echo "Image not found.";
    }
} else {
    // 'id' parameter not provided in the URL
    echo "Image ID not specified.";
}

// Close database connection
$conn->close();
?>
