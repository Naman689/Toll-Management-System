<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Between Counts dates reports</title>

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
  	    <h3>Between Counts dates reports</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post" name="bwdatesreport"  action="requestcount-reportsreceipt-detail.php">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">From Date</label>
              <input style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" name="fromdate" id="fromdate" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">To Date</label>
              <input style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" name="todate" id="todate" value="">
            </div>
         
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
             
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