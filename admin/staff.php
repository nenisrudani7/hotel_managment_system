<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="wrapper">
    <?php include('include/aside.php') ?>
    <div class="main">
      <?php include('include/nav.php') ?>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <div class="mb-3">
            <a href="add_staff.php">
              <button type="button" class="btn btn-dark mx-10">Add Staff</button>
            </a>
          </div>
        </div>

        <!-- Main Wrapper -->
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr NO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Department</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Include database connection
              include_once('include/conn.php');

              // Fetch staff data from the database
              $query = "SELECT * FROM staff";
              $result = mysqli_query($conn, $query);

              // Check if there are any staff records
              if (mysqli_num_rows($result) > 0) {
                // Loop through each staff record and display it in a table row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['staff_id'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td>" . $row['Department'] . "</td>";
                  echo "<td>" . $row['address'] . "</td>";
                  echo "<td>" . $row['salary'] . "</td>";
                  echo "<td><img src='" .$row['image'] . "' alt='Staff Image' width='50'></td>";

                  echo "<td><a href='edit_staff.php?id=" . $row["staff_id"] . "' class='btn btn-primary'>Edit</a></td>";
                  echo "<td><a href='staff_delete.php?id=" . $row["staff_id"] . "' class='btn btn-danger'>Delete</a></td>"; // Changed btn-primary to btn-danger for delete button
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='12'>No staff records found</td></tr>";
              }
              ?>
            </tbody>
          </table>
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
