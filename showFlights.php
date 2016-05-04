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
  <script src ="selectRow.js"></script>
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
        <li class="active"><a href="showFlights.php">Flights</a></li>
        <li><a href="trackFlights.php">Track Flights</a></li>
        <li><a href="manageTrip.php">Manage Trip</a></li>
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
  <h3>Flight Search</h3>
  <div class="row">
    <div class="col-sm-12">
    <form method = "post">
    <p><input type="radio" name="trip" value="Round Trip" checked> Round Trip&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="radio" name="trip" value="One Way"> One Way</p>
      <p>From
      <select name="FromPlace">
      <option value="Austin">Austin</option>
      <option value="Chicago">Chicago</option>
      <option value="Dallas">Dallas</option>
      <option value="New York">New York</option>
      <option value="Los Angeles">Los Angeles</option>
      <option value="San Francisco">San Francisco</option>
      <option value="San Antonio">San Antonio</option>
      </select>&nbsp;&nbsp;Departure Date&nbsp;&nbsp;<input type="date" value = "departDate" name = "departDate" /></p>

      <p>To
      <select name="ToPlace">
      <option value="San Francisco">San Francisco</option>
      <option value="Chicago">Chicago</option>
      <option value="Dallas">Dallas</option>
      <option value="New York">New York</option>
      <option value="Los Angeles">Los Angeles</option>
      <option value="Austin">Austin</option>
      <option value="San Antonio">San Antonio</option>
      </select>&nbsp;&nbsp;Return Date&nbsp;&nbsp;<input type="date" value = "returnDate" name = "returnDate" /></p>

      <p>Passengers&nbsp;&nbsp;
      <select name="PassengerCount">
      <option value="One">1</option>
      <option value="Two">2</option>
      <option value="Three">3</option>
      <option value="Four">4</option>
      <option value="Five">5</option>
      <option value="Six">6</option></select></p>

     <!-- <a href="#" class="btn btn-default">
     <span class="glyphicon glyphicon-search"></span> Search
     </a> -->
      <p><br><input type="submit" value="Search" name="Search">&nbsp;&nbsp;<input type="submit" value="Filter Search on fare" name="Filter"></p>
      <p><br>Flight Name&nbsp;&nbsp;<input type="text" id="flightName" name="flightName">&nbsp;&nbsp;Date&nbsp;&nbsp;<input type="date" id="flightDate" name="flightDate">&nbsp;&nbsp;Passengers&nbsp;&nbsp;<input type="text" id="flightSeats" name="flightSeats">&nbsp;&nbsp;<input type="submit" value="Add To WishList" name="addWish"></p>
      </form>
      <?php
// session_start();
if (($_POST['Search'])) {
    $fromPlace=$_POST['FromPlace'];
    $toPlace = $_POST['ToPlace'];
    $departDate=$_POST['departDate'];
    $passengers=$_POST['PassengerCount'];

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$query=mysqli_query($con,"SELECT * FROM Flights WHERE Source = '$fromPlace' AND Destination = '$toPlace' AND Date = '$departDate' AND Available_seats >= '$passengers' AND (Date >= CURDATE())");
$numrows = mysqli_num_rows($query);

if ($numrows >0) {
    // output data of each row

  
  echo " <h3>Flight results matching your search</h3>";

  echo "<div class=\"row\">";
    echo "<div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Flight Name</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Source</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Destination</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Date</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Fare</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Available Seats</strong></p>
    </div>";

  
    while($row = $query->fetch_assoc()) {
      echo "<div class=\"row\">";
    echo "<div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Flight_name"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Source"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Destination"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Date"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Price"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Available_seats"]."</strong></p>
    </div>";

    echo "</div>";
    }
  
  
} else {
    echo "0 results";
    $con->close(); 

  //echo $user_id;
}
}
else{
  echo $form;
}
?>

<?php
// session_start();
if (($_POST['Filter'])) {
    $fromPlace=$_POST['FromPlace'];
    $toPlace = $_POST['ToPlace'];
    $departDate=$_POST['departDate'];
    $passengers=$_POST['PassengerCount'];

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$query=mysqli_query($con,"SELECT * FROM Flights WHERE Source = '$fromPlace' AND Destination = '$toPlace' AND Date = '$departDate' AND Available_seats >= '$passengers' ORDER BY Price");
$numrows = mysqli_num_rows($query);

if ($numrows >0) {
    // output data of each row

  
  echo " <h3>Flight results matching your search</h3>";

  echo "<div class=\"row\">";
    echo "<div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Flight Name</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Source</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Destination</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Date</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Fare</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>Available Seats</strong></p>
    </div>";

  
    while($row = $query->fetch_assoc()) {
      echo "<div class=\"row\">";
    echo "<div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Flight_name"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Source"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Destination"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Date"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Price"]."</strong></p>
    </div>
    <div class=\"col-sm-2\">
      <p class=\"text-center\"><strong>".$row["Available_seats"]."</strong></p>
    </div>";

    echo "</div>";
    }
  
  
} else {
    echo "0 results";
    $con->close(); 

  //echo $user_id;
}
}
else{
  echo $form;
}
?>


<?php
session_start();
if (($_POST['addWish'])) {
  if(!($_SESSION['email_id'])){
echo "<script>alert('Please Login to add to the wishList');</script>";
//header('Location:userLogin.php');
 }
  else{
    $wishFlightName=$_POST['flightName'];
    $wishFlightDate = $_POST['flightDate'];
    $wishSeats = $_POST['flightSeats'];

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$query=mysqli_query($con,"SELECT * FROM Flights WHERE Flight_name = '$wishFlightName' AND Date = '$wishFlightDate'");
$numrows = mysqli_num_rows($query);

if ($numrows >0) {
    // output data of each row
$sesemail = $_SESSION['email_id']; 
mysqli_query($con,"INSERT into Wish_list values('$sesemail', '$wishFlightName' , '$wishFlightDate' , '$wishSeats')");
echo "<script>alert('Added to cart'); window.location.href='wishList.php';</script>";

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
