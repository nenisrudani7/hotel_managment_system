<?php
include_once('include/conn.php');


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Step 1: Retrieve form data
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $add = $_POST['add'];
    $room_type_id = $_POST['roomType'];
    $room_no = $_POST['roomNo'];
    $max_person = $_POST['max_person']; // Get the max_person entered by the user


    // Step 2: Fetch the room price based on the selected room type
    $fetch_room_info_query = "SELECT rt.price, rt.offers, r.room_id
    FROM room_type rt
    JOIN room r ON rt.room_type_id = r.room_type_id
    WHERE rt.room_type_id = $room_type_id AND r.room_no = '$room_no'";


    // Step 3: Execute the query to fetch room information
    $result = mysqli_query($conn, $fetch_room_info_query);


    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $price = $row['price']; // Get the price
        $room_id = $row['room_id']; // Get the room ID
        $offers = $row['offers']; // Get the offers


        // Step 4: Apply offer logic to adjust the total price
        if (!empty($offers)) {
            // Convert offers string into an array of offer values
            $offer_values = explode(",", $offers);
            $max_discount = max($offer_values); // Get the maximum discount value
            $discounted_price = $price - ($price * ($max_discount / 100)); // Calculate discounted price
            $total_price = $discounted_price * $max_person; // Adjust total price with the discounted price
        } else {
            $total_price = $price * $max_person; // If no offers, use the base price
        }


        // Step 5: Check if the email already exists in the customer table
        $check_customer_query = "SELECT * FROM customer WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_customer_query);


        if ($check_result && mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('Customer with this email already exists.');</script>";
        } else {
            // Step 6: Insert customer information into the customer table
            $insert_customer_query = "INSERT INTO customer (c_name, email, number, `add`)
                VALUES ('$f_name $l_name', '$email', '$number', '$add')";
           
            if (mysqli_query($conn, $insert_customer_query)) {
                $customer_id = mysqli_insert_id($conn); // Get the ID of the newly inserted customer


                // Step 7: Insert booking information into the booking table
                $booking_date = date('Y-m-d'); // Assuming booking date is current date
                $check_in_date = $_POST['checkInDate'];
                $check_out_date = $_POST['checkOutDate'];


                $insert_booking_query = "INSERT INTO booking (customer_id, room_id, booking_date, check_in, check_out, total_price, max_person)
                VALUES ($customer_id, $room_id, '$booking_date', '$check_in_date', '$check_out_date', $total_price, $max_person)";
               
                if (mysqli_query($conn, $insert_booking_query)) {
                    echo "<script>alert('Booking information inserted successfully.');</script>";
                } else {
                    echo "Error inserting booking information: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting customer: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error fetching room details: " . mysqli_error($conn);
    }
}
?>






