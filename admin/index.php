<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
  header("location: signup.php");
  exit; // Stop further execution
}

$username = $_SESSION['a_name'];

include 'include/conn.php';

$query = "SELECT * FROM user WHERE a_name = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
  $userData = $result->fetch_assoc();
?>
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
          <div class="container-fluid">
            <div class="mb-3">
              <h4>Admin Dashboard</h4>
            </div>
          </div>

          <!-- Main Wrapper -->
          <div class="container-fluid text-center p-3 my-container">
            <div class="row mx-2">
              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Online Booked Rooms</div>
                  <div class="card-body">
                    <h1 class="card-title">10</h1>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Offline Booked Rooms</div>
                  <div class="card-body">
                    <h1 class="card-title"><?php include('counter/room_type.php'); ?></h1>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Available rooms</div>
                  <div class="card-body">
                    <h1 class="card-title"><?php include('counter/available_rooms.php'); ?></h1>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Total Rooms</div>
                  <div class="card-body">
                    <h1 class="card-title"><?php include('counter/total_rooms.php'); ?></h1>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mx-2">
              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Room Types</div>
                  <div class="card-body">
                    <h1 class="card-title"><?php include('counter/room_types.php'); ?></h1>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white bg-secondary">
                  <div class="card-header bg-dark">Staff</div>
                  <div class="card-body">
                    <h1 class="card-title">50</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

<?php
} else {
  echo "User data not found.";
}
?>