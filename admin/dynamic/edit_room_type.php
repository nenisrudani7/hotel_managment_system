<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include '../include/conn.php';

$query = "SELECT * FROM user WHERE a_name = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();

    // Check if the room type ID is provided in the URL
    if (isset($_GET['id'])) {
        $room_type_id = $_GET['id'];

        // Fetch room type details from the database
        $sql = "SELECT * FROM room_type WHERE room_type_id = $room_type_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $room_type = $_POST['room_type'];
                $price = $_POST['price'];
                $max_person = $_POST['max_person'];
                $offers = $_POST['offers'];
                $description = $_POST['description'];

                // Update room type details in the database
                $update_sql = "UPDATE room_type SET room_type = '$room_type', price = '$price', max_person = '$max_person', offers = '$offers', description = '$description' WHERE room_type_id = $room_type_id";
                if ($conn->query($update_sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Room type updated successfully</div>';
                    ?>

                    <script>
                        window.location.href="view_room_type.php";
                    </script>
                    <?php
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating room type: ' . $conn->error . '</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Room type not found</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Room type ID not provided</div>';
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Room Type</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="wrapper">
        <?php include('../include/aside.php') ?>
        <div class="main">
            <?php include('../include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Edit Room Type</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="room_type" class="form-label">Room Type</label>
                                    <input type="text" class="form-control" id="room_type" name="room_type" value="<?php echo $row['room_type']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="max_person" class="form-label">Max Persons</label>
                                    <input type="text" class="form-control" id="max_person" name="max_person" value="<?php echo $row['max_person']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="offers" class="form-label">Offers</label>
                                    <input type="text" class="form-control" id="offers" name="offers" value="<?php echo $row['offers']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo $row['description']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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
    <script src="js/script.js"></script>
</body>

</html>

<?php
} else {
    echo "User data not found.";
}
?>
