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
<<<<<<< HEAD
                    response.forEach(function (room) {
                        options += '<option value="' + room.room_no + '" data-price="' + room.price + '">' + room.room_no + '</option>';
=======
                    response.forEach(function (room){
                        options += '<option value="' + room.room_id + '">' + room.room_no + '</option>';
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
                    });
                } else {
                    options += '<option value="">No room numbers found</option>';
                }
<<<<<<< HEAD
                $('#roomNo').html(options); // Update room numbers
                // Update price if a room is already selected
                var roomPrice = $('#roomNo').find(':selected').data('price');
                $('#price').val(roomPrice);
=======
                $('#roomNo').html(options);
                // Trigger change event for room number to update the price
                $('#roomNo').change();
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
            },
            error: function () {
                console.log('Error fetching room numbers');
            }
        });
    });
<<<<<<< HEAD

   
=======
    $('#roomNo').change(function () {
        var roomPrice = $(this).find(':selected').data('price');
        $('#price').val(roomPrice);
    });

    // Trigger change event for room type initially to fetch room numbers
    $('#roomType').change();
>>>>>>> 35c862946ef22068e25511f3b50674f6850ae98b
});
</script>
