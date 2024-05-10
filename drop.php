<script>
$(document).ready(function () {
    $('#roomType').change(function () {
        var roomTypeId = $(this).val();
        $.ajax({
            url: 'fetch_room_numbers.php',
            type: 'post',
            data: { roomTypeId: roomTypeId },
            dataType: 'json',
            success: function (response) {
                var options = '<option selected disabled>Select Room No</option>';
                if (response.length > 0) {
                    response.forEach(function (room){
                        options += '<option value="' + room.room_id + '">' + room.room_no + '</option>';
                    });
                } else {
                    options += '<option value="">No room numbers found</option>';
                }
                $('#roomNo').html(options);
                // Trigger change event for room number to update the price
            $('#roomNo').change();
            },
            error: function () {
                console.log('Error fetching room numbers');
            }
        });
    });
    $('#roomNo').change(function () {
        var roomPrice = $(this).find(':selected').data('price');
        $('#price').val(roomPrice);
    });

    // Trigger change event for room type initially to fetch room numbers
    $('#roomType').change();
});
</script>
