<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>forgot End-to-end-Workers</title>
  <script type="text/javascript">
  function name1() {


  var namee=document.forms["regform"]["user"];
  var paswd=document.forms["regform"]["pass"];

  function EMail()
  {
      
    if(emai.value == "")
    {
      document.getElementById('maile').innerHTML="<span class='error'>Please enter a Username</span>"
      emai.focus();
    }

    if(emai.value.match(mail))
    {
      document.getElementById('u').innerHTML="<span ></span>";
      // document.regform.ph.focus();
      return true;
    }

    
  }



  }

  </script>
<style media="screen">
body
{

  background-image: url('8.jpg');
  background-repeat: no-repeat;
  background-size: 100%;

}
.p{
  background-color: rgba(0, 0, 0, 0.3);
  height:auto;
  width: auto;
}
a{
  text-decoration: none;
  color: white;
}
</style>
  <link rel="stylesheet" href="css/BOOT.css">

</head>
<body>

    <div class="p">
    <div class="container col-sm-12 col-md-6">

    <center>

  <form method="post"  action="send-recovery-mail.php" style="padding:150px;" name="regform"class="form-group-sm container ">
  <h3 style="color: white;">Recover Password</h3>

    <br>
  <input type="text" id ="emaile" class="form-control" name="email" required onblur="name1()"placeholder="Enter Username"><br>
  <span id="u"style="color:red;background-color:black; font-size:20px;">
<?php
session_start();
$msg=$_SESSION['msg'];
echo $msg;
 ?>
</span><br>
<br>
  <input type="submit" class="btn btn-success" name="submit" value="Recover Password" >
  <br>
  <br>
  <h5><a style="color:white;" href="register.php">New User</a>
  <h5><a style="color:white;" href="login.php">Got your Password?!</a>

  </form>
  </center>
  </div>
  </div>
</body>
</html>