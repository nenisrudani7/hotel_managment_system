
<!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <div class="wrapper">
      <?php include('include/aside.php') ?>
      <div class="main">
        <?php include('include/nav.php') ?>
        <main class="content px-3 py-2">
        <?php
include('include/conn.php');

// Check if delete action is triggered
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    // Sanitize and validate the feedback ID
    $feedback_id = intval($_GET['id']);

    // Prepare DELETE statement
    $delete_sql = "DELETE FROM feedback WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);

    if ($delete_stmt) {
        // Bind feedback ID parameter
        $delete_stmt->bind_param("i", $feedback_id);

        // Execute the delete statement
        if ($delete_stmt->execute()) {
            echo "Feedback entry deleted successfully.";
        } else {
            echo "Error deleting feedback entry: " . $delete_stmt->error;
        }

        // Close delete statement
        $delete_stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
}

// Retrieve feedback data from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

// Display feedback table with delete buttons
if ($result->num_rows > 0) {
    ?>
    <div class="container mt-4">
        <h2>Feedback Table</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <a href="feedback.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    // Display message if no feedback records found
    echo "No feedback records found.";
}

// Close database connection
$conn->close();
?>

        </main>
        <a href="#" class="theme-toggle">
          <i class="fa-regular fa-moon"></i>
          <i class="fa-regular fa-sun"></i>
        </a>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>

  </html>
