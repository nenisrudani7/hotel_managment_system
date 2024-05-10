<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>
   .error{
    color: red;
  }
</style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>
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
<script src=""></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap for styling, optional -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <!-- --------------top---- -->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/contactus.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>Get in Touch</h1>
          <p>contact us</p>
        </div>
      </div>
    </div>


  </div>

  <!--------------------------------- navbar ---------------------------------->
  <?php include 'navbar1.php' ?>

  <!-- --------------------------contact-us form----------------------- -->
  <br>
  
<div class="container mt-5">
    <h2>Contact Form</h2>
    <br>
  <form class="p-5 my-5 w-100" id="form" method="post" action="contact1.php">
    <div class="mb-3">
      <input type="text" class="form-control" id="fn" aria-describedby="emailHelp" name="fn1"
        placeholder="Your Name">
      <span id="fn_err"></span>
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="em" aria-describedby="emailHelp" name="em1"
        placeholder="Your Email">
      <span id="em_err"></span>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="sub" aria-describedby="emailHelp" name="sub1"
        placeholder="Subject">
      <span id="sub_err"></span>
    </div>
    <div class="mb-3">
      <textarea class="form-control" id="desc" rows="3" name="desc1" placeholder="Descepration"></textarea>
      <span id="desc_err"></span>
    </div>
      
    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal1'>
                    Send Message
                    </button>
  </form>
</div>
</body>

</html>





