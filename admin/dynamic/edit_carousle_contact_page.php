<?php
session_start();
if(!isset($_SESSION["admin_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
<?php
include '../include/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM contacts_page WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Record not found";
        exit();
    }
} else {
    echo "ID parameter is missing";
    exit();
}

if (isset($_POST['submit'])) {
    $caption_title = $_POST['caption_title'];
    $caption_text = $_POST['caption_text'];

    // Process image upload
    $image_url = $row['image_url']; // Default to existing image if not updated
    if ($_FILES['image']['size'] > 0) {
        // If a new image is uploaded, update the image
        $image_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $image_url = "img/" . $image_name; // Assuming the image directory is "img/"
        move_uploaded_file($temp_name, "../" . $image_url); // Move uploaded file to desired directory
    }

    $update_query = "UPDATE contacts_page SET image_url='$image_url', caption_title='$caption_title', caption_text='$caption_text' WHERE id='$id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        header("location: contact_carousle.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"/>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="wrapper">
    <?php include 'include/aside.php' ?>
    <div class="main">
        <?php include 'include/nav.php' ?>
        <main class="content px-3 py-2">
            
<div class="container">
    <h2>Edit Carousel Contact Page</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Current Image:</label><br>
            <img src="../<?php echo $row['image_url']; ?>" class="img-thumbnail" style="max-width:250px;" alt="Current Image">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image:</label><br>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="caption_title" class="form-label">Caption Title:</label>
            <input type="text" id="caption_title" name="caption_title" class="form-control" value="<?php echo $row['caption_title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="caption_text" class="form-label">Caption Text:</label>
            <textarea id="caption_text" name="caption_text" class="form-control" required><?php echo $row['caption_text']; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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
