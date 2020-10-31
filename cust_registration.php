
<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

$sql="SELECT * FROM tbl_district WHERE is_delete=1";
$sql_result=mysqli_query($con,$sql);


$loc="SELECT * FROM tbl_location WHERE is_delete=1";
$result_loc=mysqli_query($con,$loc);
// if(!mysqli_select_db($con,"projectdb"))
// {
//     echo "db not selected";
// }


?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="stylesheet.css" type="text/css"/>
<script src="js/validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, dl, dt, dd, ol, nav ul, nav li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

h1 {
    font-size: 3em;
    text-align: center;
    color: #fff;
    /* font-weight: bold; */
    text-transform: capitalize;
    letter-spacing: 4px;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 10px;
  }
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
  display: block;
}

ol, ul {
  list-style: none;
  margin: 0px;
  padding: 0px;
}

blockquote, q {
  quotes: none;
}

blockquote:before, blockquote:after, q:before, q:after {
  content: '';
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 10px;
  /* margin-top: 10px; */
}

/*-- start editing from here --*/
a {
  text-decoration: none;
  color: inherit;
}

.error{
  color:black;
  font-size: 12px;
  font-weight: 600;
}
.agileits-top .dropdown
{
  position: relative;
  display: block;
  color: #4ABCBC ;
  margin-bottom: 7px;
  cursor: pointer;
  padding: 10px 15px 10px 12px;
  font-family: 'Courier New', Courier, monospace;
  border: 1px solid rgba(255, 255, 255, 0.37);
 
  width:94.5%;
  border-radius:15px 16px;
}
select
{
  width: 89.5%;
  font-size: 0.9em;
  font-weight: 100;
    /* width: 90%; */
    display: block;
    border: none;
    border-radius: 15px;
    margin-bottom: 7px;
    cursor: pointer;
    padding: 10px 15px 10px 12px;
    border: solid 2px rgba(74, 233, 220, 0.884);
    -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
    transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #fff 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #fff 4%);
    background-position: -800px 0;
    background-size: 100%;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    color: white; 
    /* option {
      color: black; 
    } */
    
}
/* Header */

body {
  font-family: "Open Sans", Helvetica, sans-serif;
}

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
    height: 90px;
  }

  .navbar-nav>li>a {
    padding: 0;
    margin-top: 20px;
    margin-left: 30px;
    line-height: 50px;
  }

  .navbar-brand {
    font-size: 30px;
    padding: 0;
    height: 100px;
    line-height: 85px;
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
   
    
    margin-top: 10px;
    margin-left: 30px;
    line-height: 20px;
    /* transition: all 0.5s ease-out; */
    /* padding: 12px 16px; */
}

/* Header */
      
</style>
 
</head>
<body>
	<!-- main -->
  <!--  -->
	<div class="main-w3layouts wrapper">
  <header>
		<nav id="main-navbar" class="navbar navbar-default">
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
              <a href="#">Employee</a>
              <a href="service_provider">Service provider</a>
          </div>
            </li>
					</ul>
				</div>
			</div>
		</nav>
	</header>



		<h1 style="margin-top:60px;">Sign Up</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST" name="form" action="cust_reg.php">
                    <input class="text" type="text" name="name" id="txt1" placeholder="Name" required="" oninput="custName()"><span id ="consid"></span>
                    <input class="text" type="text" name="address" id="txt2" placeholder="Address" required="" oninput="custAddress()"><span id = "consid2"></span>
                    <input class="text" type="text" name="phone" id="txt3" placeholder="Phone" required="" oninput="custPhone()"><span id = "consid3"></span>
                   
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="dist" required="">
                      <span class="caret-dropdown-menu"></span>
                      <option value="">-Select-</option>
                        <?php
                           
                           while($data_dis=mysqli_fetch_array($sql_result))
                           {
                               echo "<option value='".$data_dis['district_id']."'>" .$data_dis['district_name'] ."</option>";
                           }  
                            ?>
                        
                        </select>
                    </div>
                  
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="location" required="">
                      <span class="caret-dropdown-menu"></span>
                      <option value="">-Select-</option>
                        <?php
                           
                           while($data_loc=mysqli_fetch_array($result_loc))
                           {
                               echo "<option value='".$data_loc['location_id']."'>" .$data_loc['location'] ."</option>";
                           }  
                                

                            ?>
                        
                        </select>
                    </div>
                    <input class="text email" type="email" name="email" id="txt4" placeholder="Email" required="" oninput="custEmail()"><span id = "consid4"></span>
                    <input class="text" type="text" name="username" placeholder="Username" id="txt6" required="" oninput="myuname()"><span id = "consid6"></span>
                    <input class="text" type="password" name="password" placeholder="Password" required="" id="txt7" oninput="pass()"><span id = "consid7"></span>
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" id="txt8" required="" oninput="mycpassword()"><span id = "consid8"></span>
					<span id='message'></span>
          <div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" name="checkbox" required>
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		
		
	</div>
  <!-- //main -->
  <script>
    document.addEventListener("click", closeAllSelect);
    $('#txt7, #txt8').on('keyup', function () {
  if ($('#txt7').val() == $('#txt8').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
// header
$(window).scroll(function () {
	var sc = $(window).scrollTop()
	if (sc > 150) {
		$("#main-navbar").addClass("navbar-scroll")
	} 
	else {
		$("#main-navbar").removeClass("navbar-scroll")
	}
});

// #header
</script>
  </script>
  <?php
    mysqli_close($con);
  ?>
</body>
</html>