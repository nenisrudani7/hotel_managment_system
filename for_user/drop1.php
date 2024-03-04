<script>
$(document).ready(function() {
    $('#roomType').change(function() {
        var roomTypeId = $(this).val();
        var maxPersons = $('#max_person').val(); // Get the number of maximum persons

        $.ajax({
            url: 'fetch_room_price.php', // Specify the URL of the fetch_room_price.php page
            type: 'POST',
            data: {
                roomTypeId: roomTypeId
            },
            dataType: 'json',
            success: function(response) {
                if (response.price) {
                    // Calculate the total price by multiplying the price with the number of maximum persons
                    var totalPrice = response.price * maxPersons;
                    
                    // Display the total price
                    $('#price').text(totalPrice);

                    // Update the URL with the total price
                    var newUrl = 'http://example.com/booking?roomTypeId=' + roomTypeId + '&maxPersons=' + maxPersons + '&totalPrice=' + totalPrice;
                    $('#bookingUrl').attr('href', newUrl);
                } else {
                    $('#price').text('Price not available');
                    $('#bookingUrl').attr('href', '#'); // Set URL to '#' if price is not available
                }
            },
            error: function() {
                console.log('Error fetching room price');
            }
        });
    });

    $('#max_person').keyup(function() {
        var maxPersons = $(this).val();
        var roomPrice = $('#roomType').find(':selected').data('price');
        if (maxPersons && roomPrice) {
            var totalPrice = maxPersons * roomPrice;
            $('#price').text(totalPrice);

            // Update the URL with the new total price
            var roomTypeId = $('#roomType').val();
            var newUrl = 'http://example.com/booking?roomTypeId=' + roomTypeId + '&maxPersons=' + maxPersons + '&totalPrice=' + totalPrice;
            $('#bookingUrl').attr('href', newUrl);
        } else {
            $('#price').text('');
            $('#bookingUrl').attr('href', '#'); // Set URL to '#' if price or maxPersons is not available
        }
    });
});

</script>