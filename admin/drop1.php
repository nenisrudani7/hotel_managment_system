<script>
$(document).ready(function() {
    // Event handler for room type selection change
    $('#roomType').change(function() {
        var roomTypeId = $(this).val();
        var maxPersons = $('#max_person').val(); 

        // AJAX request to fetch room price
        $.ajax({
            url: 'fetch_room_price.php',
            type: 'POST',
            data: {
                roomTypeId: roomTypeId
            },
            dataType: 'json',
            success: function(response) {
                if (response && response.price) {
                    var totalPrice = response.price * maxPersons;
                    $('#price').text(totalPrice);
                    var newUrl = 'http://example.com/booking?roomTypeId=' + roomTypeId + '&maxPersons=' + maxPersons + '&totalPrice=' + totalPrice;
                    $('#bookingUrl').attr('href', newUrl);
                } else {
                    $('#price').text('Price not available');
                    $('#bookingUrl').attr('href', '#');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error fetching room price:', errorThrown);
            }
        });
    });

    // Event handler for max persons input keyup
    $('#max_person').keyup(function() {
        var maxPersons = $(this).val();
        var roomPrice = $('#roomType').find(':selected').data('price');
        if (maxPersons && roomPrice) {
            var totalPrice = maxPersons * roomPrice;
            $('#price').text(totalPrice);
            var roomTypeId = $('#roomType').val();
            var newUrl = 'http://example.com/booking?roomTypeId=' + roomTypeId + '&maxPersons=' + maxPersons + '&totalPrice=' + totalPrice;
            $('#bookingUrl').attr('href', newUrl);
        } else {
            $('#price').text('');
            $('#bookingUrl').attr('href', '#');
        }
    });
});
</script>
