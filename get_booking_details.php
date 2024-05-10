<?php
// Start session and include database connection
session_start();
include('admin/include/conn.php');

// Include TCPDF library
require_once('tcpdf.php');

// Check if the request method is POST and booking_id is set in POST data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['booking_id'])) {
    // Sanitize and get the booking_id from POST data
    $bookingId = $_POST['booking_id'];

    // Prepare SQL to fetch booking details using a parameterized query to prevent SQL injection
    $sql = "SELECT c.c_name, c.email, b.booking_id, b.booking_date, b.check_in, b.check_out, b.total_price, b.payment_status, b.max_person
            FROM customer c
            INNER JOIN booking b ON c.c_id = b.customer_id
            WHERE b.booking_id = ?";
    
    $statement = mysqli_prepare($conn, $sql);

    if ($statement) {
        // Bind the booking_id parameter to the prepared statement
        mysqli_stmt_bind_param($statement, "i", $bookingId);

        // Execute the prepared statement
        mysqli_stmt_execute($statement);

        // Get result set from the prepared statement
        $result = mysqli_stmt_get_result($statement);

        // Check if a row was found
        if ($row = mysqli_fetch_assoc($result)) {
            // Initialize TCPDF
            $pdf = new TCPDF();
            $pdf->SetMargins(10, 10, 10); // Set margins (left, top, right)
            $pdf->AddPage(); // Add new page

            // Set font
            $pdf->SetFont('helvetica', '', 12);

            // Add content to the PDF
            $pdf->Cell(0, 10, 'Booking Details', 0, 1, 'C');
            $pdf->Ln();

            $pdf->Cell(0, 8, 'Customer Name: ' . $row['c_name'], 0, 1);
            $pdf->Cell(0, 8, 'Email: ' . $row['email'], 0, 1);
            $pdf->Cell(0, 8, 'Booking ID: ' . $row['booking_id'], 0, 1);
            $pdf->Cell(0, 8, 'Booking Date: ' . $row['booking_date'], 0, 1);
            $pdf->Cell(0, 8, 'Check-in Date: ' . $row['check_in'], 0, 1);
            $pdf->Cell(0, 8, 'Check-out Date: ' . $row['check_out'], 0, 1);
            $pdf->Cell(0, 8, 'Total Price: ' . $row['total_price'], 0, 1);
            $pdf->Cell(0, 8, 'Payment Status: ' . $row['payment_status'], 0, 1);
            $pdf->Cell(0, 8, 'Max Persons: ' . $row['max_person'], 0, 1);

            // Output PDF as download
            $pdf->Output('booking_details_' . $bookingId . '.pdf', 'D');
        } else {
            // No booking found, return a 404 error response
            http_response_code(404);
            echo json_encode(['error' => 'Booking not found']);
        }

        // Close the prepared statement
        mysqli_stmt_close($statement);
    } else {
        // Error preparing SQL statement
        http_response_code(500);
        echo json_encode(['error' => 'Internal server error']);
    }
} else {
    // Invalid request method or missing booking_id parameter
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}

// Close database connection
mysqli_close($conn);
?>
