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
  include_once('include/conn.php');

$id = $_REQUEST['id'];

$q = " delete from register where id='$id' ";
if (mysqli_query($conn, $q)) {
?>
    <script>
        window.location.href = "user_profile    .php";
    </script>
<?php
} else {
    echo "error in deleting data";
}
?>


