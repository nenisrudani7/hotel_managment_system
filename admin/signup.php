<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'include/conn.php';
    $username = $_POST["name"];
    $password = $_POST["password"]; 
    
    $sql = "SELECT * FROM user WHERE a_name = '$username' AND password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['stulogin'] = true;
        $_SESSION['a_name'] = $username;
        header("location: index.php");
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="jquery.validate.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="container-fluid " style="background-color: black;">
        <section class="vh-100" style="background-color:white;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                                        <form id="signin" class="mx-1 mx-md-4" method="post" action="">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="name" id="form3Example3c" name="name" class="form-control" />
                                                    <label class="form-label" for="form3Example3c">name</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="form3Example4c" name="password" class="form-control" />
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                </div>
                                            </div>

                                            

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">sign in</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="image/user.png" width="350px" height="450px" class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</body>

</html>

<script>
        $(document).ready(function () {
            $.validator.addMethod("emailregex", function (value, element) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("noDigits", function (value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Digits are not allowed.");


            $("#signin").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        emailregex: true
                    },
                  
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        emailregex: "Please enter a valid email address"
                    },
                }
            });
        });
    </script>

    