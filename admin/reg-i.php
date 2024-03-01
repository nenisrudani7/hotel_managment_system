<?php
include_once('include/conn.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Step 1: Insert customer information into the customer table
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $add = $_POST['add'];
    $room_type_id = $_POST['roomType'];
    $room_no = $_POST['roomNo'];
    $max_person = $_POST['max_person']; // Get the max_person entered by the user

    // Step 2: Fetch the room ID and price based on selected room number and type
    $fetch_room_info_query = "SELECT r.room_id, r.status, rt.price FROM room r 
        JOIN room_type rt ON r.room_type_id = rt.room_type_id 
        WHERE r.room_type_id = $room_type_id AND r.room_no = '$room_no'";
    $result = mysqli_query($conn, $fetch_room_info_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $room_id = $row['room_id']; // Get the room ID
        $room_status = $row['status']; // Get the room status
        $price = $row['price']; // Get the price

        // Check if the room is already booked
        if ($room_status == 1) {
            echo "<script>alert('The selected room is already booked. Please choose another room.');</script>";
        } else {
            // Calculate the total price based on the price per person and the number of persons
            $total_price = $price * $max_person;

            // Insert customer information into the customer table
            $insert_customer_query = "INSERT INTO customer (c_name, email, number, `add`) VALUES ('$f_name $l_name', '$email', '$number', '$add')";
            if (mysqli_query($conn, $insert_customer_query)) {
                $customer_id = mysqli_insert_id($conn); // Get the ID of the newly inserted customer

                // Update the status of the booked room in the room table to 1
                $update_room_query = "UPDATE room SET status = 1 WHERE room_id = $room_id";
                if (mysqli_query($conn, $update_room_query)) {
                    // Insert booking information into the booking table
                    $booking_date = date('Y-m-d'); // Assuming booking date is current date
                    $check_in_date = $_POST['checkInDate'];
                    $check_out_date = $_POST['checkOutDate'];
                    $insert_booking_query = "INSERT INTO booking (customer_id, room_id, booking_date, check_in, check_out, max_person, total_price) 
                        VALUES ($customer_id, $room_id, '$booking_date', '$check_in_date', '$check_out_date', $max_person, $total_price)";
                    if (mysqli_query($conn, $insert_booking_query)) {
                        echo "<script>alert('Booking information inserted successfully.');</script>";
                    } else {
                        echo "Error inserting booking information: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error updating room status: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting customer: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error fetching room details: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close the database connection
}
?>
