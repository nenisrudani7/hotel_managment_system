<?php

session_start();
include '../include/conn.php';
if(!isset($_SESSION["admin_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
<?php


// Fetch all images from the database
$query = "SELECT * FROM rooms_page_image";
$result = $conn->query($query);
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
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container mt-4">
                    <h2>Manage Images</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image Path</th>
                                <th>Modal ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['image_path']; ?></td>
                                    <td><?php echo $row['modal_id']; ?></td>
                                    <td>
                                        <a href="edit_room_image.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="delete_room_image.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="add_gallary_room_image.php" class="btn btn-success">Add New Image</a>
                </div>
            </main>
        </div>
    </div>
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
