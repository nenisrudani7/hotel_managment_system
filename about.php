<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--external css file-->
  <link href="style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

  <style>
    body {
      background-color: #ffffff;
    }

    .gallary .gallary_image_box {
      width: 100%;
      margin: 10px auto;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-gap: 10px;
    }

    .gallary .gallary_image_box .gallary_image {
      display: flex;
      align-items: center;
      justify-content: center;
      background: transparent;
    }

    .gallary .gallary_image_box .gallary_image img {
      width: 200%;
      transition: .3s;
      margin-left: 200px;
    }

    .gallary .gallary_image_box .gallary_image:hover img {
      opacity: 0.4;
    }

    .gallary .gallary_image_box .gallary_image h3 {
      position: absolute;
      font-size: 35px;
      margin-bottom: 130px;
      color: #000000;
      font-family: polo;
      z-index: 5;
      opacity: 0;
      transition: 0.3s;
    }

    .gallary .gallary_image_box .gallary_image:hover h3 {
      opacity: 1;
    }

    .gallary .gallary_image_box .gallary_image p {
      position: absolute;
      width: 400px;
      margin-top: 30px;
      text-align: center;
      color: white;
      line-height: 22px;
      opacity: 0;
      z-index: 3;
      transition: 0.3s;
    }

    .gallary .gallary_image_box .gallary_image:hover p {
      opacity: 1;
    }

    .gallary .gallary_image_box .gallary_image .gallary_btn {
      position: absolute;
      margin-top: 180px;
      color: #ffffff;
      background: #000000;
      padding: 7px 25px;
      text-decoration: none;
      opacity: 0;
      transform: translateY(45px);
      z-index: 3;
      transition: 0.3s;
    }

    .gallary .gallary_image_box .gallary_image:hover .gallary_btn {
      opacity: 1;
      transform: translateY(0);
      margin-left: 150px;
    }

    .imgzoomhover .img {
      transform: scale(1);
      transition: transform 0.3s ease-in-out;
    }

    .imgzoomhover .img:hover {
      transform: scale(1.3);
    }

    .error {
      color: red;
    }

    .modal-backdrop.show {
      opacity: 0.5;
      /* Adjust the opacity as needed */
      background-color: rgba(0, 0, 0, 0.5);
      /* Adjust the color and transparency as needed */
    }
  </style>
</head>

