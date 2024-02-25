<!DOCTYPE html>
<html lang="en">

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

  <!-- --------------------------contact us form----------------------- -->
  <br>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mb-4">Contact Us</h2>
        <form id="contactForm" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
        <span id="name_err" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter your phone no." required>
        <span id="phone_err" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
        <span id="email_err" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
        <span id="message_err" class="text-danger"></span>
    </div>
    <button type="submit" class="btn btn-danger">Submit</button>
</form>

      </div>
    </div>
  </div>

  <script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;

        var isValid = true;

        if (name.trim() === "") {
            document.getElementById('name_err').innerText = "Name is required";
            isValid = false;
        } else {
            document.getElementById('name_err').innerText = "";
        }

        if (phone.trim() === "") {
            document.getElementById('phone_err').innerText = "Phone number is required";
            isValid = false;
        } else {
            document.getElementById('phone_err').innerText = "";
        }

        if (email.trim() === "") {
            document.getElementById('email_err').innerText = "Email is required";
            isValid = false;
        } else {
            document.getElementById('email_err').innerText = "";
        }

        if (message.trim() === "") {
            document.getElementById('message_err').innerText = "Message is required";
            isValid = false;
        } else {
            document.getElementById('message_err').innerText = "";
        }

        return isValid;
    }
</script>

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
                <a class="navbar-brand fw-bold" href="hotel.php">Fu<span style="color: red;">S</span>ion</a>
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
                <a href="hotel1.php" class="text-white">Home</a>
              </p>
              <p>
                <a href="room1.php" class="text-white">Rooms</a>
              </p>
              <p>
                <a href="gallery1.php" class="text-white">Gallary</a>
              </p>
              <p>
                <a href="about1.php" class="text-white">About</a>
              </p>
              <p>
                <a href="contact1.php" class="text-white">Contect</a>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>