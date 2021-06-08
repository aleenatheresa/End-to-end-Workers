<?php

require('config.php');

\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];

$data=\Stripe\Charge::create(array("amount"=>15000,
    "currency"=>"inr",
    "description"=>"Payment with E2E workers description",
    "source"=>$token,
));
  

?>
<script>
    location.href ="../customer_index.php";  
</script>