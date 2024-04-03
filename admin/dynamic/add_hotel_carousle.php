<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset ($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include '../include/conn.php';

$query = "SELECT * FROM user WHERE a_name = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    ?>
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
        <link rel="stylesheet" href="../css/style.css">

    </head>

    <body>

        <div class="wrapper">
            <?php include ('include/aside.php') ?>
            <div class="main">
                <?php include ('include/nav.php') ?>
                <main class="content px-3 py-2">


                    <div class="container-fluid  p-3 my-container">
                        <h1>Add Hotel Entry</h1><br>
                        <form method="POST" action="add_hotel_carousle.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption_heading">Caption Heading:</label><br>
                                <input type="text" id="caption_heading" name="caption_heading" class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="caption_text">Caption Text:</label><br>
                                <textarea id="caption_text" name="caption_text" class="form-control"></textarea>
                            </div><br>
                            <div class="form-group">
                                <label for="image">Upload Image:</label><br>
                                <input type="file" id="image" name="image" class="form-control-file">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Add Entry</button>
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

    <?php
} else {
    echo "User data not found.";
}
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $caption_heading = $_POST['caption_heading'];
    $caption_text = $_POST['caption_text'];

    // Check if an image is uploaded
    if (isset ($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);

        if ($check !== false) {
            // Check file size
            if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            } else {
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    // Upload the file to the server
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // Set the image path
                        $image_path = "img/" . basename($_FILES["image"]["name"]);
                        // Insert new entry into the database
                        $sql = "INSERT INTO hotel_main_page (caption_heading, caption_text, image_path) VALUES ('$caption_heading', '$caption_text', '$image_path')";
                        if (mysqli_query($conn, $sql)) {
                            ?>
                            <script>
                                window.location.href = "hotel_php_carousle.php";
                            </script>
                            <?php
                            exit; // Exit script after successful insertion
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No image uploaded.";
    }
}
?>