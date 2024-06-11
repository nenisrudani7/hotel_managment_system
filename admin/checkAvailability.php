<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkInDate = $_POST["checkInDate"];
    $checkOutDate = $_POST["checkOutDate"];
    $roomId = $_POST["roomId"];

    include 'include/conn.php';
    // Example query
    // Example query to check availability
    $sql = "SELECT * FROM bookings WHERE room_id = ? AND (check_in <= ? AND check_out >= ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $roomId, $checkOutDate, $checkInDate);
    $stmt->execute();
    $result = $stmt->get_result();
    $availableDates = array();
    while ($row = $result->fetch_assoc()) {
        $availableDates[] = $row;
    }
    echo json_encode($availableDates); // Send available dates back as JSON response
    $stmt->close();
    $conn->close();
}
?>
