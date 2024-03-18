<?php
include_once('include/conn.php');

if (isset($_POST['roomTypeId'])) {
    $roomTypeId = $_POST['roomTypeId'];
    $query = "SELECT * FROM room WHERE room_type_id = $roomTypeId";
    $result = $conn->query($query);

    $roomNumbers = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomNumbers[] = $row;
        }
    }
    echo json_encode($roomNumbers);
} else {    
    echo json_encode(array());
}
?>


