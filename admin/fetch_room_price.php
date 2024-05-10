<?php
include_once('include/conn.php');

if (isset($_POST['roomTypeId'])) {
    $roomTypeId = $_POST['roomTypeId'];

    // Fetch room price for the selected room type
    $priceQuery = "SELECT price FROM room_type WHERE room_type_id = $roomTypeId";
    $priceResult = $conn->query($priceQuery);
    $roomPrice = null;
    if ($priceResult && $priceResult->num_rows > 0) {
        $priceRow = $priceResult->fetch_assoc();
        $roomPrice = $priceRow['price'];
    }

    // Prepare response data with room price only
    $responseData = array(
        'roomPrice' => $roomPrice
    );

    echo json_encode($responseData);
} else {
    echo json_encode(array()); // Return empty array if roomTypeId is not set
}
?>
