<?php
include '../include/conn.php';

// Check if the room type ID is provided in the URL
if (isset($_GET['id'])) {
    $room_type_id = $_GET['id'];

    // Fetch room type details from the database
    $sql = "SELECT * FROM room_type WHERE room_type_id = $room_type_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $max_person = isset($_POST['max_person']) ? $_POST['max_person'] : '';
            $offers = isset($_POST['offers']) ? $_POST['offers'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';

            // Check if a new image is uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if file is a valid image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check === false) {
                    echo '<div class="alert alert-danger" role="alert">File is not an image.</div>';
                } elseif ($_FILES["image"]["size"] > 50000000) {
                    echo '<div class="alert alert-danger" role="alert">Sorry, your file is too large.</div>';
                } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<div class="alert alert-danger" role="alert">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
                } elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = basename($_FILES["image"]["name"]);
                    // Update with image path
                    $update_sql = "UPDATE room_type SET room_type = '$room_type', price = '$price', max_person = '$max_person', offers = '$offers', description = '$description', image = '$image_path' WHERE room_type_id = $room_type_id";
                }
            } else {
                // Update without image path
                $update_sql = "UPDATE room_type SET room_type = '$room_type', price = '$price', max_person = '$max_person', offers = '$offers', description = '$description' WHERE room_type_id = $room_type_id";
            }

            // Execute the update query
            if (isset($update_sql)) {
                if ($conn->query($update_sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Room type updated successfully</div>';
                    echo '<script>window.location.href="view_room_type.php";</script>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating room type: ' . $conn->error . '</div>';
                }
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Room type not found</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Room type ID not provided</div>';
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="wrapper">
    <?php include('include/aside.php'); ?>
    <div class="main">
        <?php include('include/nav.php') ?>
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Edit Room Type</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <input type="text" class="form-control" id="room_type" name="room_type" value="<?php echo $row['room_type']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="max_person" class="form-label">Max Persons</label>
                                <input type="text" class="form-control" id="max_person" name="max_person" value="<?php echo $row['max_person']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="offers" class="form-label">Offers</label>
                                <input type="text" class="form-control" id="offers" name="offers" value="<?php echo $row['offers']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
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
