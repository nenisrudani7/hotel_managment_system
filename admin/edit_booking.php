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
</head><?php
include_once('include/conn.php');

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $query = "SELECT * FROM booking WHERE booking_id = $booking_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $booking = mysqli_fetch_assoc($result);
        } else {
            echo "Booking not found.";
            exit;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Booking ID is missing.";
    exit;
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $booking_id = $_POST['booking_id'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    
    // Update query
    $query = "UPDATE booking SET check_in = '$checkInDate', check_out = '$checkOutDate' WHERE booking_id = $booking_id";

    if (mysqli_query($conn, $query)) {
        // Redirect to view.php after successful update
        header("Location: view.php");
        exit;
    } else {
        echo "Error updating booking: " . mysqli_error($conn);
    }
}
?>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                </div>

                <div class="container mt-5">
                    <h1>Edit Booking</h1>
                    <form action="edit_booking.php" method="post">
                        <!-- Hidden input field to pass booking ID -->
                        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">

                        <!-- Other form fields for editing booking details -->
                        <div class="mb-3">
                            <label for="checkInDate" class="form-label">Check-In Date</label>
                            <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="<?php echo $booking['check_in']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkOutDate" class="form-label">Check-Out Date</label>
                            <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="<?php echo $booking['check_out']; ?>" required>
                        </div>
                        <!-- Add more fields as needed -->

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary">Update Booking</button>
                    </form>


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
