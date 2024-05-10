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

                    <!-- Button to add more features -->
                    <a href="hotel_features_add.php" class="btn btn-success mb-3">Add More Features</a>
                    <div class="container-fluid  p-3 my-container">
                        <!-- display_hotel_features.php -->
                        <div class="container mt-5">
                            <h2>Hotel Features</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Feature Logo</th> <!-- New column for feature logo -->
                                        <th>Feature Name</th>
                                        <th>Flaticon Class</th>
                                        <th>I Class</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to fetch hotel features data
                                    $query = "SELECT * FROM hotelfeatures";

                                    // Execute query
                                    $result = mysqli_query($conn, $query);

                                    // Check if there are any hotel features
                                    if (mysqli_num_rows($result) > 0) {
                                        // Fetch and display each row of hotel features data
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td>

                                                    <span class=<?php echo $row['flaticon_class']; ?> display-3 mb-3 d-block
                                                        text-primary>
                                                        <h1><i class="<?php echo $row['i_class']; ?>" style="color: #ff1900;"></i>
                                                        </h1>
                                                    </span>
                                                </td>

                                                <td>
                                                    <?php echo $row['feature_name']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['flaticon_class']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_class']; ?>
                                                </td>
                                                <td>
                                                    <!-- Button to edit feature -->
                                                    <a href="edit_feature.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <!-- Button to delete feature -->
                                                    <a href="delete_feature.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No hotel features found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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

