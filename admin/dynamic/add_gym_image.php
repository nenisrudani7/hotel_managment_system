<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Include database connection
include '../include/conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../img/";
    $image_name = uniqid() . '_' . basename($_FILES["image"]["name"]); // Generate unique filename
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Check file size (50MB limit)
        if ($_FILES["image"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            exit;
        }
        // Allow certain file formats
        if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Retrieve additional form data
        $modal_id = $_POST['modal_id'];
        $modal_description = $_POST['modal_description'];

        // Move uploaded file to destination directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert image details into database
            $image_path = "img/" . $image_name;

            // Prepare and execute INSERT statement
            $insert_query = "INSERT INTO gym_images (image_path, modal_id, modal_description) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("sss", $image_path, $modal_id, $modal_description);

            if ($insert_stmt->execute()) {
                echo "Image added successfully.";
            } else {
                echo "Error: " . $insert_stmt->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image to Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php'); ?>
        <div class="main container-fluid">
            <?php include('include/nav.php'); ?>
            <div class="container mt-5">
                <div class="container mt-4">
                    <h2>Add Image to Gym</h2><br>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Image:</label><br>
                            <input type="file" class="form-control-file" id="image" name="image" required><br>
                        </div>
                        <div class="form-group">
                            <label for="modal_id">Modal ID:</label>
                            <input type="text" class="form-control" id="modal_id" name="modal_id" required>
                        </div>
                        <div class="form-group">
                            <label for="modal_description">Modal Description:</label>
                            <textarea class="form-control" id="modal_description" name="modal_description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                        <a href="gym_image.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
