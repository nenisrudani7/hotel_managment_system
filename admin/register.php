<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
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
=======
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <script src="jquery-3.6.4.min.js"></script>
    <!-- jQuery UI Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery UI Datepicker JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b

</head>

<body>
    <!-- loading pages -->
    <div class="box ">
        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

<<<<<<< HEAD
        <div class="spinner-grow spinner-grow-sm text-white me-4"></div>
=======
            <!-- Main Content -->
            <div class="container-fluid p-3 my-container">
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
                                        <select class="form-select" name="roomType" id="roomType" required>
                                            <option selected disabled>Select Room Type</option>
                                            <?php
                                            include_once('fetch_room_types.php'); // Include the PHP file to fetch room types
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="roomNo">Room No</label>
                                        <select class="form-select" id="roomNo" name="roomNo" required>
                                            <option selected disabled>Select Room No</option>
                                        </select>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label for="max_person">Max Persons</label>
                                        <input type="number" class="form-control" id="max_person" name="max_person" placeholder="Enter the number of persons" required>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="checkInDate">Check-In Date</label>
                                        <input type="text" class="form-control" id="checkInDate" name="checkInDate" placeholder="Enter Check-In Date" required>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="checkOutDate">Check-Out Date</label>
                                        <input type="text" class="form-control" id="checkOutDate" name="checkOutDate" placeholder="Enter Check-Out Date" required>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container btn-light text-dark py-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="">
                                    <label for="roomPrice">Room Price:</label>
                                    <!-- Use a span tag to display the room price -->
                                    <h1><span id="roomPrice" class=""></span></h1>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
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
        $query = "SELECT room_type.*, room.room_no 
          FROM room_type 
          JOIN room ON room_type.room_type_id = room.room_type_id 
          WHERE room_type.room_type_id = $room_type_id";

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
                    <div class="col-xxl-12 col-xl-12 col-sm-12 col-md-12">
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
                    <div class="container-fluid p-3 my-container">
                        <form action="online_booking.php" method="post" enctype="multipart/form-data" id="booking">
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
                                                    <option value="<?php echo $room['room_type_id']; ?>"><?php echo $room['room_type']; ?></option>
                                                </select>
                                            </div>
                                            <br>
                                            <!-- Room No dropdown -->
                                            <div class="form-group">
                                                <label for="roomNo">Room No</label>
                                                <select class="form-select" id="roomNo" name="roomNo" required>
                                                    <option selected disabled>Select Room No</option>
                                                    <?php
                                                    $query = "SELECT * FROM room WHERE room_type_id = $room_type_id";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['room_no'] . "'>" . $row['room_no'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option disabled>No rooms available for this room type</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="max_person">Max Persons</label>
                                                <input type="number" class="form-control" id="max_person" name="max_person" placeholder="Enter the number of persons" required>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="checkInDate">Check-In Date</label>
                                                        <input type="date" class="form-control" id="checkInDate" name="checkInDate" placeholder="Enter Check-In Date" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="checkOutDate">Check-Out Date</label>
                                                        <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" placeholder="Enter Check-Out Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h2>Payment System</h2>
                                            <div class="form-group">
                                                <label for="amount">Amount:</label>
                                                <input type="text" class="form-control" id="amount" name="amount">
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container btn-light text-dark py-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1><input type="submit" class="col-xxl-12" value="submit" href="#" name="submit"></h1>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <h1><span id="price" name="price">₹<?php echo $room['price']; ?></span></h1>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="totalPrice">Total Price:</label>
                                            <h1><span id="totalPrice" name="totalPrice">₹0.00</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Fetch price and calculate total price on page load
                    var roomTypeId = $('#roomType').val();
                    fetchPrice(roomTypeId);

                    // Function to fetch price based on room type ID
                    function fetchPrice(roomTypeId) {
                        $.ajax({
                            url: 'online_booking.php',
                            method: 'GET',
                            data: {
                                id: roomTypeId
                            },
                            success: function(response) {
                                var data = JSON.parse(response);
                                if (!data.error) {
                                    var price = parseFloat(data.price);
                                    $('#price').text('₹' + price.toFixed(2));
                                    calculateTotalPrice(price);
                                } else {
                                    $('#price').text('Price not found');
                                }
                            },
                            error: function() {
                                $('#price').text('Error fetching price');
                            }
                        });
                    }

                    // Event listener for room type select
                    $('#roomType').change(function() {
                        var roomTypeId = $(this).val();
                        fetchPrice(roomTypeId);
                    });

                    // Function to calculate total price
                    // Function to calculate total price with offer discount
                    function calculateTotalPrice(price, offer) {
                        var maxPersons = $('#max_person').val();
                        if (maxPersons && !isNaN(maxPersons)) {
                            var totalPrice = price * parseInt(maxPersons);
                            // Apply fixed offer discount
                            var offerDiscount = 50; // Example: Fixed discount of ₹50
                            totalPrice -= offerDiscount;

                            $('#totalPrice').text('₹' + totalPrice.toFixed(2));
                        }
                    }


                    // Event listener for max persons input
                    $('#max_person').keyup(function() {
                        calculateTotalPrice(parseFloat($('#price').text().substring(1))); // Calculate total price
                    });
                });
            </script>
    <?php
        } else {
            echo "Room not found.";
        }
    } else {
        // Handle case when room_type_id is not provided
        echo "Room type ID not provided.";
    }


    ?>


    <!-- ----------------------------------------Footer--------------------------------------------->
    <?php include 'footer.php'; ?>

    <!-- End of .container -->
    <script src="hotel.js"></script>



    <script>
        $(document).ready(function() {
<<<<<<< HEAD
            // Define custom validation method for address
            $.validator.addMethod("validAddress", function(value, element) {

                var regex = /^[a-zA-Z0-9,\s-]+$/;
                return regex.test(value);
            }, "Please enter a valid address");


            $.validator.addMethod("emailregex", function(value, element) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("noDigits", function(value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Digits are not allowed.");


            $("#booking").validate({
=======
            // Initialize Datepicker for check-in date
            // Validation
            $("#signupForm").validate({
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
                rules: {
                    f_name: {
                        required: true,
                    },
                    l_name: {   
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    number: {
                        required: true,
                        digits: true
                    },
                    add: {
                        required: true,
                    },
                    roomType: {
                        required: true
                    },
                    roomNo: {
                        required: true
                    },
                    max_person: {
                        required: true,
                        digits: true
                    },
                    checkInDate: {
                        required: true
                    },
                    checkOutDate: {
                        required: true
                    }
                },
                messages: {
                    f_name: {
                        required: "Please enter your first name",
                    },
                    l_name: {
                        required: "Please enter your last name",
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                    },
                    number: {
                        required: "Please enter your contact number",
                        digits: "Please enter only digits"
                    },
                    add: {
                        required: "Please enter your residential address",
                    },
                    roomType: {
                        required: "Please select a room type"
                    },
                    roomNo: {
                        required: "Please select a room number"
                    },
                    max_person: {
                        required: "Please enter the number of persons",
                        digits: "Please enter only digits"
                    },
                    checkInDate: {
                        required: "Please enter the check-in date"
                    },
                    checkOutDate: {
                        required: "Please enter the check-out date"
                    }
                }

            });
        });
    </script>


</body>

</html>
<<<<<<< HEAD

<?php
include('online_booking_insert_data.php');
?>
=======
<?php
include('reg-i.php');
include('include/drop.php');
include('drop1.php');
include('drop2.php');
?>

>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
