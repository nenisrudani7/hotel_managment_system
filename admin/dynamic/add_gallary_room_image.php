<?php

session_start();
include '../include/conn.php';
if (!isset($_SESSION["admin_uname"])) {
?>
    <script>
        window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
    </script>
<?php
}

// Initialize variables
$image_path = $modal_id = '';
$error = '';

// Add data to the table if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $modal_id = $_POST['modal_id'];

    // Check if a file has been uploaded
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../img/';
        $uploadFile = $uploadDir . basename($_FILES['new_image']['name']);

        // Attempt to move the uploaded file to the destination folder
        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $uploadFile)) {
            // Update image path in the database
            $image_path = 'img/' . basename($_FILES['new_image']['name']);

            // Prepare and execute INSERT statement
            $insert_query = "INSERT INTO rooms_page_image (image_path, modal_id) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ss", $image_path, $modal_id);

            if ($insert_stmt->execute()) {
                // Redirect back to manage page after successful insert
                header("Location:hotel_room_image_gallry.php");
                exit;
            } else {
                $error = "Error inserting record: " . $conn->error;
            }
        } else {
            $error = "Error uploading file.";
        }
    } else {
        $error = "No file uploaded.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <h2>Add Image</h2>
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="new_image" class="form-label">New Image:</label>
                        <input type="file" class="form-control" id="new_image" name="new_image" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal_id" class="form-label">Modal ID:</label>
                        <input type="text" class="form-control" id="modal_id" name="modal_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Image</button>
                </form>
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
