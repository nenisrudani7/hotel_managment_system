<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

</head>
<body>
  <?php
  include("admin/include/conn.php");
// SQL query to fetch data from the carousel_items table
$sql = "SELECT image_path, caption_heading, caption_text FROM room_page"; // Change the condition according to your requirement
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
    
    // Output the fetched values within HTML structure
    echo '<div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="' . $row["image_path"] . '" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h1>' . $row["caption_heading"] . '</h1>
                  <p>' . $row["caption_text"] . '</p>
                </div>
              </div>
            </div>
          </div>';
} else {
    echo "0 results";
}

?>

      <!-- -------------------navbar--------------------->
      <?php include 'navbar.php';?>
       <!-- ------model---------------- -->
  
      <!-- ---------------------our rooms----------------------- -->

  <h1 class="text-center" style="text-decoration: underline; font-family:serif;">Our Rooms</h1>
  <br>
  <br>
 
  <div class="container g-3 mt-6">

<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php
  // Include database connection
  include_once ('admin/include/conn.php');

  // SQL query to fetch data from the room_type table
  $query = "SELECT * FROM room_type";

  // Execute the query
  $result = mysqli_query($conn, $query);

  // Check if the query executed successfully
  if ($result) {
    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
      // Loop through each row of data
      while ($row = mysqli_fetch_assoc($result)) {
        $room_id = $row['room_type_id']; // Assuming 'id' is the primary key column name in your database
        $room_name = $row['room_type'];
        $price = $row['price'];
        $offer = $row['offers'];
        $image = $row['image'];

        // Output the HTML for the card
        echo "<div class='col'>
              <div class='card h-100'>
                <img class='card-img-top' src='img/$image' alt='$room_name'>
                <div class='card-body text-center'>
                  <h4 class='card-title'>$room_name</h4>
                  <p class='card-text' style='background-color:red;color:white; display:inline-block;'>$offer % Off Today</p> 
                  <p class='card-text' style='color:#5c7893'>₹$price/per day</p>
                  <a href='five_star_review.php?id=$room_id' class='btn btn-primary'>Review</a>
                  <a href='online_booking.php?id=$room_id' class='btn btn-danger'>Book Now</a>
                </div>
              </div>
            </div>";
      }
    } else {
      echo "No records found";
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }


  ?>
</div>

</div>

  
  <?php include 'footer.php'?>
</body>
</html>