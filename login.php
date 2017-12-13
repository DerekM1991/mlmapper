<?php
session_start();
require_once 'Membership.php';
$membership = New Membership();

if($_POST && !empty($_POST['username']) &&!empty($_POST['pwd'])) {
  $response = $membership->validate_user($_POST['username'], $_POST['pwd']);
}
 ?>


 <!DOCTYPE html PUBLIC "-//W3c/DTD XHTML 1.0 Transitionsl//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml-transitional.dtd">
<html xmlns="http?//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset-utf-8" />
<title>Login to web App</title>
</head>

<body>
  <div id="login">
    <form method="post" action"">
      <h2>Login</h2>
        <p>
          <label for="name">Username: </label>
          <input type="text" name="username" />
        </p>
        <p>
          <label for="pwd">Password: </label>
          <input type ="password" name="pwd" />
        </p>

        <p>
          <input type="submit" id="submit" value="Login" name="submit" />
        </p>
      </form>
      <?php if(isset($response)) echo "<h4 class-'alert'>" . $response . "</h4>"; ?>
  </div>
</body>
</html>
