<?php

require("constants.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
//$conn=mysql_connect (DB_SERVER, $DB_USER, $DB_PASSWORD);
if (!$conn) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

//$db_selected = mysql_select_db($DB_NAME, $connection);
$db_selected = mysqli_select_db($conn, DB_NAME);

if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM `Users` GROUP BY `Postal_Code";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("First_Name",$row['First_Name']);
  $newnode->setAttribute("Last_Name",$row['Last_Name']);
  $newnode->setAttribute("Company_Name", $row['Company_Name']);
  $newnode->setAttribute("Phone_Number", $row['Phone_Number']);
  $newnode->setAttribute("Email", $row['Email']);
  $newnode->setAttribute("City", $row['City']);
  $newnode->setAttribute("State", $row['State']);
  $newnode->setAttribute("Postal_Code", $row['Postal_Code']);
  $newnode->setAttribute("Latitude", $row['Latitude']);
  $newnode->setAttribute("Longitude", $row['Longitude']);
}

echo $dom->saveXML();

?>