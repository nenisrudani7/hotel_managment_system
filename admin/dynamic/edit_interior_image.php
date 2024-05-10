<?php
session_start();
include '../include/conn.php';

// Redirect to login page if not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID parameter is missing.";
    exit;
}

$id = $_GET['id'];

// Fetch image details from database
$query = "SELECT * FROM interior_images WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No record found for the specified ID.";
    exit;
}

$row = $result->fetch_assoc();
$image_path = $row['image_path'];
$modal_target = $row['modal_target'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modal_target = $_POST['modal_target'];

    // Check if a new image file has been uploaded
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../img/';
        $uploadFile = $uploadDir . basename($_FILES['new_image']['name']);

        // Attempt to move the uploaded file to the destination folder
        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $uploadFile)) {
            // Update image path in the database with the new image
            $image_path = 'img/' . basename($_FILES['new_image']['name']);
        } else {
            echo "Error uploading file.";
            exit;
        }
    }

    // Update record in database
    $update_query = "UPDATE interior_images SET image_path=?, modal_target=? WHERE id=?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $image_path, $modal_target, $id);

    if ($update_stmt->execute()) {
        header("Location:interior_images.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Interior Image</title>
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
                <h2>Edit Interior Image</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="current_image" class="form-label">Current Image:</label>
                        <br>
                        <img src="../<?php echo $image_path; ?>" alt="Current Image" style="max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <label for="new_image" class="form-label">New Image:</label>
                        <input type="file" class="form-control" id="new_image" name="new_image">
                    </div>
                    <div class="mb-3">
                        <label for="modal_target" class="form-label">Modal Target:</label>
                        <input type="text" class="form-control" id="modal_target" name="modal_target" value="<?php echo $modal_target; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="manage_interior_images.php" class="btn btn-secondary">Cancel</a>
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
