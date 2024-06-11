<?php

session_start();
if(!isset($_SESSION["admin_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
<?php

// Include database connection
include '../include/conn.php';

// Check if ID parameter is set in the URL
if (!isset($_GET['id'])) {
    // Redirect if no ID specified
    header("Location: about_page_details.php");
    exit;
}

$id = $_GET['id'];

// Delete record from the database
$delete_query = "DELETE FROM about_content WHERE id = $id";

if ($conn->query($delete_query) === TRUE) {
    // Redirect after successful deletion
    header("Location: hotel_room_image_gallry.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
