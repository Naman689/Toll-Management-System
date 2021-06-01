<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['ttmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details!!!";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Management System || Admin Login Page</title>

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
    <h2 class="head"  ><b>Toll Management System</b></h2>
  </div>
  <div class="a">
  <h2 class="form-heading"  >Admin login</h2>
  <form method="post">
		<p style="margin-top:57px; margin-left:90px; font-size:21px; position: fixed; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <input style="margin-top:90px;  font-size: 1.2rem; margin-bottom:15px; margin-left:30px; width: 84%; font-family: Verdana, Geneva, Tahoma, sans-serif; " type="text" class="text" name="username" placeholder="Username" required="true">
		<input style="margin-top:0px; margin-bottom:15px;margin-left:30px; width: 84%; font-family: Verdana, Geneva, Tahoma, sans-serif; " type="password" name="password" class="text" placeholder="Password" required="true">
		<div class="submit"><input type="submit" class="btnn"  value="Login" name="login"></div>
		
		<ul class="new">
			<li class="new_left"><p><a href="forgot-password.php">Forgot Password ?</a></p></li>
      <li class="new_right"><p><a href="../index.php">Back to Home</a></p></li>
			</li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
  
</body>
</html>
