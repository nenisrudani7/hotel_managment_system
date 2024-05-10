<?php include('include/session_login.php'); ?>

<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="profile.php" class="dropdown-item">Profile</a>
                    <a href="forget_password_admin.php" class="dropdown-item">Setting</a>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>