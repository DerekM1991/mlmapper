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


<?php
require_once 'Mysql.php';
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

    ?>


<br>


<form class="form-inline">
  <div class="form-group">
    <label for="City">City: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" class="form-control" id="City" placeholder= 'New City' >
  </div>
  <br>
 
<form class="form-inline">
  <div class="form-group">
    <label for="State">State: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" class="form-control" id="State" placeholder= 'New State' >
  </div>
  <br>

<form class="form-inline">
  <div class="form-group">
    <label for="Email">New Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" class="form-control" id="Email" placeholder= 'New Email' >
  </div>
  <br>

    

<form class="form-inline">
  <div class="form-group">
    <label for="Password">New Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="Password" class="form-control" id="Password" placeholder= 'New Password' >
  </div>
  <br>
  <div class="form-group">
    <label for="Email">Confirm Password:</label>
    <input type="Password" class="form-control" id="cPassword" placeholder='Confirm Password' required>
  </div>
  
  <br>
  <!--Update Password with button -->
  
<button type="submit" id="update_password"  Onclick="setUrl(); return false;" >Update Password</button>
</form>

