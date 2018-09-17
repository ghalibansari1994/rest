<?php

session_start();
if(isset($_SESSION['aname'])){
  header("Location:admindashboard.php");
}
require_once('header.php');

?>

  <div class="ui two column middle aligned center aligned grid container">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/images/logo.png" class="image">
        <div class="content">
          Log-in to your Admin account
        </div>
      </h2>
      <form class="ui large form error" action="adminlogin_proc.php" method="post">
        <div class="ui stacked segment">
          <div class="field error">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="aemail" placeholder="E-mail address">
            </div>
          </div>
          <div class="field error">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="apassword" placeholder="Password">
            </div>
          </div>
          <div><button type="submit" class="ui fluid large teal submit button">Login </button></div>
        </div>

        <div class="ui error message"><ul class="list"><li>Please enter your e-mail</li><li>Please enter a valid e-mail</li><li>Please enter your password</li><li>Your password must be at least 6 characters</li></ul></div>

      </form>

      <div class="ui message">
        <h4>Are you user ? <a href="usersignup.php">Vendor Sign Up</a><br>
        Or Login ? <a href="userlogin.php">Vendor login</a></h4>
      </div>
    </div>
  </div>

<?php require_once('footer.php') ?>
