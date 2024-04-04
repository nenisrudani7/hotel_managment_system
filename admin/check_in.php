<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit;
}

include 'include/conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user inputs
    $advance_payment = $_POST['advance_payment'];
    $booking_id = $_POST['booking_id'];
    $room_price = $_POST['room_price'];

    if (is_numeric($room_price) && is_numeric($advance_payment)) {
        $remaining_price = $room_price - $advance_payment;

        // Prepare and bind the update statement
        $stmt = $conn->prepare("UPDATE booking SET advance_payment = ?, remaining_price = ? WHERE booking_id = ?");
        $stmt->bind_param("ddd", $advance_payment, $remaining_price, $booking_id);

        // Execute the update statement
        if ($stmt->execute()) {
            // Update check_in_status to 1
            $update_stmt = $conn->prepare("UPDATE room SET check_in_status = 1 WHERE room_id = (SELECT room_id FROM booking WHERE booking_id = ?)");
            $update_stmt->bind_param("i", $booking_id);
            $update_stmt->execute();

            // Redirect back to the manage page after successful submission
            header('Location: manage.php');
            exit;
        } else {
            echo "Error updating advance payment: " . $conn->error;
        }
    } else {
        echo "Error: Room price or advance payment is not numeric.";
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
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="wrapper">
        <?php include 'include/aside.php'?>
        <div class="main">
            <?php include 'include/nav.php'?>
            <main class="content px-3 py-2">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Check-in Details</div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['room_id'])) {
                                        $room_id = $_GET['room_id'];
                                        $query = "SELECT r.*, rt.room_type, rt.price AS room_price, b.*, c.*
                                                  FROM room r
                                                  JOIN room_type rt ON r.room_type_id = rt.room_type_id
                                                  LEFT JOIN booking b ON r.room_id = b.room_id
                                                  LEFT JOIN customer c ON b.customer_id = c.c_id
                                                  WHERE r.room_id = '$room_id'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                    ?>
                                            <p><strong>Room Number:</strong> <?php echo $row['room_no']; ?></p>
                                            <p><strong>Room Type:</strong> <?php echo $row['room_type']; ?></p>
                                            <p><strong>Price per Night:</strong> $<?php echo $row['room_price']; ?></p>
                                            <p><strong>Customer Name:</strong> <?php echo $row['c_name']; ?></p>
                                            <p><strong>Check-in Date:</strong> <?php echo $row['check_in']; ?></p>
                                            <p><strong>Check-out Date:</strong> <?php echo $row['check_out']; ?></p>

                                            <!-- Advance payment form -->
                                            <form action='check_in.php' method='post'>
                                                <div class='mb-3'>
                                                    <label for='advance_payment' class='form-label'>Advance Payment Amount</label>
                                                    <input type='number' class='form-control' id='advance_payment' name='advance_payment'>
                                                </div>
                                                <input type='hidden' name='booking_id' value='<?php echo $row['booking_id']; ?>'>
                                                <input type='hidden' name='room_price' value='<?php echo $row['room_price']; ?>'>
                                                <button type='submit' class='btn btn-primary'>Submit Advance Payment</button>
                                            </form>
<br>
                                            <!-- Check-in button -->
                                            <?php if ($row['check_in_status'] == 1) { ?>
                                                <button class='btn btn-primary' disabled>Check-in</button>
                                            <?php } else { ?>
                                                <a href='#' class='btn btn-primary'>Check-in</a>
                                            <?php } ?>
                                    <?php
                                        } else {
                                            echo "No records found for the provided room ID.";
                                        }
                                    } else {
                                        echo "Room ID is not provided.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
