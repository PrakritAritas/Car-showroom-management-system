<?php
// signin.php

// Start the session
session_start();

// Connect to the database
require_once('DBconnect.php');

// Check if the form is submitted
if (isset($_POST['fname']) && isset($_POST['pass'])) {
    $u = $_POST['fname'];
    $p = $_POST['pass'];

    // Write the query to check if the username and password exist in the database
    $sql = "SELECT * FROM user WHERE username = '$u' AND Password = '$p'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if it returns a non-empty set
    if (mysqli_num_rows($result) != 0) {
        // Store user information in the session
        $_SESSION['username'] = $u;

        // Redirect to the home page
        header("Location: home.php");
        exit();
    } else {
        // Display an error message
        $error_message = "Username or Password is wrong";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Display the login form -->
<form action="signin.php" method="post">
    <!-- ... Your existing form fields ... -->
    <input type="submit" value="Login">
</form>

<?php
// Display error message if login failed
if (isset($error_message)) {
    echo "<p>$error_message</p>";
}
if(isset($_POST['signup'])){
    header("Location: registration.php");
    exit();
}
?>
