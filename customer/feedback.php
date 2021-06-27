<?php
session_start();
require('../DbConnection.php');
$bkid=$_SESSION['bookid'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->


      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Customer Index</title>

      <link rel="stylesheet" type="text/css" href="../css/cust_index.css">
      

       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Modal class -->

        <!-- <link rel="stylesheet" href="../css/cal.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
       
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
         <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  
    <link rel="stylesheet" href="../css/feedback.css">
    <link rel="stylesheet" href="../css/rating.css">
</head>
<body>
    <?php
    include("header.php");
    ?>
                            <div class="container" style="margin-top:30px">
                                <center>
                                    <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong class="card-title">GIVE US FEEDBACK</strong>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                    <div id="rating">
                                                            <div id="date-msg"></div>
                                                                <span class="badge pull-center">
                                                                    <div class="rating">
                                                                    <span class="rating__result"></span>
                                                                    <i class="rating__star far fa-star"></i>
                                                                    <i class="rating__star far fa-star"></i>
                                                                    <i class="rating__star far fa-star"></i>
                                                                    <i class="rating__star far fa-star"></i>
                                                                    <i class="rating__star far fa-star"></i>
                                                                    </div>
                                                                </span>
                                                                <br>
                                                            <hr>
                                                            <span>Your comment:</span>&nbsp
                                                            <input type="text" id="comment"/><br>
                                                </div>
                                                <div class="footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshPage()">Close</button>&nbsp&nbsp&nbsp&nbsp -->
                                                    <button type="button" class="btn btn-success" data-dismiss="modal" id="sub">Submit</button>
                                                </div>
                                            </div>
                                    
                                    </div>
                                   
                                </center>
                                
                            </div>
    
<script src="../js/rating.js"></script>

<script>

    
function refreshPage(){
    window.location.reload();
} 

    // Rating
    $('#sub').on('click',function(){
            $d=$('.rating__result').text();
            var comment=$("#comment").val();
            var c=parseInt($d);
            const percentage=(c/5)*100;
            const PercentageRounded = `${(Math.round(percentage / 10) * 10)}%`;
                        $.ajax({
                            url: "rating_customer.php",
                            method:"POST",
                            data :{
                            star:c,
                            bkid:<?php echo $bkid?>,
                            com:comment
                          },
                            success: function(result){
                              $("#date-msg").html(result);
                              location.window.href = "customer_index.php";
                            }
                        });
              });
              
  // End Rating
</script>
</body>
</html>
<?php

?>