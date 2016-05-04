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
        <li class="active"><a href="wishList.php">Wish List</a></li>
        <li><a href="orderHistory.php">Order History</a></li>
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
  <h3>Wish List</h3>
  <div class="row">
    <div class="col-sm-12">
    <form method = "post">
     <!-- <a href="#" class="btn btn-default">
     <span class="glyphicon glyphicon-search"></span> Search
     </a> -->
      <p><br>Flight Name&nbsp;&nbsp;<input type="text" id="flightName" name="flightName">&nbsp;&nbsp;Date&nbsp;&nbsp;<input type="date" id="flightDate" name="flightDate">&nbsp;&nbsp;Passengers&nbsp;&nbsp;<input type="text" id="flightSeats" name="flightSeats">&nbsp;&nbsp;<input type="submit" value="Confirm Reservation" name="confirm"></p>
      </form>

      <?php
 session_start();
 if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to see the wishList'); window.location.href='userLogin.php';</script>";

//header('Location:userLogin.php');
 }
 else{
if (true) {
  
// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "$flightNumber";
$sesemail = $_SESSION['email_id'];


$query=mysqli_query($con,"SELECT * FROM Wish_list WHERE Email_id = '$sesemail'"); //Get email id from Active session
$numrows = mysqli_num_rows($query);

if ($numrows >0) {


  echo "<div class=\"row\">";
    echo "<div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>Flight Name</strong></p>
    </div>
    <div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>Date</strong></p>
    </div>
    <div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>Seats</strong></p>
    </div>";
    // output data of each row
  
    while($row = $query->fetch_assoc()) {
      echo "<div class=\"row\">";
    echo "<div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>".$row["Flight_name"]."</strong></p>
    </div>
    <div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>".$row["Date"]."</strong></p>
    </div>
    <div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>".$row["Passenger_count"]."</strong></p>
    </div>";
    echo "</div>";
    }
  
  
} else {
    echo "Nothing found in the Wish List";
    $conn->close(); 

  //echo $user_id;
}
}
else
    echo $form;
}
?>

<?php
session_start();
if (($_POST['confirm'])) {
  if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to make the reservation');</script>";
//header('Location:userLogin.php');
 }
  else{
    $flightName=$_POST['flightName'];
    $flightDate = $_POST['flightDate'];
    $flightSeats = $_POST['flightSeats'];

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query=mysqli_query($con,"SELECT * FROM Wish_list WHERE Flight_name = '$flightName' AND Date = '$flightDate' AND Passenger_count = '$flightSeats'");
$numrows = mysqli_num_rows($query);
//echo "$numrows";

if ($numrows >0) {
    // output data of each row
$query = mysqli_query($con,"SELECT * from Flights WHERE Flight_name = '$flightName' AND Date = '$flightDate' AND Available_seats >= '$flightSeats'");
$numrows = mysqli_num_rows($query);
if($numrows >0){
  $sesemail = $_SESSION['email_id']; 
  $row=mysqli_fetch_assoc($query);

  $flightSource= $row['Source'];
  $flightDest= $row['Destination'];
  $flightFare= $row['Price'];
  $flightCharges = $flightSeats * $flightFare;

  mysqli_query($con,"INSERT INTO ORDERS(Email_id , Source , Destination , Depart_date , Source_flight , Charges , Active, Seats) values('$sesemail' , '$flightSource' , '$flightDest' ,'$flightDate' , '$flightName' , '$flightCharges' , 'Active' , '$flightSeats')"); //add to orders
  mysqli_query($con,"DELETE FROM Wish_list WHERE Flight_name = '$flightName' AND Date = '$flightDate' AND Passenger_count = '$flightSeats'"); //delete from wishlist
  mysqli_query($con,"UPDATE Flights SET Available_seats = Available_seats-'$flightSeats' WHERE Flight_name = '$flightName' AND Date = '$flightDate'"); //update seats

  echo "<script>alert('Seats reservation successful!!'); window.location.href='orderHistory.php';</script>";
}
else{
  echo "Lesser number of seats available than required";
    $con->close(); 
}

} else {
    echo "Entered details incorrect";
    $con->close(); 

  //echo $user_id;
}

  }
}
else{
  echo $form;
}
?>


    </div>
  </div>
</div>



<!-- Footer -->
<!-- <footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="http://www.w3schools.com">www.w3schools.com</a></p> 
</footer> -->

</body>
</html>
