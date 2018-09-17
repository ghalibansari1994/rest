<?php


session_start();
//session_destroy();
unset($_SESSION['aname']);
header("Location:adminlogin.php");

?>