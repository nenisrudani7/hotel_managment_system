<?php
session_start();
include_once('../admin/include/conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer/PHPMailer.php');
require('../PHPMailer/SMTP.php');
require('../PHPMailer/Exception.php');

// Check if email is stored in session
if (isset($_SESSION['forgot_em'])) {
    $em = $_SESSION['forgot_em'];

    // Prepare and execute query to fetch user details based on email
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $em);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Generate a new OTP
        $otp = mt_rand(100000, 999999);

        // Prepare and execute query to delete existing token (OTP) for this email
        $delete_token_query = "DELETE FROM token WHERE Email = ?";
        $stmt_delete = $conn->prepare($delete_token_query);
        $stmt_delete->bind_param("s", $em);
        $stmt_delete->execute();

        // Generate a unique token
        $s_time = date("Y-m-d G:i:s");
        $token = hash('sha512', $s_time);

        // Prepare and execute query to insert new OTP and token into the token table
        $insert_token_query = "INSERT INTO token (token, Email, OTP, sent_time) VALUES (?, ?, ?, NOW())";
        $stmt_insert = $conn->prepare($insert_token_query);
        $stmt_insert->bind_param("sss", $token, $em, $otp);

        // Execute the insertion query
        if ($stmt_insert->execute()) {
            // Update session variable for OTP
            $_SESSION['forgot_token'] = $token;

            // Send the OTP via email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jnjcreators@gmail.com';
                $mail->Password = 'hvnz cfkl atwt pmin';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                    $mail->setFrom('jnjcreators@gmail.com', 'Jay');
                $mail->addAddress($em, $row['name']);

                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body = 'Your new OTP to reset your account password is ' . $otp;

                // Send the email
                if ($mail->send()) {
                    setcookie("success", "New OTP sent to your registered email address", time() + 120, "/");
                    header("Location: Forgot_password_otp.php");
                    exit;
                } else {
                    setcookie("error", "Error in sending OTP. Please try again later.", time() + 120, "/");
                    header("Location: Forget.php");
                    exit;
                }
            } catch (Exception $e) {
                setcookie("error", "Error in sending OTP. Please try again later.", time() + 120, "/");
                header("Location: Forget.php");
                exit;
            }
        } else {
            // Error handling for database insertion failure
            setcookie('error', 'Failed to insert token into database. Please try again.', time() + 120, "/");
            header("Location: Forget.php");
            exit;
        }
    } else {
        // User not found in the database
        setcookie('error', 'User not found. Please try again.', time() + 120, "/");
        header("Location: Forget.php");
        exit;
    }
} else {
    // Session email not set, redirect to appropriate page
    setcookie('error', 'Session expired. Please try again.', time() + 120, "/");
    header("Location: Forget.php");
    exit;
}
?>
