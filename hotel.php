<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My hotel</title>
  <!--bootstrap 5 css link-->
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
  <!-- loading pages -->
  <div class="box ">
    <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

    <div class="spinner-grow spinner-grow-sm text-white me-4"></div>

    <div class="spinner-grow spinner-grow-sm text-white me-4"></div>
  </div>


  <div class="box2" style="width:100%;">
    <header>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/h1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Welcome To Hotel</h1>
              <p>Hotel & Resort</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/h7.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h3>RELAXING ROOM</h3>
              <p>Your Room Your Stay</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/h3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h3>Unique Experience</h3>
              <p>Enjoy with us</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>
    <!--------------------------------- navbar ---------------------------------->
    <?php include 'navbar.php' ?>
 
  <!-- ---------------------our rooms----------------------- -->

  <h1 class="text-center" style="text-decoration: underline; font-family:serif;">Our Rooms</h1>
  <br>
  
  <div class="container g-3 mt-6">
   
  <div class="row row-cols-1 row-cols-md-3 g-4">
<?php
// Include database connection
include_once('admin/include/conn.php');

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

// Close the database connection
mysqli_close($conn);
?>
</div>

  </div>

  <!-- -------------hotel features------- -->
  <br>
  <br>


  <br>
  <br>
  <br>
<div class="container">
<div class="row">
  <div class="col-md-6 mx-auto text-center mb-5 section-heading">
    <h1 class="mb-5 text-center" style="text-decoration: underline; font-family:serif;">Hotel Features</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-pool display-3 mb-3 d-block text-primary"><i class="fa-solid fa-water-ladder"
          style="color: #ff1900;"></i></span>
      <h2 class="h5">Swimming Pool</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-desk display-3 mb-3 d-block text-primary"><i class="fa-solid fa-wifi"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Free Wifi</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-exit display-3 mb-3 d-block text-primary"><i class="fa-solid fa-fire-extinguisher"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Fire Exit</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-parking display-3 mb-3 d-block text-primary"><i class="fa-solid fa-square-parking"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Car Parking</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-hair-dryer display-3 mb-3 d-block text-primary"><i class="fa-solid fa-wind"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Hair Dryer</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-minibar display-3 mb-3 d-block text-primary"><i class="fa-solid fa-champagne-glasses"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Minibar</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-drink display-3 mb-3 d-block text-primary"><i class="fa-solid fa-martini-glass"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Drinks</h2>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="text-center p-4 item">
      <span class="flaticon-cab display-3 mb-3 d-block text-primary"><i class="fa-solid fa-mountain-sun"
          style="color: #ff0000;"></i></span>
      <h2 class="h5">Best View</h2>
    </div>
  </div>
</div>
</div>

  <!-- -------what people say-----   -->
  <br>
  <br>
  <div class="container-fluid  block-14 bg-light">
    <h1 class=" text-center " style=" font-family:serif;">What People Say</h1>
    <h4 class=" text-center ">————————</h4>
    <div class="scroller">
      <div class="container  img-list scroller_inner">

        <div class="col text-center m-5 img-circle">
          <img src="img/face1.jpg" class="img-circle" alt="Cinque Terre" width="" height="">
          <h2 class="fw-normal">Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>

        </div>
        <div class="col text-center m-5">
          <img src="img/face5.jpg" class="img-circle" alt="Cinque Terre" width="" height="">

          <h2 class="fw-normal">Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>

        </div>
        <div class="col text-center m-5">
          <img src="img/face7.jpg" class="img-circle" alt="Cinque Terre" width="" height="">
          <h2 class="fw-normal">Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>

        </div>
        <div class="col text-center m-5">
          <img src="img/face10.jpg" class="img-circle" alt="Cinque Terre" width="" height="">
          <h2 class="fw-normal">Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>

        </div>
        <div class="col text-center m-5">
          <img src="img/face27.jpg" class="img-circle" alt="Cinque Terre" width="" height="">
          <h2 class="fw-normal">Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>

        </div>

      </div>

    </div>
  </div>
     <!-- ----------------------------------------Footer--------------------------------------------->
  <?php include 'footer.php'?>
  <!-- End of .container -->
  <script src="hotel.js"></script>
  <script src="vali.js"></script>

  <!--  -->

 

</body>

</html>