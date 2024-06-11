<?php
// Include the database connection file
include_once('include/conn.php');

// Fetch room types function (assuming you have a table named 'room_types')
function fetchRoomTypes($conn) {
    $sql = "SELECT * FROM room_types";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Error handling
        echo "Error: " . mysqli_error($conn);
        return;
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['room_type_id'] . "'>" . $row['room_type_name'] . "</option>";
        }
    } else {
        // No data found
        echo "<option value='' disabled>No room types found</option>";
    }
}

// Handle form submission
if (isset($_POST['btn'])) {
    $room_type_id = $_POST['roomType'];
    $room_no = $_POST['roomno'];

    $query = "INSERT INTO room (room_type_id, room_no) VALUES ('$room_type_id', '$room_no')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data inserted successfully into room table');</script>";
    } else {
        // Error handling
        echo "Error: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Add Room</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <label for="roomType">Room Type:</label>
                <select name="roomType" id="roomType">
                    <option value="" disabled selected>Select Room Type</option>
                    <?php fetchRoomTypes($conn); ?>
                </select>
            </div>
            <div>
                <label for="roomno">Room Number:</label>
                <input type="text" id="roomno" name="roomno" required>
            </div>
            <div>
                <button type="submit" name="btn">Submit</button>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</html>
