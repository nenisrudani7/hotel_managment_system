<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Check-in Details
                    </div>
                    <div class="card-body">
                        <?php
                        // Check if the user is logged in
                        session_start();
                        if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
                            header("location: signup.php");
                            exit;
                        }

                        // Include database connection
                        include 'include/conn.php';

                        // Check if room ID is provided in the URL
                        if (isset($_GET['room_id'])) {
                            $room_id = $_GET['room_id'];

                            // Query to retrieve room information along with booking details and customer details
                            $query = "SELECT r.*, rt.room_type, rt.price AS room_price, b.*, c.*
                                      FROM room r
                                      JOIN room_type rt ON r.room_type_id = rt.room_type_id
                                      LEFT JOIN booking b ON r.room_id = b.room_id
                                      LEFT JOIN customer c ON b.customer_id = c.c_id
                                      WHERE r.room_id = '$room_id'";

                            // Execute the query
                            $result = mysqli_query($conn, $query);

                            // Check if the query executed successfully
                            if ($result) {
                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch data from the result set
                                    $row = mysqli_fetch_assoc($result);

                                    // Display the retrieved data
                                    echo "<p><strong>Room Number:</strong> " . $row['room_no'] . "</p>";
                                    echo "<p><strong>Room Type:</strong> " . $row['room_type'] . "</p>";
                                    echo "<p><strong>Price per Night:</strong> $" . $row['room_price'] . "</p>";
                                    echo "<p><strong>Customer Name:</strong> " . $row['c_name'] . "</p>";
                                    echo "<p><strong>Check-in Date:</strong> " . $row['check_in'] . "</p>";
                                    echo "<p><strong>Check-out Date:</strong> " . $row['check_out'] . "</p>";

                                    // Display advance payment form
                                    echo "<form action='process_advance_payment.php' method='post'>";
                                    echo "<div class='mb-3'>";
                                    echo "<label for='advance_payment' class='form-label'>Advance Payment Amount</label>";
                                    echo "<input type='number' class='form-control' id='advance_payment' name='advance_payment'>";
                                    echo "</div>";
                                    echo "<input type='hidden' name='booking_id' value='" . $row['booking_id'] . "'>";
                                    echo "<input type='hidden' name='room_price' value='" . $row['room_price'] . "'>";
                                    echo "<button type='submit' class='btn btn-primary'>Submit Advance Payment</button>";
                                    echo "</form>";

                                    // Disable check-in button after check-in
                                    if ($row['check_in_status'] == 1) {
                                        echo "<button class='btn btn-primary' disabled>Check-in</button>";
                                    } else {
                                        echo "<a href='process_checkin.php?room_id=" . $room_id . "' class='btn btn-primary'>Check-in</a>";
                                    }
                                } else {
                                    echo "No records found for the provided room ID.";
                                }
                            } else {
                                echo "Error: " . mysqli_error($conn);
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
</body>

</html>
