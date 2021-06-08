<?php
require('stripe-php-master/init.php');
$pubk="pk_test_51IzgmJSEoT41J0wFG4VHMKPl3O5wLSMH744GB8mllSpCR5JrktCPxkbMeYAZ0lQsapS1rdcl5uEfDU2N389sTsDn00vRDzusWv";
$sek="sk_test_51IzgmJSEoT41J0wFjk1fvZvTCyzSMdDw0p8QJyrwyTsspzfgCA2inEO84j2BsU9AtE5oJOJb2OC9t2otWv7li0Hd0005I8tRm8";

\Stripe\Stripe::setApiKey($sek);
?>