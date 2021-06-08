
<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(!empty($_POST["id"])) {
    // $value= $_POST["id"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calendar</title>
    <link rel="stylesheet" href="../css/style.css" />
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    
  </head>
  <style>
html{
  font-size: 62.5%;
}
  </style>
  <body>
    <div class="container" id="font">
              <div class="calendar">
                <div class="month">
                  <i class="fas fa-angle-left prev"></i>
                  <div class="date">
                    <h1></h1>
                    <h2></h2>
                    <p></p>
                  </div>
                  <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                  <div>Sun</div>
                  <div>Mon</div>
                  <div>Tue</div>
                  <div>Wed</div>
                  <div>Thu</div>
                  <div>Fri</div>
                  <div>Sat</div>
                </div>
                <div class="days"></div>
              </div>
            </div>    
          </div>
         

    <script src="../js/script.js"></script>

    <script>
      $(".prev-date").on("click",function(){
      alert("disable");
          
        });
        
        var currentTime = new Date().toDateString();
        
        
      });
    </script>
  </body>
</html>
<?php
}
?>