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

     <!-- Navigation -->
        
    
            <!-- /.navbar-static-side -->
        <?php include_once('includes/header.php');?>
        
    
     	<div class="col_3">
       <?php
$sid=$_SESSION['ttmssid'];
$ret=mysqli_query($con,"select StaffID from tblstaff where ID='$sid'");
$row=mysqli_fetch_array($ret);
$id=$row['StaffID'];
$ret=mysqli_query($con,"select StaffName from tblstaff where ID='$sid'");
$row=mysqli_fetch_array($ret);
$name=$row['StaffName'];

?>  	
  <div class="split left">
    <div class="plaza">
        MHOW TOLL PLAZA
    </div>
    
    <div class="c">
   
    <div id="camera" style="width: 1px;  height: 565px; top:0px; border: 1px solid black; ">
    
  </div>
</div>
<div class="split right">
<form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
    <table class="table-fill">
        <thead>
        <tr>
              <td class="text-left" >
              <label class="control-label">Vehicle Category</label>
              </td>
              <td>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="catname" name="catname" value="">
                <option value="">Choose Category</option>
                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                </select>
                </td>
            </tr>
            <tr>
                <td class="text-left">
                <label class="control-label">Vehicle Number</label>
                </td>
                <td>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vehno" name="vehno" value="">
                </td>
            </tr>
            <tr>
              <td>
              <label class="control-label">Name of lane</label>
              </td>
              <td>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="lanename" name="lanename" value="">
                <option value="">Choose Lane Number</option>
                  <option value="Lane1">Lane Number 1</option>              
                  <option value="Lane2">Lane Number 2</option>
                 <option value="Lane3">Lane Number 3</option>
                  <option value="Lane4">Lane Number 4</option>
                </select>
                </td>
              </tr>
            <tr>
                <td class="text-left">
                <label class="control-label">Type of Journey</label>
                </td>
                <td>
                <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="trip" name="trip" value="">
                <option value="">Choose Trip</option>
                  <option value="One Way Trip">Single Journey</option>              
                  <option value="Two Way Trip">Return Journey</option>
                  <option value="Exempted">Exempted</option>  
                </select>
                </td>
            </tr>
            <tr>
                <td class="text-left">
                <label class="control-label">Cost</label>
                </td>
                <td>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="cost" name="cost" value="">  
                </td>
            </tr>
        </thead>
    </table>
    <div style="background-color: rgba(86, 236, 204, 0.555); width: 100%; border: 2px solid #000000; height: 50px;">
    <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn">Confirm</button></p>
            </div>
    </fieldset>
        </form>
</div>
<div class="footer">
<p><b class="a1" > Staff ID: <?php echo $id;  ?>  </b >  PATH INDIA Ltd. MHOW  <b class="a2" >Staff Name: <?php echo $name;?></b></p>
</div>

		
      <!-- /#page-wrapper -->
 
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
<?php }  ?>