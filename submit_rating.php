<?php session_start();?>        
<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "admin1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Form Submission
if (isset($_POST["rating_data"], $_POST["user_name"], $_POST["user_review"])) {
    $user_name = $_POST["user_name"];
    $user_review = $_POST["user_review"];
    $user_rating = $_POST["rating_data"];
    $room_type_id = $_POST["room_type_id"]; // Assuming room_type_id is passed via POST

    // Prepare SQL statement
    $query = "INSERT INTO review_table (user_name, room_id, user_rating, user_review, datetime) VALUES (?, ?, ?, ?, NOW())";
    $statement = mysqli_prepare($conn, $query);

    // Bind parameters and execute
    mysqli_stmt_bind_param($statement, "siss", $user_name, $room_type_id, $user_rating, $user_review);
    
    if (mysqli_stmt_execute($statement)) {
        echo "Your Review & Rating Successfully Submitted";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($statement);
}

// Function to fetch reviews for a specific room_id
function getReviewsForRoom($conn, $room_id) {
    $response = array();

    // Calculate average rating and total reviews for a specific room_id
    $query = "SELECT AVG(user_rating) AS average_rating, COUNT(*) AS total_review,
              SUM(user_rating = 5) AS five_star_review,
              SUM(user_rating = 4) AS four_star_review,
              SUM(user_rating = 3) AS three_star_review,
              SUM(user_rating = 2) AS two_star_review,
              SUM(user_rating = 1) AS one_star_review
              FROM review_table
              WHERE room_id = ?";
    $statement = mysqli_prepare($conn, $query);

    if ($statement) {
        mysqli_stmt_bind_param($statement, "i", $room_id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $response['average_rating'] = round($row['average_rating'], 1);
            $response['total_review'] = $row['total_review'];
            $response['five_star_review'] = $row['five_star_review'];
            $response['four_star_review'] = $row['four_star_review'];
            $response['three_star_review'] = $row['three_star_review'];
            $response['two_star_review'] = $row['two_star_review'];
            $response['one_star_review'] = $row['one_star_review'];
        }

        // Fetch review data for a specific room_id
        $query_reviews = "SELECT user_name, user_rating, user_review, datetime FROM review_table WHERE room_id = ? ORDER BY datetime DESC";
        $statement_reviews = mysqli_prepare($conn, $query_reviews);

        if ($statement_reviews) {
            mysqli_stmt_bind_param($statement_reviews, "i", $room_id);
            mysqli_stmt_execute($statement_reviews);
            $result_reviews = mysqli_stmt_get_result($statement_reviews);

            if ($result_reviews && mysqli_num_rows($result_reviews) > 0) {
                $reviews_data = array();
                while ($row_review = mysqli_fetch_assoc($result_reviews)) {
                    $reviews_data[] = $row_review;
                }
                $response['review_data'] = $reviews_data;
            }
        }

        mysqli_stmt_close($statement_reviews);
    }

    mysqli_stmt_close($statement);

    return $response;
}

// Example usage: Fetch reviews for room_id = 8
$room_id =  $_SESSION['current_room_id']; // Specify the room_id for which you want to fetch reviews
$roomReviews = getReviewsForRoom($conn, $room_id);

// Output JSON response
echo json_encode($roomReviews);

mysqli_close($conn);
?>
