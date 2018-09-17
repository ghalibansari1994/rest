<?php

if($_POST['aemail'])
{
	require_once('db.php'); 
	//$conn=mysqli_connect("localhost","root","","adp");
	//$_post[];
	session_start();
	$aemail=$_POST['aemail'];
	$apassword=$_POST['apassword'];
	$select="select * from admin where username='$aemail' and password='$apassword'";

	$q=mysqli_query($conn,$select);
	if(mysqli_num_rows($q)>0)
	{
		$_SESSION['aname']=$aemail;
		header("Location:admindashboard.php");
	}
	else
	{
		header("Location:adminlogin.php");
	}
}
else
{
	header("Location:adminlogin.php");
}

?>