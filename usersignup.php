<?php 

require_once('header.php');

$msg='';
session_start();
if(isset($_SESSION['msg']))
{
	$msg=$_SESSION['msg'];
}
else
{
	$msg='';
}

?>

  <div class="ui two column middle aligned center aligned grid container">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/images/logo.png" class="image">
        <div class="content">
          Sign-up for Vendor account<br><?php echo "$msg"; ?>
        </div>
      </h2>
      <form class="ui large form error" action="usersignup_proc.php" method="post">
        <div class="ui stacked segment">
          <div class="field error">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="uemail" placeholder="E-mail address">
            </div>
          </div>
          <div class="field error">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="upassword" placeholder="Password">
            </div>
          </div>
          <div class="field error">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="uupassword" placeholder="Confirm Password">
            </div>
          </div>
          <div class="field error">
            <div class="ui left icon input">
              <i class="birthday: icon"></i>
              <input type="date" name="ubirth" placeholder="Birth date">
            </div>
          </div>
          <div><button class="ui fluid large teal submit button">Sign Up</button></div>
        </div>

        <div class="ui error message"><ul class="list"><li>Please enter your e-mail</li><li>Please enter a valid e-mail</li><li>Please enter your password</li><li>Your password must be at least 6 characters</li></ul></div>

      </form>

      <div class="ui message">
        <h4>Existing user ? <a href="userlogin.php">Login</a></h4>
      </div>
    </div>
  </div>

<?php require_once('footer.php') ?>
