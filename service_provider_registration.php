
<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

$sql="SELECT * FROM tbl_district WHERE is_delete=1";
$sql_result=mysqli_query($con,$sql);


$loc="SELECT * FROM tbl_location WHERE is_delete=1";
$result_loc=mysqli_query($con,$loc);

$sc="SELECT * FROM tbl_services Where iS_delete=1";
$sc_query=mysqli_query($con,$sc);


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
<link rel="stylesheet" href="stylesheet.css" type="text/css" media="all" />
<script src="js/validate.js"></script>
<link rel="stylesheet"   href="stylesheet.css"/>
<style>
  

</style>
<script>
    
    //       function myname()
    //       {
    //       var n=document.getElementById("txt1");
    //       var letter=/^[^\s]+( [^\s]+)+$/;
    //       if(n.value == "")
    //       {
    //         document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid name</span>";
    //             txt1.focus();
    //             return false;
    //      }
    //     else if(!n.value.match(letter))
    //       {
    //         document.getElementById("consid").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
    //             txt1.focus();
    //             return false;
    //       }
    //       else if(n.value.match(letter))
    //       {
    //           document.getElementById("consid").innerHTML = "<span class='error'></span>";
    //           return false;
    //       }
    //     }
    //     function myaddress()
    //     {
    //       var n=document.getElementById("txt2");
    //       var letter=/[A-Za-z]+$/;
    //       if(n.value == "")
    //       {
    //         document.getElementById("consid2").innerHTML = "<span class='error'>Please enter a valid Address</span>";
    //         textarea1.focus();
    //             return false;
    //     }
    //     else if(!n.value.match(letter))
    //       {
    //         document.getElementById("consid2").innerHTML = "<span class='error'>This is not a valid address. Please try again</span>";
    //         textarea1.focus();
    //             return false;
    //       }
    //       else if(n.value.match(letter))
    //       {
    //           document.getElementById("consid2").innerHTML = "<span class='error'></span>";
    //           return false;
    //       }
    //     }
    //     function myphone()
    //     {
    //       var n4=document.getElementById("txt3");
    //       var p=/^[789]\d{9}$/;
    //       if(n4.value == "")
    //       {
    //         document.getElementById("consid3").innerHTML = "<span class='error'>Please enter a valid Phone number</span>";
    //         txt3.focus();
    //             return false;
    //     }
    //     if(!n4.value.match(p))
    //     {
    //         document.getElementById("consid3").innerHTML= "<span class='error'>This is not a valid Phone number. Please try again</span>";
    //         txt3.focus();
    //         return false;
    //     }
    //     else if(n4.value.match(p))
    //         {
    //           document.getElementById("consid3").innerHTML = "<span class='error'></span>";
    //               return false;
    //         }
    //     }
    //     function myemail()
    //     {
    //       var n=document.getElementById("txt4");
    //       var e=/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //       if(n.value == "")
    //       {
    //         document.getElementById("consid4").innerHTML = "<span class='error'>Please enter a valid email Address</span>";
    //         inputEmail.focus();
    //             return false;
    //     }
    //     else if(!n.value.match(e))
    //       {
    //         document.getElementById("consid4").innerHTML = "<span class='error'>This is not a valid email address. Please try again</span>";
    //         inputEmail.focus();
    //             return false;
    //       }
    //     else if(n.value.match(e))
    //         {
    //           document.getElementById("consid4").innerHTML = "<span class='error'></span>";
    //               return false;
    //         }
    //     }
    //     function myuname()
    //     {
    //       var n5=document.getElementById("txt6");
    //       var u=/[a-zA-Z]+$/;
    //       if(n5.value == "")
    //       {
    //         document.getElementById("consid6").innerHTML = "<span class='error'>Please enter a valid username Address</span>";
    //         txt6.focus();
    //             return false;
    //     }
    //     if(!n5.value.match(u))
    //     {
    //       document.getElementById("consid6").innerHTML = "<span class='error'>This is not a valid Username. Please try again</span>";
    //           txt6.focus();
    //           return false;
    //     }
    //     else if(n5.value.match(u))
    //         {
    //           document.getElementById("consid6").innerHTML = "<span class='error'></span>";
    //               return false;
    //         }
    //     }
    //     function mypassword()
    //     {
    //       var n6=document.getElementById("txt7");
    //       var ps=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
    //       if(n6.value == "")
    //       {
    //         document.getElementById("consid7").innerHTML = "<span class='error'>Please enter a valid password</span>";
    //         txt7.focus();
    //             return false;
    //     }
    //     if(!n6.value.match(ps))
    //     {
    //       document.getElementById("consid7").innerHTML = "<span class='error'>This is not a valid Username. Please try again</span>";
    //           txt7.focus();
    //           return false;
    //     }
    //     else if(n6.value.match(ps))
    //         {
    //           document.getElementById("consid7").innerHTML = "<span class='error'></span>";
    //               return false;
    //         }
    //     }
    //     function mycpassword()
    //     {
    //       var n7=document.getElementById("txt7");
    //       var n8=document.getElementById("txt8");
    //       if(n8.value == "")
    //       {
    //         document.getElementById("consid8").innerHTML = "<span class='error'>Please enter a valid password</span>";
    //         txt8.focus();
    //         return false;
    //     }
    //     if(n7.value==n8.value)
    //     {

    //       document.getElementById("consid8").innerHTML = "<span class='error'></span>";
    //           return false;
    //     }
    //     else {
    //       document.getElementById("consid8").innerHTML = "<span class='error'> Password Missmatch</span>";
    //           txt8.focus();
    //           return false;
    //     }
    // }
  

