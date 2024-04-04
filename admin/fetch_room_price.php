<<<<<<< HEAD
<script>
    $(document).ready(function () {
        $('#roomType').change(function () {
            var roomTypeId = $(this).val();
            $.ajax({
                url: 'fetch_room_price.php',
                type: 'post',
                data: { roomTypeId: roomTypeId },
                dataType: 'json',
                success: function (response) {
                    if (response.length > 0) {
                        // Assuming only one price is returned for a room type
                        var roomPrice = response[0].price;
                        $('#price').text(roomPrice); // Update the text of the price element
                    } else {
                        $('#price').text('Price not available');
                    }
                },
                error: function () {
                    console.log('Error fetching room price');
                }
            });
        });
    });
</script>
=======
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
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
