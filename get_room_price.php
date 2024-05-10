<?php
// Include database connection or any required dependencies
include 'admin/include/conn.php';

// Check if the required POST parameter is set
if(isset($_POST['roomType'])) {
    $roomType = $_POST['roomType'];

    // Query to fetch room price and offer based on room type
    $query = "SELECT price, offers FROM room_type WHERE room_type_id = 5";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $price = $row['price'];
        $offer = $row['offers'];

        // Calculate discounted price based on offer
        $discountedPrice = calculateDiscountedPrice($price, $offer);

        // Return room price and offer as JSON response
        echo json_encode(['price' => $price, 'offer' => $offer, 'discountedPrice' => $discountedPrice]);
    } else {
        echo json_encode(['price' => 0, 'offer' => 0, 'discountedPrice' => 0]); // Default values or error handling
    }
} else {
    echo json_encode(['price' => 0, 'offer' => 0, 'discountedPrice' => 0]); // Default values or error handling
}

// Function to calculate discounted price based on original price and offer percentage
function calculateDiscountedPrice($price, $offer) {
    // Calculate discounted price
    $discountedPrice = $price - ($price * ($offer / 100));
    return $discountedPrice;
}
?>
