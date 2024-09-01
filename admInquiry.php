<?php
//connect to the DB
require_once('DBconnect.php');

//check inputs are not empty
if(isset($_POST['email']) && isset($_POST['cModel']) && isset($_POST['date']) && isset($_POST['msg']) && isset($_POST['phone_no']) && isset($_POST['city'])){

    // write to check if the queries exist:
    $e = $_POST['email'];
    $m = $_POST['cModel'];
    $d = $_POST['date'];
    $t = $_POST['msg'];
    $p = $_POST['phone_no'];
    $c = $_POST['city'];


    $sql = " INSERT INTO `inquiry`(`email`, `car_model`, `date`,  `inquiry`,  `phone_no`,  `city`) VALUES ('$e','$m','$d','$t','$p','$c') ";


    //Execute the query:
    $result = mysqli_query($conn, $sql);

    //check if this insertion is happening in the DB:
    if(mysqli_affected_rows($conn)){
        echo "Inquiry Successful.";
    }
    else{
        echo "Inquiry Failed.";
    }
}

?>
