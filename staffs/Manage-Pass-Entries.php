<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Manage Receipt</title>
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
<div class="head222">
   Toll Managment System 
   <a style=" margin-left: 300px; " href="add-receipt.php" class="fbtn2">Back to Dashboard</a>
   <a style=" margin-left: 30px; margin-top:10px; " href="logout.php" class="fbtn">Logout</a>
</div>
      <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Manage Receipt</h3>
 
	<div class="bs-example4" data-exam  ple-id="simple-responsive-table">
  
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">S.NO</th>
            <th style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Receipt ID</th>
            <th style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Vehicle Number</th>
            <th style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Date & Time </th>
            <th style="font-size: 15px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
           $sid=$_SESSION['ttmssid'];
$ret=mysqli_query($con,"select *from  tblreceipt where Staffid='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
            <th style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " scope="row"><?php echo $cnt;?></th>
                <td style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['Receiptid'];?></td>
                <td style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['VehicleNumber'];?></td>
                <td style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['CreationDate'];?></td>
                  <td style="font-size: 14px; color: #000; margin-left: 10px;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><a href="view-receipt.php?viewid=<?php echo $row['ID'];?>">View</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
          </tr>
  
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  </div>
  </div>
  <?php include_once('includes/footer.php');?>
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
<?php }  ?>