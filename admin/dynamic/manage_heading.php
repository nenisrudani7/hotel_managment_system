<?php
session_start();
include '../include/conn.php';
if (!isset($_SESSION["admin_uname"])) {
    ?>
    <script>
        window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
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
    <?php
    $query = "SELECT * FROM gallery_header"; // Replace 'your_table_name' with the actual name of your table
    $result = $conn->query($query);
    ?>
    <div class="wrapper">
        <?php include ('include/aside.php') ?>
        <div class="main">
            <?php include ('include/nav.php') ?>
            <main class="content px-3 py-2">

                <div class="container">
                    <h2 class="mt-4">manage heading from gallery page</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through the result set and display data
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['subtitle'] . "</td>";
                                echo "<td><a href='edit_gallary_page_heading.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>"; // Replace 'edit.php' with your edit page URL
                                echo "<td><a href='delete_heading_gallary_page.php?id=" . $row['id'] . "' class='btn btn-danger'>delete</a></td>";

                                echo "</tr>";
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