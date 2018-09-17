<?php

require_once('header.php');	require_once('db.php'); 

$msg='';
session_start();
if(isset($_SESSION['uname']))
{
	$uname=$_SESSION['uname'];
	if(isset($_SESSION['msg']))
	{
		$msg=$_SESSION['msg'];
	}
	else
	{
		$msg='';
	}

	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$uname=$_SESSION['uname'];
	$sql="select message from user where username='$uname'";
	$result = $conn->query($sql);

	if ($result->num_rows>0){
		$result=$result->fetch_all();
		//print_r();
		$result=$result[0][0];
	}
	else{
		$result="No message yet";
	}

?>
		
	<div class="ui container">
		<h1><?php echo "Welcome user : ".$uname."</h1><br><h3>Your Meassage is : ".$result."<br>".$msg."</h3>";
		
		$sqls = "SELECT * FROM product where username='$uname'";
		$results = $conn->query($sqls);
		$id=1;

		if ($results->num_rows > 0)
		{ ?>
			<div class="ui container">
			<table class="ui celled table"><thead><tr><th>id</th><th>Product Name</th>
			<th>Quantity</th><th>Price</th><th>Approved</th></tr></thead><tbody>
			
			<?php
			while($rows = $results->fetch_assoc())
			{
				echo "<tr><td>".$id."</td><td>".$rows["product_name"]."</td><td>".$rows["product_quantity"]."</td>
					<td>".$rows["product_price"]."</td><td>".$rows["approved"]."</td></tr>";
					$id++;
			}
			echo "</tbody></table>";
		}	?>

		<div class="ui stacked segment"><h2>Submit new products</h2></div>
		<form class="ui form segment" action="userdashboard_proc.php" method="post">
			<div class="three fields">
				<div class="field">
					<label>Product Name</label>
					<input type="text" name="upname" placeholder="Product Name">
				</div>
				<div class="field">
					<label>Quantity</label>
					<input type="text" name="upquantity" placeholder="Quantity">
				</div>
				<div class="field">
					<label>Price</label>
					<input type="text" name="upprice" placeholder="Price">
				</div>
			</div>
			<button class="ui fluid large teal submit button" type="submit">Submit</button>
		</form>
		<form class="ui large form error" action="userlogout.php" method="post">
			<div class="ui stacked segment">
				<div><button type="submit" class="ui fluid large teal submit button">Logout</a></button></div>
			</div>
		</form>
	</div>

<?php

}
else
{
	header("Location:userlogin.php");
}

require_once('footer.php') ?>
