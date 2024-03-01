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
    <form id="signupForm" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span id="name_err"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span id="email_err"></span>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span id="password_err"></span>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <span id="confirm_password_err"></span>
                    </div> -->
                    <button type="submit" href="hotel1.html" class="btn btn-primary">Sing Up</button>
                </form>
</div>

  <!-- ------------------footer---------------------- -->
  <?php include '../footer.php'?>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script>
      $(document).ready(function () {
                $.validator.addMethod("fnregex", function (value, element) {
                    var regex = /^[a-zA-Z ]+$/;
                    return regex.test(value);
                }, "Please enter a valid full name with only letters");
    
                $.validator.addMethod("emailregex", function (value, element) {
                    // Basic email validation regex
                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return regex.test(value);
                }, "Please enter a valid email address");
    
           
    
                $("#signupForm").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 2,
                            maxlength: 50,
                            fnregex: true
                        },
                        email: {
                            required: true,
                            email: true,
                            emailregex: true
                        },
                        
                    },
                    messages: {
                        name: {
                            required: "Please enter your full name",
                            minlength: "Full name must be at least 2 characters",
                            maxlength: "Full name cannot exceed 50 characters",
                            fnregex: "Please enter a valid full name with only letters"
                        },
                        email: {
                            required: "Please enter your email address",
                            email: "Please enter a valid email address",
                            emailregex: "Please enter a valid email address"
                        },
                        
                    },
                    errorPlacement: function (error, element) {
                        var name = element.attr('name');
                        if (name === "name" || name === "email") {
                            $('#' + name + '_err').html(error);
                        }
                    },
                });
            });
        </script>


</body>

</html>





