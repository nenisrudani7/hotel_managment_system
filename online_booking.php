<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My hotel</title>
    <!--bootstrap 5 css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--external css file-->
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

</head>

<body>
    <!-- loading pages -->
    <div class="box ">
        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>
    </div>
    <!--------------------------------- navbar ---------------------------------->
    <?php include 'navbar.php' ?>
    <br>
    <br><br>

    <?php
    // Include database connection
    include_once('admin/include/conn.php');

    // Check if room_type_id is provided in the URL
    if (isset($_REQUEST['id'])) {
        // Get the room_type_id from the URL
        $room_type_id = $_REQUEST['id'];

        // SQL query to fetch room details based on the provided room_type_id
        $query = "SELECT * FROM room_type WHERE room_type_id = $room_type_id";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query executed successfully
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch room details
            $room = mysqli_fetch_assoc($result);
    ?>

            <div class="container mt-5">
                <div class="row">
                    <!-- Room details card -->
                    <div class="col-md-6">
                        <div class="card">
                            <img class="card-img-top" src="img/<?php echo $room['image']; ?>" alt="<?php echo $room['room_type']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $room['room_type']; ?></h5>
                                <p class="card-text">Price: ₹<?php echo $room['price']; ?></p>
                                <p class="card-text">Special Offer: <?php echo $room['offers']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking form -->
                    <div class="container-fluid  p-3 my-container">
                        <form action="register.php" method="post" enctype="multipart/form-data" id="signupForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="response"></div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h1>Customer Details:</h1>
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="firstName">First Name</label>
                                                    <input type="text" class="form-control" id="firstName" name="f_name" placeholder="Enter First Name" required>
                                                    <span id="name_err" class="text-danger"></span>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="lastName">Last Name</label>
                                                    <input type="text" class="form-control" id="lastName" name="l_name" placeholder="Enter Last Name" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="contactNumber">Contact Number</label>
                                                    <input type="tel" class="form-control" id="contactNumber" name="number" placeholder="Enter Contact Number" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="address">Residential Address</label>
                                                    <input type="text" class="form-control" id="address" name="add" placeholder="Enter Residential Address" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading ">
                                            <h1>Room Information:</h1>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="roomType">Room Type:</label>
                                                <select class="form-select" name="roomType" id="roomType">
                                                    <option selected disabled>Select Room Type</option>
                                                    <?php
                                                    include_once('admin/fetch_room_types.php'); // Include the PHP file to fetch room types
                                                    ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="roomNo">Room No</label>
                                                <select class="form-select" id="roomNo" name="roomNo" required>
                                                    <option selected disabled>Select Room No</option>
                                                </select>
                                            </div><br>

                                            <div class="form-group">
                                                <label for="max_person">Max Persons</label>
                                                <input type="number" class="form-control" id="max_person" name="max_person" placeholder="Enter the number of persons" required>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="checkInDate">Check-In Date</label>
                                                <input type="date" class="form-control" id="checkInDate" name="checkInDate" placeholder="Enter Check-In Date" required>
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label for="checkOutDate">Check-Out Date</label>
                                                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" placeholder="Enter Check-Out Date" required>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="price">Price:</label>
                                                <h1><span id="price" name="price"></span< /h1>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="container btn-light text-dark py-5">
                                <input type="submit" value="Submit" href="#" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "Room not found.";
        }
    } else {
        // Handle case when room_type_id is not provided
        echo "Room type ID not provided.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>


    <!-- ----------------------------------------Footer--------------------------------------------->
    <?php include 'footer.php';
    include''; ?>
    <!-- End of .container -->
    <script src="hotel.js"></script>
    <script src="vali.js"></script>
</body>

</html>