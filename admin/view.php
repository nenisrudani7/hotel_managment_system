
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

                    // SQL query to join customer and booking tables
                    $query = "SELECT c.c_id, c.c_name, c.email, c.number, c.add, b.booking_id,b.max_person,b.payment_status,b.total_price, b.room_id, b.booking_date, b.check_in, b.check_out 
                    FROM customer c
                    JOIN booking b ON c.c_id = b.customer_id";

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
                                            <th>Customer ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>Max person</th>
                                            <th>Booking Date</th>
                                            <th>Check-In Date</th>
                                            <th>Check-Out Date</th>
                                            <th>Total Price</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>" . $row["c_id"] . "</td>
                                        <td>" . $row["c_name"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["number"] . "</td>
                                        <td>" . $row["add"] . "</td>
                                        <td>" . $row["max_person"] . "</td>
                                        <td>" . $row["booking_date"] . "</td>
                                        <td>" . $row["check_in"] . "</td>
                                        <td>" . $row["check_out"] . "</td>
                                        <td>" . $row["total_price"] . "</td>
                                        <td>";
                                if ($row["payment_status"] == '1') {
                                    echo '<i class="fas fa-check-circle text-success fa-lg"></i>';
                                } else {
                                    echo '<i class="fas fa-times-circle text-danger fa-lg"></i>';
                                }
                                echo "</td>
                                        <td>
                                            <a href='edit_booking.php?id=" . $row["booking_id"] . "' class='btn btn-primary'>Edit</a>
                                            <a href='delete_booking.php?id=" . $row["booking_id"] . "' class='btn btn-danger'>Delete</a>
                                        </td>
                                    </tr>";
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
