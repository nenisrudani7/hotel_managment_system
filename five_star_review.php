<?php session_start();?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .star-light {
            color: #e9ecef;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <h1 class="text-center mt-2 mb-2">Product Rating/Review System</h1>
    </div>
    <div class="container">

        <div class="card">
            <div class="card-header">Sample Product</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "admin1");

                        // Assuming you have a database connection named $conn
                        // Assuming $room_id contains the room ID for which you want to fetch the image
                        $room_id = $_GET['id']; // Example room ID
                        $_SESSION['current_room_id'] = $room_id;
    
                        // SQL query to fetch the image URL for the specific room ID
                        $query = "SELECT image FROM room_type WHERE room_type_id = $room_id";
                        $result = mysqli_query($conn, $query);

                        // Check if the query executed successfully and if it returned any rows
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $image_url = $row['image'];

                            // Output the image tag with the fetched image URL
                            echo "<img src='img/$image_url' alt='phone' width='230'>";
                        } else {
                            // Output a default image or handle the case when no image is found
                            echo "<img src='default_image.jpg' alt='phone' width='230'>";
                        }
                        ?>
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary form-control mt-3">Rate/Review This Product</button>
                    </div>

                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <b><span id="average_rating">0.0</span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                        </div>
                        <h3><span id="total_review">0</span> Review</h3>
                    </div>
                    <div class="col-sm-4">
                        <p>
                        <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                        </div>
                        </p>
                        <p>
                        <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                        </div>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <h3 class="mt-3 ml-4">Product Reviews:</h3>
        <div class="mt-3" id="review_content">

        </div>
    </div>
</body>

</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <label for="">Your Name:</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                </div>
                <div class="form-group">
                    <label for="">Comment:</label>
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    var rating_data = 0;

    $('#add_review').click(function() {
        $('#review_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function() {
        var rating = $(this).data('rating');
        reset_background();
        $('.submit_star').each(function() {
            var current_rating = $(this).data('rating');
            $(this).toggleClass('text-warning', current_rating <= rating);
        });
    });

    $(document).on('click', '.submit_star', function() {
        rating_data = $(this).data('rating');
    });

    $('#save_review').click(function() {
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();

        if (user_name === '' || user_review === '') {
            alert("Please Fill Both Fields");
            return false;
        }

        $.ajax({
            url: "submit_rating.php",
            method: "POST",
            data: {
                rating_data: rating_data,
                user_name: user_name,
                user_review: user_review,
                room_type_id: <?php echo $_GET['id']; ?> // Pass room_type_id to server
            },
            success: function(data) {
                $('#review_modal').modal('hide');
                load_rating_data();
                alert(data);
            }
        });
    });

    load_rating_data();

    function load_rating_data() {
        $.ajax({
            url: "submit_rating.php",
            method: "POST",
            data: {
                action: 'load_data'
            },
            dataType: "JSON",
            success: function(data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                $('.main_star').each(function(index) {
                    $(this).toggleClass('text-warning', (index + 1) <= Math.round(data.average_rating));
                });

                $('#total_five_star_review').text(data.five_star_review);
                $('#total_four_star_review').text(data.four_star_review);
                $('#total_three_star_review').text(data.three_star_review);
                $('#total_two_star_review').text(data.two_star_review);
                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review * 100) + '%');
                $('#four_star_progress').css('width', (data.four_star_review / data.total_review * 100) + '%');
                $('#three_star_progress').css('width', (data.three_star_review / data.total_review * 100) + '%');
                $('#two_star_progress').css('width', (data.two_star_review / data.total_review * 100) + '%');
                $('#one_star_progress').css('width', (data.one_star_review / data.total_review * 100) + '%');

                if (data.review_data && data.review_data.length > 0) {
                    var html = '';
                    $.each(data.review_data, function(index, review) {
                        html += '<div class="row mb-3">';
                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + review.user_name.charAt(0) + '</h3></div></div>';
                        html += '<div class="col-sm-11">';
                        html += '<div class="card">';
                        html += '<div class="card-header"><b>' + review.user_name + '</b></div>';
                        html += '<div class="card-body">';
                        for (var star = 1; star <= 5; star++) {
                            var class_name = (review.user_rating >= star) ? 'text-warning' : 'star-light';
                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }
                        html += '<br />';
                        html += review.user_review;
                        html += '</div>';
                        html += '<div class="card-footer text-right">On ' + review.datetime + '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    });
                    $('#review_content').html(html);
                }
            }
        });
    }

    function reset_background() {
        $('.submit_star').removeClass('text-warning');
    }
});

</script> 