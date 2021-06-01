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
<title>Toll Tax Management System || Search Receipt</title>
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
  	 <h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Search Receipt</h3>
 <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
  <fieldset>
            <div class="form-group">
              <label style="font-size: 16px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " class="control-label">Search by Receipt Number/ Vehicle Number </label>
              <input style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="searchdata" name="searchdata" value="">
            </div>
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="search" class="btn btn-primary">Search</button></p>
             
            </div>
          </fieldset>
        </form>
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
      <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 style="font-size: 18px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">S.NO</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Receipt ID</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">vehicle Reg. Number</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Date of Creation</th>
            <th style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
$ret=mysqli_query($con,"select *from  tblreceipt where Receiptid like '%$sdata%' || VehicleNumber like '%$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
            <th style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " scope="row"><?php echo $cnt;?></th>
                <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['Receiptid'];?></td>
                 <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['VehicleNumber'];?></td>
                <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['CreationDate'];?></td>
                  <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><a href="view-receipt.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?></tbody> </table> 
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