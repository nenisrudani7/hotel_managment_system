<?php
session_start();
include_once('../admin/include/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget_php</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS for additional styling */
    body {
        background-image: url('https://source.unsplash.com/1600x900/?hotel'); 
    }

    .container5 {
      margin-top: 100px;
    }
    
    .form-container {
      background-color: white;
      padding: 50px;
      left: 50px;
      border-radius: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  

  </style>
</head>
<body>
<?php include 'navbar1.php' ?>

<div class="container5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="form-container">
        <h2 class="text-center mb-4">Forget Password</h2>
        <form action="foraget_passwrod_action.php" method="POST">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email/Mobile-Numer">
          </div>

          <button type="submit" name="btn" class="btn btn-primary btn-block" >Submit</button>
        </form>
      </div>
    </div>
  </div>
</div><br><br><br>




</body>
</html>

    
</body>
</html>