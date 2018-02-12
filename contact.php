<html>
<!--start top bar-->
   <body>
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
      padding-top: 70px;
      background-color: #b1bbc5;
    }
    h2{
   margin-left: 'auto';
  

    
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
<h2>Contact info</h2>
<?php
echo "Don't call us, we'll call you!";
