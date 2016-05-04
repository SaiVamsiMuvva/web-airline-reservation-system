<?php
session_start();
	if (($_POST['Login'])) {
		$user=$_POST['UserEmail'];
		$password=$_POST['Password'];
		//$permission=$_POST['permissions'];
		if($user && $password){
			//require("connect.php");
			//echo "$password";
			$con=mysqli_connect("localhost", "root", "root","Airline");
			$query=mysqli_query($con,"SELECT * FROM User WHERE Email_id ='$user'");
			$numrows=mysqli_num_rows($query);
			if($numrows==1){
				$row=mysqli_fetch_assoc($query);
				
        $dbusername= $row['User_name'];
				$dbuseremail= $row['Email_id'];
				$dbpass= $row['Password'];
				
				if($password==$dbpass){
					
						 $_SESSION['email_id']=$dbuseremail;
						
						 //$_SESSION['userid']=$dbuserid;
						
						
						header('Location:showFlights.php');
						//echo "<script>alert('I am here!');</script>";
					
						
				}
				else
					echo "<script>alert('Password is Incorrect');</script>";
			}
			else
				echo "<script>alert('User doesnot Exist!!');</script>";
			mysqli_close($con);
		}
		else
			echo "<script>alert('Username or Password fields are missing');</script>";
	}
	else
		echo $form;
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
        <li class="dropdown active">
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

<!-- div class="container-fluid bg-3 text-center" style="padding-top: 150px;
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
  <h3>Login</h3><br>
  <div class="row">
    <div class="col-sm-12">

    <form method="post">
    <p>Email id&nbsp;&nbsp;<input type="email" name="UserEmail" id="UserEmail" required></p>
    <p>Password&nbsp;&nbsp;<input type="password" name="Password" id="Password" required></p>
    <p><br><input type="submit" value="Login" name="Login"></p>
    </form>

    </div>
  </div>
</div>


<!-- Footer -->
<!-- <footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="http://www.w3schools.com">www.w3schools.com</a></p> 
</footer> -->

</body>
</html>
