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
    function get_coordinates($City, $state){
      $City = str_replace(' ', '+', $City);
      //echo $City;
      $xml_url = "https://maps.googleapis.com/maps/api/geocode/xml?address='+$City',+'+$state'&key=%20AIzaSyDDwwwh9p1ioQsVK0wxsvJYUW7wW13E2vQ";
      if (($response_xml_data = file_get_contents($xml_url))===false){
    echo "Error fetching XML\n";
} else {
   libxml_use_internal_errors(true);
   $data = simplexml_load_string($response_xml_data);
   if (!$data) {
       echo "Error loading XML\n";
       foreach(libxml_get_errors() as $error) {
           echo "\t", $error->message;
       }
   } else {
     
      $latitude = $data->result->geometry->location->lat[0];
      $longitude = $data->result->geometry->location->lng[0];

    
      return array($latitude, $longitude);
   }
}

}

list($latitude, $longitude) = get_coordinates($City, $state);

$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('there was a problem connecting to the database.');

$query= "INSERT INTO Users(First_Name, Last_Name, Company_Name, Phone_Number, Email, City, State, Postal_Code, Password, Referral_Code, Latitude, Longitude) VALUES ('$fName', '$lName', '$cName', '$number', '$Email', '$City','$state', $Postal_Code, '$pwd', '$referral_Code', $latitude, $longitude)";

if(mysqli_query($conn, $query)){
  echo "Records inserted successfully.";
  $_SESSION['status'] = 'authorized';
  header("location: home.php");
} else{
  echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);

}
// Close connection
mysqli_close($conn);

}




}
