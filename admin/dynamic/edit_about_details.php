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

                    <?php
                    // Include your connection file
                    include '../include/conn.php';

                    // Function to handle file upload
                    function uploadFile($file)
                    {
                        $target_dir = "../img/"; // Target directory for uploaded images
                        $new_name = basename($file["name"]); // Custom name for the uploaded image
                        $target_file = $target_dir . $new_name; // Path to store the file
                        $uploadOk = 1; // Flag to check if upload is successful
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // File extension
                
                        // Check if the file is an actual image or fake image
                        $check = getimagesize($file["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }

                        // Check file size (optional)
                        if ($file["size"] > 50000000) {
                            echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow only certain file formats (you can modify this list)
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        } else { // If everything is ok, try to upload file
                            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                                return $target_file; // Return the path to the uploaded file
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                        return ""; // Return empty string if upload fails
                    }

                    // Check if form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $id = $_POST['id'];
                        $heading = $_POST['heading'];
                        $video_link = $_POST['video_link'];
                        $description = $_POST['description'];

                        // Check if a new image is uploaded
                        if ($_FILES["image"]["name"]) {
                            $image_path = uploadFile($_FILES["image"]);
                            // Update about content details in the database with the new image path
                            $update_query = "UPDATE about_content SET heading='$heading', image_path='$', video_link='$video_link', description='$description' WHERE id='$id'";
                        } else {
                            // If no new image is uploaded, update without changing the image path
                            $update_query = "UPDATE about_content SET heading='$heading', video_link='$video_link', description='$description' WHERE id='$id'";
                        }

                        $update_result = mysqli_query($conn, $update_query);

                        if ($update_result) {
                            echo "Content updated successfully.";
                        } else {
                            echo "Error updating content: " . mysqli_error($conn);
                        }
                    }

                    // Fetch about content details
                    $query = "SELECT * FROM about_content where ";
                    $result = mysqli_query($conn, $query);
                    // Retrieve form data
                    $id = $_REQUEST['id'];

                    // Fetch about content details based on provided ID
                    $query = "SELECT * FROM about_content WHERE id='$id'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Display edit form for the row
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="heading">Heading:</label>
                                        <input type="text" class="form-control" name="heading"
                                            value="<?php echo $row['heading']; ?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="image">Upload New Image:</label>
                                        <input type="file" class="form-control-file" name="image">
                                        <!-- File input for image upload -->
                                    </div><br>
                                    <div class="form-group">
                                        <label for="video_link">Video Link:</label>
                                        <input type="text" class="form-control" name="video_link"
                                            value="<?php echo $row['video_link']; ?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control"
                                            name="description"><?php echo $row['description']; ?></textarea>
                                    </div><br>
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "No content found for the provided ID.";
                    }


                    // Close database connection
                    mysqli_close($conn);
                    ?>

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












