
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

                            // Fetch admin data based on the logged-in admin's email
                            $admin_email = $_SESSION['admin_uname'];
                            $queryAdmin = "SELECT * FROM register WHERE email = ?";
                            $stmt = $conn->prepare($queryAdmin);
                            $stmt->bind_param("s", $admin_email);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form action="update_admin_profile.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="a_name" class="form-label">Full Name</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="a_name" name="a_name" value="<?php echo $row['name']; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="a_email" class="form-label">Email</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" id="a_email" name="a_email" value="<?php echo $row['email']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['mobile']; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="address" class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "Admin not found.";
                            }

                            // Close statement and database connection
                            $stmt->close();
                            $conn->close();
                            ?>
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
