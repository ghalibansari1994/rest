<?php 

require_once('db.php'); 
session_start();
if(isset($_SESSION['aname']))
{
	
	$uid=$_POST['id'];
	$sql="UPDATE product SET approved = 'yes' WHERE product.id = '$uid'";
	$result = mysqli_query($conn,$sql);

	
	
	
	header("Location:admindashboard.php");
}
else
{
	header("Location:admindashboard.php");
}



?>