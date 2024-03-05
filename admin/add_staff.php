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
    <style>
        .error{
            color:red;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <?php include('include/aside.php') ?>
        <div class="main">
            <?php include('include/nav.php') ?>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h2>Add Staff</h2>
                    </div>
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-md-12">
                            <form action="add_staff.php" method="post" id="add_staff" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="salary" name="salary" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            // Define custom validation method for address
            $.validator.addMethod("validAddress", function (value, element) {
                var regex = /^[a-zA-Z0-9,\s-]+$/;
                return regex.test(value);
            }, "Please enter a valid address");

            $.validator.addMethod("emailregex", function (value, element) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("noDigits", function (value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Digits are not allowed.");

            // Apply validation to the form
            $("#add_staff").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        emailregex: true
                    },
                    phone: {
                        required: true,
                        digits: true
                    },
                    address: {
                        required: true,
                        validAddress: true
                    },
                    salary: {
                        required: true,
                        number: true
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        emailregex: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits"
                    },
                    address: {
                        required: "Please enter your address",
                        validAddress: "Please enter a valid address"
                    },
                    salary: {
                        required: "Please enter the salary",
                        number: "Please enter a valid number"
                    },
                    image: {
                        required: "Please select an image file",
                        extension: "Please upload an image file of type: JPG, JPEG, PNG"
                    }
                }
            });
        });
    </script>
</body>

</html>