<body>
  <?php include 'navbar.php' ?>

  <div class="box2" style="width: 100%;">
    <header>
      <!-- --------------carousel---------------------- -->
      <?php
      include_once('admin/include/conn.php');
      $sql = "SELECT * FROM about_heading_image";
      $result = $conn->query($sql);

      // Display fetched data in carousel format
      if ($result->num_rows > 0) {
      ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php
            // Output carousel indicators
            for ($i = 0; $i < $result->num_rows; $i++) {
              $class = ($i === 0) ? 'active' : '';
              echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $i . '" class="' . $class . '" aria-current="true" aria-label="Slide ' . ($i + 1) . '"></button>';
            }
            ?>
          </div>
          <div class="carousel-inner">
            <?php
            // Output carousel items
            $count = 0;
            while ($row = $result->fetch_assoc()) {
              $class = ($count === 0) ? 'active' : '';
            ?>
              <div class="carousel-item <?php echo $class; ?>">
                <img src="<?php echo $row['image_path']; ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h1><?php echo $row['caption_heading']; ?></h1>
                  <p><?php echo $row['caption_text']; ?></p>
                </div>
              </div>
            <?php
              $count++;
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      <?php
      } else {
        echo "No data found";
      }

      ?>




      <!-- ------------------site section---- -->
      <?php

// SQL query to fetch data from the about_content table
$sql = "SELECT heading, image_path, video_link, description FROM about_content";
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col text-center" style="text-decoration: underline;">
          <h1><?php echo "$row['heading'];"?></h1>
        </div>
      </div>
      <div class="site-section mt-5 text-white ">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mb-5 mb-md-0">
              <div class="gallary">
                <div class="gallary_image_box">
                  <div class="gallary_image">
                    <img src="img/h7.jpg" />

                    <a href="https://www.youtube.com/watch?v=4K6Sh1tsAW4&ab_channel=BogdanIorga" target="_blank" class="gallary_btn">Play
                      Video</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 text-dark  text-center">
              <p class="mb-4">A hotel is a commercial establishment that provides lodging, meals, and other services to
                guests, travelers, and tourists. Hotels can range from small family-run businesses to large international
                chains. Most hotels list a variety of services, such as room service, laundry, and concierge.
              </p>
              <p><a href="https://www.youtube.com/watch?v=4K6Sh1tsAW4&ab_channel=BogdanIorga" class="popup-vimeo text-up percase text-dark " previewlistener="true">Watch Video <i class="fa-solid fa-arrow-right"></i> <span class="icon-arrow-right small"></span></a></p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="col text-center text-dark" style="text-decoration: underline;">
          <h1>HOTEL BAR</h1>
        </div>
      </div>
      <br>
      <br>

      <div class="container g-2 p-3">
        <div class="row">
          <div class="col-sm-8 text-dark mt-6" style="display:flex;  justify-content: center; text-align: center;">
            <form style="margin-top: 200px;">
              <p>A bar is a place in a hotel or other establishment that serves alcoholic and non-alcoholic drinks,
                as well as light snacks. Bars can range in size and atmosphere, from small, intimate lounges to large,
                bustling taverns. They are often a popular gathering spot for guests, offering a relaxed and social
                environment to unwind and mingle. In addition to drinks and snacks, bars may also offer entertainment, such
                as
                live music or sports games on TV. Some hotels may have multiple bars with different themes and settings to
                cater to different preferences and occasions.</p>
              <p><a href="https://youtu.be/xqKcHz47E5A?si=cg-VdvEehXV5Q1pM" class="popup-vimeo text-uppercase text-dark " previewlistener="true">Watch Video <i class="fa-solid fa-arrow-right"></i> <span class="icon-arrow-right small"></span></a></p>
            </form>
          </div>
          <div class="col-sm-4">
            <div>
              <img src="img/pexels-pixabay-33265.jpg" alt="Los Angeles" class="d-block img-fluid">

            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col text-center text-dark" style="text-decoration: underline;">
          <h1>CAFE</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="container g-2 p-3">
        <div class="row align-items-center">
          <div class="col-sm-4">
            <img src="img/cafe.jpg" alt="cafe" class="d-block w-100 image-fluid ">
          </div>
          <div class="col-sm-8 md-8 text-dark text-center">
            <p class="mb-4 " style="display:flex;  justify-content: center; text-align: center;">A cafe is a small
              restaurant focusing on caffeinated drinks such as classic drip coffee,
              cappuccinos, espresso, and tea. The food is typically straightforward, with a selection of sandwiches,
              pastries, and other baked goods that customers order at the counter and take to their tables.
            </p>
            <p><a href="https://youtu.be/NC9KlaxtfLg?si=St6kKWSPUS2u3IoJ" class="popup-vimeo text-uppercase text-dark " previewlistener="true">Watch Video <i class="fa-solid fa-arrow-right"></i> <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <!-- hotel features------- -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h1 class="mb-5 text-center text-dark" style="text-decoration: underline; font-family:serif;">Hotel Features</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-pool display-3 mb-3 d-block text-primary"><i class="fa-solid fa-water-ladder" style="color: #ff1900;"></i></span>
              <h2 class="h5 text-dark">Swimming Pool</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-desk display-3 mb-3 d-block text-primary"><i class="fa-solid fa-wifi" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Free Wifi</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-exit display-3 mb-3 d-block text-primary"><i class="fa-solid fa-fire-extinguisher" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Fire Exit</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-parking display-3 mb-3 d-block text-primary"><i class="fa-solid fa-square-parking" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Car Parking</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-hair-dryer display-3 mb-3 d-block text-primary"><i class="fa-solid fa-wind" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Hair Dryer</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-minibar display-3 mb-3 d-block text-primary"><i class="fa-solid fa-champagne-glasses" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Minibar</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-drink display-3 mb-3 d-block text-primary"><i class="fa-solid fa-martini-glass" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Drinks</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="flaticon-cab display-3 mb-3 d-block text-primary"><i class="fa-solid fa-mountain-sun" style="color: #ff0000;"></i></span>
              <h2 class="h5 text-dark">Best View</h2>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <!-- --------------------------hotel staffs---------------- -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h1 class="mb-5 text-center text-dark" style="text-decoration: underline; font-family:serif;">Hotel staffs</h1>
          </div>
        </div>
        <div class="container g-3 mt-6">
          <div class="row">
            <?php
            // Database connection
            include('admin/include/conn.php');
            // Fetch data from the staff table
            $sql = "SELECT * FROM staff";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-12 text-center col-lg-4">
                <div class="card" style="width:25rem">
                    <img class="card-img-top" src="admin/' . $row["image"] . '" alt="' . $row["name"] . '">
                    <div class="card-body text-center">
                        <h4 class="card-title">' . $row["name"] . '</h4>
                        <p class="card-text" style="color:#5c7893"></p>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staffModal' . $row["staff_id"] . '">Read more →</a>
                    </div>
                </div>
            </div>';

                // Modal markup
                echo '<div class="modal fade" id="staffModal' . $row["staff_id"] . '" tabindex="-1" aria-labelledby="staffModalLabel' . $row["staff_id"] . '" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staffModalLabel' . $row["staff_id"] . '">' . $row["name"] . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Email: ' . $row["email"] . '</p>
                            <p>Phone: ' . $row["phone"] . '</p>
                            <p>Department: ' . $row["Department"] . '</p>
                            <img src="admin/' . $row["image"] . '" alt="' . $row["name"] . '" style="max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>';
              }
            } else {
              echo "0 results";
            }

            $conn->close();
            ?>

          </div>
        </div>
        <?php include 'footer.php' ?>
</body>

</html>