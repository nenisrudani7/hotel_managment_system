<?php

include('admin/include/conn.php');
// Fetch the gym heading from the database
$sql_heading = "SELECT heading FROM gym_heading";
$result_heading = $conn->query($sql_heading);
$row_heading = $result_heading->fetch_assoc();
$gym_heading = $row_heading["heading"];

// Fetch gym images from the database
$sql_images = "SELECT image_path, modal_id FROM gym_images";
$result_images = $conn->query($sql_images);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="gallerystyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--external css file-->
  <link href="style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <!-- for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ----font----->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <style>
    .error{
    color: red;
   }
    </style>
  
        
</head>

<body>
 <?php include 'navbar.php'?>
 <br>
 <br>
 <br>
 
<!-- gallry start -->
    <?php

// SQL query to fetch data from gallery_header table
$sql = "SELECT * FROM gallery_header";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();

    // Output the HTML structure with fetched data
    echo '<header class="btn-light text-dark text-center py-5">
            <div class="container">
              <h1>' . $row['title'] . '</h1>
              <p class="lead">' . $row['subtitle'] . '</p>
            </div>
          </header>';
} else {
    echo "0 results";
}

?>

    <hr>
    <!-- Gallery -->
      <!-- Section: Images -->
      <section class="container-fluid">
      <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;"><?php echo $gym_heading; ?></h1>
  <div class="row">
    <?php
    // Loop through each gym image
    while ($row_image = $result_images->fetch_assoc()) {
      $image_path = $row_image["image_path"];
      $modal_id = $row_image["modal_id"];
      ?>
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
          <img src="admin/img/../<?php echo $image_path; ?>" class="w-100" />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#<?php echo $modal_id; ?>">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
         <br>
         <br>

        <!-- second row -->
        <?php
// Assuming you have established a database connection

// Fetch room headings from the database
$sql_heading = "SELECT heading FROM room_heading"; // Assuming 'room_heading' is your table name
$result_heading = $conn->query($sql_heading);
$row_heading = $result_heading->fetch_assoc();
$room_heading = $row_heading["heading"];

// Fetch room details from the database
$sql_rooms = "SELECT * FROM rooms_page_image"; // Assuming 'room_page_image' is your table name
$result_rooms = $conn->query($sql_rooms);

// Check if there are any rooms available
if ($result_rooms->num_rows > 0) {
  ?>
  <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;">Our Rooms</h1>
  <div class="row my-4">
  <?php
  // Loop through each room
  while($row_room = $result_rooms->fetch_assoc()) {
      ?>
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="<?php echo $row_room["image_path"]; ?>" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#<?php echo $row_room["modal_id"]; ?>">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
          </div>
      </div>
      <?php
  }
  ?>
  </div> <!-- Close the row div -->
  <?php
} else {
  // If no rooms are available
  echo "No rooms available.";
}
?>


        <!-- -----third row----- -->
        <?php
// Assuming you have already connected to your database

// Fetching headings
$sql_headings = "SELECT * FROM interior_headings";
$result_headings = $conn->query($sql_headings);

// Check if there are any headings

if ($result_headings->num_rows > 0) {
    // Fetching images
    $sql_images = "SELECT * FROM interior_images";
    $result_images = $conn->query($sql_images);

    // Output the heading
    if ($row_heading = $result_headings->fetch_assoc()) {
?>
        <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;"><?php echo $row_heading['heading']; ?></h1>

        <div class="row my-4">
            <?php while ($row_image = $result_images->fetch_assoc()) : ?>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                        <img src="<?php echo $row_image["image_path"]; ?>" class="w-100" />
                        <a href="#!" data-mdb-toggle="modal" data-mdb-target="<?php echo $row_image["modal_target"]; ?>">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
<?php
    } else {
        echo "No headings found";
    }
} else {
    echo "No data found";
}
?>


      </section>
      <!-- Section: Images -->
      <?php include 'footer.php'?>
  </body>

</html>