<?php
session_start();

include_once("admin/include/conn.php");

if (isset($_POST['old_pswd'])) {
    $email = $_SESSION['user_uname'];
    $oldPassword = $_POST['old_pswd'];

    // Verify old password
    $query = "SELECT * FROM register WHERE email='$email' AND password='$oldPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 'success'; // Old password is correct
    } else {
        echo 'error'; // Incorrect old password
    }
} else {
    echo 'error'; // Invalid request
}
?>
