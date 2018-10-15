<?php require_once('header.php'); ?>

  <br>
  <div class="ui two column stackable grid container">
    <br>

    <div class="column">
      <div class="ui center aligned segment">
        <h1><a href="admindashboard.php">Admin Dashboard</a></h1>
      </div>
    </div>

    <div class="column">
      <div class="ui center aligned segment">
        <h1><a href="userdashboard.php">Vendor Dashboard</a></h1>
      </div>
    </div>
  </div>

  <br>
  <div class="ui two column stackable grid container">
    <br>

    <div class="column">
      <div class="ui center aligned segment">
        <h1><a href="adminlogin.php">Admin Login</a></h1>
      </div>
    </div>

    <div class="column">
      <div class="ui center aligned segment">
        <h1><a href="userlogin.php">Vendor Login</a></h1>
      </div>
    </div>
  </div>


<?php
require_once('db.php');
//$sql="select product_price from product";
$sql="SELECT * FROM product WHERE product_price =  ( SELECT MIN(product_price) FROM product )";
$result = $conn->query($sql);

?>

  <br>
  <div class="ui one column stackable grid container">
    <div class="column">
      <div class="ui center aligned segment">
        <h1><?php while ($row = $result->fetch_assoc()) {
  echo $row['username'];
  echo "  : ";
  echo $row['product_price']."<br>";
  
}  ?></h1>
      </div>
    </div>

<?php require_once('footer.php') ?>
