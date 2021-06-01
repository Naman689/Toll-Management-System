<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Dashboard</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
</head>
 
<body>
<div id="wrapper">
     <!-- Navigation -->
        
            <?php include_once('includes/sidebar.php');?>
            <!-- /.navbar-static-side -->
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="graphs">
        <div style="margin-left:25px;" class="col_3">
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
              <?php
//todays number of vehicle
 $query5=mysqli_query($con,"select ID from tblreceipt where date(CreationDate)=CURDATE();");
$count_today_vehicle=mysqli_num_rows($query5);
 ?>
                   
                    <div class="stats">
                      <h5 style="margin-top:5px; margin-left:65px;  font-size:31px; color:black" ><strong> <?php echo $count_today_vehicle;?></strong></h5>
                      <span>Today's Number of Entries</span>
                    </div>
                </div>
          </div>
          <div style="margin-left:25px;" class="col-md-3 widget widget1">
            <div class="r3_counter_box">
              <?php
//yesterdays number of vehicle
 $query6=mysqli_query($con,"select ID from tblreceipt where date(CreationDate)=CURDATE()-1;");
$count_yesterdays_vehicle=mysqli_num_rows($query6);
 ?>
                    <div class="stats">
                      <h5 style="margin-top:5px; margin-left:65px; font-size:31px; color:black" ><strong><?php echo $count_yesterdays_vehicle;?></strong></h5>
                      <span>Yesterdays Number of Entries</span>
                    </div>
                </div>
          </div>
        	<div style="margin-left:25px; height: 140px;" class="col-md-3 widget">
        		<div style="height: 120px;"  class="r3_counter_box">
              <?php $query4=mysqli_query($con,"Select * from  tblreceipt");
$totalreceipt=mysqli_num_rows($query4);
?>
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5 style="font-size:27px; color:black" ><strong><?php echo $totalreceipt;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-receipt.php">Total Entries</a></span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      
      <div class="col_3">
        	<div style="margin-left:25px;" class="col-md-3 widget widget1">
        		<div style="height: 120px; width: 180px;" class="r3_counter_box">
              <?php $query1=mysqli_query($con,"Select * from  tblstaff");
$totalstaff=mysqli_num_rows($query1);
?>
                    <i class="pull-left fa fa-users icon-rounded"></i>
                    <div class="stats">
                      <h5  ><strong> <?php echo $totalstaff;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-staff.php">Total Staffs</a></span>
                    </div>
                </div>
        	</div>
      
          <div style="margin-left:20px;" class="col-md-3 widget widget1">
        		<div style="height: 120px; width: 180px;" class="r3_counter_box">
              <?php $query2=mysqli_query($con,"Select * from  tblcategory");
$totalcat=mysqli_num_rows($query2);
?>
                    <i class="pull-left fa user1 icon-rounded"><img style="height: 45px; width: 30px;" src="images/car.png" alt="non"></i>
                    
                    <div class="stats">
                      <h5><strong><?php echo $totalcat;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-vehicle-cat.php">Total Vehicle Category</a></span>
                    </div>
                </div>
        	</div>
          
          <div  style="margin-left:20px;" class="col-md-3 widget widget1">
        		<div style="height: 120px; width: 188px;" class="r3_counter_box">
              <?php $query3=mysqli_query($con,"Select * from  tblpass");
$totalpass=mysqli_num_rows($query3);
?>
                    <i class="pull-left fa  icon-rounded"><img style="height: 41px; width: 35px;" src="images/reoports.png" alt="non"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalpass;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-pass.php">Total Pass</a></span>
                    </div>
                </div>
        	</div>
         
          <div class="clearfix"> </div>
      </div>

		<?php include_once('includes/footer.php');?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
