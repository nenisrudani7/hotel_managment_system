<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
include_once('../admin/include/conn.php');
session_start();
?>

<script>
    // function startTimer(duration, display) {
    //     var timer = duration,
    //         minutes, seconds;
    //     setInterval(function() {
    //         minutes = parseInt(timer / 60, 10);
    //         seconds = parseInt(timer % 60, 10);

    //         minutes = minutes < 10 ? "0" + minutes : minutes;
    //         seconds = seconds < 10 ? "0" + seconds : seconds;

    //         display.textContent = minutes + ":" + seconds;

    //         if (--timer < 0) {
    //             timer = 0;
    //             enable_reset_btn(); // Call this function when timer expires
    //         }
    //     }, 1000);
    // }

    // window.onload = function() {
    //     var oneMinute = 60,
    //         display = document.getElementById('timer'); // Removed '#' from getElementById

    //     startTimer(oneMinute, display);
    // };

    // function enable_reset_btn() {
    //     document.getElementById("r_btn").disabled = false;
    // }
    function startTimer(duration, display) {
    var timer = duration;
    setInterval(function() {
        var seconds = timer % 60;

        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = "00:" + seconds;

        if (--timer < 0) {
            timer = 0;
            enable_reset_btn(); // Call this function when timer expires
        }
    }, 1000); // Interval set to 1000ms (1 second)
}

window.onload = function() {
    var twentySeconds = 20;
    var display = document.getElementById('timer'); // Assuming you have an element with id="timer"

    startTimer(twentySeconds, display);
};

function enable_reset_btn() {
    var resetBtn = document.getElementById("r_btn");
    if (resetBtn) {
        resetBtn.disabled = false;
    }
}


</script>

<div class="container">
    <div class="col-lg-6 form-container">
        <h2 class="text-center mb-4">OTP Verification</h2>
        <form action="Forget_password_otp_action.php" method="post" id="form1">
            <div class="form-group">
                <label for="otp1">Enter OTP:</label>
                <input type="number" class="form-control" id="otp1" name="otp">
                <span id="otp_err"></span>
                <div class="text-center">OTP will expire in <span id="timer">01:00</span></div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Verify OTP" name="btn" />
                <a href="resend_otp.php" class="btn btn-secondary">
                    <input type="button" class="btn btn-success" value="Resend OTP" name="resend_btn" id="r_btn" disabled />
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
