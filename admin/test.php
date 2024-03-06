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
<div class="form-group">
    <label for="roomType">Room Type:</label>
    <select class="form-select" name="roomType" id="roomType">
        <option selected disabled>Select Room Type</option>
        <?php
        include_once('include/conn.php');

        $sql = "SELECT * FROM room_type";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['room_type_id'] . "'>" . $row['room_type'] . "</option>";
            }
        }
        ?>
    </select>
</div>
<br>
<div class="form-group">
    <label for="roomNo">Room No</label>
    <select class="form-select" id="roomNo" name="roomNo" required>
        <option selected disabled>Select Room No</option>
    </select>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#roomType').change(function () {
            var roomTypeId = $(this).val();
            $.ajax({
                url: 'fetch_room_numbers.php',
                type: 'post',
                data: { roomTypeId: roomTypeId },
                dataType: 'json',
                success: function (response) {
                    var options = '<option selected disabled>Select Room No</option>';
                    if (response.length > 0) {
                        response.forEach(function (room) {
                            options += '<option value="' + room.room_no + '">' + room.room_no + '</option>';
                        });
                    } else {
                        options += '<option value="">No room numbers found</option>';
                    }
                    $('#roomNo').html(options);
                },
                error: function () {
                    console.log('Error fetching room numbers');
                }
            });
        });
    });
</script>
