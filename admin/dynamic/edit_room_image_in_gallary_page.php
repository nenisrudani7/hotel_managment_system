<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

include '../include/conn.php';

// Check if ID parameter is set in URL
if (!isset($_GET['id'])) {
    // Redirect to another page if no ID specified
    header("Location: hotel_room_image_gallry.php");
    exit;
}

$id = $_GET['id'];

// Fetch details of the image based on the provided ID
$query = "SELECT * FROM rooms_page_image WHERE id = $id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    // Redirect to another page if no record found for the specified ID
    header("Location: hotel_room_image_gallry.php");
    exit;
}

$row = $result->fetch_assoc();

// Update record in database if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $modal_id = $_POST['modal_id'];

    // Check if a new image file has been uploaded
    if ($_FILES['new_image']['size'] > 0) {
        $new_image_name = $_FILES['new_image']['name'];
        $new_image_temp = $_FILES['new_image']['tmp_name'];
        $new_image_path = "../img/";
        $new_image = basename($new_image_name);

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($new_image_temp, $new_image_path . $new_image)) {
            // Update the image_path with the new image path
            $image_path = "img/" . $new_image;
        } else {
            echo "Error uploading the new image.";
            exit;
        }
    } else {
        // No new image uploaded, keep the existing image path
        $image_path = $row['image_path'];
    }

    // Prepare and execute UPDATE statement
    $update_query = "UPDATE rooms_page_image SET image_path='$image_path', modal_id='$modal_id' WHERE id=$id";

    if ($conn->query($update_query) === TRUE) {
        // Redirect to another page after successful update
        header("Location: hotel_room_image_gallry.php");
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
    <title>Edit Image</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Image</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="current_image">Current Image Path:</label>
                <img src="../<?php echo $row['image_path']; ?>" width="100px" height="100px" alt="">
            </div>
            <div class="form-group">
                <label for="new_image">Upload New Image:</label>
                <input type="file" class="form-control-file" id="new_image" name="new_image">
            </div>
            <div class="form-group">
                <label for="modal_id">Modal ID:</label>
                <input type="text" class="form-control" id="modal_id" name="modal_id" value="<?php echo $row['modal_id']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="hotel_room_image_gallry.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
