<?php 

require_once('db.php'); 
session_start();
if(isset($_SESSION['aname']))
{
	
	$uid=$_POST['id'];
	echo "$uid";
	$sql="UPDATE product SET approved = 'yes' WHERE id = '$uid'";
	$result = $conn->query($sql);
echo "$result";
	
	
	
	header("Location:admindashboard.php");
}
else
{
	header("Location:admindashboard.php");
}



?>