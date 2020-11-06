
<!DOCTYPE html><html>

<title>Login</title>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="login_style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script> 
<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"> </script> 
<script src="js/validate.js"></script>

<!-- <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->


<head>

<style class="cp-pen-styles">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: #061F28;
}
.navbar-brand
{
  font-size :30px;
  font-family :sans serif;
}
/* Header */
      
</style>
</head>
<body>
  <!-- header -->
  <header>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark static-top">
    <h1 class="navbar-brand">End To End Workers</h1>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html"><span class="glyphicon glyphicon-home"></span> Home  </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li> -->
        <li class="nav-item">
            <div class="dropdown" id="drp">
              <a class="nav-link" href="#" class="dropbtn"><span class="glyphicon glyphicon-triangle-bottom"></span> Register</a>
              <i class="fa fa-caret-down"></i>
              <div class="dropdown-content">
                  <a class="nav-link" href="cust_registration.php">Customer</a>
                  <a class="nav-link" href="#">Employee</a>
                  <a class="nav-link" href="service_provider_registration.php">Service provider </a>
              </div>
            </div>
        </li>
      </ul>
    </div>
  
</nav>

<!-- Page Content -->

	</header>
		
  <!-- //header -->


  <div class="wrapper">
	<div class="container">
    
		<h1>LOGIN</h1>

		<form action="usertype.php" method="POST" class="form" name="loginform">
      
			<input type="text" placeholder="Username" name="name" required="">
			<input type="password" placeholder="Password" name="pass" required="">
      <button type="submit" id="login-button">Login</button>
      <p>Did you forgot password?<a href="#">Forgot password</a></p>
		</form>
	</div>
</div>

</body></html>
