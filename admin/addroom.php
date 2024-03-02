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
                                        <label for="roomType" class="form-label">Room Type</label>
                                        <input type="text" class="form-control" id="roomType" name="rname" required>
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
        // Add validation rules and error messages to the form
        $('form').validate({
            rules: {
                rname: {
                    required: true
                },
                price: {
                    required: true,
                    number: true
                },
                offer: {
                    required: true
                },
                a_d: {
                    required: true
                },
                f1: {
                    required: true,
                    accept: "image/jpeg,image/jpg,image/jfif" // Allow only JPEG, JPG, and JFIG images
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
                a_d: {
                    required: "Please enter the description"
                },
                f1: {
                    required: "Please upload an image with JPEG, JPG, or JFIG extension",
                    accept: "Please upload a valid image file with JPEG, JPG, or JFIG extension",

                }
            },
            submitHandler: function(form) {
                // If the form is valid, you can proceed with form submission
                form.submit();
            }
        });
    });
</script>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('include/conn.php');

    // Sanitize input data
    $room_type = mysqli_real_escape_string($conn, $_POST['rname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $offer = mysqli_real_escape_string($conn, $_POST['offer']);
    $description = mysqli_real_escape_string($conn, $_POST['a_d']);

    // File upload handling
    $profile_pic = $_FILES['f1']['name'];
    $file_tmp = $_FILES['f1']['tmp_name'];
    $file_content = file_get_contents($file_tmp); // Read file content

    // Prepare and execute the SQL query
    $sql = "INSERT INTO room_type (room_type, price, offers, `description`, image) 
            VALUES ('$room_type', '$price', '$offer', '$description', '$profile_pic')";


    // Upload image file
    if (is_dir('room_pictures')) {
        move_uploaded_file($file_tmp, "room_pictures/" . $profile_pic);
        echo "Data inserted successfully into room_types table";
    } else {
        echo "Error: ";
    }

}
?>