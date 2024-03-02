<?php
include_once('include/conn.php');

$id = $_REQUEST['id'];

$q = "DELETE FROM booking WHERE booking_id = '$id'";
if (mysqli_query($conn, $q)) {
?>
    <script>
        window.location.href = "view.php";
    </script>
<?php
} else {
    echo "Error in deleting data: " . mysqli_error($conn);
}
?>
