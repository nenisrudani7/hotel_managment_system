  <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include_once('../admin/include/conn.php');

if (isset($_POST['btn'])) {
    $otp = $_POST['otp'];
    
    if (isset($_SESSION['forgot_em']) && isset($_SESSION['forgot_token'])) {
        $em = $_SESSION['forgot_em'];
        $token = $_SESSION['forgot_token'];

        $q = "SELECT * FROM token WHERE email='$em'";
        $result = mysqli_query($conn, $q);

        $otpMatched = false;

        while ($row = mysqli_fetch_array($result)) {
            if ($otp == $row['otp']) {
                $otpMatched = true;
                break;
            }
        }

        if ($otpMatched) {
            // Redirect to new password page if OTP is correct
            header("Location: new_password.php");
            exit();
        } else {
            // Display alert for incorrect OTP
            echo '<div class="alert alert-danger" role="alert">
                    OTP is incorrect.
                  </div>';
        }
    } else {
        // Display alert if token/email is not set in session
        echo '<div class="alert alert-danger" role="alert">
            gnsjksdknsn
              </div>';
    }

    // Redirect back to OTP entry page
    header("Refresh: 3; URL=Forgot_password_otp.php"); // Redirect after 3 seconds
    exit();
}
?>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
