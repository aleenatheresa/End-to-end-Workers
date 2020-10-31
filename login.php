
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
  background:wheat;
  
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

/* Header */


/* # Header, Main Menu
================================ */

.navbar {
  opacity: 0.8;
  margin-bottom: 0;
  background-color: #fff;
  transition: all 0.2s ease-out;
}

.navbar-container {
	position: relative;
}

.navbar .navbar-nav li a {
  font-size: 14px;
  text-transform: uppercase;
  color: #2E1C05;
  transition: all 0.2s ease-out;
}

.navbar-brand {
  font-size: 25px;
  transition: all 0.5s ease-out;
  color: rgba(200,100,0,0.8);
  font-family :sans-serif;
}

.navbar-scroll {
  opacity: 1;
}

#top-social-menu {
  display: none;
}


@media (min-width: 768px) {
  .navbar {
    height: 120px;
  }

  .navbar-nav>li>a {
    padding: 0;
    margin-top: 35px;
    margin-left: 50px;
    line-height: 70px;
  }

  .navbar-brand {
    font-size: 38px;
    padding: 0;
    height: 120px;
    line-height: 120px;
    color : black;
  }

  #top-social-menu {
    display: initial;
  }

  /* Navbar when scrolled */

  .navbar-scroll {
    height: 70px;
  }

  .navbar-scroll #top-social-menu {
    display: none;
    transition: all 0.2s ease-out;
  }
  .dropbtn
  {
    height: 70px;
    line-height: 70px;
  }

  .navbar-scroll .navbar-brand {
    height: 70px;
    line-height: 70px;
  }

  .navbar-scroll .navbar-nav>li>a {
    opacity: 1;
    padding: 0;
    margin-top: 0;
  }
}

/* # Hover Link Effect
================================ */
@media (min-width: 768px) {
  .navbar-nav>li>a::after {
    position: absolute;
    top: 80%;
    left: 0;
    width: 100%;
    height: 1px;
    background: #2E1C05;
    content: '';
    opacity: 0;
    transition: height 0.3s, opacity 0.3s, transform 0.3s;
    transform: translateY(-10px);
  }

  .navbar-nav>li>a:hover::after,
  .navbar-nav>li>a:focus::after {
    height: 2px;
    opacity: 1;
    transform: translateY(0px);
  }
}

/* # Social menu
================================ */

#top-social-menu {
  position: absolute;
  top: 7px;
  right: 0;
  font-size: 12px;
  z-index: 101;
  padding-right: 0px;
  list-style: none;
  color: #2E1C05;
  transition: all 0.2s ease-out;
}

#top-social-menu li {
  float: left;
  padding: 10px 15px;
}

#top-social-menu li:last-child {
  padding-right: 0;
}

#top-social-menu li a {
  text-decoration: none;
  color: #2E1C05;
}

#top-social-menu li a:hover {
  text-decoration: none;
  color: #543A1A;
}

#top-social-menu i {
 	font-size: 16px;
  
  transition: all 0.2s ease-in;
}

#top-social-menu i:hover {
  text-decoration: none;
  color: #543A1A;
}

} 
/* dropdown */
#main-navbar  {
    float: left;
    /* overflow: hidden; */
}

.dropdown .dropbtn {
    font-size: 17px;    
    border: none;
    outline: none;
    color: white;
    padding: 18px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 18px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}
#navbar .dropdown
{
   
    
    margin-top: 35px;
    margin-left: 30px;
    line-height: 10px;
    transition: all 0.5s ease-out;
    /* padding: 12px 16px; */
}

/* Header */
      
</style>
</head>
<body>
  <!-- header -->

  
<div class="">
  <header>
		<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
			<div class="container navbar-container">
				<div class="navbar-header">
					<h1 class="navbar-brand">End To End Workers</h1>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></li>
            <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
            <div class="dropdown" id="drp" >
            <a href="#" class="dropbtn"><span class="glyphicon glyphicon-triangle-bottom"></span> Service Category</a>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
              <a href="#">Customer</a>
              <a href="#">Employee</a>
              <a href="#">Service provider</a>
          </div>
            </li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
		
  <!-- //header -->


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
</div>
</body></html>
