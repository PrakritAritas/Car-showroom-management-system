<?php
session_start();
//connect to the DB
require_once('DBconnect.php');

//check inputs are not empty
if(isset($_POST['email']) && isset($_POST['date']) && isset($_POST['cModel']) && isset($_POST['cci']) && isset($_POST['name']) && isset($_POST['phoneno'])){

    // write to check if the queries exist:
    $e = $_POST['email'];
    $d = $_POST['date'];
    $m = $_POST['cModel'];
    $c = $_POST['cci'];
    $n = $_POST['name'];
    $p = $_POST['phoneno'];

    $sql = " INSERT INTO `booking`(`email`, `date`, `cModel`, `cci`, `name`, `phoneno`) VALUES ('$e','$d','$m','$c','$n','$p') ";


    //Execute the query:
    $result = mysqli_query($conn, $sql);

    //check if this insertion is happening in the DB:
    if(mysqli_affected_rows($conn)){
        echo "Booking Successful.";
    }
    else{
        echo "Booking Failed.";
    }
}


?>
