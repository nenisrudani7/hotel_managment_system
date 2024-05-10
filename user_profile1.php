<?php
session_start();
if(!isset($_SESSION['user_uname'])){
?>
 <script>
        window.location.href ="http://localhost/hotel_managment_system1/gust/hotel1.php";
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- aos links -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- jquery links -->
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="jquery/jquery.validate.js"></script>

    <link rel="stylesheet" href="guest.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"); -->

    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .error {
            color: red;
        }

        section {
            padding-top: 60px;
            padding-bottom: 60px;
            overflow: hidden;
        }

        .section-bg {
            background-color: #f3f5fa;
            /* background-color: #f6f6f6; */
        }

        .head {
            background-color: rgba(0, 0, 255, 0.867);
            width: 150px;
            height: 2px;
            margin: auto;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin-top: -5px;
        }

        .footer {
            --background-color: #f4f4f4;
            color: var(--default-color);
            background-color: var(--background-color);
            font-size: 14px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php 
     // Include database connection file
     include_once("admin/include/conn.php");?>
    <?php include('navbar.php') ?>
    <br>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-2 border-dark shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center">User Profile</h3>

                            <?php
                           
                            $em = $_SESSION['user_uname'];

                            // Query to fetch data from the "retailers" table
                            $sql = "SELECT * FROM register WHERE  email='$em'";
                            $result = mysqli_query($conn, $sql);

                            // Check if any rows were returned
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="text-center mb-4">
                                        <!-- Include user profile picture -->
                                        <img src='admin/profile_pictures/<?php echo $row['image']; ?>' style='border-radius: 50%; height:180px; width:180px;' alt='User Profile Picture'>
                                    </div>
                                    <div class="text-center">
                                        <p class='card-text'><strong>Full Name:</strong> <?php echo $row['name']; ?></p>
                                        <p class='card-text'><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                        <p class='card-text'><strong>Mobile:</strong> <?php echo $row['mobile']; ?></p>
                                        <p class='card-text'><strong>Address:</strong> <?php echo $row['address']; ?></p>
                                        <p class='card-text'><strong>Gender:</strong> <?php echo $row['gender']; ?></p>

                                        <!-- Edit Button -->
                                        <a href="edit_user_profile.php" class="btn btn-primary">Edit Profile</a><br><br>
                                        <a href="user_change_password.php" class="btn btn-primary">Change  Password</a><br><br>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No data found";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br><br>
    <?php include('footer.php') ?>
</body>

</html>