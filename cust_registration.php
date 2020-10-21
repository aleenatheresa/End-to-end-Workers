
<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

$sql="SELECT * FROM tbl_district WHERE is_delete=1";
$result1=mysqli_query($con,$sql);

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
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Custom Theme files -->
<link rel="stylesheet" href="stylesheet.css" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<!-- <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet"> -->
<!-- //web font -->
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
    font-weight: 80;
    text-transform: capitalize;
    letter-spacing: 4px;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 40px;
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

}

/*-- start editing from here --*/
a {
  text-decoration: none;
}
.error{
  color:black;
  font-size: 12px;
  font-weight: 600;
}
.dropdown
{
  position: relative;
  display: block;
  color: #4ABCBC ;
  margin-bottom: 7px;
  cursor: pointer;
  padding: 10px 15px 10px 12px;
  font-family: 'Courier New', Courier, monospace;
  border: 1px solid;
  color: rgba(74, 233, 220, 0.884);
  width:94.5%;
  border-radius: 15px;
}
select
{
  width: 89.5%;
  font-size: 0.9em;
  font-weight: 100;
    /* width: 90%; */
    display: block;
    border: none;
    
    padding: 0.7em;
    /* border: solid 2px rgb(255, 255, 255); */
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

</style>
<script>
    
          function myname()
          {
          var n=document.getElementById("txt1");
          var letter=/[A-Za-z]+$/;
          if(n.value == "")
          {
            document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid name</span>";
                txt1.focus();
                return false;
         }
        else if(!n.value.match(letter))
          {
            document.getElementById("consid").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
                txt1.focus();
                return false;
          }
          else if(n.value.match(letter))
          {
              document.getElementById("consid").innerHTML = "<span class='error'></span>";
              return false;
          }
        }
        function myaddress()
        {
          var n=document.getElementById("txt2");
          var letter=/[A-Za-z]+$/;
          if(n.value == "")
          {
            document.getElementById("consid2").innerHTML = "<span class='error'>Please enter a valid Address</span>";
            textarea1.focus();
                return false;
        }
        else if(!n.value.match(letter))
          {
            document.getElementById("consid2").innerHTML = "<span class='error'>This is not a valid address. Please try again</span>";
            textarea1.focus();
                return false;
          }
          else if(n.value.match(letter))
          {
              document.getElementById("consid2").innerHTML = "<span class='error'></span>";
              return false;
          }
        }
        function myphone()
        {
          var n4=document.getElementById("txt3");
          var p=/^[789]\d{9}$/;
          if(n4.value == "")
          {
            document.getElementById("consid3").innerHTML = "<span class='error'>Please enter a valid Phone number</span>";
            txt3.focus();
                return false;
        }
        if(!n4.value.match(p))
        {
            document.getElementById("consid3").innerHTML= "<span class='error'>This is not a valid Phone number. Please try again</span>";
            txt3.focus();
            return false;
        }
        else if(n4.value.match(p))
            {
              document.getElementById("consid3").innerHTML = "<span class='error'></span>";
                  return false;
            }
        }
        function myemail()
        {
          var n=document.getElementById("txt4");
          var e=/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(n.value == "")
          {
            document.getElementById("consid4").innerHTML = "<span class='error'>Please enter a valid email Address</span>";
            inputEmail.focus();
                return false;
        }
        else if(!n.value.match(e))
          {
            document.getElementById("consid4").innerHTML = "<span class='error'>This is not a valid email address. Please try again</span>";
            inputEmail.focus();
                return false;
          }
        else if(n.value.match(e))
            {
              document.getElementById("consid4").innerHTML = "<span class='error'></span>";
                  return false;
            }
        }
        function myuname()
        {
          var n5=document.getElementById("txt6");
          var u=/[a-zA-Z]+$/;
          if(n5.value == "")
          {
            document.getElementById("consid6").innerHTML = "<span class='error'>Please enter a valid username Address</span>";
            txt6.focus();
                return false;
        }
        if(!n5.value.match(u))
        {
          document.getElementById("consid6").innerHTML = "<span class='error'>This is not a valid Username. Please try again</span>";
              txt6.focus();
              return false;
        }
        else if(n5.value.match(u))
            {
              document.getElementById("consid6").innerHTML = "<span class='error'></span>";
                  return false;
            }
        }
        function mypassword()
        {
          var n6=document.getElementById("txt7");
          var ps=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
          if(n6.value == "")
          {
            document.getElementById("consid7").innerHTML = "<span class='error'>Please enter a valid password</span>";
            txt7.focus();
                return false;
        }
        if(!n6.value.match(ps))
        {
          document.getElementById("consid7").innerHTML = "<span class='error'>This is not a valid Username. Please try again</span>";
              txt7.focus();
              return false;
        }
        else if(n6.value.match(ps))
            {
              document.getElementById("consid7").innerHTML = "<span class='error'></span>";
                  return false;
            }
        }
        function mycpassword()
        {
          var n7=document.getElementById("txt7");
          var n8=document.getElementById("txt8");
          if(n8.value == "")
          {
            document.getElementById("consid8").innerHTML = "<span class='error'>Please enter a valid password</span>";
            txt8.focus();
                return false;
        }
        if(n7.value==n8.value)
        {

          document.getElementById("consid8").innerHTML = "<span class='error'></span>";
              return false;
        }
        else {
          document.getElementById("consid8").innerHTML = "<span class='error'> Password Missmatch</span>";
              txt8.focus();
              return false;
        }
  }
  

</script>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Create Account</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST" name="form" action="reg.php">
                    <input class="text" type="text" name="name" id="txt1" placeholder="Name" required="" onblur="myname()"><span id ="consid"></span>
                    <input class="text" type="text" name="address" id="txt2" placeholder="Address" required="" onblur="myaddress()"><span id = "consid2"></span>
                    <input class="text" type="text" name="phone" id="txt3" placeholder="Phone" required="" onblur="myphone()"><span id = "consid3"></span>
                   
                    <div class="dropdown">
                      <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="district" required="">
                      <span class="caret-dropdown-menu"></span>
                        <option disabled selected>--District--</option>
                   
                        <?php
                                while($data_dis=mysqli_fetch_array($result1))
                                {
                                    echo "<option value='".$data_dis['district_id'] ."'>" .$data_dis['district_name'] ."</option>";
                                }
                            
                        ?>
                        
                      </select>
                    </div>
                  
                    <div class="dropdown">
                    <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="location" required="">
                      <span class="caret-dropdown-menu"></span>
                        <option disabled selected>--City--</option>
                        <?php
                           
                           while($data_loc=mysqli_fetch_array($result_loc))
                           {
                               echo "<option value='".$data_loc['location_id'] ."'>" .$data_loc['location'] ."</option>";
                           }  
                                

                            ?>
                        
                        </select>
                    </div>
                    <input class="text email" type="email" name="email" id="txt4" placeholder="Email" required="" onblur="myemail()"><span id = "consid4"></span>
                    <input class="text" type="text" name="username" placeholder="Username" id="txt6" required="" onblur="myuname()"><span id = "consid6"></span>
                    <input class="text" type="password" name="password" placeholder="Password" required="" id="txt7" onblur="mypassword()"><span id = "consid7"></span>
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" id="txt8" required="" onblur="mycpassword()"><span id = "consid8"></span>
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
    document.addEventListener("click", closeAllSelect);
    
</script>
  </script>
  <?php
    mysqli_close($con);
  ?>
</body>
</html>