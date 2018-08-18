<?php
?>

<div align = 'center'>
<p style="font-size:36px;">Sign Up For Mapper</p>
</div>
<p style="font-size:18px;">One of the biggest roadblocks in MLM is that distributors don't have access to great leadership around them when they get started. We aim to connect new distributors to leaders around them and also groups of people in the same company who are trying to do the same thing and who they can work with on their way to success.<br> Choose a subscription that best fits your needs. Save and win big when you choose the yearly subscription.</p>

<div align = 'center'>
<form action="/create_subscription.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6hpOEGkCQfFraHvUGjgHXQCh"
    data-name="1 Year Subscription"
    data-description="Test card 4242 4242 4242 4242"
    data-amount="3000"
    data-label="Yearly Subscription">
  </script>
  </form>
  
<form action="/create_subscription_monthly.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6hpOEGkCQfFraHvUGjgHXQCh"
    data-name="1 Month Subscription"
    data-description="Test card 4242 4242 4242 4242"
    data-amount="500"
    data-label="Monthly Subscription">
  </script>
</form>

</div>