</script>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
  <header>
		<nav id="main-navbar" class="navbar navbar-default">
			<div class="container navbar-container">
				<div class="navbar-header">
					<h1 class="navbar-brand">End To End Workers</h1>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">
          <span class="glyphicon glyphicon-home"></span> Home
        </a></li>
            <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li>
            <div class="dropdown" id="drp" >
            <a href="#" class="dropbtn"><span class="glyphicon glyphicon-triangle-bottom"></span> Service Category</a>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content">
              <a href="emp_registration.php">Employee</a>
              <a href="cust_registration.php">Customer</a>
          </div>
            </li>
					</ul>
				</div>
			</div>
		</nav>
  </header>
  

		<h1 style="margin-top :60px;"> Sign Up</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST" name="form" action="sp_reg.php">
                    <input class="text" type="text" name="name" id="txt1" placeholder="Name" required="" oninput="custName()"><span id ="consid"></span>
                    <input class="text" type="text" name="address" id="txt2" placeholder="Address" required="" oninput="custAddress()"><span id = "consid2"></span>
                    <input class="text" type="text" name="phone" id="txt3" placeholder="Phone" required="" oninput="custPhone()" ><span id = "consid3"></span>
                    <input class="text email" type="email" name="email" id="txt4" placeholder="Email" required="" oninput="custEmail()"><span id = "consid4"></span><span id="error_email"></span>

                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="dist" required="">
                      <span class="caret-dropdown-menu"></span>
                        <option>--District--</option>
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
                        <option>--City--</option>
                        <?php
                           
                           while($data_loc=mysqli_fetch_array($result_loc))
                           {
                               echo "<option value='".$data_loc['location_id']."'>" .$data_loc['location'] ."</option>";
                           }  
                                

                            ?>
                        
                        </select>
                    </div>
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="sc" required="">
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
                    <input class="text" type="text" name="licensceno" id="txt9" placeholder="Licenseno" required="" oninput="mylicense()"><span id = "consid9"></span>
                    <input class="text" type="text" name="username" placeholder="Username" id="txt6" required="" oninput="custuname()"><span id = "consid6"></span><span id="error_uname"></span>
                    <input class="text" type="password" name="password" placeholder="Password" required="" id="txt7" oninput="pass()"><span id = "consid7"></span>
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" id="txt8" required="" oninput="mycpassword()"><span id = "consid8"></span>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" name="checkbox" required>
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Have an Account? <a href="#"> Login Now!</a></p>
			</div>
		</div>
		
		
	</div>
  <!-- //main -->
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


$('document').ready(function(){
   $('#txt4').keyup(function(){
      var email= $('#txt4').val();
      // alert(email);
      $.ajax({
        url: "sp_check.php",
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
        url: "sp_check.php",
        method: "POST",
        data : {
  
          username: username
        },
        success: function(response){
          // $('#txt6').css("borderColor","red");
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
  </script>
  <?php
    mysqli_close($con);
  ?>
</body>
</html>