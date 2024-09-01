<?php
// home.php

// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: signin.php"); // Change to your actual login page
    exit();
}
?>
<!doctype html>
<html>
  <head>
    <title>Car Showroom</title>
  </head>
  <style type="text/css">
    #header{
        background-color: #000000;
        height: 60px;
        font-family: fantasy;
        padding: 10px;
    }

    #menu_bar{
        padding: 8px;
        float: right;
    }

    #menu_buttons{
        width: 100px;
        height: 20px;
        text-align: center;
        border-radius: 4px;
        display: inline-block;
        margin: 2px;
        background-color: #facb52;
        font-family: tahoma;
        font-weight: bold;
    }

    #pic1{
        width: 100%;
        height: 750px;
        background-image: url('bumblebee.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        border: 2px solid #ffcd36;

    }

    .bg1 {

        position: relative;
        width: 100%;
    }

    .bg1 .btn{

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: #ffcd36;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    .bg1 .btn2{

        position: absolute;
        top: 57%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: #ffcd36;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    .bg1 .btn:hover {
        background-color: black;
    }
    .bg1 .btn2:hover {
        background-color: black;
    }

  </style>
  <body style="background-color: #ffcd36">
	<!== menu bar ==>
	<section id = "header">
        <div class = "row">
            <div class ="col-md-2" style="font-size: 30px;color:#f2ae00;">Car Showroom</div>
            <div id="menu_bar" class ="col-md-10" style="text-align: right">
                <div id="menu_buttons"><a href="home.php">HOME</a></div>
                <div id="menu_buttons"><a href="show_cars.php">CARS</a></div>
                <div id="menu_buttons"><a href="search.php">SEARCH</a></div>
                <div id="menu_buttons"><a href="booking.php">BOOKING</a></div>
                <div id="menu_buttons"><a href="inquiries.php">INQUIRIES</a></div>
                <div id="menu_buttons"><a href="logout.php">LOGOUT</a></div>
            </div>
        </div>
    </section>

	<section id = "section1">
		<div class="bg1">
            <div id = "pic1"><img src=""></div>
            <button class="btn" onclick="window.location.href='show_cars.php'">Choose A Car</button>
            <button class="btn2" onclick="window.location.href='inquiries.php'">Drop an Enquiry</button>
        </div>

	</section>




  </body>
</html>
