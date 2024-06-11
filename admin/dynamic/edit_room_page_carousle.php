<?php
session_start();
include '../include/conn.php';

// Redirect to login page if admin is not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

$id_to_edit = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $caption_heading = isset($_POST['caption_heading']) ? htmlspecialchars($_POST['caption_heading']) : '';
    $caption_text = isset($_POST['caption_text']) ? htmlspecialchars($_POST['caption_text']) : '';

    // Check if a new image is uploaded
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

        if ($_FILES["image"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        // Upload the new image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "img/" . basename($_FILES["image"]["name"]);

            // Update the image path in the database
            $sql_update_image = "UPDATE room_page SET image_path = ? WHERE id = ?";
            $stmt_image = $conn->prepare($sql_update_image);
            $stmt_image->bind_param("si", $image_path, $id);
            $stmt_image->execute();
            $stmt_image->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    // Update caption heading and text in the database
    $sql_update_caption = "UPDATE room_page SET caption_heading = ?, caption_text = ? WHERE id = ?";
    $stmt_caption = $conn->prepare($sql_update_caption);
    $stmt_caption->bind_param("ssi", $caption_heading, $caption_text, $id);
    if ($stmt_caption->execute()) {
        header("Location: room_carousle.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt_caption->error;
    }
}

// Fetch the room entry data to be edited
if ($id_to_edit) {
    $sql_select_room = "SELECT * FROM room_page WHERE id = ?";
    $stmt_select_room = $conn->prepare($sql_select_room);
    $stmt_select_room->bind_param("i", $id_to_edit);
    $stmt_select_room->execute();
    $result_select_room = $stmt_select_room->get_result();

    if ($result_select_room->num_rows > 0) {
        $row = $result_select_room->fetch_assoc();
        $image_path = $row['image_path'];
    } else {
        echo "No record found for the given ID.";
        exit;
    }

    $stmt_select_room->close();
} else {
    echo "No ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Room Entry</title>
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
                    <h1>Edit Room Entry</h1>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id_to_edit; ?>">
                        <div class="mb-3">
                            <label for="caption_heading" class="form-label">Caption Heading:</label>
                            <input type="text" id="caption_heading" name="caption_heading" class="form-control"
                                value="<?php echo htmlspecialchars($row['caption_heading']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="caption_text" class="form-label">Caption Text:</label>
                            <textarea id="caption_text" name="caption_text"
                                class="form-control"><?php echo htmlspecialchars($row['caption_text']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Current Image:</label><br>
                            <img src="../<?php echo $image_path; ?>" width="100" height="100" alt="Current Image"
                                class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload New Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
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
    <script src="../js/script.js"></script>
</body>

</html>
