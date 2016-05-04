<?php
session_start();
if(($_POST['Add_Flight'])){
    header('Location:addFlight.php');
  }

  else if(($_POST['Delete_Flight'])){
    header('Location:deleteFlight.php');
  }

  else if(($_POST['Update_Seats'])){
    header('Location:updateSeats.php');
  }
  else{
    echo $form;
  }
  ?>

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
  <h3>Manage Flights(Admin)</h3><br>
  <div class="row">
    <div class="col-sm-12">

    <form method="post">
    <p><input type="submit" value="View Flights" name="View_Flights"></p>
    <p><input type="submit" value="Add Flight" name="Add_Flight"></p>
    <p><input type="submit" value="Delete Flight" name="Delete_Flight"></p>
    <p><input type="submit" value="Update Seats" name="Update_Seats"></p>
    </form>

    <?php
session_start();
  if (($_POST['View_Flights'])) {

// Create connection
$con=mysqli_connect("localhost", "root", "root","Airline");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query=mysqli_query($con,"SELECT * FROM Flights");
$numrows = mysqli_num_rows($query);

if ($numrows >0) {
    // output data of each row
  
  echo " <h3>All Flights</h3><br>";

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
    </div> ";
    echo "</div>";
    }
  
  
} else {
    echo "0 results";
    $conn->close(); 

  //echo $user_id;
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
