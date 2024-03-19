<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!-- <link rel="stylesheet" href="../style.css"> -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap-theme.min.css"
        integrity="sha384-zqFg5/Ql+1R0ZusNTxoz2IS4tLkKW3ivW9dA4+XD7/1e3Ha6zBBYW02xWPe1RkA2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <style>
    .modal-backdrop {
      background-color: transparent !important;
    }
    .error{
      color: red;
    }
  </style>
  <!-- validation of register form -->
  <script>
    $(document).ready(function() {
      $.validator.addMethod("fnregex", function(value, element) {
        var regex = /^[a-zA-Z ]+$/;
        return regex.test(value);
      }, "Please enter a valid full name with only letters");

      $.validator.addMethod("emailregex", function(value, element) {
        // Basic email validation regex
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
      }, "Please enter a valid email address");

      $.validator.addMethod("passwordregex", function(value, element) {
        // Basic password validation regex (at least 8 characters including at least one uppercase, one lowercase, one number, and one special character)
        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        return regex.test(value);
      }, "Minimum eight characters, at least one letter and one number:");

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
          password: {
            required: true,
            minlength: 8,
            passwordregex: true
          },
          confirm_password: {
            required: true,
            equalTo: "#password"
          }
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
          password: {
            required: "Please enter a password",
            minlength: "Password must be at least 8 characters",
            passwordregex: "Password must include at least one uppercase letter, one lowercase letter, one number, and one special character"
          },
          confirm_password: {
            required: "Please confirm your password",
            equalTo: "Passwords do not match"
          }
        },
        errorPlacement: function(error, element) {
          var name = element.attr('name');
          if (name === "name" || name === "email" || name === "password" || name === "confirm_password") {
            $('#' + name + '_err').html(error);
          }
        },
      });
    });
  </script>
  <!-- validation of login form -->
  
   <script>
        $(document).ready(function () {
            $.validator.addMethod("email", function (value, element) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("password", function (value, element) {
                var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                return regex.test(value);
            }, "Password must be at least 8 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character");

            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters"
                    }
                },
                errorPlacement: function (error, element) {
                    var name = element.attr('name');
                    if (name === "email" || name === "password") {
                        error.addClass('invalid-feedback');
                        error.appendTo(element.parent());
                    }
                },
            });
        });
    
  </script>
  

  

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="hotel.php">Fu<span style="color: red;">S</span>ion</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- -----navbar -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="hotel1.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="room1.php">ROOMS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="gallery1.php">GALLERY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="about1.php">ABOUT</a>
          </li>
          <li class="nav-item">
          </li>
          <a class="nav-link text-white me-2" href="contact1.php">CONTACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2"> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">LOGIN</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- model of ragistration form -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your registration form goes here -->
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel1">REGISTRATION</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your registration form -->
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
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password1" name="password">
              <span id="password_err"></span>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password">
              <span id="confirm_password_err"></span>
            </div>
            <button type="submit" href="user/hotel1.php" class="btn btn-danger">REGISTRATION</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------MODEL OF LOGIN-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your login form goes here -->

        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel1">LOG-IN</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="loginForm" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div id="email_err" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div id="password_err" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p>create account → </p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">REGISTRATION</button>
          
                </form>
            
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
        $('#exampleModal').on('hidden.bs.modal', function () {
            $('#exampleModal1').modal('show');
        });
    });
</script>
</body>

</html>