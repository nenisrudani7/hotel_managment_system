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
                <div class="container mt-4">
        <h2>Hotel Details</h2>
        <br>
        <a href="add_more_details.php" class="btn btn-success">Add more detils about page</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Video Link</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include '../include/conn.php';

                // Fetch all details from the database
                $query = "SELECT * FROM about_content";
                $result = $conn->query($query);

                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Loop through each row and display data in table rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['heading'] . "</td>";
                        echo "<td><img src='../" . $row['image_path'] . "' width='100px' height='100px' alt=''></td>";
                        echo "<td><a href='" . $row['video_link'] . "' target='_blank'>" . $row['video_link'] . "</a></td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>
                                <a href='edit_about_details.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                                <a href='delete_about.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    // No records found
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

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









