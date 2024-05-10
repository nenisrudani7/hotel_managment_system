<?php
include_once ('admin/include/conn.php');

// Retrieve form data
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$number = $_POST['number'];
$add = $_POST['add'];
$room_type_id = $_POST['roomType'];
$room_no = $_POST['roomNo'];
$max_person = $_POST['max_person'];

// Fetch room information
$fetch_room_info_query = "SELECT rt.price, rt.offers, r.room_id
    FROM room_type rt
    JOIN room r ON rt.room_type_id = r.room_type_id
    WHERE rt.room_type_id = $room_type_id AND r.room_no = '$room_no'";

$result = mysqli_query($conn, $fetch_room_info_query);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');
require ('PHPMailer/Exception.php');

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $price = $row['price']; // Get the price
    $room_id = $row['room_id']; // Get the room ID
    $offers = $row['offers']; // Get the offers

    // Apply offer logic to adjust the total price
    if (!empty($offers)) {
        $offer_values = explode(",", $offers);
        $max_discount = max($offer_values); // Get the maximum discount value
        $discounted_price = $price - ($price * ($max_discount / 100)); // Calculate discounted price
        $total_price = $discounted_price * $max_person; // Adjust total price with the discounted price
    } else {
        $total_price = $price * $max_person; // If no offers, use the base price
    }

    // Check if the email already exists in the customer table
    $check_customer_query = "SELECT * FROM customer WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_customer_query);

    if ($check_result && mysqli_num_rows($check_result) > 100) {
        echo "<script>alert('Customer with this email already exists.');</script>";
    } else {
        // Insert customer information into the customer table
        $insert_customer_query = "INSERT INTO customer (c_name, email, number, `add`)
            VALUES ('$f_name $l_name', '$email', '$number', '$add')";

        if (mysqli_query($conn, $insert_customer_query)) {
            $customer_id = mysqli_insert_id($conn); // Get the ID of the newly inserted customer

            // Insert booking information into the booking table
            $booking_date = date('Y-m-d'); // Assuming booking date is current date
            $check_in_date = $_POST['checkInDate'];
            $check_out_date = $_POST['checkOutDates'];

            $insert_booking_query = "INSERT INTO booking (customer_id, room_id, booking_date, check_in, check_out, total_price, max_person,payment_status)
            VALUES ($customer_id, $room_id, '$booking_date', '$check_in_date', '$check_out_date', $total_price, $max_person,1)";

            if (mysqli_query($conn, $insert_booking_query)) {
                $mail = new PHPMailer();
                try {

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'jnjcreators@gmail.com';
                    $mail->Password = 'hvnz cfkl atwt pmin';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    // $mail->SMTPDebug = 2;

                    // Recipients

                    $mail->setFrom('jnjcreators@gmail.com', 'jnj');
                    $mail->addAddress($email, $name); // Recipient's email address and name

                    // Attachments
                    //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'booking Data';
                    $mail->Body = '<html><body style="font-family: Arial, sans-serif; background-color: #f8f9fa; color: #333; padding: 20px;">';
                    $mail->Body .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
                    $mail->Body .= '<h1 style="color: #007bff; text-align: center; margin-bottom: 20px;">Booking Confirmation</h1>';
                    $mail->Body .= '<p style="font-size: 18px; line-height: 1.6;">Dear ' . $f_name . ' ' . $l_name . ',</p>';
                    $mail->Body .= '<p style="font-size: 16px;">Congratulations! Your booking has been confirmed. Below are the details of your reservation:</p>';
                    $mail->Body .= '<hr style="border-top: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;">';
                    $mail->Body .= '<p><strong>Total Amount Paid:</strong> $' . number_format($total_price, 2) . '</p>';
                    $mail->Body .= '<p><strong>Name:</strong> ' . $f_name . ' ' . $l_name . '</p>';
                    $mail->Body .= '<p><strong>Email:</strong> ' . $email . '</p>';
                    $mail->Body .= '<p><strong>Phone Number:</strong> ' . $number . '</p>';
                    $mail->Body .= '<p><strong>Address:</strong> ' . $add . '</p>';
                    $mail->Body .= '<p><strong>Room Type:</strong> ' . $room_type_id . '</p>'; // Assuming $room_type_name is fetched from database
                    $mail->Body .= '<p><strong>Room Number:</strong> ' . $room_no . '</p>';
                    $mail->Body .= '<p><strong>Max Persons:</strong> ' . $max_person . '</p>';
                    $mail->Body .= '<hr style="border-top: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;">';
                    $mail->Body .= '<p style="font-size: 14px;">Thank you for choosing us! We look forward to welcoming you.</p>';
                    $mail->Body .= '</div>';
                    $mail->Body .= '</body></html>';

                    $mail->IsHTML(true); // Set email format to HTML

                    $mail->send();
                } catch (Exception $e) {
                    echo "Email sending failed. Error: {$mail->ErrorInfo}";
                }
                echo "<script>alert('Booking information inserted successfully.');</script>";
                ?>
                <script>
                    window.location.href = "http://localhost/hotel_managment_system1/mybooking.php";
                </script>
                <?php
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
?>