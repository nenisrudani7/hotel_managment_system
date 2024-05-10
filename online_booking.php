<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My hotel</title>
    <!--bootstrap 5 css link-->


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
                                <p class="card-text">Off Today: <?php echo $room['offers']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /razorrr pay api -->
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


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
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo ($_SESSION['user_uname']) ? $_SESSION['user_uname'] : ''; ?>" placeholder="Enter Email Address" readonly required>
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
                                            <!-- <div class="form-group">
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
                                            <br> -->
                                            <div class="form-group">
                                                <label for="checkInDate">Check-In Date</label>
                                                <input type="text" class="form-control" id="checkInDate" name="checkInDate" placeholder="Enter Check-In Date" required>
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label for="checkOutDates">Check-Out Date</label>
                                                <input type="text" class="form-control" id="checkOutDates" name="checkOutDates" placeholder="Enter Check-Out Date" required>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container btn-light text-dark py-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <button id="payNowButton" class="btn btn-primary mt-3">Pay Now</button>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="price">Price:</label>
                                            <h1><span id="price" name="price">₹<?php echo $room['price']; ?></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <!-- razorpay model -->


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


            $(document).ready(function() {
                // Define the form validation rules using jQuery Validate plugin
                $("#booking").validate({
                    rules: {
                        f_name: {
                            required: true,
                            noDigits: true
                        },
                        l_name: {
                            required: true,
                            noDigits: true
                        },
                        email: {
                            required: true,
                            email: true,
                            emailregex: true
                        },
                        number: {
                            required: true,
                            digits: true
                        },
                        add: {
                            required: true,
                            validAddress: true
                        },
                        roomType: {
                            required: true
                        },
                        roomNo: {
                            required: true
                        },
                        checkInDate: {
                            required: true
                        },
                        checkOutDates: {
                            required: true
                        },
                        max_person: {
                            required: true,
                            digits: true
                        }
                    },
                    messages: {
                        // Define custom error messages for each rule
                        f_name: {
                            required: "Please enter your first name",
                            noDigits: "First name cannot contain digits"
                        },
                        l_name: {
                            required: "Please enter your last name",
                            noDigits: "Last name cannot contain digits"
                        },
                        email: {
                            required: "Please enter your email address",
                            email: "Please enter a valid email address"
                        },
                        number: {
                            required: "Please enter your contact number",
                            digits: "Please enter only digits"
                        },
                        add: {
                            required: "Please enter your residential address",
                            validAddress: "Please enter a valid address"
                        },
                        roomType: {
                            required: "Please select a room type"
                        },
                        roomNo: {
                            required: "Please select a room number"
                        },
                        checkInDate: {
                            required: "Please enter the check-in date"
                        },
                        checkOutDates: {
                            required: "Please enter the check-out date"
                        },
                        max_person: {
                            required: "Please enter the number of persons",
                            digits: "Please enter a valid number"
                        }
                    },
                    // Handler for form submission
                    submitHandler: function(form, event) {
                        event.preventDefault(); // Prevent default form submission
                        initiatePayment(); // Call initiatePayment function when form is valid
                        return false; // Prevent form submission until payment success
                    }
                });

                // Function to initiate Razorpay payment
                function initiatePayment() {
    var form = $('#booking');

    // Retrieve room details including price and offer percentage
    var roomPrice = <?php echo $room['price']; ?>;
    var offerPercentage = <?php echo $room['offers']; ?>;

    // Validate and parse the number of persons input
    var numberOfPersons = parseInt($('#max_person').val());

    // Validate if numberOfPersons is a valid number
    if (isNaN(numberOfPersons) || numberOfPersons <= 0) {
        alert('Please enter a valid number of persons.');
        return;
    }

    // Calculate the discounted price
    var discountedPrice = roomPrice - (roomPrice * (offerPercentage / 100));

    // Calculate total price based on the number of persons and discounted price
    var totalPrice = discountedPrice * numberOfPersons;

    // Update displayed price on the form
    $('#priceDisplay').text('₹' + totalPrice);

    // Convert totalPrice to paise (Razorpay expects amount in smallest currency unit)
    var amount = totalPrice * 100;

    // Razorpay checkout options
    var options = {
        key: 'rzp_test_Zdl1fc8tBJdYLP', // Replace with your Razorpay key
        amount: amount,
        currency: 'INR',
        name: 'JNJ HOTEL',
        description: 'Room Booking Payment',
        image: 'https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg', // URL of your logo
        handler: function(response) {
            // On successful payment, submit the form to process booking
            $.ajax({
                url: 'insert_data.php', // URL to handle booking data insertion
                type: 'POST',
                data: form.serialize(), // Serialize form data
                success: function(data) {
                    console.log(data); // Log response from the server
                    // Redirect to booking confirmation page
                    window.location.href = "mybooking.php";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error message
                    // Handle error condition if needed
                }
            });
        },
        prefill: {
            name: $('#firstName').val() + ' ' + $('#lastName').val(),
            email: $('#email').val(),
            contact: $('#contactNumber').val()
        }
    };

    // Create Razorpay instance and open checkout modal
    var rzp = new Razorpay(options);
    rzp.open(); // Open Razorpay checkout modal
}


            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Datepicker for check-in date
            $("#checkInDate").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                onSelect: function(selectedDate) {
                    $("#checkOutDates").datepicker("option", "minDate", selectedDate);
                    fetchAvailableRooms();
                }
            });


            // Initialize Datepicker for check-out date
            $("#checkOutDates").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                onSelect: function(selectedDate) {
                    $("#checkInDate").datepicker("option", "maxDate", selectedDate);
                    fetchAvailableRooms();
                }
            });


            // Function to fetch available rooms based on selected dates and room type
            function fetchAvailableRooms() {
                var checkInDate = $("#checkInDate").val();
                var checkOutDates = $("#checkOutDates").val();
                var roomTypeId = $("#roomType").val(); // Get selected room type ID
                $.ajax({
                    url: "fetch_available_rooms.php", // Provide the URL to fetch available rooms
                    type: "POST",
                    data: {
                        checkInDate: checkInDate,
                        checkOutDates: checkOutDates,
                        roomTypeId: roomTypeId // Include room type ID in the data
                    },
                    success: function(response) {
                        $("#roomNo").html(response); // Update room number select options
                    }
                });
            }

        });
    </script>
</body>

</html>

<?php
include('online_booking_insert_data.php');
include('drop.php');
include('drop1.php');
include('drop2.php');
?>