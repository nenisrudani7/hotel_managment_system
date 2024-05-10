<?php
// Include database connection
include('../admin/include/conn.php');

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]); // Assuming password field is added in the form

    // Validate form data
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Password hashing (for secure storage)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL query (using prepared statements to prevent SQL injection)
        $sql = "INSERT INTO register (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

      
    }
}
?>
