<?php
session_start();
$sesemail=$_SESSION['email_id'];
//echo "<script>alert('Please Login to see the wishList');</script>";

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$flight_name=$_REQUEST[flight_name];
$flight_date=$_REQUEST[flight_date];
$passengers=$_REQUEST[passengers];

//$rate=$_REQUEST[r];
$sql = "INSERT INTO Wish_list VALUES('".$sesemail."','".$flight_name."','".$flight_date."','".$passengers."')";
if($con->query($sql)=== TRUE){
	echo "Added to your List!!";
}
else{
	echo "failed";
}

?>