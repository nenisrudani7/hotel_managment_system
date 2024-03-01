<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />

    <script src="jquery-3.6.4.min.js"></script>
    <script src="jquery.validate.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php
        include('include/aside.php');
        ?>
        
        <div class="main container-fluid">
        <?php include('include/nav.php') ?>
            <form method="post" action="addroom.php" style="margin-top: 20px; text-align: start;">
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter room Type</label>
                    <input type="text" class="form-control" placeholder="Enter room Name" name="rname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">price</label>
                    <input type="text" class="form-control" placeholder="Enter price" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="text-align: start !important;">Enter offer</label>
                    <input type="text" class="form-control"  placeholder="Enter latest offer" name="offer">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="text-align: start !important;">Enter Description</label>
                    <input type="text" class="form-control"   placeholder="Enter dscription" name="a_d">
                </div> <br>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="text-align: start !important;">Upload image</label>
                    <input type="file" class="form-control"   placeholder="upload image" name="f1">
                </div> 

                <button type="submit" class="btn btn-primary" style="margin-top: 50px;">submit</button>
            </form>

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

<script>
$(document).ready(function() {
    // Add validation rules and error messages to the form
    $('form').validate({
        rules: {
            rname: {
                required: true
            },
            price: {
                required: true,
                number: true 
            },
            offer: {
                required: true
            },
            a_d: {
                required: true
            },
            f1: {
                required: true,
                accept: "image/jpeg,image/jpg,image/jfif" // Allow only JPEG, JPG, and JFIG images
            }
        },
        messages: {
            rname: {
                required: "Please enter the room name"
            },
            price: {
                required: "Please enter the price",
                number: "Please enter a valid number for the price"
            },
            offer: {
                required: "Please enter the offer"
            },
            a_d: {
                required: "Please enter the description"
            },
            f1: {
                required: "Please upload an image with JPEG, JPG, or JFIG extension",
                accept: "Please upload a valid image file with JPEG, JPG, or JFIG extension",

            }
        },
        submitHandler: function(form) {
            // If the form is valid, you can proceed with form submission
            form.submit();
        }
    });
});
</script>
</html>

<?php
include('include/conn.php');


$room_type = $_POST['rname'];
$price = $_POST['price'];
$offer = $_POST['offer'];
$description = $_POST['a_d'];
$image = $_POST['f1']; 
$room_type_query = "INSERT INTO room_type (room_type, price, offers, `description`, f1) 
                    VALUES ('$room_type', '$price', '$offer', '$description', '$image')";

if (mysqli_query($conn, $room_type_query)) {
    ?>
    <script>
        alert('Data inserted successfully into room_type table');
    </script>
    <?php
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

