<?php
include('include/conn.php');

$sql = "SELECT room_type_id, room_type, price FROM room_type";
$result = $conn->query($sql);

$options = ""; 

if ($result->num_rows > 0) {
    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Append the option with room type ID as value and room price as data-price attribute
        $options .= "<option value='" . $row['room_type_id'] . "' name='room_no'>" . $row['room_type'] . "</option>";
    }
} else {
    // Handle if no room types found
    $options .= "<option value='' disabled>No room types found</option>";
}

// Echo the options to populate the dropdown
echo $options;
?>
