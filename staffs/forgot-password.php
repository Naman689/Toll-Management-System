<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tblstaff where  StaffEmail='$email' and StaffMobilenumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Forgot Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
<div class="login-logo">
    <h2 class="head1"  ><b>Toll Management System</b></h2>
  </div>

  <div class="a">
  <h2 class="form-heading">Forgot Password</h2>
  
	  <form role="form" method="post" action="">
		<p style="margin-top:57px; margin-left:10px; font-size:21px; position: fixed; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <input style="margin-top:90px;  font-size: 1.2rem; margin-bottom:15px; margin-left:30px; width: 84%; font-family: Verdana, Geneva, Tahoma, sans-serif; " type="text" name="email" class="text" placeholder="Email" required="true">
		<input style="margin-top:0px; margin-bottom:15px;margin-left:30px; width: 84%; font-family: Verdana, Geneva, Tahoma, sans-serif; " type="text" name="contactno" class="text" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
		<div class="submit"><input type="submit" class="btnn" value="Reset" name="submit"></div>
		
		<ul class="new">
			<li class="new_left"><p><a href="index.php">Already have an account!!</a></p></li>
			</li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <?php include_once('includes/footer.php');?>
</body>
</html>
