<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
require_once('stripe-php-6.0.0/init.php');
\Stripe\Stripe::setApiKey("sk_test_ANYeebm2NziRWNseO3jPK7O4");

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

// Do something with $event_json

http_response_code(200); // PHP 5.4 or greater
echo $event_json;
?>
