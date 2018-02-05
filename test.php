<?php
require_once 'constants.php';
require_once 'Membership.php';
$membership = New Membership();
$membership-> confirm_login();
?>
<html>
   <body>
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
         	while($row = mysqli_fetch_array($result)){
         		echo "<strong>Name: </strong>", $row['First_Name'], "\n", $row['Last_Name'], "\n", "<strong>Phone Number </strong>", $row['Phone_Number'], "\n", "<strong>Email: </strong>", $row['Email'], "<strong> Company: </strong>", $row['Company_Name'], "<br>";

         	}
         	mysqli_close($conn);


         
  
      ?>
   </body>
</html>
