<script>
    $(document).ready(function() {
    // Function to fetch room_id based on selected room_no
    function fetchRoomId(roomNo) {
        $.ajax({
            url: 'fetchRoomId.php', // Change to your backend file name
            method: 'POST',
            data: {
                roomNo: roomNo
            },
            success: function(response) {
                var roomId = response;
                $("#room_id").val(roomId);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching room_id:', error);
            }
        });
    }

    // Function to fetch available rooms based on selected date range and room_id
    function fetchAvailableRooms(checkInDate, checkOutDate, roomId) {
        $.ajax({
            url: 'checkAvailability.php', // Change to your backend file name
            method: 'POST',
            data: {
                checkInDate: checkInDate,
                checkOutDate: checkOutDate,
                roomId: roomId
            },
            success: function(response) {
                console.log('Available dates:', response);
                $("#checkInDate, #checkOutDate").datepicker("refresh");
            },
            error: function(xhr, status, error) {
                console.error('Error fetching available dates:', error);
            }
        });
    }

    // Initialize Datepicker for check-in date
    $("#checkInDate").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            var checkOutDate = $("#checkOutDate").val();
            var roomId = $("#room_id").val();
            fetchAvailableRooms(selectedDate, checkOutDate, roomId);
        }
    });

    // Initialize Datepicker for check-out date
    $("#checkOutDate").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            var checkInDate = $("#checkInDate").val();
            var roomId = $("#room_id").val();
            fetchAvailableRooms(checkInDate, selectedDate, roomId);
        }
    });

    // Event listener for room selection
    $("#room_no").change(function() {
        var selectedRoomNo = $(this).val();
        fetchRoomId(selectedRoomNo);
    });
});
    </script>
