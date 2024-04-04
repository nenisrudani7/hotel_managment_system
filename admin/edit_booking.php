
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
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
            
                <div class="container mt-5">
                    <h1>Edit Booking</h1>
                    <?php
                    include_once('include/conn.php');

                    // Fetch booking details along with customer information for a specific booking ID
                    if(isset($_GET['id']) && !empty($_GET['id'])) {
                        $booking_id = $_GET['id'];
                        
                        $query = "SELECT b.booking_id, b.check_in, b.check_out, b.max_person, b.total_price, c.c_name, c.email, c.number, c.add 
                            FROM booking b
                            INNER JOIN customer c ON b.customer_id = c.c_id
                            WHERE b.booking_id = $booking_id";

                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            echo '<form class="row g-3" action="update_booking.php" method="POST">';
                            echo '<input type="hidden" name="booking_id" value="' . $row['booking_id'] . '">';
                             // Display booking details
                             echo '<div class="col-md-6">';
                             echo '<label for="checkInDate" class="form-label">Check-In Date:</label>';
                             echo '<input type="date" id="checkInDate" class="form-control" name="checkInDate" value="' . $row['check_in'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="checkOutDate" class="form-label">Check-Out Date:</label>';
                             echo '<input type="date" id="checkOutDate" class="form-control" name="checkOutDate" value="' . $row['check_out'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="maxPerson" class="form-label">Max Persons:</label>';
                             echo '<input type="text" id="maxPerson" class="form-control" name="maxPerson" value="' . $row['max_person'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="price" class="form-label">Price:</label>';
                             echo '<input type="text" id="price" class="form-control" name="price" value="' . $row['total_price'] . '">';
                             echo '</div>';
                     
                             // Display customer information
                             echo '<div class="col-md-6">';
                             echo '<label for="fName" class="form-label">First Name:</label>';
                             echo '<input type="text" id="fName" class="form-control" name="cname" value="' . $row['c_name'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="email" class="form-label">Email:</label>';
                             echo '<input type="email" id="email" class="form-control" name="email" readonly value="' . $row['email'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="number" class="form-label">Phone Number:</label>';
                             echo '<input type="tel" id="number" class="form-control" name="number" value="' . $row['number'] . '">';
                             echo '</div>';
                     
                             echo '<div class="col-md-6">';
                             echo '<label for="address" class="form-label">Address:</label>';
                             echo '<input type="text" id="address" class="form-control" name="address" value="' . $row['add'] . '">';
                             echo '</div>';
                     
                             // Add a submit button to update the booking
                             echo '<div class="col-12">';
                             echo '<button type="submit" class="btn btn-primary" name="submit">Update Booking</button>';
                             echo '</div>';
                     
                             echo '</form>';
                            echo '</form>';
                        } else {
                            echo "No booking details found.";
                        }
                    } else {
                        echo "Booking ID not provided.";
                    }
                    ?>
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