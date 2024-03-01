<?php
include_once('include/conn.php'); 
if (isset($_POST['roomTypeId'])) {
    $roomTypeId = $_POST['roomTypeId'];

    // Fetch room price based on room type ID
    $sql = "SELECT price FROM room_type WHERE room_type_id = $roomTypeId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];

        // Return the price as JSON
        echo json_encode(array('price' => $price));
    } else {
        // Handle if no price found
        echo json_encode(array('error' => 'No price found for the selected room type.'));
    }
} else {
    // Handle if room type ID is not provided
    echo json_encode(array('error' => 'Room type ID is missing.'));
}
?>
