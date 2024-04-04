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
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Room Types</title>
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
                        <h4>Room Types</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Room Type ID</th>
                                    <th>Room Type</th>
                                    <th>Price</th>
                                    <th>Max Persons</th>
                                    <th>Offers</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM room_type";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['room_type_id']; ?></td>
                                            <td><?php echo $row['room_type']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['max_person']; ?></td>
                                            <td><?php echo $row['offers']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><img src="../img/<?php echo $row['image']; ?>" alt="<?php echo $row['room_type']; ?>" style="max-width: 100px; max-height: 100px;"></td>
                                            <td>
                                                <a href="edit_room_type.php?id=<?php echo $row['room_type_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="delete_room_type.php?id=<?php echo $row['room_type_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No room types found</td></tr>";
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
    <script src="js/script.js"></script>
</body>

</html>

<?php
} else {
    echo "User data not found.";
}
?>
