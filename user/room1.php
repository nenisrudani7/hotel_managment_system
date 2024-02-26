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
</head>
<body>
    
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/h7.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>HOTEL ROOMS</h1>
              <p>LUXURIOUS ROOMS</p>
            </div>
          </div>
        </div>
       
        
      </div>

 <!--------------------------------- navbar ---------------------------------->
 <?php include 'navbar1.php' ?>

<!-- ---------------------our rooms----------------------- -->

<h1 class="text-center" style="text-decoration: underline; font-family:serif;">Our Rooms</h1>
<br>

<div class="container g-3 mt-6">
  <div class="row ">
    <div class="col-lg-4 mb-4 mb-lg-0  text-center ">
      <div class="card" >
        <img class="card-img-top w-100" src="img/h2.jpg" alt="Standard Room">
        <div class="card-body text-center">
          <h4 class="card-title">Standard Room</h4>
          <p class="card-text" style="color:#5c7893">₹1000/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0 text-center  ">
      <div class="card" >
        <img class="card-img-top w-100" src="img/h7.jpg" alt="Family Room">
        <div class="card-body text-center">
          <h4 class="card-title">Family Room</h4>
          <p class="card-text" style="color:#5c7893">₹1500/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0 text-center ">
      <div class="card" >
        <img class="card-img-top w-100" src="img/delux_room.jpg" alt="Delux Room">
        <div class="card-body text-center">
          <h4 class="card-title">Delux Room</h4>
          <p class="card-text" style="color:#5c7893">₹2000/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row ">
    <div class="col-lg-4 mb-4 mb-lg-0">
      <div class="card" >
        <img class="card-img-top w-100" src="img/king-room.jpg" alt="Standard Room">
        <div class="card-body text-center">
          <h4 class="card-title">king Room</h4>
          <p class="card-text" style="color:#5c7893">₹1999/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0 ">
      <div class="card">
        <img class="card-img-top w-100" src="img/queen-room.jpg" alt="Family Room">
        <div class="card-body text-center">
          <h4 class="card-title">Queen Room</h4>
          <p class="card-text" style="color:#5c7893">₹1999/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 mb-lg-0">
      <div class="card" >
        <img class="card-img-top w-100" src="img/quadroom.jpg" alt="Delux Room">
        <div class="card-body text-center">
          <h4 class="card-title">Quad Room</h4>
          <p class="card-text" style="color:#5c7893">₹2000/per day</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Now
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- ------------------footer---------------------- -->
  <?php include '../footer.php'?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>