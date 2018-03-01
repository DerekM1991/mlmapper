<?php
?>

<div align = 'center'>
<p style="font-size:36px;">Sign Up For Mapper</p>
</div>

<div align = 'center'>
<form action="/create_subscription.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6hpOEGkCQfFraHvUGjgHXQCh"
    data-name="Sign Up For Mapper"
    data-description="Subscription for 1 Year"
    data-amount="3000"
    data-label="Yearly Subscription">
  </script>
  </form>
<form action="/create_subscription_monthly.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6hpOEGkCQfFraHvUGjgHXQCh"
    data-name="Sign Up For Mapper"
    data-description="Subscription for 1 Month"
    data-amount="500"
    data-label="Monthly Subscription">
  </script>
</form>

</div>