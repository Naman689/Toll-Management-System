<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $sid=$_SESSION['ttmssid'];
    $sname=$_POST['sname'];
  $mobno=$_POST['smobno'];
  $sgender=$_POST['sgender'];
  $sadd=$_POST['sadd'];
  $sdob=$_POST['sdob'];
  
     $query=mysqli_query($con, "update tblstaff set StaffName ='$sname', StaffMobilenumber='$mobno',StaffGender='$sgender',StaffAddress='$sadd',StaffDOB='$sdob' where ID='$sid'");
    if ($query) {
    $msg="Your profile has been updated.";
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
<title>Toll Tax Management System || Staff Profile</title>

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
        
     <div class="head222">
   Toll Managment System 

     <form action="change-password.php">
     <button class="fbtn6">Change Password</button>
     </form>
   <form action="add-receipt.php">
     <button class="fbtn2">Back to Dashboard</button>
     </form>
     <form action="logout.php">
     <button class="fbtn3">Logout</button>
     </form>

</div>
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3 style="font-size: 25px; color: #000; margin-top: 0px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">My Profile</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            <?php
$staffid=$_SESSION['ttmssid'];
$ret=mysqli_query($con,"select * from tblstaff where ID='$staffid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff ID</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  readonly="true" value="<?php  echo $row['StaffID'];?>">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Name</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="sname" name="sname" value="<?php  echo $row['StaffName'];?>" required='true'>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Contact Number</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="smobno" name="smobno"value="<?php  echo $row['StaffMobilenumber'];?>" required='true' maxlength='10' pattern='[0-9]+'>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Email address</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="email" id="email" name="email" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="<?php  echo $row['StaffEmail'];?>" readonly='true'>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Gender: </label>
              <?php  if($row['StaffGender']=="Female"){ ?>
              <input style="font-size: 14px; margin-left:30px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="radio" name="sgender" id="sgender" value="Female" checked="true">Female
              <input style="font-size: 14px; margin-left:30px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="radio" name="sgender" id="sgender" value="male">Male
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Address</label>
              <textarea style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" id="sadd" name="sadd" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" rows="12" cols="4"><?php  echo $row['StaffAddress'];?></textarea>
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label"> DOB</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="date" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="sdob" name="sdob" value="<?php  echo $row['StaffDOB'];?>" required="true">
            </div>
            <div class="form-group">
              <label style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Joining Date</label>
              <input style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" value="<?php  echo $row['JoiningDate'];?>" required="true" readonly='true'>
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