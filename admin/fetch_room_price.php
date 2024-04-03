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
