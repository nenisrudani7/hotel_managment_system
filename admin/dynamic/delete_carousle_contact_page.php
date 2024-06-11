<?php
include '../include/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM contacts_page WHERE id='$id'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        header("location: contact_carousle.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter is missing";
}
?>
