<?php
// Include the database connection
include "../include/conn.php";

// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM hotel_main_page WHERE id = $id_to_delete";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
            window.location.href="hotel_php_carousle.php";
        </script>
        <?php
    } else {
        echo "Error deleting entry: " . mysqli_error($conn);
    }
} else {
    echo "No entry ID provided.";
}
?>
