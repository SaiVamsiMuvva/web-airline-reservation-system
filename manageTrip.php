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
        <li class="active"><a href="manageTrip.php">Manage Trip</a></li>
        <li><a href="wishList.php">Wish List</a></li>
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
  <h3>Manage my Trip</h3><br>
  <div class="row">
    <div class="col-sm-12">

    <form method="post">
    <p>Order id&nbsp;&nbsp;<input type="text" name="ManageTripID" required></p>
    <p><input type="submit" value="Get Details" name="Get_Details">&nbsp;&nbsp;<input type="submit" value="Cancel Reservation" name="Cancel"></p>
    </form>

    <?php
session_start();
  if (($_POST['Get_Details'])) {



    if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to manage your booking');</script>";
 }
 else{

    $orderid=$_POST['ManageTripID'];
    $sesemail = $_SESSION['email_id'];
    //$permission=$_POST['permissions'];
      //echo "<script>alert('I am here second!');</script>";
      //require("connect.php");
      //echo "$password";
      $con=mysqli_connect("localhost", "root", "root","Airline");
      // $query1=mysqli_query($con,"SELECT CURDATE()");
      // $row1=mysqli_fetch_assoc($query1);

      $query=mysqli_query($con,"SELECT * FROM Orders WHERE Email_id = '$sesemail' AND Order_id = '$orderid' AND Active = 'Active' AND (Depart_date >= CURDATE())");
      $numrows=mysqli_num_rows($query);
      if($numrows>0){
        echo " <h3>Your Active Bookings</h3><br>";

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

      }
      //  else
      //    echo "<script>alert('Password is Incorrect');</script>";
      // }
      else{
        echo "<script>alert('No matching orders found');</script>";
      }


      mysqli_close($con);
  


}

}

  else{
    echo $form;
  }
?>

<?php
session_start();
if (($_POST['Cancel'])) {
  if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to manage your reservation');</script>";
//header('Location:userLogin.php');
 }
  else{
    $cancelorderid=$_POST['ManageTripID'];
// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query=mysqli_query($con,"SELECT * FROM Orders WHERE Order_id = '$cancelorderid' AND Active = 'Active'");
$numrows = mysqli_num_rows($query);
//echo "$numrows";

if ($numrows >0) {
  $row=mysqli_fetch_assoc($query);
  $addSeats = $row['Seats'];
    // output data of each row
  mysqli_query($con,"UPDATE Flights SET Available_seats=Available_seats+'$addSeats' WHERE Flight_name = '$flightName' AND Date = '$flightDate'");
mysqli_query($con,"UPDATE Orders SET Active = 'Cancelled' WHERE Order_id = '$cancelorderid'");

  //Available_seats

} else {
  echo "Either you don't have the entered order_id or it is not active";
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
