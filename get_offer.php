<?php
// Include database connection
include_once('admin/include/conn.php');

// Check if room_type_id parameter is provided
if (isset($_GET['room_type_id'])) {
    $room_type_id = $_GET['room_type_id'];
    

    // Query to fetch offers for the specified room type
    $fetch_offers_query = "SELECT offers FROM room_type WHERE room_type_id = $room_type_id";

    // Execute the query
    $result = mysqli_query($conn, $fetch_offers_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $offersString = $row['offers']; // Get the offers string from the database

        // Convert offers string to an array of offer values
        $offers = explode(",", $offersString);

        // Prepare response as JSON
        $response = array(
            'success' => true,
            'offers' => $offers
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // No offers found for the specified room type
        $response = array(
            'success' => false,
            'message' => 'No offers found for the specified room type.'
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // Room_type_id parameter is missing
    $response = array(
        'success' => false,
        'message' => 'Room_type_id parameter is missing.'
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close database connection
mysqli_close($conn);
?>
