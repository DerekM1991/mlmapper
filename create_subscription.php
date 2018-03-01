<?php // Create a customer using a Stripe token

// If you're using Composer, use Composer's autoload:
//require_once('vendor/autoload.php');

// Be sure to replace this with your actual test API key
// (switch to the live key later)
require_once('stripe-php-6.0.0/init.php');
\Stripe\Stripe::setApiKey("sk_test_ANYeebm2NziRWNseO3jPK7O4");

try
{
  $customer = \Stripe\Customer::create(array(
    'email' => $_POST['stripeEmail'],
    'source'  => $_POST['stripeToken'],
  ));

  $subscription = \Stripe\Subscription::create(array(
    'customer' => $customer->id,
    'items' => array(array('plan' => 'Yearly_Subscription')),
  ));
$_SESSION['status'] = 'authorized';
  header('Location: home.php');
  exit;
}

catch(Exception $e)
{
  header('Location:oops.html');
  
  echo error_log("unable to sign up customer:" . $_POST['stripeEmail'].
    ", error:" . $e->getMessage());
}
