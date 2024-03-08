<?php

session_start();

if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
}

$username = $_SESSION['a_name'];

include 'include/conn.php';

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
        <title>Bootstrap Admin Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
        <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <div class="wrapper">
            <?php include('include/aside.php') ?>
            <div class="main">
                <?php include('include/nav.php') ?>
                <main class="content px-3 py-2">
                    <div class="container mt-5">
                        <?php
                        // Include database connection
                        include_once('include/conn.php');

                        // SQL query to join room, room_type tables
                        $query = "SELECT r.room_id, r.room_no, rt.room_type, r.check_in_status, r.check_out_status, r.status, b.check_in, b.check_out
                        FROM room r
                        JOIN room_type rt ON r.room_type_id = rt.room_type_id
                        LEFT JOIN booking b ON r.room_id = b.room_id";

                        // Execute the query
                        $result = mysqli_query($conn, $query);

                        // Check if the query executed successfully
                        if ($result) {
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Output table with Bootstrap styles
                                echo "<div class='table-responsive'>
                            <table class='table table-bordered table-striped'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>Room NO</th>
                                        <th>Room type</th>
                                        <th>Booking Status</th>
                                        <th>Check-In-Date</th>
                                        <th>Check-Out-Date</th>
                                 
                                    </tr>
                                </thead>
                                <tbody>";

                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                    <tr>
                                        <td><?php echo $row["room_no"] ?></td>
                                        <td><?php echo $row["room_type"] ?></td>
                                        <td><?php
                                            if ($row["status"] == 1) {
                                                echo "<button class='btn btn-success'>Booked</button>";
                                            } else {
                                                echo "<a href='register.php' class='btn btn-primary'>Book Room</a>";
                                            }
                                            ?></td>
                                        <td><?php if ($row["check_in_status"] == 1) {
                                                echo "<a href='check_in.php?room_id=" . $row["room_id"] . "' class='btn btn-primary'>Check-in</a>";
                                            } ?></td>
                                        <td><?php if ($row["check_out_status"] == 1) {
                                                echo "<a href='#' class='btn btn-primary'>Check-out</a>";
                                            } ?></td>
                                    </tr>
                        <?php
                                }
                                echo "</tbody></table></div>";
                            } else {
                                echo "No records found";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        ?>
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
        <script src="js/script.js"></script>
    </body>

    </html>

<?php

} else {
    echo "User data not found.";
}

?>