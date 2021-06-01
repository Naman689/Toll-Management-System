<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   
    $catname=$_POST['catname'];
    $vehname=$_POST['vehname'];
    $regname=$_POST['regname'];
    $vfrom=$_POST['vfrom'];
    $vto=$_POST['vto'];
    $appname=$_POST['appname'];
    $appgender=$_POST['appgender'];
     $appage=$_POST['appage'];
    $appadd=$_POST['appadd'];
    $costpass=$_POST['costpass'];
    $passid = mt_rand(100000000, 999999999);
 
   
       $query=mysqli_query($con, "insert into  tblpass(Passid,VehicleCat,VehicleName,RegNumber,Validityfrom,ValidityTo,AppName,AppGender,AppAge,AppAdd,PassCost) value('$passid','$catname','$vehname','$regname','$vfrom','$vto','$appname','$appgender','$appage','$appadd','$costpass')");
    if ($query) {
     echo '<script>alert("New Pass has been added.")</script>';
echo "<script>window.location.href ='add-pass.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Add New Pass</title>

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
  	    <h3 style="font-size: 25px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; ">Add New Pass</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Vehicle Category</label>
              <select style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="catname" name="catname" value="">
                <option value="">Choose Category</option>
                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                </select>
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Vehicle Name</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vehname" name="vehname" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Vehicle Reg Number</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="regname" name="regname" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Validity From</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vfrom" name="vfrom" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Validity To</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vto" name="vto" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Name of Applicant</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appname" name="appname" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Age of Applicant</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appage" name="appage" value="">
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Applicant Gender: </label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; margin-left: 20px;"  type="radio" name="appgender" id="appgender" value="Female" checked="true">Female
              <label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; margin-left: 20px; " type="radio" name="appgender" id="appgender" value="Male">Male
              </label>
             
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Address of Applicant</label>
              <textarea style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appadd" name="appadd" value=""></textarea>
            </div>
            <div class="form-group">
              <label style="font-size: 14px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " class="control-label">Cost of Pass</label>
              <input style="font-size: 12px; color: #000;  font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 500; " type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="costpass" name="costpass" value="">
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