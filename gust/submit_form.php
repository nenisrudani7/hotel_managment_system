<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["fn"];
    $email = $_POST["em"];
    $subject = $_POST["sub"];
    $description = $_POST["desc"];

    // Validate and process the form data (You can perform additional validation here)

    // Example: Send an email (You can customize this part based on your requirements)
    $to = "your_email@example.com"; // Change to your email address
    $subject = $subject;
    $message = "Name: $name\nEmail: $email\nSubject: $subject\nDescription: $description";
    
    // Send email
    if (mail($to, $subject, $message)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
