

<?php
// Assuming you have a database connection established already
include 'admin/include/conn.php';


// Check if the required POST parameters are set
if(isset($_POST['checkInDate']) && isset($_POST['checkOutDates']) && isset($_POST['roomTypeId'])) {
    $checkInDate = $_POST['checkInDate'];
    $checkOutDates = $_POST['checkOutDates'];
    $roomTypeId = $_POST['roomTypeId']; // Get selected room type ID


    // Query to fetch available room numbers for the selected dates and room type
    $query = "SELECT room.room_no
    FROM room
    INNER JOIN room_type ON room.room_type_id = room_type.room_type_id
    WHERE room.room_id NOT IN (
        SELECT room_id FROM booking
        WHERE (check_in BETWEEN '$checkInDate' AND '$checkOutDates')
        OR (check_out BETWEEN '$checkInDate' AND '$checkOutDates')
        OR ('$checkInDate' BETWEEN check_in AND check_out)
        OR ('$checkOutDates' BETWEEN check_in AND check_out)
    )
    AND room.room_type_id = $roomTypeId"; // Filter by selected room type ID


    $result = mysqli_query($conn, $query);


    if($result) {
        $roomOptions = "";
        while($row = mysqli_fetch_assoc($result)) {
            $roomNumber = $row['room_no'];


            $roomOptions .= "<option value='$roomNumber'>$roomNumber</option>";
        }
        echo $roomOptions;
    } else {
        echo "<option value=''>No rooms available</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}
?>
