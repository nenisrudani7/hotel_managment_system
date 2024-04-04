<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php');
            include 'include/conn.php';
            ?>
            <main class="content px-3 py-2">

                <?php
                // Fetch staff information based on the logged-in username
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                 
                    $stmt = $conn->prepare("SELECT * FROM staff WHERE staff_id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $staffData = $result->fetch_assoc();

                        // Process form submission to update staff information
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve updated staff information from the form
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $department = $_POST['department'];
                            $address = $_POST['address'];
                            $salary = $_POST['salary'];

                            // Update the staff information in the database
                            $update_query = "UPDATE staff SET name=?, email=?, phone=?, Department=?, address=?, salary=? WHERE staff_id=?";
                            $stmt = $conn->prepare($update_query);
                            $stmt->bind_param("ssssssi", $name, $email, $phone, $department, $address, $salary, $id);

                            if ($stmt->execute()) {
                                echo "<script>alert('Staff information updated successfully.')</script>";
                               ?>
                                                <script>document.location.href="staff.php";</script>
                               <?php

                                
                            } else {
                                echo "Error updating staff information: " . $conn->error;
                            }
                        }
                    } else {
                        echo "Staff data not found.";
                    }
                } else {
                    echo "Staff ID not provided.";
                }
                ?>

                <div class="container">
                    <h1>Edit Staff Information</h1>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $staffData['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $staffData['email']; ?> readonly">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $staffData['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" value="<?php echo $staffData['Department']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $staffData['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $staffData['salary']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
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
