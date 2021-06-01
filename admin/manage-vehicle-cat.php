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
<title>Toll Tax Management System || Manage Category</title>
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
     <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Manage Category</h3>
 
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">S.NO</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Vehicle Category Name</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Single Journey</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Return Journey</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Monthly Pass</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Details</th>
            </tr>
        </thead>
        <tbody>
           <?php
$ret=mysqli_query($con,"select *from  tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
            <th style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " scope="row"><?php echo $cnt;?></th>
                <td style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['VehicleCat'];?></td>
                <td style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['SingleJourney'];?></td>
                <td style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['ReturnJourney'];?></td>
                <td style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['MonthlyPass'];?></td>
                <td style="font-size: 14px; color: #000; font-family: font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><a href="edit-categeory.php?editid=<?php echo $row['ID'];?>">Edit</a></td>
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