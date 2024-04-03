<script>
$(document).ready(function () {
    $('#roomType').change(function () {
        var roomTypeId = $(this).val();
        $.ajax({
            url: 'fetch_room_price.php', // Update the URL to point to the PHP script for fetching room prices
            type: 'post',
            data: { roomTypeId: roomTypeId }, // Send room type ID instead of room number
            dataType: 'json',
            success: function (response) {
                $('#price').val(response.price);
            },
            error: function () {
                console.log('Error fetching room price');
            }
        });
    });
});
</script>
