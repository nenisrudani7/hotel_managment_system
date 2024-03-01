
<script src="dropdown.js"></script>
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
                    response.forEach(function (room) {
                        options += '<option value="' + room.room_no + '">' + room.room_no + '</option>';
                    });
                } else {
                    options += '<option value="">No room numbers found</option>';
                }
                $('#roomNo').html(options);
            },
            error: function () {
                console.log('Error fetching room numbers');
            }
        });
    });
});

</script>
