<?php
session_start();
if(!isset($_SESSION["admin_uname"])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
  <!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body>

    <div class="wrapper">
    <?php include('include/aside.php') ?>
      <div class="main">
      <?php include('include/nav.php') ?>
        <main class="content px-3 py-2">
          

        <div class="container-fluid text-center p-3 my-container">
        <div class="container-fluid text-center p-3 my-container">
    <div class="row mx-2">
        <!-- Hotel Page Card -->
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header bg-dark">Hotel Page</div>
                <div class="card-body">
                    <h1 class="card-title">Content Here</h1>
                    <a href="hotel.php" class="btn btn-light">Go to Hotel Page</a>
                </div>
            </div>
        </div>
        
        <!-- room page -->
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header bg-dark">room Page</div>
                <div class="card-body">
                    <h1 class="card-title">Content Here</h1>
                    <a href="room_page.php" class="btn btn-light">Go to room Page</a>
                </div>
            </div>
        </div>
        
        <!-- Gallery Page Card -->
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header bg-dark">Gallery Page</div>
                <div class="card-body">
                    <h1 class="card-title">Content Here</h1>
                    <a href="gallary_manage.php" class="btn btn-light">Go to Gallery Page</a>
                </div>
            </div>
        </div>
        <!-- About Page Card -->
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header bg-dark">About Page</div>
                <div class="card-body">
                    <h1 class="card-title">Content Here</h1>
                    <a href="about_page.php" class="btn btn-light">Go to About  Page</a>
                </div>
            </div>
        </div>
        
        <!-- Contact Page Card
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header bg-dark">Contact Page</div>
                <div class="card-body">
                    <h1 class="card-title">Content Here</h1>
                    <a href="contact_manage.php" class="btn btn-light">Go to Contact Page</a>
                </div>
            </div>
        </div> -->
    </div>
</div>

</div>

        </main>
        <a href="#" class="theme-toggle">
          <i class="fa-regular fa-moon"></i>
          <i class="fa-regular fa-sun"></i>
        </a>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
  </body>

  </html>

