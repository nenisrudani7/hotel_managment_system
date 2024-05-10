<?php
session_start();
include_once ("admin/include/conn.php");

// Check if user is authenticated
if (!isset($_SESSION['user_uname'])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit();
}

$message = '';

if (isset($_POST['btn'])) {
    $fullname = $_POST['fullName'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender']; // Get selected gender value
    $email = $_SESSION['user_uname'];

    // Update query with gender field
    $sql = "UPDATE register SET name='$fullname', mobile='$mobile', address='$address', gender='$gender' WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        
        $_SESSION['update'] = "Profile updated successfully"; ?>
        <script>
window.location.href="http://localhost/hotel_managment_system1/user_profile1.php";
        </script>
        <?php

    } else {
        $message = "Error updating profile: " . mysqli_error($conn);
    }

    // Handle image upload if a new image is selected
    if ($_FILES['pic1']['name'] != "") {
        $pic_name = uniqid() . $_FILES['pic1']['name'];
        $updatePicSql = "UPDATE register SET image='$pic_name' WHERE email='$email'";

        if (mysqli_query($conn, $updatePicSql)) {
            // Move uploaded image to the desired directory
            move_uploaded_file($_FILES['pic1']['tmp_name'], "admin/profile_pictures/" . $pic_name);
        } else {
            $message .= " Error updating profile picture: " . mysqli_error($conn);
        }
    }
}

// Fetch user data for pre-filling the form
$em = $_SESSION['user_uname'];
$sql = "SELECT * FROM register WHERE email='$em'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    $message = "No data found";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
<?php include('navbar.php') ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-2 border-dark shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center">Edit Profile</h3>
                        <form action="edit_user_profile.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    value="<?php echo $row['name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                                        <?php if ($row['gender'] == "Male")
                                            echo "checked"; ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" <?php if ($row['gender'] == "Female")
                                            echo "checked"; ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="<?php echo $row['mobile']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <textarea class="form-control" id="address" name="address"
                                    rows="3"><?php echo $row['address']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="pic1" class="form-label">Profile Picture:</label>
                                <input type="file" class="form-control" id="pic1" name="pic1">
                            </div>

                            <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                        </form>

                        <?php if (!empty($message)): ?>
                            <div class="alert alert-danger mt-3"><?php echo $message; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>

    <!-- Bootstrap JS (optional, if needed for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>