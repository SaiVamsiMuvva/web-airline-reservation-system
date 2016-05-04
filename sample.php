<?php
session_start();
	if (($_POST['Create_Account'])) {
		$userName=$_POST['UserName'];
    $email = $_POST['Email'];
		$password1=$_POST['Password1'];
    $password2=$_POST['Password2'];
		//$permission=$_POST['permissions'];
		if($password1==$password2) {
      //echo "<script>alert('I am here second!');</script>";
			//require("connect.php");
			//echo "$password";
			$con=mysqli_connect("localhost", "root", "root","Airline");
			$query=mysqli_query($con,"SELECT * FROM User WHERE Email_id = '$email'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0){
        //echo "<script>alert('$password1');</script>";
        mysqli_query($con,"INSERT into User values('$userName' , '$email' , '$password1')");

				// $row=mysqli_fetch_assoc($query);
				
    //     $dbadminname= $row['Admin_name'];
				// $dbadminemail= $row['Email_id'];
				// $dbpass= $row['Password'];
				
				// if($password==$dbpass){
					
						// $_SESSION['username']=$dbusername;
						
						// $_SESSION['userid']=$dbuserid;
						
						header('Location:showFlights.php');
					
						
				}
			// 	else
			// 		echo "<script>alert('Password is Incorrect');</script>";
			// }
			else
				echo "<script>alert('Account already Exists!!');</script>";
			mysqli_close($con);
		}
		else
			echo "<script>alert('Password fields don't match);</script>";
	}
	else
		echo $form;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
	<script src="jquery-1.9.1.min.js"></script>
	<script src="validate.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="validate.css">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
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
        <li class="active"><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
  
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Sign UP for Movie Rating System</h1>
				<form class="form-horizontal" role="form" method="post" action="sample.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="pass" class="col-sm-2 control-label">Password1</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							<?php echo "<p class='text-danger'>$errPassword</p>";?>
						</div>
					</div>
					
				
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Password2</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							<?php echo "<p class='text-danger'>$errPassword</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="SIGN UP" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>