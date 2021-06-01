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
<title>Toll Tax Management System || View Receipt</title>

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
  	    <h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">View Receipt</h3>
        
  	    <div class="well1 white" id="exampl">
        
  <?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblreceipt where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <fieldset>
          
             <table border="1" class="table table-bordered mg-b-0" width="100%">
             
              <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Lane Number</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['LaneNumber'];?></td>
  </tr>
              <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Receipt ID</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['Receiptid'];?></td>
  </tr>
        <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Vehicle Category</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['VehicleCat'];?></td>
  </tr>  
    <tr >
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Vehicle Number</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['VehicleNumber'];?></td>
  </tr> 
  <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Type of Journey</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['Trip'];?></td>
  </tr> 
  <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Cost</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['Cost'];?></td>
  </tr> 
  <tr>
    <th style="font-size: 15px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; ">Date of Receipt Generate</th>
    <td style="font-size: 13px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; "><?php echo $row['CreationDate'];?></td>
  </tr>
 
        
         <?php } ?>
       </table>
            <div class="form-group">
           <p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
     </div>        
            
          </fieldset>
    
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

<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
