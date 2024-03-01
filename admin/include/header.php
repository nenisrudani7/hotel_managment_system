<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
    />
    <script
      src="https://kit.fontawesome.com/ae360af17e.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style.css"/>

  </head>

  <body>
    <div class="wrapper">
      <aside id="sidebar" class="js-sidebar">
        <!-- Content For Sidebar -->
        <div class="h-100">
          <div class="sidebar-logo">
            <a href="#"><h1>Admin</h1></a>
          </div>
          <br />
          <ul class="sidebar-nav">
            <li class="nav-item text-white mx-4">
              <a href="index.php" class="nav-link">
                <i class="fa-solid fa-user"></i>
                <span class="mx-2 size">Dashboard</span>
              </a>
            </li>
            <br />
            <li class="nav-item text-white mx-4">
              <a href="register.php" class="nav-link">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="mx-2 size">Reservation</span>
              </a>
            </li>
            <br />
            <li class="nav-item text-white mx-4">
              <a href="m.html" class="nav-link">
                <i class="fa-light fa-house"></i>
                <span class="mx-2 size">Manage Rooms</span>
              </a>
            </li>
            <br />
            <li class="nav-item text-white mx-4">
              <a href="staff.html" class="nav-link">
                <i class="fa-solid fa-users-gear"></i>
                <span class="mx-2 size">Staff Section</span>
              </a>
            </li>
<br>
            <li class="nav-item text-white mx-4">
              <a href="complain.html" class="nav-link">
                <i class="fa-solid fa-message"></i>
                <span class="mx-2 size">Manage Complaints</span>
              </a>
            </li>
            <br>
      <li class="nav-item text-white mx-4">
        <a href="barchart.html" class="nav-link">
          <i class="fa-solid fa-chart-pie"></i>
          <span class="mx-2 size">St
            atistics</span>
        </a>
      </li>
              </ul>
            </li>
          </ul>
        </div>
      </aside>
      <div class="main">
        <nav class="navbar navbar-expand px-3 border-bottom">
          <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                  <img
                    src="image/profile.jpg"
                    class="avatar img-fluid rounded"
                    alt=""
                  />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="#" class="dropdown-item">Profile</a>
                  <a href="#" class="dropdown-item">Setting</a>
                  <a href="#" class="dropdown-item">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        
        <a href="#" class="theme-toggle">
          <i class="fa-regular fa-moon"></i>
          <i class="fa-regular fa-sun"></i>
        </a>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
