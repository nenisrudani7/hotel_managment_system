<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel Entries</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your custom styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Hotel Entries</h1>
        <div class="mb-3">
            <a href="add_hotel_carousle.php" class="btn btn-success">Add New Entry</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Caption Heading</th>
                        <th>Caption Text</th>
                        <th>Image Path</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../include/conn.php";

                    $sql = "SELECT * FROM hotel_main_page";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['caption_heading']; ?></td>
                            <td><?php echo $row['caption_text']; ?></td>
                            <td><img src="../<?php echo $row['image_path']; ?>" width="100px" height="100px" alt=""></td>
                            <td>
                                <form method="POST" action="edit_hotel_carousle.php" style="display: inline;">
                                <a href="edit_hotel_carousle.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                </form>
                                <button type="button" class="btn btn-danger" onclick="deleteEntry(<?php echo $row['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function deleteEntry(id) {
            if (confirm("Are you sure you want to delete this entry?")) {
                window.location.href = "delete_hotel_carousle.php?id=" + id;
            }
        }
    </script>
</body>
</html>
