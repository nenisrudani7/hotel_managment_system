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
    
    <?php
    
    
    $id_to_edit = isset ($_GET['id']) ? $_GET['id'] : null;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $caption_heading = isset ($_POST['caption_heading']) ? $_POST['caption_heading'] : '';
        $caption_text = isset ($_POST['caption_text']) ? $_POST['caption_text'] : '';
    
        // Update the image path if a new image is uploaded
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
                            // Update the image path in the database
                            $image_path = basename($_FILES["image"]["name"]);
                            $sql = "UPDATE hotel_main_page SET image_path='img/$image_path' WHERE id=$id";
                            if (!mysqli_query($conn, $sql)) {
                                echo "Error updating image path: " . mysqli_error($conn);
                            } else {
                                echo "New image uploaded successfully";
                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            } else {
                echo "File is not an image.";
            }
        }
    
        // Update the other fields in the database
        $sql = "UPDATE hotel_main_page SET caption_heading='$caption_heading', caption_text='$caption_text' WHERE id=$id";
        if (mysqli_query($conn, $sql) && !isset ($image_path)) {
           ?>
            <script>
                window.location.href="hotel_php_carousle.php";
            </script>
           <?php

        } elseif (!isset ($image_path)) {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    
    // Fetch the data of the entry to be edited
    if ($id_to_edit) {
        $sql = "SELECT * FROM hotel_main_page WHERE id=$id_to_edit";
        $result = mysqli_query($conn, $sql);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "No record found for the given ID.";
            exit; // Exit script if no record found
        }
        $row = mysqli_fetch_assoc($result);
    
        // Fetch the image path
        $image_path = $row['image_path'];
    } else {
        echo "No ID provided.";
        exit; // Exit script if no ID provided
    }
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
                        <h1>Edit Hotel Entry</h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            enctype="multipart/form-data">
                            <!-- Hidden input field for ID -->
                            <input type="hidden" name="id" value="<?php echo $id_to_edit; ?>">
                            <div class="form-group">
                                <label for="caption_heading">Caption Heading:</label><br><br>
                                <input type="text" id="caption_heading" name="caption_heading" class="form-control"
                                    value="<?php echo isset ($row['caption_heading']) ? $row['caption_heading'] : ''; ?>">
                            </div><br>        
                            <div class="form-group">
                                <label for="caption_text">Caption Text:</label><br><br>
                                <textarea id="caption_text" name="caption_text"
                                    class="form-control"><?php echo isset ($row['caption_text']) ? $row['caption_text'] : ''; ?></textarea>
                            </div><br>        
                            <div class="form-group">
                                <label for="current_image">Current Image:</label><br><br>
                                <img src="../<?php echo $image_path; ?>" width="100px" height="100px" class="img-thumbnail"
                                    alt="Current Image">
                            </div><br>
                            <div class="form-group">
                                <label for="image">Upload New Image:</label><br><br>
                                <input type="file" id="image" name="image" class="form-control-file">
                            </div><br>    
                            <button type="submit" class="btn btn-primary">Update</button>
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
