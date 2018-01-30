<?php
require_once 'constants.php';
class Mysql {
  private $conn;

  function __construct() {
    $this->conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('There was a problem connecting to the database.');
  }
  function verify_Username_and_Pass($Email, $pwd){
    $conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('There was a problem connecting to the database.');

    $query= "SELECT*
    FROM Users
    WHERE Email = ? AND password = ?
    LIMIT 1";

    if($stmt = $this->conn->prepare($query)) {
      $stmt->bind_param('ss', $Email, $pwd);
      $stmt->execute();

      if($stmt->fetch()) {
        $stmt->close();
        return true;
      }
    }
  }



  
  function add_User($fName, $lName, $cName, $number, $Email, $City, $state, $Postal_Code, $pwd, $referral_Code){

$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('there was a problem connecting to the database.');

$query= "INSERT INTO Users(First_Name, Last_Name, Company_Name, Phone_Number, Email, City, State, Postal_Code, Password, Referral_Code) VALUES ('$fName', '$lName', '$cName', '$number', '$Email', '$City','$state', $Postal_Code, '$pwd', '$referral_Code')";

if(mysqli_query($conn, $query)){
  echo "Records inserted successfully.";
  header("location: test.php");
} else{
  echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);

}
// Close connection
mysqli_close($conn);

}

}
