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
                    <h1 class="mb-4">Check-Out</h1>
                    <?php
                    // Include database connection
                    include_once('include/conn.php');

                    // Check if the room_id is provided via GET request
                    if (isset($_GET['room_id'])) {
                        $room_id = $_GET['room_id'];
                        $query = "SELECT c.c_id, c.c_name, c.email, c.number, c.add, 
            b.booking_id, b.max_person, b.total_price, b.booking_date, b.check_in, b.check_out,b.payment_status,
            r.room_id, r.room_no, r.status as room_status,
            rt.room_type
     FROM customer c
     JOIN booking b ON c.c_id = b.customer_id
     JOIN room r ON b.room_id = r.room_id
     JOIN room_type rt ON r.room_type_id = rt.room_type_id";

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $booking = mysqli_fetch_assoc($result);
                    ?>
                            <form action="process_checkout.php" method="POST">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name:</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $booking['c_name']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="customer_number" class="form-label">Customer Number:</label>
                                    <input type="text" class="form-control" id="customer_number" name="customer_number" value="<?php echo $booking['number']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label">Check-In Date:</label>
                                    <input type="text" class="form-control" id="check_in_date" name="check_in_date" value="<?php echo $booking['check_in']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="check_out_date" class="form-label">Check-Out Date:</label>
                                    <input type="text" class="form-control" id="check_out_date" name="check_out_date" value="<?php echo $booking['check_out']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="payment_status" class="form-label">Payment Status:</label>
                                    <input type="text" class="form-control" id="payment_status" name="payment_status" value="<?php echo $booking['payment_status']; ?>" readonly>
                                </div>

                                <!-- Add remaining payment status field if needed -->
                                <div class="col-6"><button type="submit" class="btn btn-primary">Check-Out</button><br>
                                <a href="manage_room.php" class="btn btn-seco ndary mt-3">Cancel</a>

                            </div>
                            </form>
                    <?php
                        } else {
                            echo "<div class='alert alert-warning' role='alert'>
                        No active booking found for this room.
                    </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                    Room ID not provided.
                </div>";
                    }

                    ?>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<?php
