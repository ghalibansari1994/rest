<?php 

session_start();
if(isset($_SESSION['aname']))
{	
	require_once('header.php'); require_once('db.php'); 

	$sql = "SELECT * FROM user";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{ ?>
		<div class="ui container">
		<div class="ui stacked segment"><h2>Vendors</h2></div>
		<table class="ui celled table"><thead><tr><th>ID</th><th>USERNAME</th>
		<th>PASSWORD</th><th>BIRTHDAY</th><th>Message</th></tr></thead><tbody>
		
		<?php
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td>
				<td>".$row["birthday"]."</td><td>".$row["message"]."</td></tr>";
		}
		echo "</tbody></table>";
	}	?>

	<div class="ui stacked segment"><h2>Products</h2></div>
	
	<?php
	$sqls = "SELECT * FROM product GROUP by product_name ASC , product_price ASC";
	$results = $conn->query($sqls);
	$id=1;
	
	if ($results->num_rows > 0)
	{ ?>
		<table class="ui celled table"><thead><tr><th>id</th><th>Vendor</th><th>Product Name</th>
		<th>Quantity</th><th>Price</th><th>Approved</th></tr></thead><tbody>
			
		<?php
		while($rows = $results->fetch_assoc())
		{
			$uid=$rows["id"];
			echo "<tr><td>".$id."</td><td>".$rows["username"]."</td><td>".$rows["product_name"]."</td><td>".$rows["product_quantity"]."</td>
				<td>".$rows["product_price"]."</td><td>".$rows["approved"]."&nbsp;&nbsp;&nbsp;&nbsp;";
			
				
			echo "<form method='post' action='admindashboard_confirm.php'><input type='text' style='display:none' name='id' value='".$uid."'><input class='ui teal submit button' type='submit' name='submit' value='YES'></form>";
				
								
				echo "</td></tr>";
				$id++;
		}
		echo "</tbody></table>";
	} ?>
	
	<div class="ui stacked segment">
	    <button type="submit" class="ui fluid large teal submit button"><a href="adminlogout.php">Logout</a></button>
	</div>
	
<?php
}
else
{
	header("Location:adminlogin.php");
}

require_once('footer.php'); ?>