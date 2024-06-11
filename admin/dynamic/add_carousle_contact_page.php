<?php
session_start();
if(!isset($_SESSION["admin_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}

include '../include/conn.php';

if (isset($_POST['submit'])) {
    $image_url = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $caption_title = $_POST['caption_title'];
    $caption_text = $_POST['caption_text'];

    move_uploaded_file($temp_name, "../img/" . $image_url);

    $insert_query = "INSERT INTO contacts_page (image_url, caption_title, caption_text) VALUES ('$image_url', '$caption_title', '$caption_text')";
    $insert_result = mysqli_query($conn, $insert_query);
    if ($insert_result) {
        header("Location: contact_page.php");
        exit();
    } else {
        echo '<p class="text-danger">Error: Unable to add item.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add Data</title>
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
                <h2>Add Data</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input type="file" id="image" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_title" class="form-label">Caption Title:</label>
                        <input type="text" id="caption_title" name="caption_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="caption_text" class="form-label">Caption Text:</label>
                        <textarea id="caption_text" name="caption_text" class="form-control" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Item</button>
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
