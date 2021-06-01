<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   $sid=$_SESSION['ttmssid'];
    $catname=$_POST['catname'];
    $lanename=$_POST['lanename'];
    $vehno=$_POST['vehno'];
    $trip=$_POST['trip'];
    $cost=$_POST['cost'];
     $receiptid = mt_rand(100000000, 999999999);
 
   
       $query=mysqli_query($con, "insert into  tblreceipt(Staffid,Receiptid,VehicleCat,LaneNumber,VehicleNumber,Trip,Cost) value('$sid','$receiptid','$catname','$lanename','$vehno','$trip','$cost')");
    if ($query) {
     echo '<script>alert("Receipt has been created.")</script>';
echo "<script>window.location.href ='add-receipt.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}

$sid=$_SESSION['ttmssid'];
$ret=mysqli_query($con,"select StaffID from tblstaff where ID='$sid'");
$row=mysqli_fetch_array($ret);
$id=$row['StaffID'];
$ret=mysqli_query($con,"select StaffName from tblstaff where ID='$sid'");
$row=mysqli_fetch_array($ret);
$name=$row['StaffName'];

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Add Receipt</title>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<script>
function getcost(val,inds) 
{ 
var cat=$(".cat").val();
var trip=$(".trip").val();
var abh=cat+'$'+trip;
//alert(abh);
  $.ajax({
    type: "POST",
    url: "get_cost.php",
    data:'cat_id='+abh,
    success: function(data){
      $("#cost").html(data);
      
    }
    });
	}
	</script>
<body >

<div class="head22">
   Toll Managment System 
   
     <form action="logout.php">
     <button class="fbtn5">Logout</button>
     </form>
   
</div>
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
              <td class="td" class="text-left" >
              <label class="control-label">Vehicle Category</label>
              </td>
              <td class="td" >
              <select  class="form-control1 cat"  required="true" id="catname" name="catname" >
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
                <td class="td" class="text-left">
                <label class="control-label">Vehicle Number</label>
                </td>
                <td class="td" >
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vehno" name="vehno" value="">
                </td>
            </tr>
            <tr>
              <td class="td" >
              <label class="control-label">Name of lane</label>
              </td>
              <td class="td" >
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
                <td class="td" class="text-left">
                <label class="control-label">Type of Journey</label>
                </td>
                <td class="td" >
                <select onChange="getcost(this.value);" class="form-control1 trip"  required="true" id="trip" name="trip" value="">
                <option value="">Choose Trip</option>
                  <option value="One Way Trip">One Way Trip</option>              
                  <option value="Two Way Trip">Two Way Trip</option>
                  <option value="local">Local Car</option>
                </select>
                </td>
            </tr>
            <tr>
                <td class="td" class="text-left">
                <label class="control-label">Cost</label>
                </td>
                <td class="td" >
                <select  class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="cost" name="cost" value="">  
				</select>
                </td>
            </tr>
        </thead>
    </table>
    <div style="background-color: rgba(256, 256, 256); width: 100%; border: .1px solid #000; height: 50px;">
    <div class="form-group">
   
   <button style="font-size: 15px; color: #000; margin-left: 290px; margin-top: 7px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 400; " type="submit" name="submit" class="btn btn-primary">Confirm</button></p>
            </div>
            </fieldset>
    </form> 
    
    <div class="profile" >
      <P>Profile</P>
      <form action="staff-profile.php">
     <button class="profile-btn1">Edit Profile</button>
     </form>
     <form action="change-password.php">
     <button class="profile-btn2">Change Password</button>
     </form>
    </div>
    <div class="recipt" >
      <P>Receipt</P>
      <form action="pass-entry.php">
     <button  class="recipt-btn3">Pass</button>
     </form>
     <form action="manage-receipt.php">
     <button  class="recipt-btn1">Manage Receipt</button>
     </form>
     <form action="search-receipt.php">
     <button  class="recipt-btn2">Search Receipt</button>
     </form>
    </div>
</div>
<div class="footer">
<p><b class="a1" > Staff ID: <?php echo $id;  ?>  </b >  PATH INDIA Ltd. MHOW  <b class="a2" >Staff Name: <?php echo $name;?></b></p>
</div>

<!-- Metis Menu Plugin JavaScript -->
<script language="JavaScript">
    Webcam.set({
        width:1010,
        hight: 10
    });
    Webcam.attach( '#camera' );
</script>
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php } ?>