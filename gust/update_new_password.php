<?php
session_start();
include_once('../admin/include/conn.php');

if (isset($_POST['btn'])) {
    $pwd = $_POST['pswd'];
    $em = $_SESSION['forgot_em'];
    $token = $_SESSION['forgot_token'];
  
    // Update password
    $q = "UPDATE register SET password='$pwd' WHERE email='$em'";
    if (mysqli_query($conn, $q)) {
        // Delete all tokens associated with the email
        $del = "DELETE FROM token WHERE email='$em'";
        mysqli_query($conn, $del); // Execute the delete query
        
        // Unset session variables
        unset($_SESSION['forgot_em']);
        unset($_SESSION['forgot_token']);
        
        // Set success cookie and redirect
        setcookie('success', "Password updated successfully", time() + 2, "/");
        ?>
        <script>
            window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
        </script>
        <?php
    } else {
        // Error handling for password update failure
        setcookie('error', 'Error in updating password', time() + 2, "/");
        ?>
        <script>
            window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
        </script>
        <?php
    }
}
?>
