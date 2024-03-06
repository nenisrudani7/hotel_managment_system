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

// SQL query to join customer, booking, room, and room_type tables
$query = "SELECT c.c_id, c.c_name, c.email, c.number, c.add, 
            b.booking_id, b.max_person, b.total_price, b.booking_date, b.check_in, b.check_out,r.status,
            r.room_no, rt.room_type
        FROM customer c
        JOIN booking b ON c.c_id = b.customer_id
        JOIN room r ON b.room_id = r.room_id
        JOIN room_type rt ON r.room_type_id = rt.room_type_id";

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            ?>
            <tr>
                <td><?php echo  $row["room_no"] ?></td>
                <td><?php echo  $row["room_type"] ?></td>
                <td><?php  if ($row["status"] == 1) {
                echo "<button class='btn btn-success'>Booked</button>";
            } ?></td>
                <td><?php echo $row['check_in'] ?></td>
                <td><?php echo $row['check_out'] ?></td>
            </tr>
            <?php
           
            // Show "Booked" button if status is 1
            ;
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

</body>

</html>



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