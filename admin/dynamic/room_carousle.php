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

                    <div class="container-fluid text- p-3 my-container">
                        <div class="container">
                            <h1>Edit room Entries</h1>
                            <div class="mb-3">
                                <a href="add_room_page_carousle.php" class="btn btn-success">Add New Entry</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Caption Heading</th>
                                            <th>Caption Text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "../include/conn.php";

                                        $sql = "SELECT id, image_path, caption_heading, caption_text FROM room_page";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td><img src="../<?php echo $row['image_path']; ?>" width="100px" height="100px" alt=""></td>
                                                <td>
                                                    <?php echo $row['caption_heading']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['caption_text']; ?>
                                                </td>
                                                <td>
                                                    <form method="POST" action="edit_hotel_carousle.php" style="display: inline;">
                                                        <a href="edit_room_page_carousle.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                        <a href="delete_room_carousle.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger">Delete</a>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

