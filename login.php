<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./loginnewstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<head>
  <title>End to End</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar">
    <a class="navbar-brand" href="#">End To End Workers</a>
    <a class="nav-item nav-link" href="1home.html">Home</a>
    <div class="dropdown" style="float: right;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Register
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="cust_registration.php">Customer</a>
    <a class="dropdown-item" href="service_provider_registration.php">Service Provider</a>
    <a class="dropdown-item" href="emp_registration.php">Employee</a>
  </div>
</div>
  </nav>

  <div id="pageContainer" class="container">

    <div class="row">
      <h1 class="col-md-12 text-center">Login Page </h1>
    </div>
    <form class="row" action="usertype.php" method="POST">
      <div class="col-md-12">
        <div id="login" class="form-group">
          <label class="control-label " for="email" name="username"><h4>Username:</h4></label>
          <div class="input-group">
            <input class="form-control " id="email" name="name" type="text" required="" />
          </div>
          <label class="control-label " for="email"><h4>Password:</h4></label>
          <div class="input-group">
            <input class="form-control form-control-no-border" id="password" name="pass" type="Password" required />
          </div>
          <div class="row">
            <div id="add" class="col-12 text-center">
              <input type="submit" id="login-button" value="Sign In" class="btn btn-primary" />
                <br>
                <br>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Forgot password ?</a>
            </div>
          </div>
        </div>

      </div>
    </form>
  </div>

    
    <!--forgot password modal-->
<div class="modal" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot password ??</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <form action="forgot.php" method="POST">
      <!-- Modal body -->
      <div class="modal-body">
            <input class="form-control"  name="fusername" id="fusername" type="text" placeholder="Username" required>
            <span id="msg"></span>
            <br>
                <input class="form-control" type="text" name="fphno" onblur="valFhstlMob()" onkeypress="return /[0-9]/i.test(event.key)" disabled id="fphno" placeholder="Mobile Number" required >
            <br>
                <input class="form-control" type="password" name="npass" onblur="valFPasswod()" id="npass"  disabled placeholder="New Password" required>
            <br>
                <input class="form-control" type="password" name="ncpass" onblur="valCFPasswod()" id="ncpass"  disabled placeholder="Confirm New Password" required>
            <br>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" value="Update" id="fbutton" disabled class="btn btn-primary" />
      </div>
      </form>
    </div>
  </div>
</div>
<!--forgot password modal ends-->
</body>

<script>

  
  $(document).ready(function(){
  $("#fusername").on('input', function(){
    var fu = $(this).val();
    if(fu){
            $.ajax({
                type:'post',
                url:'Fusername.php',
                data:'f_u='+fu,
                success:function(html){
                    $('#fusername').html(html); 
                    
                }
            }); 
        }else{
            $('#npass').prop( "disabled", true );
        }
  });
});

function checkPhone(number){
    return (/^(6|7|8|9)[0-9]{9}$/.test(number));
}
function checkPassword(text){
    return (/^.{6,}$/.test(text));
}
//forgot password
function valFPasswod()
    {
        var mu = document.getElementsByName('npass')[0];
            if (checkPassword(mu.value)){
                document.getElementById("npass").style.borderColor = "green";
            } 
            else
                {
                document.getElementById("npass").style.borderColor = "red"; 
            }
    }   
    
function valCFPasswod()
    {
        var mc = document.getElementsByName('ncpass')[0];
        var mu = document.getElementsByName('npass')[0];
            if ((checkPassword(mc.value))&&(mc.value == mu.value)&&(mc.value!= null)){
                document.getElementById("ncpass").style.borderColor = "green";
                document.getElementById("fbutton").disabled = false;
            } 
            else 
                {
                document.getElementById("ncpass").style.borderColor = "red"; 
            }
    }  

function valFhstlMob()
    {
        var hm = document.getElementsByName('fphno')[0];
            if (checkPhone(hm.value)){
                document.getElementById("fphno").style.borderColor = "green";
            } 
            else
                {
                document.getElementById("fphno").style.borderColor = "red"; 
            }
    }     

</script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
</body>
</html>
