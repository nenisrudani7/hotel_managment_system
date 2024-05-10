<?php
session_start();
if (!isset($_SESSION["user_uname"])) {
    // Redirect to login page if user is not logged in
    header("Location: http://localhost/hotel_managment_system1/gust/hotel1.php");
    exit(); // Terminate script after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Hotel - Booked Rooms</title>
    <!-- Bootstrap 5 CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap 5 JS Bundle (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jsPDF library for PDF generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Booked Rooms</h1>

        <?php
        include ('admin/include/conn.php');

        $customer_email = $_SESSION['user_uname'];

        $sql = "SELECT c.c_name, c.email, c.number, c.add, b.booking_id, b.booking_date, b.check_in, b.check_out, b.total_price, b.payment_status, b.max_person
                FROM customer c
                INNER JOIN booking b ON c.c_id = b.customer_id
                WHERE c.email = ?";

        // Initialize a prepared statement
        $statement = mysqli_prepare($conn, $sql);

        // Bind the parameter for the customer's email
        mysqli_stmt_bind_param($statement, "s", $customer_email);

        // Execute the prepared statement
        mysqli_stmt_execute($statement);

        // Get the result set from the prepared statement
        $result = mysqli_stmt_get_result($statement);

        if (mysqli_num_rows($result) > 0) {
            // Display booked rooms in a responsive table
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Booking ID</th>
                            <th>Booking Date</th>
                            <th>Check-in Date</th>
                            <th>Check-out Date</th>
                            <th>Total Price</th>
                            <th>Payment Status</th>
                            <th>Max Persons</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['c_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['number']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['add']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['booking_id']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['booking_date']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['check_in']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['check_out']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['total_price']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['payment_status']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['max_person']) . '</td>';

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<p class="text-center">No bookings found for this customer.</p>';
        }

        // Close the prepared statement
        mysqli_stmt_close($statement);

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

  

</body>

</html>