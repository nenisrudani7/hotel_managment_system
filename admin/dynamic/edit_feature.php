<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset ($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include '../include/conn.php';

// Check if ID parameter is set in the URL
if (isset($_GET['id'])) {
    $feature_id = $_GET['id'];

    // Fetch feature details based on ID
    $query = "SELECT * FROM hotelfeatures WHERE id = '$feature_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $feature = mysqli_fetch_assoc($result);
        if (!$feature) {
            echo "Feature not found.";
            exit;
        }
    } else {
        echo "Error fetching feature details: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Feature ID not provided.";
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $feature_name = $_POST['feature_name'];
    $flaticon_class = $_POST['flaticon_class'];
    $i_class = $_POST['i_class'];

    // Update feature details in the database
    $update_query = "UPDATE hotelfeatures SET feature_name='$feature_name', flaticon_class='$flaticon_class', i_class='$i_class' WHERE id='$feature_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Redirect to the display page after successful update
        header("location: display_hotel_features.php");
        exit;
    } else {
        echo "Error updating feature: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Hotel Feature</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include ('include/aside.php') ?>
        <div class="main">
            <?php include ('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container-fluid text-center p-3 my-container">
                    <div class="container mt-5">
                        <h2>Edit Hotel Feature</h2>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="feature_name" class="form-label">Feature Name</label>
                                <input type="text" class="form-control" id="feature_name" name="feature_name" value="<?php echo $feature['feature_name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="flaticon_class" class="form-label">Flaticon Class</label>
                                <input type="text" class="form-control" id="flaticon_class" name="flaticon_class" value="<?php echo $feature['flaticon_class']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="i_class" class="form-label">I Class</label>
                                <input type="text" class="form-control" id="i_class" name="i_class" value="<?php echo $feature['i_class']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Feature</button>
                        </form>
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
    <script src="js/script.js"></script>
</body>

</html>
