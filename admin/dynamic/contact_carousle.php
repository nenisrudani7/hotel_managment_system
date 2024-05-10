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
            
            <?php include '../include/conn.php'; include 'include/aside.php'; ?>
            <div class="main">
                <?php include 'include/nav.php' ?>
        <main class="content px-3 py-2">
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <a href="add_carousle_contact_page.php" class="btn btn-primary">Add Carousel Contact Page</a>
                    </div>
                </div>

                <!-- Display existing data -->
                <?php
                include '../include/conn.php';
                $query = "SELECT id, image_url, caption_title, caption_text FROM contacts_page";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table">';
                    echo '<thead><tr><th>Image</th><th>Caption Title</th><th>Caption Text</th><th>Action</th></tr></thead>';
                    echo '<tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td><img src="../' . $row['image_url'] . '" class="img-thumbnail" style="max-width:250px;"></td>';
                        echo '<td>' . $row['caption_title'] . '</td>';
                        echo '<td>' . $row['caption_text'] . '</td>';
                        echo '<td>';
                        echo '<a href="edit_carousle_contact_page.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">Edit</a>';
                        echo '<a href="delete_carousle_contact_page.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm ml-2">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No carousel items found</p>';
                }

                mysqli_close($conn);
                ?>
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
