<?php
// Include database connection
include_once('include/conn.php');

// Check if staff ID is set in the URL parameters
if(isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    // Prepare and execute SQL query to delete staff member
    $delete_query = "DELETE FROM staff WHERE staff_id = $staff_id";
    if(mysqli_query($conn, $delete_query)) {
        // If deletion successful, redirect to staff list page
        header("Location: staff_list.php");
        exit;
    } else {
        // If deletion fails, display error message
        echo "Error deleting staff: " . mysqli_error($conn);
    }
} else {
    // If staff ID is not set in URL parameters, redirect to staff list page
    header("Location: lo.php");
    exit;
}
?>
