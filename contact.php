<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>

  <script src="jquery-3.7.1.min.js"></script>
  <script src="jquery.validate.js"></script>

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

  <!-- for validation of forms -->
  <script>
    $(document).ready(function () {
      $.validator.addMethod("fnregex", function (value, element) {
        var regex = /^[a-zA-Z ]+$/;
        return regex.test(value);
      }, "Fullname must contain only letters");

      $.validator.addMethod("emregex", function (value, element) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
      }, "Email must contain specific letters");

      $.validator.addMethod("subregex", function (value, element) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
      });

      $.validator.addMethod("descregex", function (value, element) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
      });

      $("#form1").validate({
        rules: {
          fn: {
            required: true,
            minlength: 2,
            maxlength: 20,
            fnregex: true
          },
          em: {
            required: true,
            minlength: 2,
            maxlength: 20,
            emregex: true
          },
          sub: {
            required: true,
            minlength: 2,
            maxlength: 40,
            pwregex: true
          },
          desc: {
            required: true,
            minlength: 50,
            maxlength: 200,
            pwregex: true
          }
        },
        messages: {
          fn: {
            required: "Fullname must be required",
            minlength: "Fullname must contain at least 2 characters",
            maxlength: "Fullname must contain 20 characters",
          },
          em: {
            required: "Email must be required",
            minlength: "Email must contain at least 2 characters",
            maxlength: "Email must contain 20 characters",
          },
          sub: {
            required: "Subject must be required",
            minlength: "Password must contain at least 2 characters",
            maxlength: "Password must contain 40 characters",
          },
          desc: {
            required: "Description must be required",
            minlength: "Discription must contain at least 50 characters",
            maxlength: "Discription must contain 200 characters",
          }
        },
        errorPlacement: function (error, element) {
          if (element.attr('name') === "fn") {
            $('#fn_err').html(error);
          }
          if (element.attr('name') === "em") {
            $('#em_err').html(error);
          }
          if (element.attr('name') === "sub") {
            $('#sub_err').html(error);
          }
          if (element.attr('name') === "desc") {
            $('#desc_err').html(error);
          }
        }
      });
    });
  </script>

</head>

<body>
  <!-- -------------------navbar--------------------->
<?php include 'navbar.php'?>
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

  
  <!-- --------------------------contact us form----------------------- -->
  <br>
  <form class="p-5 my-5 w-100" id="form">
    <div class="mb-3">
      <input type="text" class="form-control" id="fn" aria-describedby="emailHelp" name="fn"
        placeholder="Your Name">
      <span id="fn_err"></span>
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="em" aria-describedby="emailHelp" name="em"
        placeholder="Your Email">
      <span id="em_err"></span>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="sub" aria-describedby="emailHelp" name="sub"
        placeholder="Subject">
      <span id="sub_err"></span>
    </div>
    <div class="mb-3">
      <textarea class="form-control" id="desc" rows="3" name="desc" placeholder="Descepration"></textarea>
      <span id="desc_err"></span>
    </div>
    <button type="submit" class="btn btn-danger" name="">Send Message</button>
  </form>
  <!-- ------------------footer---------------------- -->
  <?php include 'footer.php'?>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js">
  </script>
  <style>
    .error {
      color: red;
    }
  </style>
  

</body>

</html>