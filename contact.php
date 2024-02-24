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

  <!-- -------------------navbar--------------------->

  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="hotel.html">Fu<span style="color: red;">S</span>ion</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white me-2 " href="hotel.html">HOME</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white me-2 " href="room.html">ROOMS</i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2 " href="gallery.html">GALLERY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="about.html">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2" href="contact.html">CONTACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal">SIGN-IN</button></a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- ------model---------------- -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your login form goes here -->

        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your login form -->
          <form class="p-5 my-5 w-100" id="form1">
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
            <button type="submit" class="btn btn-success" name="">Send Message</button>
          </form>
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
    <button type="submit" class="btn btn-success" name="">Send Message</button>
  </form>
  <!-- ------------------footer---------------------- -->
  <div class="bloc1 my-5" style="width: 100%;">

    <footer class="text-center text-lg-start text-white" style="background-color:black; position:relative">

      <div class=" container-fluid p-4 pb-0">

        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                <a class="navbar-brand fw-bold" href="hotel.html">Fu<span style="color: red;">S</span>ion</a>
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">QUICK MENU</h6>
              <p>
                <a href="hotel.html" class="text-white">Home</a>
              </p>
              <p>
                <a href="room.html" class="text-white">Rooms</a>
              </p>
              <p>
                <a href="gallery.html" class="text-white">Gallary</a>
              </p>
              <p>
                <a href="about.html" class="text-white">About</a>
              </p>
              <p>
                <a href="contact.html" class="text-white">Contect</a>
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i> Rajkot,Gujarat,india </p>
              <p><i class="fas fa-envelope mr-3"></i> jenilgajera@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +91 8780689090</p>
              <p><i class="fas fa-print mr-3"></i> +91 9429032526</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

              <!-- Facebook -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                  class="fab fa-facebook-f"></i></a>

              <!-- Twitter -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                  class="fab fa-twitter"></i></a>

              <!-- Google -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39"
                href="https://www.google.com/search?q=nenis+rudani&rlz=1C1VDKB_enIN1074IN1074&oq=nenis+rudani&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg80gEINDA2N2owajeoAgCwAgA&sourceid=chrome&ie=UTF-8"
                role="button"><i class="fab fa-google"></i></a>

              <!-- Instagram -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac"
                href="https://www.instagram.com/nenisrudani/?igshid=ZGUzMzM3NWJiOQ%3D%3D" role="button"><i
                  class="fab fa-instagram"></i></a>

              <!-- Linkedin -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca"
                href="https://www.linkedin.com/in/nenis-rudani-878845272" role="button"><i
                  class="fab fa-linkedin-in"></i></a>
              <!-- Github -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #333333"
                href="https://github.com/nenisrudani7" role="button"><i class="fab fa-github"></i></a>
            </div>
          </div>

        </section>

      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2024 Copyright:
        <a class="text-white" href="">BY JNJ Devlopers</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js">
  </script>
  <style>
    .error {
      color: red;
    }
  </style>
  <!-- for validation of forms -->
  <!-- for validation of forms -->

</body>

</html>