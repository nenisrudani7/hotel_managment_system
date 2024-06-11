<?php
session_start();
include_once("../admin/include/conn.php");

if (isset($_POST['lgn_btn'])) {
    $em = $_POST['email'];
    $pwd = $_POST['password'];

    $q = "SELECT * FROM  register where email='$em' and password='$pwd'";
    $result = mysqli_query($conn, $q);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        while ($a = mysqli_fetch_assoc($result)) {
            $status = $a["status"];
            if ($status == "active") {
                $role = $a["role"];
                if ($role == "admin") {
                    $_SESSION['admin_uname'] = $em;
?>
                    <script>
                        window.location.href = "http://localhost/hotel_managment_system1/admin/index.php";
                    </script>
                <?php
                } else {
                    $_SESSION['user_uname'] = $em;
                ?>
                    <script>
                        window.location.href = "http://localhost/hotel_managment_system1/hotel.php";
                    </script>
                <?php
                }
            } else {
                // echo " no ";
                setcookie("error", "Account is not activated. Kindly activate your account by clicking on the activation link sent to your email address.", time() + 2, "/");
                ?>
                <script>
                    window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
                </script>
        <?php
            }
        }
    } else {
        // echo " count 0 ";
        setcookie("error", "Incorrect username or password", time() + 2, "/");
        ?>
        <script>
            window.location.href = "http://localhost/hotel_managment_system1/gust/hotel1.php";
        </script>
<?php
    }
}   