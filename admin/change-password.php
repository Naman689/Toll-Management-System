<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['ttmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Change Password</title>

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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Change Password</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post" name="changepassword" onsubmit="return checkpass();" action="">
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
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Current Password</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="password" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="currentpassword" name="currentpassword" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">New Password</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="password" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="newpassword" name="newpassword" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Confirm Password</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="password" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="confirmpassword" name="confirmpassword" value="">
            </div>
         
           
            <?php } ?>
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Change</button></p>
             
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