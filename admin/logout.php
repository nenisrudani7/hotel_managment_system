<?php

session_start();
$_SESSION = array();
unset($_SESSION["admin_uname"]);
header("location: http://localhost/hotel_managment_system1/gust/hotel1.php");

?>