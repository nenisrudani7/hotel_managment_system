<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include ('include/aside.php') ?>
        <div class="main">
            <?php include ('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container">
                    <h2>Edit User</h2>
                    <?php
                    // Assuming the connection is already established
                    include_once ('include/conn.php');

                    // Check if the user ID is provided in the URL
                    if (isset($_GET['id'])) {
                        $userId = $_GET['id'];

                        // Fetch user data from the database
                        $sql = "SELECT * FROM register WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Display the edit form
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            
                            // Handle form submission
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $status = $_POST['status'];
                                $date = $_POST['date'];

                                // Update user information in the database
                                $updateSql = "UPDATE register SET name=?, email=?, password=?, status=?, date=? WHERE id=?";
                                $updateStmt = $conn->prepare($updateSql);
                                $updateStmt->bind_param("sssssi", $name, $email, $password, $status, $date, $userId);
                                
                                if ($updateStmt->execute()) {
                                    echo "User information updated successfully.";
                                } else {
                                    echo "Error updating user information: " . $conn->error;
                                }

                                $updateStmt->close();
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $row["status"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="text" class="form-control" id="date" name="date" value="<?php echo $row["date"]; ?>">
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            <?php
                        } else {
                            echo "User not found.";
                        }

                        // Close statement
                        $stmt->close();
                    } else {
                        echo "User ID not provided.";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </main>
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
