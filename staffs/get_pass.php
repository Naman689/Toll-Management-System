<?php
include('includes/dbconnection.php');

//for cat
if(!empty($_POST["passid"])) 
{
$id=$_POST['passid'];


$query =mysqli_query($con,"SELECT VehicleCat FROM tblpass WHERE Passid = '$id'");
?>

<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["VehicleCat"]; ?>"><?php echo $row["VehicleCat"]; ?></option>
<?php
}} 


// Reg no
if(!empty($_POST["passidvno"])) 
{
$pid=$_POST['passidvno'];


$query =mysqli_query($con,"SELECT * FROM tblpass WHERE Passid = '$pid'");
?>

<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["RegNumber"]; ?>"><?php echo $row["RegNumber"]; ?></option>
<?php
}} 
//Validupto
if(!empty($_POST["vid"])) 
{
$vid=$_POST['vid'];


$query =mysqli_query($con,"SELECT * FROM tblpass WHERE Passid = '$vid'");
?>

<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["ValidityTo"]; ?>"><?php echo $row["ValidityTo"]; ?></option>
<?php
}} 
?>