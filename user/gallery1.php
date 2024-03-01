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
</head>

<body>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top ">
      <div class="container">
        <a class="navbar-brand fw-bold" href="hotel1.php">Fu<span style="color: red;">S</span>ion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- -----navbar -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
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
              <a class="nav-link text-white me-2" href="contact1.php">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#exampleModal1">MY-ROOM</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle text-white me-2" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-danger" data-bs-toggle="modal">ME</button></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#exampleModal2">Profile</button></a>
                
                <div class="dropdown-divider"></div>
                <a class="nav-link text-white me-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#exampleModal3">Log-Out</button></a>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
  <br>
  <br>
  <!-- ------mode2---------------- -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabe" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your login form goes here -->

        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Your!</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"><br><br>
          <center>
            <h4>My-Booking</h4>
          </center><br><br>
          <form id="signupForm" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <span id="name_err"></span>
            </div>

          <h4>Step 2:Properity details</h4><br><br>
     
          <div class="mb-3"><label for="room-type">Room-type:&nbsp;</label>
            <select id="type">
              <option value="Standerd">Standard-Room</option>
              <option value="Family">Famliy-Room</option>
              <option value="Delux">Delux-Room</option>
              <option value="king">King-Room</option>
              <option value="Oueen">Oueen-Room</option>
              <option value="Quad">Quad-Room</option>
            </select></div>
          <label for="total_p">Total Persion:</label>
          <input type="number" id="p2" name="p2" required><br><br>
          <label for="check-in">Check-in Date:&nbsp;&nbsp;</label>
          <input type="date" id="d1" name="d1" required><br><br>
  
          <label for="check-out">Check-out Date</label>
          <input type="date" id="d2" name="d2" required><br><br>
         

          
        <label for="toal">Total amount:$1000 /per-day.</label><br><br>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- ------mode3---------------- -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your login form goes here -->

        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Your Profile</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your login form -->
          
          <form id="signupForm" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <span id="name_err"></span>
            </div>
          
         

            <!-- Edit button -->
            <button type="button" id="j1" name="j1" class="btn btn-primary btn-block mb-4">Edit</button>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- ------mode4---------------- -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Your login form goes here -->

        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Thank you for Sing-in</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          

            <!-- Edit button -->
           <center> <button type="button" id="j1" name="j1" class="btn btn-primary btn-block mb-4">Log-Out</button></center>
        </div>
      </div>
    </div>
  </div>
  </div>

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
        <h1 class="text-center" style="font-family: 'Montserrat', sans-serif;">Our Intrior</h1>
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
      <?php include '../footer.php'?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

</html>