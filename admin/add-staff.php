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
    $sname=$_POST['sname'];
  $smobnumb=$_POST['smobnumb'];
  $semail=$_POST['semail'];
  $gender=$_POST['gender'];
  $saddress=$_POST['saddress'];
  $sdob=$_POST['sdob'];
  $spassword=md5($_POST['spassword']);
  $staffid = mt_rand(100000000, 999999999);
  $ret=mysqli_query($con, "select StaffEmail from tblstaff where StaffEmail='$semail' || StaffMobilenumber='$smobnumb'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
  
     $query=mysqli_query($con,"insert into tblstaff(StaffID,StaffName,StaffMobilenumber,StaffEmail,StaffGender,StaffAddress,StaffDOB,StaffPassword) value('$staffid','$sname','$smobnumb','$semail','$gender','$saddress','$sdob','$spassword')");
    if ($query) {
     echo '<script>alert("Staff detail has been added.")</script>';
echo "<script>window.location.href ='add-staff.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
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
  	    <h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Add Staff</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            
            <div class="form-group">
              <label style="font-size: 18px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sname" name="sname" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 18px; color: #000; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Mobile Number</label>
              <input type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="smobnumb" name="smobnumb" value="" required="true" maxlength="10" pattern="[0-9]+">
            </div>
            <div class="form-group">
              <label style="font-size: 18px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Email Address</label>
              <input type="email" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="semail" name="semail"value="" required="true" onblur="checkstaffemail(this.value)">
            </div>
            <div class="form-group">
              <label style="font-size: 18px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Password</label>
              <input type="password" id="spassword" name="spassword" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="" required="true">
            </div>
            <div class="form-group">
              <label style="font-size: 18px; margin-right: 30px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Gender: </label>
              <input  type="radio" name="gender" id="gender" value="Female" checked="true">Female
              <input  style=" margin-left: 20px;" type="radio" name="gender" id="gender" value="Male">Male
              <input style=" margin-left: 20px;" type="radio" name="gender" id="gender" value="Other">Other
              
             
            </div>
            <div class="form-group">
              <label style="font-size: 18px; color: #000; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff Address</label>
              <textarea type="text" id="saddress" name="saddress" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="" required="true" rows="12" cols="4"></textarea>
            </div>
            <div class="form-group">
              <label style="font-size: 18px; color: #000; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Staff DOB</label>
              <input type="date" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="sdob" name="sdob" value="" required="true">
            </div>
           
          
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Add</button></p>
             
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