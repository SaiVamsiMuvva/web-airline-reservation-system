<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comet Airlines</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Comet Airlines</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="showFlights.php">Flights</a></li>
        <li><a href="trackFlights.php">Track Flights</a></li>
        <li><a href="manageTrip.php">Manage Trip</a></li>
        <li><a href="wishList.php">Wish List</a></li>
        <li class="active"><a href="orderHistory.php">Order History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <span class="glyphicon glyphicon-log-in"></span></a>
          <ul class="dropdown-menu">
            <li><a href="userLogin.php">User Login</a></li>
            <li><a href="adminLogin.php">Admin Login</a></li>
            <li><a href="logOut.php">LogOut</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<<!-- div class="container-fluid bg-3 text-center" style="padding-top: 150px;
      padding-bottom: 30px;"> 
  <h3>Where To Find Me?</h3>
  <div class="row">
    <div class="col-sm-4">
      <p>Lorem ipsum..</p>
      <img src="birds1.jpg" alt="Image">
    </div>
    <div class="col-sm-4">
      <p>Lorem ipsum..</p>
      <img src="birds2.jpg" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum..</p>
      <img src="birds3.jpg" alt="Image">
    </div>
  </div>
</div> -->


<div class="container-fluid bg-3 text-center" style="padding-top: 100px;
      padding-bottom: 30px;"> 
 
 <?php
session_start();
if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to see the Order History'); window.location.href='userLogin.php';</script>";
 }
 else{
if (true) {
  
// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "$flightNumber";
$sesemail = $_SESSION['email_id'];

$query=mysqli_query($con,"SELECT * FROM Orders WHERE Email_id = '$sesemail'"); //Get email id from Active session
$numrows = mysqli_num_rows($query);

if ($numrows >0) {
    // output data of each row
    echo "<h3>Order History</h3>";

    echo "<div class=\"row\">";
    echo "<div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Order id</strong></p>
    </div>
    <div class=\"col-sm-3\">
      <p class=\"text-center\"><strong>Email_id</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Source</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Destination</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Date1</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Flight1</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Date2</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Flight2</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Charges</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>Active</strong></p>
    </div>";
  
    while($row = $query->fetch_assoc()) {
      echo "<div class=\"row\">";
    echo "<div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Order_id"]."</strong></p>
    </div>
    <div class=\"col-sm-3\">
      <p class=\"text-center\"><strong>".$row["Email_id"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Source"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Destination"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Depart_date"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Source_flight"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Return_date"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Dest_flight"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Charges"]."</strong></p>
    </div>
    <div class=\"col-sm-1\">
      <p class=\"text-center\"><strong>".$row["Active"]."</strong></p>
    </div>";
    echo "</div>";
    }
  
  
} else {
    echo "No orders made";
    $conn->close(); 

  //echo $user_id;
}
}
else
    echo $form;
}
?>



<!-- Footer -->
<!-- <footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="http://www.w3schools.com">www.w3schools.com</a></p> 
</footer> -->

</body>
</html>
