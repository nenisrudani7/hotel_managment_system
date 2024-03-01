<?php
include_once('include/conn.php');

if (isset($_POST['roomTypeId']) && isset($_POST['maxPersons'])) {
    $roomTypeId = $_POST['roomTypeId']; // Corrected variable name
    $maxPersons = $_POST['maxPersons'];

    // Fetch room price based on the maximum person capacity for the selected room type
    $query = "SELECT price FROM room_type WHERE id = $roomTypeId AND max_person >= $maxPersons";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];

        // Calculate final price based on the fetched price and user-selected maximum persons
        $finalPrice = $price * $maxPersons;

        echo json_encode(array('price' => $finalPrice));
    } else {
        // No suitable room found for the given maximum persons
        echo json_encode(array('error' => 'No suitable room found for the given maximum persons.'));
    }
} else {
    echo json_encode(array('error' => 'Invalid parameters.'));
}
?>
