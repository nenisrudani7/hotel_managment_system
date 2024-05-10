<?php
// Include database connection
include_once('include/conn.php');

if (isset($_POST['roomId'])) {
    $roomId = $_POST['roomId'];

    // Fetch booking dates (from date and to date) for the selected room ID
    $bookingDatesQuery = "SELECT check_in, check_out FROM booking WHERE room_id = $roomId";
    $bookingDatesResult = $conn->query($bookingDatesQuery);

    $bookedDates = array();
    if ($bookingDatesResult && $bookingDatesResult->num_rows > 0) {
        while ($row = $bookingDatesResult->fetch_assoc()) {
            $startDate = new DateTime($row['check_in']);
            $endDate = new DateTime($row['check_out']);
            $dateRange = new DatePeriod($startDate, new DateInterval('P1D'), $endDate->modify('+1 day'));

            foreach ($dateRange as $date) {
                $bookedDates[] = $date->format('yy-mm-dd');
            }
        }
    }

    // Prepare response data with booked dates
    $responseData = array(
        'disabledDates' => $bookedDates
    );

    echo json_encode($responseData);
} else {
    echo json_encode(array()); // Return empty array if roomId is not set
}
?>
