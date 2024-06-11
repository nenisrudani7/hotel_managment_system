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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container">
                    <h2>Add Hotel Feature</h2>
                    <form method="POST" action="hotel_features_add.php">
                        <div class="mb-3">
                            <label for="feature_name" class="form-label">Feature Name:</label>
                            <input type="text" class="form-control" id="feature_name" name="feature_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="flaticon_class" class="form-label">Flaticon Class:</label>
                            <input type="text" class="form-control" id="flaticon_class" name="flaticon_class" required>
                        </div>
                        <div class="mb-3">
                            <label for="i_class" class="form-label">I Class:</label>
                            <input type="text" class="form-control" id="i_class" name="i_class" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Feature</button>
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

<?php


// Redirect to login page if admin is not logged in
if (!isset($_SESSION["admin_uname"])) {
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $feature_name = $_POST['feature_name'];
    $flaticon_class = $_POST['flaticon_class'];
    $i_class = $_POST['i_class'];

    // Prepare insert query
    $sql = "INSERT INTO hotelfeatures (feature_name, flaticon_class, i_class) VALUES (?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sss", $feature_name, $flaticon_class, $i_class);

        // Execute statement
        if ($stmt->execute()) {
            // Insertion successful, redirect to features page
            header("Location: hotel_features.php");
            exit;
        } else {
            // Insertion failed
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error in preparing statement
        echo "Error: " . $conn->error;
    }
}

?>
