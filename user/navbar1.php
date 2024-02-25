<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--external css file-->
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        function validateForm() {
            var name = document.getElementById('n21').value;
            var email = document.getElementById('email').value;
            var mo = document.getElementById('mo').value;
            var checkInDate = document.getElementById('checkInDate').value;
            var checkOutDate = document.getElementById('checkOutDate').value;

            var isValid = true;

            if (name.trim() === "") {
                document.getElementById('name_err').innerText = "Name is required";
                isValid = false;
            } else {
                document.getElementById('name_err').innerText = "";
            }

            if (email.trim() === "") {
                document.getElementById('email_err').innerText = "Email is required";
                isValid = false;
            } else {
                document.getElementById('email_err').innerText = "";
            }

            if (mo.trim() === "") {
                document.getElementById('mo_err').innerText = "Mobile number is required";
                isValid = false;
            } else {
                document.getElementById('mo_err').innerText = "";
            }

            if (checkInDate.trim() === "") {
                document.getElementById('checkInDate_err').innerText = "Check-in date is required";
                isValid = false;
            } else {
                document.getElementById('checkInDate_err').innerText = "";
            }

            if (checkOutDate.trim() === "") {
                document.getElementById('checkOutDate_err').innerText = "Check-out date is required";
                isValid = false;
            } else {
                document.getElementById('checkOutDate_err').innerText = "";
            }

            return isValid;
        }
    </script>
</head>

<body>
    <!--------------------------------- navbar ---------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand fw-bold" href="hotel1.php">Fu<span style="color: red;">S</span>ion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- -----navbar -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="hotel1.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="room1.php">ROOMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="gallery1.php">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="about1.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="contact1.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger"
                                data-bs-toggle="modal" data-bs-target="#exampleModal1">MY-ROOM</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-white me-2" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button"
                                class="btn btn-danger" data-bs-toggle="modal">ME</button></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2">Profile</button></a>

                            <div class="dropdown-divider"></div>
                            <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal3">Log-Out</button></a>
                        </div>
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
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your login form -->

                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span id="name_err"></span>
                        </div>



                        <!-- Edit button -->
                        <button type="button" id="j1" name="j1" class="btn btn-primary btn-block mb-4">Edit</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- ------mode4---------------- -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Your login form goes here -->

                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Thank you for Sing-in</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <!-- Edit button -->
                    <center> <button type="button" id="j1" name="j1"
                            class="btn btn-primary btn-block mb-4">Log-Out</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    </div>






    <!-- ------mode2---------------- -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabe" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Your login form goes here -->

                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Book The Room!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body"><br><br>
                    <center>
                        <h4>My-Booking</h4>
                    </center><br><br>
                    <form id="signupForm" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span id="name_err"></span>
                        </div>

                        <h4>Step 2:Properity details</h4><br><br>

                        <div class="mb-3"><label for="room-type">Room-type:&nbsp;</label>
                            <select id="type">
                                <option value="Standerd">Standard-Room</option>
                                <option value="Family">Famliy-Room</option>
                                <option value="Delux">Delux-Room</option>
                                <option value="king">King-Room</option>
                                <option value="Oueen">Oueen-Room</option>
                                <option value="Quad">Quad-Room</option>
                            </select>
                        </div>
                        <label for="total_p">Total Persion:</label>
                        <input type="number" id="p2" name="p2" required><br><br>
                        <label for="check-in">Check-in Date:&nbsp;&nbsp;</label>
                        <input type="date" id="d1" name="d1" required><br><br>

                        <label for="check-out">Check-out Date</label>
                        <input type="date" id="d2" name="d2" required><br><br>



                        <label for="toal">Total amount:$1000 /per-day.</label><br><br>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ------model---------------- -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Your login form goes here -->

                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Book The Room!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your login form -->
                    <h4>Step 1:Your Details</h4><br><br>
                    <form id="signupForm" method="post" name="booknow" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
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
                        <h4>Step 2: Property details</h4><br><br>
                        <div class="mb-3">
                            <label for="room-type">Room-type:&nbsp;</label>
                            <select id="type" class="form-control">
                                <option value="Standard">Standard-Room</option>
                                <option value="Family">Family-Room</option>
                                <option value="Deluxe">Deluxe-Room</option>
                                <option value="King">King-Room</option>
                                <option value="Queen">Queen-Room</option>
                                <option value="Quad">Quad-Room</option>
                            </select>
                        </div>
                        <label for="total_p">Total Person:</label>
                        <input type="number" id="p2" name="p2" class="form-control" required><br><br>
                        <div class="mb-3">
                            <label for="check-in">Check-in Date:</label>
                            <input type="date" id="checkInDate" name="checkInDate" class="form-control" required>
                            <span id="checkInDate_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="check-out">Check-out Date</label>
                            <input type="date" id="checkOutDate" name="checkOutDate" class="form-control" required>
                            <span id="checkOutDate_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="special-requests">Special Requests:</label>
                            <textarea id="special-requests" name="special-requests" class="form-control"
                                rows="1"></textarea>
                        </div>
                        <label for="ptm">Payment Method:</label>
                        <input type="radio" name="payment_method" id="paymentMethod" value="cash"
                            required>&nbsp;&nbsp;Cash<br><br>
                        <label for="total">Total amount: $1000 /per-day.</label><br><br>
                        <!-- Submit button -->
                        <button type="submit" id="confirmBookBtn" class="btn btn-primary btn-block mb-4">Confirm
                            Book!</button>
                    </form>
                    <!------------------------Scripth for auto date------------->
                    <script>
                        var d = new Date()
                        var yr = d.getFullYear();
                        var month = d.getMonth() + 1

                        if (month < 10) {
                            month = '0' + month

                        }
                        var date = d.getDate();
                        if (date < 10) {
                            date = '0' + date
                        }
                        var c_date = yr + "-" + month + "-" + date;
                        document.getElementById('checkInDate').value = c_date;
                        document.getElementById('d2').value = D_date;</script>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>