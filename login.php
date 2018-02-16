<?php
ob_start();
session_start();
require_once 'Membership.php';
$membership = New Membership();

//if user clicks log out
if(isset($_GET['status']) && $_GET['status'] == 'loggedOut'){
  $membership->log_out();
}

if($_POST && !empty($_POST['Email']) &&!empty($_POST['pwd'])) {
  $response = $membership->validate_user($_POST['Email'], $_POST['pwd']);
}
?>
<html>
<title>Login to web App</title>
<style type="text/css">
    body{
      padding-top: 40px;
      background-color: #b0defe;
    }
</style>
<body>

  <div id="login">
    <form method="post" action"">
      <h2>Login</h2>
      <fieldset>
        <p>
          <label for="Email">Email: </label>
          <input type="text" name="Email" />
        </p>
        <p>
          <label for="pwd">Password: </label>
          <input type ="password" name="pwd" />
        </p>
        </fieldset>

        <p>
          <input type="submit" id="submit" value="Login" name="submit" >
          <input type="submit" id="submit" value="Register" name="register"/>
        </p>
        </form>  
        </div>
        </body>
        </html>
      <?php if(isset($_POST['register']))header("Location: registration.php");
       if(isset($response)) echo "<h4 class-'alert'>" . $response . "</h4>"; ?>

    
