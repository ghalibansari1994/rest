<?php

require_once('header.php');
require_once('db.php'); 

session_start();
if($_POST['uemail']){
	$uemail=$_POST['uemail'];
	$upass=$_POST['upassword'];
	$uupass=$_POST['uupassword'];
	$udate=$_POST['ubirth'];
	if($upass==$uupass)
	{
		$select="insert into vendor (username,password,birthday) values('$uemail','$upass','$udate')";
		$q=mysqli_query($conn,$select);
		if($q)
		{
			$_SESSION['msg']="Successfully Created your account";
			header("Location:ulogin.php");
		}
		else
		{
			$_SESSION['msg']=mysqli_error($conn);
			header("Location:usersignup.php");
		}
		}
	else
	{
		$_SESSION['msg']="Password doesn`t match";
		header("Location:usignup.php");
	}
}
else
{
	header("Location:usersignup.php");
}

?>