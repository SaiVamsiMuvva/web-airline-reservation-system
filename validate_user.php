<?php  
// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$email = $_REQUEST["email"];

//alert($name);
if($email)
{
$sql="SELECT * FROM User WHERE Email_id = '".$email."'";
$result = $conn->query($sql);
}



if ($result->num_rows > 0) {
    echo "no";
} else {
    echo "ok";
}

$conn->close();
?>