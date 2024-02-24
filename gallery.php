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
<!-- gallry start -->
    <header class="btn-light text-dark text-center py-5">
      <div class="container">
        <h1>Welcome to Our Gallery</h1>
        <p class="lead">Experience luxury and comfort at our hotel</p>
      </div>
    </header>

    <hr>
    <!-- Gallery -->
      <!-- Section: Images -->
      <section class="container-fluid">
        <h1 class="text-center" style=" font-family: 'Montserrat', sans-serif;">Our Gym</h1>
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/gym1.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/gym2.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/gym3.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>
        </div>
         <br>
         <br>

        <!-- second row -->
        <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;">Our Rooms</h1>
        <div class="row my-4">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/room1.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/king-room.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/img_4.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>
        </div>
        <!-- -----third row----- -->
        <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;">Our Interior</h1>
        <div class="row my-4">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/int1.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/int2.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
              <img src="img/int3.jpg" class="w-100" />
              <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Images -->
      <?php include 'footer.php'?>
  </body>

</html>