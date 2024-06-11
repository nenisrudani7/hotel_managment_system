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

// Initialize variables for form inputs
$heading = "";
$image_path = "";
$video_link = "";
$description = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $heading = $_POST['heading'];
    $video_link = $_POST['video_link'];
    $description = $_POST['description'];

    // Upload image file
    $target_dir = "../img/"; // Directory where images will be uploaded
    $target_file = 'img' . basename($_FILES["image"]["name"]); // Path of the uploaded file
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // File extension

    // Check if file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        // Upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;

            // Insert data into database
            $insert_query = "INSERT INTO about_content (heading, image_path, video_link, description) VALUES ('$heading', '$image_path', '$video_link', '$description')";
            if ($conn->query($insert_query) === TRUE) {
                echo "New record inserted successfully.";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "File is not an image.";
        exit;
    }
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
                    <div class="container mt-4">
                        <h2>Add New Entry</h2>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="heading">Heading:</label>
                                <input type="text" class="form-control" id="heading" name="heading" required>
                            </div><br>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"
                                    required>
                            </div><br>
                            <div class="form-group">
                                <label for="video_link">Video Link:</label>
                                <input type="text" class="form-control" id="video_link" name="video_link">
                            </div><br>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    required></textarea>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="about_content.php" class="btn btn-secondary">Cancel</a>
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
        <script src="../js/script.js"></script>
    </body>

    </html>

