<?php  session_start(); ?>
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
                    <div class="card-header">
                        Check-out Details
                    </div>
                    <div class="card-body">
                        <?php
                        

                        if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
                            header("location: signup.php");
                            exit;
                        }

                        include 'include/conn.php';

                        $username = $_SESSION['a_name'];

                        $query = "SELECT * FROM user WHERE a_name = '$username'";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {

                            $userData = $result->fetch_assoc();

                            if (isset($_GET['room_id'])) {
                                $room_id = $_GET['room_id'];

                                // Fetch room details along with booking information and customer details
                                $query = "SELECT r.room_id, r.room_no, rt.room_type, r.check_in_status, r.check_out_status, r.status, 
                                        b.check_in, b.check_out, b.advance_payment, b.remaining_price,c.c_name 
                                
                                        FROM room r
                                        JOIN room_type rt ON r.room_type_id = rt.room_type_id
                                        LEFT JOIN booking b ON r.room_id = b.room_id
                                        LEFT JOIN customer c ON b.customer_id = c.c_id
                                        WHERE r.room_id = '$room_id'";

                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <h5 class="card-title">Room Number: <?php echo $row["room_no"]; ?></h5>
                                    <p class="card-text">Room Type: <?php echo $row["room_type"]; ?></p>
                                    <p class="card-text">Check-In Date: <?php echo $row["check_in"]; ?></p>
                                    <p class="card-text">Customer Name: <?php echo $row["c_name"]; ?></p>
                                    <p class="card-text">Advance Payment: <?php echo $row["advance_payment"]; ?></p>
                                    <p class="card-text">Remaining Payment: <?php echo $row["remaining_price"]; ?></p>

                                    <?php
                                }

                                // Remaining payment form processing
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $remaining_payment = $_POST['remaining_payment'];

                                    // Check if remaining payment is equal to the total price
                                    if ($remaining_payment == $row["remaining_price"]) {
                                        // Proceed with database updates

                                        // Update payment status to 'Done' in the booking table
                                        $update_booking_query = "UPDATE booking SET payment_status = 1 WHERE room_id = '$room_id'";
                                        if (mysqli_query($conn, $update_booking_query)) {
                                            ?><script>
                                                alert('Payment status updated!');
                                            </script>
                                            <?php
                                        } else {
                                            echo "Error updating payment status: " . mysqli_error($conn);
                                        }

                                        // Update room status in the room table
                                        $update_room_query = "UPDATE room SET check_in_status = 0, check_out_status = 0, status = null WHERE room_id = '$room_id'";
                                        if (mysqli_query($conn, $update_room_query)) {
                                            ?>
                                            <script>alert('Room check-in and check-out status updated!');</script>
                                            <?php
                                        } else {
                                            echo "Error updating room status: " . mysqli_error($conn);
                                        }
                                    } else {
                                        ?>
                                                <script>alert('Error: Remaining payment does not match the total price.');</script>
                                        <?php
                                    }
                                }
                                ?>

                                <!-- Form for collecting remaining payment -->
                                <form action="#" method="post">
                                    <div class="mb-3">
                                        <label for="remaining_payment" class="form-label">Enter Remaining Payment</label>
                                        <input type="number" class="form-control" id="remaining_payment" name="remaining_payment" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Remaining Payment</button>
                                </form>

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
