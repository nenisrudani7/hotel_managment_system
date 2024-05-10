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

// Check if ID parameter is set in URL for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch image details from database
    $query = "SELECT * FROM rooms_page_image WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "No record found for the specified ID.";
        exit;
    }

    $row = $result->fetch_assoc();

    // Assign values for current photo
    $image_path = $row['image_path'];
    $modal_id = $row['modal_id'];

    // Update record in database if form is submitted
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

                // Prepare and execute UPDATE statement
                $update_query = "UPDATE room_type SET image_path=?, modal_id=? WHERE id=?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("ssi", $image_path, $modal_id, $id);

                if ($update_stmt->execute()) {
                    // Redirect back to manage page after successful update
                    header("Location:hotel_room_image_gallry.php");
                    exit;
                } else {
                    $error = "Error updating record: " . $conn->error;
                }
            } else {
                $error = "Error uploading file.";
            }
        } else {
            $error = "No file uploaded.";
        }
    }
} else {
    echo "ID parameter is missing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Image</title>
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
                <h2>Edit Image</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="current_photo" class="form-label">Current Photo:</label>
                        <br>
                        <img src="../<?php echo $image_path; ?>" alt="Current Photo" style="max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <label for="new_image" class="form-label">New Image:</label>
                        <input type="file" class="form-control" id="new_image" name="new_image">
                    </div>
                    <div class="mb-3">
                        <label for="modal_id" class="form-label">Modal ID:</label>
                        <input type="text" class="form-control" id="modal_id" name="modal_id" value="<?php echo $modal_id; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="hotel_room_image_gallry.php" class="btn btn-secondary">Cancel</a>
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
