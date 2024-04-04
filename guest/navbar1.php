<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../style.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap-theme.min.css" integrity="sha384-zqFg5/Ql+1R0ZusNTxoz2IS4tLkKW3ivW9dA4+XD7/1e3Ha6zBBYW02xWPe1RkA2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <style>
    /* .modal-backdrop {
      background-color: transparent !important;
    } */
    .error {
      color: red;
    }
  </style>
  <script>
    $(document).ready(function() {
      // Remove modal backdrop when the login modal is shown
      $('#exampleModal').on('show.bs.modal', function(e) {
        $('.modal-backdrop').remove();
      });

      // Remove modal backdrop when the registration modal is shown
      $('#exampleModal1').on('show.bs.modal', function(e) {
        $('.modal-backdrop').remove();
      });
    });
  </script>
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
        var regex = /^[a-zA-Z ]+$/;
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

  <!-- <script>
    $(document).ready(function() {
      $.validator.addMethod("email", function(value, element) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
      }, "Please enter a valid email address");

      $.validator.addMethod("password", function(value, element) {
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
        errorPlacement: function(error, element) {
          var name = element.attr('name');
          if (name === "email" || name === "password") {
            error.addClass('invalid-feedback');
            error.appendTo(element.parent());
          }
        },
      });
    });
  </script> -->




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

  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require('../PHPMailer/PHPMailer.php');
  require('../PHPMailer/SMTP.php');
  require('../PHPMailer/Exception.php');

  ?>

  <?php
  // Check if the form is submitted
  if (isset($_POST['btn'])) {
    // Include your database connection file
    include_once("../admin/include/conn.php");

    // Retrieve form data
    $r_name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $token = uniqid() . uniqid();

    // Check if the email already exists
    $check_sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($check_sql);

    if ($result === FALSE) {
      echo "Error checking email: " . $conn->error;
    } else {
      if ($result->num_rows > 0) {
  ?>
        <script>
          alert("Email already exists. Please use a different email address.");
        </script>
  <?php
      } else {
        // Insert data into the table without hashing the password
        $insert_sql = "INSERT INTO register (`name`, `email`, `password`, `token`, `status`) VALUES ('$r_name', '$email', '$password', '$token', 'Unactive')";

        // Execute the SQL query
        if ($conn->query($insert_sql) === TRUE) {
          // Redirect to a success page after successful data insertion

          $mail = new PHPMailer();
          try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'rnv1924@gmail.com'; // SMTP username
            $mail->Password = 'jypu twxl chxa bsjq'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            // $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('rnv1924@gmail.com', 'RNV'); // Sender's email address and name
            $mail->addAddress($email, $r_name); // Recipient's email address and name

            // Attachments
            //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Account Verification';
            $mail->Body    = 'Congratulations! ' . $r_name . ' Your account has been created successfully. This email is for your account verification. <br> Kindly click on the link below to verify your account. You will be able to login into your account only after account verification. <br>
                    <a href="http://localhost/hotel_managment_system/guest/verify_account.php?em=' . $email . '&token=' . $token . '">Click here to verify your account</a>';

            // Send the email
            $mail->send();
          } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
          }
        } else {
          echo "Error inserting data: " . $conn->error;
        }
      }
    }
  }
  ?>

  <!-- model of ragistration form -->
  <!-- Registration Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel1">REGISTRATION</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="signupForm" method="post">
            <!-- Name Field -->
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
              <span id="name_err" class="error"></span> <!-- Error message for name field -->
            </div>
            <!-- Email Field -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
              <span id="email_err" class="error"></span> <!-- Error message for email field -->
            </div>
            <!-- Password Field -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
              <span id="password_err" class="error"></span> <!-- Error message for password field -->
            </div>
            <!-- Confirm Password Field -->
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter your password">
              <span id="confirm_password_err" class="error"></span> <!-- Error message for confirm password field -->
            </div>
            <!-- Registration Button -->
            <button type="submit" class="btn btn-danger" name="btn">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include('register_insert.php'); ?>

  <!-- --------------------MODEL OF LOGIN-->
  <!-- Login Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">LOG-IN</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm" method="post">
            <!-- Email Field -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
              <span id="email_err" class="error"></span> <!-- Error message for email field -->
            </div>
            <!-- Password Field -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
              <span id="password_err" class="error"></span> <!-- Error message for password field -->
            </div>
            <!-- Remember Me Checkbox -->
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <!-- Login Button -->
            <button type="submit" class="btn btn-primary">Login</button>
            <!-- Registration Link -->
            <p>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Register</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      $('#exampleModal').on('hidden.bs.modal', function() {
        $('#exampleModal1').modal('show');
      });
    });
  </script>
</body>

</html>