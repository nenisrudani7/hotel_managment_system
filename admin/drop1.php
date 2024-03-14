<script>
$(document).ready(function() {
    // Event handler for room type selection change
    $('#roomType').change(function() {
        var roomTypeId = $(this).val(); // Get the selected room type ID

        // AJAX request to fetch room price
        $.ajax({
            url: 'fetch_room_price.php', // URL to fetch the room price data
            type: 'POST',
            data: {
                roomTypeId: roomTypeId // Send the selected room type ID to the server
            },
            dataType: 'json', // Expected data type of the response
            success: function(response) { // Callback function if the AJAX request is successful
                if (response && response.roomPrice) { // Check if the response contains the room price data
                    var roomPrice = response.roomPrice; // Extract the room price from the response
                    $('#roomPrice').text(roomPrice); // Update the price in the UI
                } else {
                    $('#roomPrice').text('Price not available'); // Display a message if the price data is not available
                }
            },
            error: function(jqXHR, textStatus, errorThrown) { // Callback function if there is an error with the AJAX request
                console.log('Error fetching room price:', errorThrown); // Log the error message to the console
            }
        });
    });
});
</script>
