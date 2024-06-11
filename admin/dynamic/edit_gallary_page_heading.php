<?php
session_start();
include '../include/conn.php';
if (!isset($_SESSION["admin_uname"])) {
    ?>
    <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
    </script>
    <?php
}

// Check if ID parameter is set in URL
if (!isset($_GET['id'])) {
    ?>
    <script>
        window.location.href="manage_heading.php";
    </script>
    <?php
    exit;
}

$id = $_GET['id'];

// Fetch details of the row based on the provided ID
$query = "SELECT * FROM gallery_header WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No record found for the specified ID.";
    exit;
}

$row = $result->fetch_assoc();

// Update record in database if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];

    // Prepare and execute UPDATE statement
    $update_query = "UPDATE gallery_header SET title=?, subtitle=? WHERE id=?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $title, $subtitle, $id);
    
    if ($update_stmt->execute()) {
        // Redirect back to display page after successful update
        ?>
        <script>
            window.location.href="manage_heading.php";
        </script>
        <?php
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
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
        <link rel="stylesheet" href="../css/style.css" />
    </head>

    <body>
        <div class="wrapper">
            <?php include('include/aside.php') ?>
            <div class="main">
                <?php include('include/nav.php') ?>
                <main class="content px-3 py-2">
                <div class="container mt-4">
        <h2>Edit Gallery Page Heading</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?php echo $row['subtitle']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
            </div>
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

    </html


