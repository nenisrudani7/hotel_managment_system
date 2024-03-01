<?php
include_once('include/conn.php');

if (isset($_POST['submit'])) {

    $booking_id = $_POST['booking_id'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    $maxPerson = $_POST['maxPerson'];
    $price = $_POST['price'];
    $cName = $_POST['cname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $update_booking_query = "UPDATE booking SET check_in = '$checkInDate', check_out = '$checkOutDate', max_person = $maxPerson, total_price = $price WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $update_booking_query)) {
        // Update customer details
        $update_customer_query = "UPDATE customer SET c_name = '$cName',email = '$email', number = '$number', `add` = '$address' WHERE c_id = (SELECT customer_id FROM booking WHERE booking_id = $booking_id
        )";
        if (mysqli_query($conn, $update_customer_query)) {
            echo "<script>alert('Booking information updated successfully.');</script>";
        } else {
            echo "Error updating customer information: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating booking information: " . mysqli_error($conn);
    }
}

// Redirect back to view bookings page after update
header("Location: view.php");
exit();
?>
