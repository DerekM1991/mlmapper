<?php
require 'constants.php';
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
require_once('stripe-php-6.0.0/init.php');
\Stripe\Stripe::setApiKey("sk_test_ANYeebm2NziRWNseO3jPK7O4");

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

// Do something with $event_json

http_response_code(200); // PHP 5.4 or greater
echo print_r($event_json, true);
$customerId= $event_json->data->object->id;
$email= $event_json->data->object->email;

$conn = New mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('there was a problem connecting to the database.');

$query= "UPDATE Status 
SET UserId = '$customerId' 
WHERE Email='$email'";

mysqli_query($conn, $query);
    
mysqli_close($conn);

?>

