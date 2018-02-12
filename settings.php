<html>

<!--start top bar-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MlMapper Map Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
      padding-top: 50px;
      background-color: #90c3f3;
    }

</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">MLMapper</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php" target="_self">Home</a></li>
        <li><a href="about.php" target="_self">About</a></li>
        <li><a href="contact.php" target="_self">Contact</a></li>
        <li><a href="settings.php" target="_self">Settings</a></li>
        <li><a href="login.php?status=loggedOut" target="_self">Log Out</a></li>

      </ul>
    </div>
  </div>
</nav>
<!--end top bar-->
<h2> Edit Account Info</h2>

<?php
require 'Mysql.php';
$mysql = New Mysql();
session_start();
$user=$_SESSION['Email'];
echo $user, " ";

$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('There was a problem connecting to the database.');

$query= "SELECT *
    FROM Users
    WHERE Email = '$user'";

    $result =mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
  echo $row['Password'];
  if($_POST){
  	if (isset($_POST['password'])) {
  		$pwd = $_POST['password'];
  		$mysql->update_password($user,$pwd);
  }

}
    ?>


<br>


<form class="form-inline" method="post">
  <div class="form-group">
    <label for="City">City: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" class="form-control" id="City" placeholder= 'New City' name="City" >
  
  <input type="submit" id="submit" value="Update City" name="Change_City" >
  </div>
</form>
  
 
<form class="form-inline" method="post">
  <div class="form-group">
    <label for="State">State: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" class="form-control" id="State" placeholder= 'New State' >
  
  <input type="submit" id="submit" value="Update State" name="Change_State" >
  </div>
</form>

<!--change password-->
<form class="pure-form" method="post">
    <fieldset>
        <legend>Change Password</legend>

        <input type="password" placeholder="Password" id="password" name="password" required>
        <input type="password" placeholder="Confirm Password" id="confirm_password" required>

        <input type="submit" id="submit" value="Update Password" name="Change_Password" >
    </fieldset>
</form>


    
<script type="text/javascript">

	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


