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
    <script src="jquery-3.6.4.min.js"></script>
    <script src="jquery.validate.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <?php include('include/aside.php'); ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
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
                                        <h1><span id="price" name="price"></span</h1>
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

    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

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


            $("#signupForm").validate({
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
                        validAddress: true // Use the custom validation method for address
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
                    checkOutDate: {
                        required: true
                    }
                },
                messages: {
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
                        email: "Please enter a valid email address",
                        emailregex: "Please enter a valid email address"
                    },
                    number: {
                        required: "Please enter your contact number",
                        digits: "Please enter only digits"
                    },
                    add: {
                        required: "Please enter your residential address",
                        validAddress: "Please enter a valid address" // Error message for address validation
                    },
                    room_type: {
                        required: "Please select a room type"
                    },
                    roomNo: {
                        required: "Please select a room number"
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
<?php include('include/conn.php');
include('reg-i.php');
include('include/drop.php');
include('drop1.php');
?>
<script>

</script>

