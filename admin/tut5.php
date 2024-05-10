<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="tut5.php" method="post" enctype="multipart/form-data">
        Product Name: <input type="text" name="pn" id="pn"><br><br>
        Product Description: <input type="text" name="pd" id="pd"><br><br>
        Product Price: <input type="text" name="pp" id="pp"><br><br>
        Product Quantity: <input type="text" name="qty" id="qty"><br><br>
        Product Category:
        <select name="category" id="category">
            <option value="a" selected>a</option>
            <option value="b">b</option>
            <option value="c">c</option>
        </select><br><br>
        Product Image: <input type="file" id="profile_pic" name="profile_pic"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>


</body>

</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "jess");

if (isset($_POST['submit'])) {
    $p_name = $_POST['pn'];
    $p_desc = $_POST['pd'];
    $p_price = $_POST['pp'];
    $p_qty = $_POST['qty'];
    $p_cat = $_POST['category'];
    $profile_pic = $_FILES['profile_pic']['name'];

    $sql = "INSERT INTO product_master (p_name, p_desc, p_price, p_qty, p_cat, p_img) VALUES ('$p_name', '$p_desc', '$p_price', '$p_qty', '$p_cat', '$profile_pic')";

    if (mysqli_query($conn, $sql)) {
        if (!is_dir('profile_pictures')) {
            mkdir("profile_pictures");
        }
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "profile_pictures/" . $profile_pic);
        echo "Registration successfull";
    } else {
        echo "error in registration: " . mysqli_error($conn);
    }
}

$q1 = "select * from product_master ";
$res = mysqli_query($conn, $q1);
?>
<table border="1">
    <thead>
        <th>p_id</th>
        <th>p_name</th>
        <th>p_desc</th>
        <th>p_price</th>
        <th>p_qty</th>
        <th>q_img</th>
        <th>date</th>
        <th>delete</th>
    </thead>
    <?php
    while ($r = mysqli_fetch_array($res)) {
    ?>



        <tbody>
            <tr>
                <?php
                echo "<td>" . $r['p_id'] . "</td>";
                echo "<td>" . $r['p_name'] . "</td>";
                echo "<td>" . $r['p_desc'] . "</td>";
                echo "<td>" . $r['p_price'] . "</td>";
                echo "<td>" . $r['p_qty'] . "</td>";
                echo "<td>" . $r['p_cat'] . "</td>";
                ?>
                <td><img src="<?php echo 'profile_pictures/' . $r['p_img'] ?>"></td>
                <?php
                echo "<td>" . $r['date'] . "</td>";
                ?>
                <td> <a href="delete.php?em=<?php echo $r['p_id']; ?>"> <input type="button" value="Delete"> </a></td>  
                              
            </tr>
        </tbody>

    <?php
    }
    ?>