<?php
session_start();

include_once("admin/include/conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_pswd'])) {
    $newPassword = $_POST['new_pswd'];
    $email = $_SESSION['user_uname'];

    // Update password in the database
    $updateQuery = "UPDATE register SET password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($result) {
            echo 'success'; // Password updated successfully
        } else {
            echo 'error'; // Error updating password
        }
    } else {
        echo 'error'; // Error preparing statement
    }
} else {
    echo 'error'; // Invalid request
}

mysqli_close($conn);
?>
