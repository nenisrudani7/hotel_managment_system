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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="wrapper">
        <?php include ('include/aside.php') ?>
        <div class="main">
            <?php include ('include/nav.php') ?>
            <main class="content px-3 py-2">
            <?php
            // Assuming the connection is already established
            include_once ('include/conn.php');
            $sql = "SELECT * FROM register WHERE role = 'user'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";

                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["password"]."</td>
                            <td>".$row["status"]."</td>
                            <td>".$row["date"]."</td>
                            <td>
                                <a href='action_user_profile.php?id=".$row["id"]."' class='btn btn-primary'>Edit</a>
                                <a href='delete_user_action.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "0 results";
            }
        ?>

             
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
</body>

</html>
