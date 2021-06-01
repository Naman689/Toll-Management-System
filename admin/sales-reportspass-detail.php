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
<title>Toll Tax Management System ||  Pass Sales Report</title>
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
  	<h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Pass Sales reports</h3>
 
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
             </ol>
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
<h4 class="header-title m-t-0 m-b-30">Pass Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Pass Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">S.NO</th>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Month / Year </th>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Sales</th>
                       </tr>
        </thead>
        <tbody>
           <?php

           
$ret=mysqli_query($con,"select month(CreationDate) as lmonth,year(CreationDate) as lyear,sum(Cost) as totalprice from tblreceipt where date(CreationDate) between '$fdate' and '$tdate' group by lmonth,lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
                    <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php echo $cnt;?></td>
                  <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $total=$row['totalprice'];?></td>
             
                    </tr>
                    <?php
$ftotal+=$total;
$cnt++;
}?>
               
<tr>
                  <td style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " colspan="2" align="center">Total </td>
              <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $ftotal;?></td>
     
                </tr>
  
        </tbody>
      </table>
       <?php } else {
        $year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?>
 <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
    <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">S.NO</th>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "> Year </th>
            <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Sales</th>
                       </tr>
        </thead>
        <tbody>
           <?php
$ret=mysqli_query($con,"select year(CreationDate) as lyear,sum(PassCost) as totalprice from tblpass where year(CreationDate) between '$fdate' and '$tdate' group by lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
                    <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php echo $cnt;?></td>
                  <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $row['lyear'];?></td>
              <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $total=$row['totalprice'];?></td>
             
                    </tr>
                    <?php
$ftotal+=$total;
$cnt++;
}?>
               
<tr>
                  <td style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " colspan="2" align="center">Total </td>
              <td style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; "><?php  echo $ftotal;?></td>
   
                 
                 
                </tr>
  
        </tbody>
      </table>
      <?php } ?>  
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