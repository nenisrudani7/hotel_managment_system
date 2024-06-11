<?php
session_start();
if(!isset($_SESSION["user_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
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

      <?php
      include ('admin/include/conn.php');
      // Fetch carousel items from the database
      $sql = "SELECT * FROM hotel_main_page";
      $result = mysqli_query($conn, $sql);

      // Output the carousel HTML
      ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php
          $counter = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $activeClass = ($counter == 0) ? 'active' : '';
            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $counter . '" class="' . $activeClass . '" aria-current="true" aria-label="Slide ' . ($counter + 1) . '"></button>';
            $counter++;
          }
          ?>
        </div>
        <div class="carousel-inner">
          <?php
          mysqli_data_seek($result, 0); // Reset result pointer to start
          $counter = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $activeClass = ($counter == 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $activeClass . '">
                    <img src="admin/' . $row['image_path'] . '" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>' . $row['caption_heading'] . '</h1>
                        <p>' . $row['caption_text'] . '</p>
                    </div>
                </div>';
            $counter++;
          }
          ?>
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

      <?php

      ?>
    </header>
    <!--------------------------------- navbar ---------------------------------->
    <?php include 'navbar.php' ?>

    <!-- ---------------------our rooms----------------------- -->

    <h1 class="text-center" style="text-decoration: underline; font-family:serif;">booked rooms</h1>
 


    

   
    <!-- ----------------------------------------Footer--------------------------------------------->
    <?php include 'footer.php' ?>
    <!-- End of .container -->
    <script src="hotel.js"></script>
    <script src="vali.js"></script>

    <!--  -->



</body>

</html>