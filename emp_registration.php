<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

$sc="SELECT * FROM tbl_service_category Where is_delete=1";
$sc_query=mysqli_query($con,$sc);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"   href="stylesheet.css"/>
    <script src="js/validate.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="main-w3layouts wrapper">
  <header>
		<nav id="main-navbar" class="navbar navbar-default">
			<div class="container navbar-container">
				<div class="navbar-header">
					<h1 class="navbar-brand">End To End Workers</h1>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="1home.html">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></li>
            <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
            <div class="dropdown" id="drp" >
            <a href="#" class="dropbtn"><span class="glyphicon glyphicon-triangle-bottom"></span> Service Category</a>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
              <a href="cust_registration.php">Customer</a>
              <a href="service_provider_registration.php">Service provider</a>
          </div>
            </li>
					</ul>
				</div>
			</div>
		</nav>
	</header>



		<h1 style="margin-top :60px;">Employee Sign Up Here</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST" name="form" action="emp_reg.php">
                    <input class="text" type="text" name="name" id="txt1" placeholder="Name" required="" oninput="custName()"><span id ="consid"></span>
                    <input class="text" type="text" name="address" id="txt2" placeholder="Address" required="" oninput="custAddress()"><span id = "consid2"></span>
                    <input class="text" type="text" name="phone" id="txt3" placeholder="Phone" required="" oninput="custPhone()"><span id = "consid3"></span>
                   
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" onChange="getdistrict(this.value);" type="button" data-toggle="dropdown" name="dist" id="dist_id" required="">
                      <span class="caret-dropdown-menu"></span>
                      <option value="">-Select District-</option>
                        <?php
                                                      
                            $sql="SELECT * FROM tbl_district WHERE is_delete=1";
                            $sql_result=mysqli_query($con,$sql);
                           while($data_dis=mysqli_fetch_array($sql_result))
                           {
                               echo "<option value='".$data_dis['district_id']."'>" .$data_dis['district_name'] ."</option>";
                           }  

                            ?>
                        
                        </select>
                    </div>
                  
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="location" id="location" required="">
                      <span class="caret-dropdown-menu"></span>
                      <option value="">-Select District first-</option>
                        

                          <!-- //   $loc="SELECT * FROM tbl_location WHERE district_id='$dis'";
                          //   $result_loc=mysqli_query($con,$loc);
                          //  while($data_loc=mysqli_fetch_array($result_loc))
                          //  {
                          //      echo "<option value='".$data_loc['location_id']."'>" .$data_loc['location'] ."</option>";
                          //  }  
                                 -->
                        </select>
                    </div>

                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" onChange="getsc(this.value);" type="button" data-toggle="dropdown" name="sc" required="">
                      <span class="caret-dropdown-menu"></span>
                        <option>--Service category--</option>
                        <?php
                           while($data_sc=mysqli_fetch_array($sc_query))
                           {
                               echo "<option value='".$data_sc['sc_id']."'>" .$data_sc['sc_name'] ."</option>";
                           }  
                            ?>
                        
                        </select>
                    </div>
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="service" id="service" required="">
                      <span class="caret-dropdown-menu"></span>
                        <option>--Services--</option>
                        
                        </select>
                    </div>
                    <input class="text email" type="email" name="email" id="txt4" placeholder="Email" required="" oninput="custEmail()"><span id = "consid4"></span><span id="error_email"></span>
                    <input class="text" type="text" name="username" placeholder="Username" id="txt6" required="" oninput="custuname()"><span id = "consid6"></span><span id="error_uname"></span>
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
					<input type="submit" value="SIGNUP" name="submit" id="submit">
				</form>
				<p>Have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		
   
	</div>
  <!-- //main -->

  <!-- // location according to state list -->
<script>
function getdistrict(val){
          $.ajax({
              url: "state-location.php",
              method: "POST",
              data: 'dist_id='+val,
              success: function(result){
                  $('#location').html(result);
              }
              
    });
}

function getsc(val){
  $.ajax({
              url: "state-location.php",
              method: "POST",
              data: 'sc_id='+val,
              success: function(result){
                  $('#service').html(result);
              }
    });
}

$('document').ready(function(){
   $('#txt4').keyup(function(){
      var email= $('#txt4').val();
      // alert(email);
        $.ajax({
          url: "emp_check.php",
          method: "POST",
          data : {
            email: email
          },
          success: function(response){
              // $('#txt4').css("borderColor","red");
              $('#error_email').text(response);  
          }
        });
     });
  // username check
   $('#txt6').keyup(function(){
      var username= $('#txt6').val();
      $.ajax({
        url: "emp_check.php",
        method: "POST",
        data : {
  
          username: username
        },
        success: function(response){
          $('#error_uname').text(response);
        }
      });

   });

  });


    document.addEventListener("click", closeAllSelect);
    $('#txt7, #txt8').on('keyup', function () {
  if ($('#txt7').val() == $('#txt8').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

$(window).scroll(function () {
	var sc = $(window).scrollTop()
	if (sc > 150) {
		$("#main-navbar").addClass("navbar-scroll")
	} 
	else {
		$("#main-navbar").removeClass("navbar-scroll")
	}
});

</script>
  

  <?php
    mysqli_close($con);
  ?>
</body>
</html>