<?php
session_start();
include '../include/conn.php';

// Redirect to login page if admin is not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $caption_heading = isset($_POST['caption_heading']) ? htmlspecialchars($_POST['caption_heading']) : '';
    $caption_text = isset($_POST['caption_text']) ? htmlspecialchars($_POST['caption_text']) : '';

    // Check if an image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image file type and size
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $valid_extensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        // Upload the file to the server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "img/" . basename($_FILES["image"]["name"]);

            // Insert new entry into the database
            $sql = "INSERT INTO room_page (caption_heading, caption_text, image_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $caption_heading, $caption_text, $image_path);

            if ($stmt->execute()) {
                header("Location: room_carousle.php");
                exit; // Exit script after successful insertion
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No image uploaded.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Room Entry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'include/aside.php'; ?>
        <div class="main">
            <?php include 'include/nav.php'; ?>
            <main class="content px-3 py-2">
                <div class="container-fluid p-3 my-container">
                    <h1>Add Room Entry</h1>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="caption_heading" class="form-label">Caption Heading:</label>
                            <input type="text" id="caption_heading" name="caption_heading" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="caption_text" class="form-label">Caption Text:</label>
                            <textarea id="caption_text" name="caption_text" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
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
    <script src="../js/script.js"></script>
</body>

</html>
