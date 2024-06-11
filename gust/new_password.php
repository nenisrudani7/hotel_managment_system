<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Set background color */
        }
        .container {
            height: 100vh; /* Make container take full height of viewport */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #fff; /* Set background color for form */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
session_start();
include_once('../admin/include/conn.php');
?>

<div class="container">
    <div class="col-lg-6 form-container">
        <h2 class="text-center">Reset Password Form</h2>
        <form action="update_new_password.php" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
                <label for="pwd"><b>New Password:</b></label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                <span id="pswd_err"></span>
            </div>
            <div class="form-group">
                <label for="repwd"><b>Confirm New Password:</b></label>
                <input type="password" class="form-control" id="repwd" placeholder="Enter password" name="repswd">
                <span id="repswd_err"></span>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Submit" name="btn">
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
