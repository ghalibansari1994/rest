<?php

require_once('header.php');
require_once('db.php'); 

session_start();
if(isset($_SESSION['uname']))
{
	$uname=$_SESSION['uname'];
	$upname=$_POST['upname'];
	$upquantity=$_POST['upquantity'];
	$upprice=$_POST['upprice'];
	
	$select="insert into product (username,product_name,product_quantity,product_price) values('$uname','$upname','$upquantity','$upprice')";
		$q=mysqli_query($conn,$select);
		if($q)
		{
			$_SESSION['msg']="Successfully Submitted Data";
			header("Location:userdashboard.php");
		}
		else
		{
			$_SESSION['msg']=mysqli_error($conn);
			header("Location:userdashboard.php");
		}
}
else{
	$_SESSION['msg']="Error";
	header("Location:userdashboard.php");
}

require_once('footer.php') ?>
