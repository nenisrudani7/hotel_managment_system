<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if room type is selected
    if (!empty($_POST['room_type'])) {
        $selected_room_type = $_POST['room_type'];
        echo "Selected Room Type: " . $selected_room_type;
    } else {
        echo "No room type selected";
    }
}
?>
