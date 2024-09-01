<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_showroom";

//creating connection

$conn = new mysqli($servername, $username, $password);

//check connection

if($conn->connect_error){
	die("Connection failed: " . $connect->connect_error);

}
else{
	mysqli_select_db($conn, $dbname);
	//echo "Connection Successful\r\n";
	//echo "\n";
}
?>
