<?php
require('config.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body> 
    <form action="paymet/submit.php" method="POST">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo $pubk?>"
            data-amount="500"
            data-name="Payment with E2E workers"
            data-description="Payment with E2E workers description"
            data-image=""
            data-currency="inr"
            ></script>
        </form>
      
</body>
</html>
    
