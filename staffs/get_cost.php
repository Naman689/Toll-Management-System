<?php
include('includes/dbconnection.php');
if(!empty($_POST["cat_id"])) 
{
$id=$_POST['cat_id'];
$dta=explode("$",$id);
$cat=$dta[0];
$trip=$dta[1];

if($trip=='One Way Trip'){
$query =mysqli_query($con,"SELECT * FROM tblcategory WHERE VehicleCat = '$cat'");
?>

<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["SingleJourney"]; ?>"><?php echo $row["SingleJourney"]; ?></option>
<?php
}} elseif($trip=='Two Way Trip') {
$query =mysqli_query($con,"SELECT * FROM tblcategory WHERE VehicleCat = '$cat'");
?>

<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["ReturnJourney"]; ?>"><?php echo $row["ReturnJourney"]; ?></option>


<?php
}} elseif($trip=='local') {?>
	
	<option value="0">0</option>
<?php }}
?>