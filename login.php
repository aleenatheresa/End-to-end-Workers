
<!DOCTYPE html><html>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->



<head>

<style class="cp-pen-styles">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: #061F28;
}
body {
  font-family: 'Courier New', Courier, monospace;
  color: white;
  
}


.wrapper {
    background: #50a3a2;
    background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
    background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
    position: absolute;
    top: 50%;
    left: 30%;
    width: 450px;
    height: 400px;
    margin-top: -230px;
    margin-left: 35px;
    overflow: hidden;
    text-align: center;
    border-radius: 90px;
    /* border: #0A5151; */
    /* border-width: 5px; */
  }
body :-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    font-family: 'Source Sans Pro', sans-serif;
    color: white;
    opacity: 1;
    font-weight: 300;
  }
.wrapper.form-success .container h1 {
  -webkit-transform: translateY(85px);
          transform: translateY(85px);
}
.container {
  width: auto;
  margin: 10 20 30;
 
  padding: 70px 0px 0px;
  height: 400px;
  border-width: 2px;
  border: #061F28;
  border-radius: 50px;
  text-align: center;
}
.container h1 {
  font-size: 40px;
  font-weight: 800px;
  -webkit-transition-duration: 1s;
          transition-duration: 1s;
  -webkit-transition-timing-function: ease-in-put;
          transition-timing-function: ease-in-put;
  font-weight: 200;
}
form {
  padding: 20px 0;
  position: relative; 
  z-index: 2;
  
}
form input {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 10px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}
form input:focus {
  background-color: white;
  width: 300px;
  color: #53e3a6;
}
form button {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px 15px;
  color: #046969;
  /* border-radius: 3px; */
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
}
form button:hover {
  background-color: #f5f7f9;
}

@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
@keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
input[type="text"], input[type="email"], input[type="password"] {
  border-radius: 15px;
}
</style>
</head>
<body>
<div class="wrapper">
	<div class="container">
    <!-- <img src="icon.png" alt="logon" style="height: 30px;width: 25px;"> -->
		<h1>LOGIN</h1>

		<form action="usertype.php" method="POST" class="form" name="loginform">
      
			<input type="text" placeholder="Username" name="name" required="">
			<input type="password" placeholder="Password" name="pass" required="">
      <button type="submit" id="login-button">Login</button>
      <p>Don't have ah account<a href="#">Home?</a></p>
		</form>
	</div>


</div>

</body></html>
