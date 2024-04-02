<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset ($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include '../include/conn.php';

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
        <!-- <link rel="stylesheet" href="css/style.css"/> -->
        <link rel="stylesheet" href="../css/style.css">

    </head>

    <body>

        <div class="wrapper">
            <?php include ('include/aside.php') ?>
            <div class="main">
                <?php include ('include/nav.php') ?>
                <main class="content px-3 py-2">
                    <div class="container-fluid  p-3 my-container">

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-bed text-white "></i>
                                        <span class="fa-lg">Add Room Type</span>
                                    </div>
                                    <div class="card-body">
                                        <!-- Form for adding room type -->
                                        <form method="post" action="add_room_type.php" enctype="multipart/form-data"
                                            id="addRoomForm">
                                            <div class="mb-3">
                                                <label for="roomType">Room Type:</label>
                                                <input type="text" class="form-control" id="roomType" name="roomType"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price:</label>
                                                <input type="text" class="form-control" id="price" name="price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="max_person" class="form-label">Max Person:</label>
                                                <input type="text" class="form-control" id="max_person" name="max_person"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="offers" class="form-label">Offers:</label>
                                                <input type="text" class="form-control" id="offers" name="offers" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description:</label>
                                                <textarea class="form-control" id="description" name="description"
                                                    required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Upload Image:</label>
                                                <input type="file" class="form-control" id="image" name="image" required
                                                    accept="image/jpeg,image/jpg,image/jfif">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <?php
} else {
    echo "User data not found.";
}
?>
   <!-- Include Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery validation script -->
<script>
    $(document).ready(function () {
        // Add custom validation method
        $.validator.addMethod("noDigits", function (value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Digits are not allowed.");

        // Add validation rules and messages
        $('#addRoomForm').validate({
            rules: {
                roomType: {
                    required: true,
                    noDigits: true // Apply custom validation method
                },
                price: {
                    required: true,
                    number: true
                },
                max_person: {
                    required: true,
                    digits: true
                },
                offers: {
                    required: true
                },
                description: {
                    required: true
                },
                image: {
                    required: true,
                    accept: "image/jpeg,image/jpg,image/jfif"
                }
            },
            messages: {
                // Define custom error messages if needed
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>


<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve form data
$roomType = $_POST['roomType'];
$price = $_POST['price'];
$max_person = $_POST['max_person'];
$offers = $_POST['offers'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
$upload_path = "room_pictures/" . $image;

// Check if image directory exists and move uploaded file
if (is_dir('room_pictures') && move_uploaded_file($file_tmp, $upload_path)) {
    // Insert data into room_type table
    $sql = "INSERT INTO room_type(room_type, price, max_person, offers, `description`, `image`) 
            VALUES ('$roomType', '$price', '$max_person', '$offers', '$description', '$image')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo '<script>alert("Data inserted successfully into room_type table");</script>';
    } else {
        // Error inserting data
        echo "Error: " . mysqli_error($conn);
    }
}

} else {
// User data not found
echo "User data not found.";
}
?>