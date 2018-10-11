<?php
if($_POST['uemail'])
{
	require_once('db.php'); 
	//$conn=mysqli_connect("localhost","root","","adp");
	//$_post[];
	$uemail=$_POST['uemail'];
	$upassword=$_POST['upassword'];
	$select="select * from vendor where username='$uemail' and password='$upassword'";

	$q=mysqli_query($conn,$select);
	if(mysqli_num_rows($q)>0)
	{
		session_start();
		$_SESSION['uname']=$uemail;
		header("Location:userdashboard.php");
	}
	else
	{
		header("Location:userlogin.php");
	}
}
else
{
	header("Location:userlogin.php");
}
?>