<?php
// registration.php

// Start the session
session_start();

// Connect to the database
require_once('DBconnect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input (you may need more robust validation)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Write the query to insert a new user into the 'user' table
    $insert_query = "INSERT INTO user (username, password, name, email_address) 
                    VALUES ('$username', '$password', '$name', '$email')";

    // Execute the query
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        // Registration successful
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        // Display an error message
        $error_message = "Registration failed. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style type="text/css">
        html {
            background-color: #56baed;
        }

        body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
        }

        a {
            color: #000;
            display: inline-block;
            text-decoration: none;
            font-weight: 400;
        }

        h2 {
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            margin: 40px 8px 10px 8px;
            color: #cccccc;
        }

        /* STRUCTURE */
        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
        }

        #formContent {
            border-radius: 10px;
            background: #f2ae00;
            padding: 30px;
            width: 90%;
            max-width: 450px;
            position: relative;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            text-align: center;
        }

        /* FORM TYPOGRAPHY*/
        input[type=button], input[type=submit], input[type=reset] {
            background-color: #000;
            border: none;
            color: white;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            border-radius: 5px;
            margin: 5px 20px 40px 20px;
            transition: all 0.3s ease-in-out;
        }

        input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover {
            background-color: #aba9a2;
            color: #000;
        }

        input[type=button]:active, input[type=submit]:active, input[type=reset]:active {
            transform: scale(0.95);
        }

        input[type=text], input[type=password], input[type=name], input[type=email] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size:             16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            border-radius: 5px;
            transition: all 0.5s ease-in-out;
        }

        input[type=text]:focus, input[type=password]:focus, input[type=name]:focus, input[type=email]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=text]::placeholder, input[type=password]::placeholder, input[type=name]::placeholder, input[type=email]::placeholder {
            color: #cccccc;
        }

        /* ANIMATIONS */

        /* Simple CSS3 Fade-in-down Animation */
        .fadeInDown {
            animation-name: fadeInDown;
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                transform: none;
            }
        }

        /* Simple CSS3 Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fadeIn {
            opacity: 0;
            animation: fadeIn ease-in 1;
            animation-fill-mode: forwards;
            animation-duration: 1s;
        }

        .fadeIn.first {
            animation-delay: 0.4s;
        }

        .fadeIn.second {
            animation-delay: 0.6s;
        }

        .fadeIn.third {
            animation-delay: 0.8s;
        }

        .fadeIn.fourth {
            animation-delay: 1s;
        }

        /* Simple CSS3 Fade-in Animation */
        .underlineHover:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #56baed;
            content: "";
            transition: width 0.2s;
        }

        .underlineHover:hover {
            color: #0d0d0d;
        }

        .underlineHover:hover:after {
            width: 100%;
        }

        /* OTHERS */

        *:focus {
            outline: none;
        }

        #icon {
            width: 60%;
        }
    </style>
</head>
<body>

<!-- Display the registration form -->
<div class="wrapper">
    <div id="formContent">
        <form action="registration.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required class="fadeIn second">

            <label for="password">Password:</label>
            <input type="password" name="password" required class="fadeIn third">

            <label for="name">Full Name:</label>
            <input type="text" name="name" required class="fadeIn third">

            <label for="email">Email Address:</label>
            <input type="email" name="email" required class="fadeIn third">

            <input type="submit" value="Sign Up" class="fadeIn fourth">
        </form>

        <!-- Display error message if registration failed -->
        <?php
        if (isset($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</div>

</body>
</html>

