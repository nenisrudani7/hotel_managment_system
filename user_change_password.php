<?php
session_start();

include_once("admin/include/conn.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['old_pswd']) && isset($_POST['pswd']) && isset($_POST['repswd'])) {
        $email = $_SESSION['user_uname'];
        $oldPassword = $_POST['old_pswd'];
        $newPassword = $_POST['pswd'];
        $confirmPassword = $_POST['repswd'];

        // Verify old password
        $query = "SELECT * FROM register WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $oldPassword);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0 && $newPassword === $confirmPassword) {
                // Update password
                $updateQuery = "UPDATE register SET password = ? WHERE email = ?";
                $updateStmt = mysqli_prepare($conn, $updateQuery);

                if ($updateStmt) {
                    mysqli_stmt_bind_param($updateStmt, "ss", $newPassword, $email);
                    $result = mysqli_stmt_execute($updateStmt);

                    if ($result) {
                        ?>
                        <script>
                            window.location.href="http://localhost/hotel_managment_system1/gust/hotel1.php";
                        </script>
                        <?php
                    } else {
                        echo 'error';
                    }

                    mysqli_stmt_close($updateStmt);
                } else {
                    echo 'error';
                }
            } else {
                echo 'error';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 'error';
        }

        exit(); // Stop further processing after handling the AJAX request
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php include('navbar.php') ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-2 border-dark shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center">Change Password</h3>
                        <form id="passwordChangeForm" method="POST">
                            <div class="mb-3">
                                <label for="old_pswd" class="form-label">Old Password:</label>
                                <input type="password" class="form-control" id="old_pswd" name="old_pswd" required>
                                <span id="old_pswd_error" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="pswd" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="pswd" name="pswd" required>
                                <span id="pswd_error" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="repswd" class="form-label">Confirm New Password:</label>
                                <input type="password" class="form-control" id="repswd" name="repswd" required>
                                <span id="repswd_error" class="error"></span>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary" id="verifyOldPasswordBtn">Verify Old Password</button>
                                <button type="submit" class="btn btn-success" id="changePasswordBtn" disabled>Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#verifyOldPasswordBtn").click(function() {
                var oldPassword = $("#old_pswd").val();

                $.ajax({
                    type: "POST",
                    url: "verify_old_password.php", // Use the same page for processing
                    data: {
                        old_pswd: oldPassword
                    },
                    success: function(response) {
                        if (response === "success") {
                            $("#old_pswd_error").text("");
                            $("#verifyOldPasswordBtn").prop("disabled", true);
                            $("#changePasswordBtn").prop("disabled", false);
                            alert("Old password verified successfully!");
                        } else {
                            $("#old_pswd_error").text("Incorrect old password");
                            $("#verifyOldPasswordBtn").prop("disabled", false);
                            $("#changePasswordBtn").prop("disabled", true);
                        }
                    }
                });
            });

            $("#passwordChangeForm").submit(function(event) {
                // Prevent form submission if new passwords do not match
                var newPassword = $("#pswd").val();
                var confirmPassword = $("#repswd").val();

                if (newPassword !== confirmPassword) {
                    $("#repswd_error").text("Passwords do not match");
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
        <?php include('footer.php') ?>

</body>
</html>
