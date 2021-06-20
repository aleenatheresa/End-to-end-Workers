<?php
require('../DbConnection.php');
$empid=$_SESSION['eid'];
$avgrating=mysqli_query($con,"SELECT AVG(stars) as rate FROM tbl_rating WHERE employee_id=$empid");
$r=mysqli_fetch_array($avgrating);
$rat= $r['rate'];
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<a href="#">
    <i class="fa fa-envelope-o"></i> Rating
        <span class="badge pull-right">
            <div class="rating">
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
            </div>
        </span>
</a>
<script>
     $(document).ready(function(){
         var rt=Math.round(<?php echo $rat?>);
        const ratingStars = [...document.getElementsByClassName("rating__star")];
        const ratingResult = document.querySelector(".rating__result");

function executeRating(stars, result) {
   const starClassActive = "rating__star fas fa-star";
   const starClassUnactive = "rating__star far fa-star";
   const starsLength = stars.length;
   let i;
   stars.map((star) => {
         i = stars.indexOf(star);
         for (i=0; i <rt ; i++) stars[i].className = starClassActive;
   });
}
executeRating(ratingStars, ratingResult);
       });
</script>
</body>
</html>



  

