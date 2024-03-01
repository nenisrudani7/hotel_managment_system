<?php
  include_once('include/conn.php');

$id = $_REQUEST['id'];

$q = " delete from customer where id='$id' ";
if (mysqli_query($conn, $q)) {
?>
    <script>
        window.location.href = "view.php";
    </script>
<?php
} else {
    echo "error in deleting data";
}
?>


