<?php

session_start();

if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {

    header("location: signup.php");
}

$username = $_SESSION['a_name'];

include 'include/conn.php';

$query = "SELECT * FROM user WHERE a_name = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {

    $userData = $result->fetch_assoc();

?>
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
            <?php
            include('include/aside.php');
            ?>

            <div class="main container-fluid">
                <?php include('include/nav.php') ?>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Room Type</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="addroom.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="roomType">Room Type:</label>
                                            <select class="form-select" name="roomType" id="roomType">
                                                <option selected disabled>Select Room Type</option>
                                                <?php
                                                include_once('fetch_room_types.php'); // Include the PHP file to fetch room types
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="roomno" class="form-label">room_no</label>
                                            <input type="text" class="form-control" id="roomno" name="roomno" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" name="price" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="offer" class="form-label">Offer</label>
                                            <input type="text" class="form-control" id="offer" name="offer" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="a_d" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="max_person" class="form-label">Max Person</label>
                                            <input type="text" class="form-control" id="max_person" name="max_person" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="image" name="f1" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="theme-toggle">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-sun"></i>
                </a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("noDigits", function(value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Digits are not allowed.");

            // Add validation rules and error messages to the form
            $('form').validate({
                rules: {
                    rname: {
                        required: true,
                        noDigits: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    offer: {
                        required: true
                    },
                    max_person: {
                        required: true,
                        digits: true // Only allow numeric values
                    },
                    a_d: {
                        required: true
                    },
                    f1: {
                        required: true,
                        accept: "image/jpeg,image/jpg,image/jfif"
                    }
                },
                messages: {
                    rname: {
                        required: "Please enter the room name"
                    },
                    price: {
                        required: "Please enter the price",
                        number: "Please enter a valid number for the price"
                    },
                    offer: {
                        required: "Please enter the offer"
                    },
                    max_person: {
                        required: "Please enter the maximum number of persons",
                        digits: "Please enter a valid number"
                    },
                    a_d: {
                        required: "Please enter the description"
                    },
                    f1: {
                        required: "Please upload an image with JPEG, JPG, or JFIG extension",
                        accept: "Please upload a valid image file with JPEG, JPG, or JFIG extension",

                    }
                },
                submitHandler: function(form) {

                    form.submit();
                }
            });
        });
    </script>

    </html>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('include/conn.php');


        $room_type = $_POST['roomno'];
        $price = $_POST['price'];
        $offer = $_POST['offer'];
        $description = $_POST['a_d'];
        $max_person = $_POST['max_person'];

        $profile_pic = $_FILES['f1']['name'];
        $file_tmp = $_FILES['f1']['tmp_name'];
        $upload_path = "room_pictures/" . $profile_pic;


        if (is_dir('room_pictures') && move_uploaded_file($file_tmp, $upload_path)) {

            $sql = "INSERT INTO room_type(room_type, price, offers,max_person, `description`, `image`) 
                VALUES ('$room_type', '$price', '$offer',$max_person, '$description', '$profile_pic')";

            if (mysqli_query($conn, $sql)) {
    ?>
                <script>
                    alert("Data inserted successfully into room_types table");
                </script>
<?php
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
} else {

    echo "User data not found.";
}

?>