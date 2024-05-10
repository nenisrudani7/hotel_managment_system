<?php
session_start();
include '../include/conn.php';

// Redirect to login page if not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Define variables and initialize with empty values
$image_path = $modal_target = '';
$error = '';

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate modal target
    $modal_target = $_POST['modal_target'];
    if (empty($modal_target)) {
        $error = "Please enter the modal target.";
    }

    // Check if there are no errors, then upload image and insert data into database
    if (empty($error)) {
        // Check if a file has been uploaded
        if (!empty($_FILES["image"]["name"])) {
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                $error = "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 500000) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk === 0) {
                $error = "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = "img/" . basename($_FILES["image"]["name"]);
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    // Log detailed error message for debugging
                    error_log("File upload error: " . $_FILES["image"]["error"]);
                }
            }
        }

        // Insert record into database if no errors
        if (empty($error)) {
            $insert_query = "INSERT INTO interior_images (image_path, modal_target) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ss", $image_path, $modal_target);

            if ($insert_stmt->execute()) {
                // Redirect to manage page after successful insert
                header("Location: interior_images.php");
                exit;
            } else {
                $error = "Error inserting record: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Interior Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <h2>Add Interior Image</h2>
                <form method="post" enctype="multipart/form-data" action="add_interior_image.php">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal_target" class="form-label">Modal Target:</label>
                        <input type="text" class="form-control" id="modal_target" name="modal_target" value="<?php echo htmlspecialchars($modal_target); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Image</button>
                    <a href="manage_interior_images.php" class="btn btn-secondary">Cancel</a>
                </form>
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
            </main>
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
