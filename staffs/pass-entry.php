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
   $passid=$_POST['pass'];
    $catname=$_POST['catname'];
    $lanename=$_POST['lanename'];
    $vehno=$_POST['vehno'];
    $validupto=$_POST['validupto'];
     $receiptid = mt_rand(100000000, 999999999);
 $ret=mysqli_query($con,"select ValidityTo from tblpass where Passid='$passid'");
 while($row=mysqli_fetch_array($ret))
 { $validdate=$row['ValidityTo'];}
 $currentdate=date('Y-m-d');
 if($validdate>= $currentdate){
   
       $query=mysqli_query($con, "insert into  tblreceipt(Staffid,Receiptid,passid,VehicleCat,LaneNumber,VehicleNumber,ValidityTo) 
       value('$sid','$receiptid','$passid','$catname','$lanename','$vehno','$validupto')");
       if ($query) {
        echo '<script>alert("Receipt has been created.")</script>';
   echo "<script>window.location.href ='add-receipt.php'</script>";
     }
     else
       {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
       }
      } else {
        echo '<script>alert("Pass Expired.")</script>';
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
</head>

<script>
function getpass(val) {
$.ajax({
type: "POST",
url: "get_pass.php",
data:'passid='+val,
success: function(data){
$("#catname").html(data);
}
});
$.ajax({
        type: "POST",
        url: "get_pass.php",
        data:'passidvno='+val,
        success: function(data){
        $("#vehno").html(data); 
        }
        });

$.ajax({
        type: "POST",
        url: "get_pass.php",
        data:'vid='+val,
        success: function(data){
        $("#validupto").html(data); 
        }
        });

}
</script>

<!-- <script>
function checkpass() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_pass.php",
data:'passid='+$("#pass").val(),
type: "POST",
success:function(data){
$("#pass-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script> -->

<body >

<div class="head22">
   Toll Managment System 
   
     <form action="logout.php">
     <button style=" margin-left: 530px;"  class="fbtn3">Logout</button>
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
                <td class="td" class="text-left">
                <label class="control-label">Pass ID</label>
                </td>
                <td class="td" >
                <input type="text" onChange="getpass(this.value);"  class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="pass" name="pass" value="">
                <!-- <span id="pass-status" style="font-size:12px;"></span> -->
                </td>
            </tr>
        <tr>
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
              <td class="td" class="text-left" >
              <label class="control-label">Vehicle Category</label>
              </td>
              <td class="td" >
              <select class="form-control1"  required="true" id="catname" name="catname" >
			  </select>
                </td>
            </tr>
            <tr>
                <td class="td" class="text-left">
                <label class="control-label">Vehicle Number</label>
                </td>
                <td class="td" >
                <select class="form-control1"  required="true" id="vehno" name="vehno" value="">
				</select>
                </td>
            </tr>
			 <tr>
                <td class="td" class="text-left">
                <label class="control-label">Valid Upto</label>
                </td>
                <td class="td" >
                <select class="form-control1"  required="true" id="validupto" name="validupto" value="">
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
      <form action="add-receipt.php">
     <button  style=" margin-left: 80px;"  class="recipt-btn3">Back to Dashbord</button>
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