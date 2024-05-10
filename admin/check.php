<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>

<body>
    <h2>Room Type Selection</h2>
    <form action="check.php" method="post">
        <label for="room_type">Select Room Type:</label>
        <select class="form-select" id="roomNo" name="roomNo" required>
        <option selected disabled>Select Room Type</option>
            <?php
            include_once('include/conn.php');

            // Fetch room types
            $q = "SELECT * FROM room";
            $result = $conn->query($q);

            // Generate dropdown options
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['room_no'] . "'>" . $row['room_no'] . "</option>";
                }
            } else {
                echo "<option value=''>No room types found</option>";
            }

            // Close connection
            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>