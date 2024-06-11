<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Styles for the dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <title>navbar</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- External CSS -->
    <link href="style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <!-- jQuery UI Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery UI Datepicker JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


</head>

<body>
    <!--------------------------------- navbar ---------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand fw-bold" href="hotel1.php">Fu<span style="color: red;">S</span>ion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- -----navbar -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="hotel.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="room.php">ROOMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="gallery.php">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="mybooking.php">MY BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="user_profile1.php">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    </div>
    <br>
    <br>

    <!-- ------mode3---------------- -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Your login form goes here -->

                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Your Profile</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your login form -->

                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span id="name_err"></span>
                        </div>


                        <button type="button" id="j1" name="j1" class="btn btn-primary btn-block mb-4">Edit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- ------mode4----------------
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Your login form goes here -->

    <!-- <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Thank you for Sing-in</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <!-- Edit button -->
    <!--                         
                        <center> <button type="button" id="j1" name="j1"
                                class="btn btn-primary btn-block mb-4">Log-Out</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        </div> 
  -->





    <!-- ------mode2---------------- -->

    </div>
    <!-- ------model---------------- -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Your login form goes here -->

                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Book The Room!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your login form -->
                    <h4>Step 1: Your Details</h4><br><br>
                    <form id="signupForm" method="post" name="booknow" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="n21" class="form-label">Name</label>
                            <input type="text" class="form-control" id="n21" name="n21">
                            <span id="name_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <span id="email_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="mo" class="form-label">Mobile Number:</label>
                            <input type="text" class="form-control" id="mo" name="mo">
                            <span id="mo_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="room-type">Room-type:</label>
                            <select id="type" class="form-control">
                                <option value="">Select room type</option>
                                <option value="Standard">Standard-Room</option>
                                <option value="Family">Family-Room</option>
                                <option value="Deluxe">Deluxe-Room</option>
                                <option value="King">King-Room</option>
                                <option value="Queen">Queen-Room</option>
                                <option value="Quad">Quad-Room</option>
                            </select>
                            <span id="room_type_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="total_p">Total Person:</label>
                            <input type="number" id="p2" name="p2" class="form-control">
                            <span id="total_person_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="checkInDate">Check-in Date:</label>
                            <input type="date" id="checkInDate1" name="checkInDate1" class="form-control">
                            <span id="checkInDate_err" class="text-danger"></span>
                        </div>
                        <!-- Script for auto date -->
                        <script>
                            var d = new Date();
                            var yr = d.getFullYear();
                            var month = d.getMonth() + 1;
                            if (month < 10) {
                                month = '0' + month;
                            }
                            var date = d.getDate();
                            if (date < 10) {
                                date = '0' + date;
                            }
                            var c_date = yr + "-" + month + "-" + date;
                            document.getElementById('checkInDate1').value = c_date;
                        </script>
                        <div class="mb-3">
                            <label for="checkOutDate">Check-out Date</label>
                            <input type="date" id="checkOutDate" name="checkOutDate" class="form-control">
                            <span id="checkOutDate_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="special-requests" class="form-label">Special Requests:</label>
                            <textarea id="special-requests" name="special-requests" class="form-control" rows="1"></textarea>
                            <span id="special_requests_err" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="paymentMethod">Payment Method:</label><br>
                            <input type="radio" name="payment_method" id="paymentMethod" value="cash">&nbsp;&nbsp;Cash
                            <span id="paymentMethod_err" class="text-danger"></span>

                            <!-- Error message for payment method -->
                        </div>
                        <div class="mb-3">
                            <label for="total">Total amount:</label>
                            <span id="perDayAmount">$1000</span> /per-day.
                        </div>


                        <button type="submit" id="confirmBookBtn" class="btn btn-primary btn-block mb-4">Confirm
                            Book!</button>
                    </form>

                    <!-- Script for auto date -->
                    <script>
                        var d = new Date();
                        var yr = d.getFullYear();
                        var month = d.getMonth() + 1;
                        if (month < 10) {
                            month = '0' + month;
                        }
                        var date = d.getDate();
                        if (date < 10) {
                            date = '0' + date;
                        }
                        var c_date = yr + "-" + month + "-" + date;
                        document.getElementById('checkInDate').value = c_date;
                    </script>

                </div>
                <!-- jQuery script for form validation -->
                <!-- Add jQuery Validation Plugin -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>



                </dpv>
            </div>
        </div>
    </div>
</body>

</html>