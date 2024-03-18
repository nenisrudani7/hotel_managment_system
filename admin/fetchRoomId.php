<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNo = $_POST["roomNo"];
    
    include 'include/conn.php';
    // Example query
    $sql = "SELECT room_id FROM room WHERE room_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roomNo); // Assuming room_no is an integer
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $roomId = $row["room_id"];
        echo $roomId; // Send room_id back as response
    } else {
        echo "Room not found";
    }
    $stmt->close();
    $conn->close();
}
?>
