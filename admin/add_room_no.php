<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: signup.php");
    exit; // Ensure no further code execution after redirection
}

// Include database connection
include 'include/conn.php';

// Fetch user data
$username = $_SESSION['a_name'];
$query = "SELECT * FROM user WHERE a_name = '$username'";
$result = $conn->query($query);

// Check if user data exists
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $roomTypeId = $_POST['roomType'];
        $roomNo = $_POST['roomNo'];

        // Check if the room is not already inserted
        $checkQuery = "SELECT COUNT(*) as count FROM room WHERE room_type_id = '$roomTypeId' AND room_no = '$roomNo'";
        $checkResult = $conn->query($checkQuery);
        $rowCount = $checkResult->fetch_assoc()['count'];

        if ($rowCount == 0) {
            // Insert data into room table
            $insertQuery = "INSERT INTO room (room_type_id, room_no,  check_in_status, check_out_status, deleteStatus) 
                            VALUES ('$roomTypeId', '$roomNo', '0', '0', '0')";

            if ($conn->query($insertQuery) === TRUE) {
                echo '<script>alert("Room added successfully.");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }

        // Redirect to prevent multiple insertions on page refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Room</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php'); ?>

        <div class="main container-fluid">
            <?php include('include/nav.php'); ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                            <i class="fas fa-door-open text-white"></i>
                                <span class="fa-lg">Add Room_No</span>
                            </div>
                            <div class="card-body">
                                <!-- Form for adding room -->
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="mb-3">
                                        <label for="roomType" class="form-label">Room Type:</label>
                                        <select class="form-select" id="roomType" name="roomType" required>
                                            <!-- Populate dropdown with room types -->
                                            <?php
                                            $roomTypeQuery = "SELECT * FROM room_type";
                                            $roomTypeResult = $conn->query($roomTypeQuery);
                                            while ($row = $roomTypeResult->fetch_assoc()) {
                                                echo "<option value='" . $row['room_type_id'] . "'>" . $row['room_type'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="roomNo" class="form-label">Room Number:</label>
                                        <input type="text" class="form-control" id="roomNo" name="roomNo" required>
                                        </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
} else {
    // User data not found
    echo "User data not found.";
}
?>
