<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['ttmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Admin Profile</title>

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
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Admin Profile</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            <?php
$adminid=$_SESSION['ttmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Admin Name</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="adminname" name="adminname" value="<?php  echo $row['AdminName'];?>">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">User Name</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="username" name="username" value="<?php  echo $row['UserName'];?>" readonly="true">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Contact Number</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="contactnumber" name="contactnumber"value="<?php  echo $row['MobileNumber'];?>" maxlength='10' pattern='[0-9]+'>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Email address</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="email" id="email" name="email" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="<?php  echo $row['Email'];?>" readonly='true'>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Admin Reg Date</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" value="<?php  echo $row['AdminRegdate'];?>" readonly='true'>
              
            </div>
           
            <?php } ?>
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Update</button></p>
             
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <?php include_once('includes/footer.php');?>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php } ?>