<?php
require_once 'constants.php';
require_once 'Membership.php';
$membership = New Membership();
$membership-> confirm_login();
?>
<html>
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
      padding-top: 60px;
      background-color: #b1bbc5;
      
      
      
}
table{
   
    table-layout: fixed;
    height: 200px;
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
      <?php
         
      $str= $_SERVER['QUERY_STRING']; 
      parse_str($str, $output);
      $city = $output['city'];
      $state = $output['state'];

     

      
         	$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('there was a problem connecting to the database.');

         	$query= "SELECT*
         	FROM Users
         	WHERE City = '$city' 
         	AND state = '$state'
         	ORDER BY Company_Name";

         	$result =mysqli_query($conn, $query);
         
          
          
            echo "<table border = '7' align='center'>
            <tr>
            <th style='text-align: center'>Name</th>
            <th style='text-align: center'='center'>Phone Number</th>
            <th style='text-align: center'>Email</th>
            <th style='text-align: center'>Company</th>
            </tr>";
         	while($row = mysqli_fetch_array($result)){
         		echo'
               <tr align="center">
               <td> ' .$row['First_Name'].' '.$row['Last_Name'].'</td>
               <td> '.$row['Phone_Number'].'</td>
               <td> ' .$row['Email'].'</td>
               <td> ' .$row['Company_Name'].'</td>
                </tr>';

         	}
          
         	mysqli_close($conn);


         
  
      ?>
   </body>
</html>
