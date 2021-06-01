<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $sid=$_GET['editid'];
    $sname=$_POST['sname'];
  $smobnumb=$_POST['smobnumb'];
  $semail=$_POST['semail'];
  $gender=$_POST['gender'];
  $saddress=$_POST['saddress'];
  $sdob=$_POST['sdob'];
 
  
     $query=mysqli_query($con,"update tblstaff set StaffName='$sname',StaffMobilenumber='$smobnumb',StaffEmail='$semail',StaffGender='$gender',StaffAddress='$saddress',StaffDOB='$sdob' where ID=$sid");
    if ($query) {
    $msg="Staff details has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Add Staff</title>

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
  	    <h3>Update Staff Information</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
   <?php
$sid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblstaff where ID='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <fieldset>
            
            <div class="form-group">
              <label class="control-label">Staff Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sname" name="sname" value="<?php  echo $row['StaffName'];?>">
            </div>
            <div class="form-group">
              <label class="control-label">Staff ID</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sid" name="sid" value="<?php  echo $row['StaffID'];?>" readonly='true'>
            </div>
            <div class="form-group">
              <label class="control-label">Staff Mobile Number</label>
              <input type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="smobnumb" name="smobnumb" value="<?php  echo $row['StaffMobilenumber'];?>" required="true" maxlength="10" pattern="[0-9]+">
            </div>
            <div class="form-group">
              <label class="control-label">Staff Email Address</label>
              <input type="email" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="semail" name="semail"value="<?php  echo $row['StaffEmail'];?>" required="true">
            </div>
           
            <div class="form-group">
              <label class="control-label">Staff Gender: </label>
              <?php  if($row['StaffGender']=="Female"){ ?>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
              <input type="radio" name="gender" id="gender" value="male">Male
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>
            <div class="form-group">
              <label class="control-label">Staff Address</label>
              <textarea type="text" id="saddress" name="saddress" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" rows="12" cols="4"><?php  echo $row['StaffAddress'];?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Staff DOB</label>
              <input type="date" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="sdob" name="sdob" value="<?php  echo $row['StaffDOB'];?>" required="true">
            </div>
            <div class="form-group">
              <label class="control-label">Staff Joining Date</label>
              <input type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" value="<?php  echo $row['JoiningDate'];?>" required="true" readonly='true'>
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