<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />

    <script src="jquery-3.6.4.min.js"></script>
    <script src="jquery.validate.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php
        include 'include/aside.php';
        ?>

        <div class="main container-fluid">
            <?php include 'include/nav.php' ?>
            <!-- main container -->
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="image/customer-support.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">Admin: <?php echo $_SESSION['admin_uname']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            // Assuming the connection is already established
                            include_once('include/conn.php');

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Update password
                                $new_password = $_POST['new_password'];
                                $confirm_password = $_POST['confirm_password'];

                                if ($new_password === $confirm_password) {
                                    // Hash the new password before storing it in the database
                                    $hashed_password = ($new_password);

                                    $admin_email = $_SESSION['admin_uname'];

                                    // Prepare and execute the update query
                                    $queryUpdate = "UPDATE register SET password = ? WHERE email = ?";
                                    $stmt = $conn->prepare($queryUpdate);
                                    $stmt->bind_param("ss", $hashed_password, $admin_email);

                                    if ($stmt->execute()) {
                                        echo "<div class='alert alert-success' role='alert'>Password updated successfully.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>Error updating password: " . $conn->error . "</div>";
                                    }

                                    // Close statement
                                    $stmt->close();
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>New password and confirm password do not match.</div>";
                                }
                            }
                            ?>

                            <div class="card mb-4">
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <!-- Password Update Section -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>Update Password</h4>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="new_password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Update Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
