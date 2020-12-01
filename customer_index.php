<?php
session_start();
if($_SESSION['role_id']!="2"){
  header('location:login.php');
}
$con=mysqli_connect("localhost","root","","projectdb");
$user=$_SESSION['uname'];
$data="SELECT * FROM tbl_login where uname='$user'";
$data_query=mysqli_query($con,$data);
$row=mysqli_fetch_array($data_query);
$lid=$row['lid'];
$uname=$row['uname'];
$_SESSION['login']=$lid;
$cust="SELECT * FROM tbl_customer where login_id=$lid";
$cust_query=mysqli_query($con,$cust);




//  total num of customers
$count="SELECT * from tbl_customer";
$count_query=mysqli_query($con,$count);
$row = mysqli_num_rows($count_query);

//total num of service providers
$count_sp="SELECT * from tbl_serviceproviders";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Customer Index</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="cust_index.css">
         <script src="js/cust_sidebar.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  </head>
  <style>
  fieldset {
    border: 1px solid #000;
    width:auto;
}
  </style>
  
  <body>
  
  <div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="Admin_index.html">
          <span class="align-middle">End To End Workers</span>
        </a>

				 <ul class="navbar-nav align-self-stretch">
	 
        <li class="sidebar-header">	
                Pages
		</li>
	<li class=""><a class="nav-link text-left active" href="#book" onclick="home()"><i class="fa fa-home" aria-hidden="true"></i>Home
 
         </a>
          </li>
          <li class="has-sub"> 
		  <a class="nav-link collapsed text-left active" href="#collapseExample2" role="button" data-toggle="collapse">
      <i class="fa fa-ticket" aria-hidden="true"></i>  Customer Booking 
         </a>
		  <div class="collapse menu mega-dropdown" id="collapseExample2">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#new-district" href="#book" onclick="home()">Booking</a></li>
											<li><a href="#new-location" href="#booking" onclick="cust_book()">Booking Details</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
          <li class=""> 
            <a class="nav-link text-left active" href="#profile" onclick="userprofile()">
            <i class="fa fa-user" aria-hidden="true"></i>  Profile
           </a>
            </li>
          
          <li class=""> 
            <a class="nav-link text-left active"  role="button" 
            aria-haspopup="true" aria-expanded="false" href="#" name="sp" id="s2">
            <i class="fa fa-money" aria-hidden="true"></i>  Service Rate
           </a>
            </li>

          
	   
    </nav>
        <!-- /#sidebar-wrapper -->
<!-- service category -->

  

        <!-- Page Content -->
        <div id="page-content-wrapper">
         
			
			<div id="content">

       <div class="container-fluid p-0 px-lg-0 px-md-0">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light my-navbar">

          <!-- Sidebar Toggle (Topbar) -->
            <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
               <span></span>
			    <span></span>
				 <span></span>
            </div>
			

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown  d-sm-none">
         
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
				            	placeholder="Search for..." >
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
        <!-- -->
          

            <!-- Nav Item - User Information -->
            
            <li class="nav-item dropdown">
							<a class="nav-icon dropdown" href="" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
								<div class="position-relative">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
									<span class="indicator"> 
                    <?php
                  $notif="select * from tbl_login where role_id=4 and aproval_status=1";
                  $notif_query=mysqli_query($con,$notif);
                  $notif_row=mysqli_num_rows($notif_query);
                  echo $notif_row;
                  ?>
                </div>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>				
						</li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><label ><b style="font-famiy: Times New Roman, Times, serif;"><?php echo $_SESSION['uname']?></b></label></span> </a>                                 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Update</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                           
                    </div>
                                              
		
            </li> 

          </ul>

        </nav>

<span id="sucess-msg" style="background-color:red;text-align:center;"></span>
        <!-- End of Topbar -->

</div>

                                     
    <!-- /#wrapper -->
         <!-- Service Category -->
         
      <div class="container" id="book" style="text-align:center;display:block">
      <h1>Book Now</h1>
         <div class="row">
         <?php
          $services="SELECT * FROM tbl_services WHERE is_delete='1'";
          $ser_query=mysqli_query($con,$services);
          while($row=mysqli_fetch_array($ser_query))
          {
            $image=$row['img'];
            $scname=$row['sc_name'];
         ?>
         <div class="column" style="margin-left:10px;margin-top:15px">
  <div class="card" style="width: 18rem; display:block;">
  <img src="images/<?php echo $image;?>" class="card-img-top" alt="9.jpg" width="80px" height="200px">
  <div class="card-body">
    <a href="#" class="btn btn-link" onclick=bksc()><?php echo $scname; ?></a>
  </div>
</div>
          </div>
<?php
          }
?>
</div>
</div>
<!-- Service category -->
    <!-- customer Profile -->
<div id="profile" style="display:none">
<div class="container col-sm-6">
<fieldset>
  <table class="table table-borderless">
  
  <legend><h1>Profile</h1></legend>
  <thead>
  <?php
  while($r=mysqli_fetch_array($cust_query))
  {
    $name=$r['customer_name'];
    $addr=$r['customer_address'];
    $ph=$r['customer_phone'];
    $email=$r['customer_email'];
    $dis_id=$r['district_id'];

  ?>
    <tr>
      <th scope="col">Name :</th>  
      <th>
    <?php
      echo $name;
      $_SESSION['name']=$name;
    ?>
    </th>
    </tr>
    <tr>
      <th scope="col">Addres :</th> 
      <th>
    <?php
      echo $addr;
      $_SESSION['addr']=$addr;
      ?>
    </th> 
    </tr>
    <tr>
      <th scope="col">Phone:</th> 
      <th>
    <?php
      echo $ph;
      $_SESSION['phone']=$ph;
      ?>
    </th> 
    </tr>
    <tr>
      <th scope="col">email:</th>  
    <th>
    <?php
      echo $email;
      $_SESSION['email']=$email;
      ?>
    </th>
    </tr>
    <?php
    $dis="select * from tbl_district where district_id=$dis_id";
    $dis_query=mysqli_query($con,$dis);
    $dis_row=mysqli_fetch_array($dis_query);
    $did=$dis_row['district_name'];
    $d=$dis_row['district_id'];
    $loc="select * from tbl_location where district_id=$d";
    $loc_query=mysqli_query($con,$loc);
    $loc_row=mysqli_fetch_array($loc_query);
    $location=$loc_row['location'];
    ?>
    <tr>
      <th scope="col">District:</th>
      
    <th>
    <?php
      echo $did;
      $_SESSION['dis']=$did;
      ?>
    </th> 
    </tr>
    <tr>
      <th scope="col">City:</th>  
      <th>
    <?php
      echo $location;
      $_SESSION['location']=$location;
      ?>
    </th> 
    </tr>
    <tr>
      <th scope="col">username:</th>  
      <th>
    <?php
      echo $user;
      ?>
    </th> 
    </tr>
  </thead>

 
    <?php
     }
     ?>

  </table>
</fieldset>
<div class="btn">
<button type="button" class="btn btn-link" id="btn_proedit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
</div>
</div>
</div>
<div id="booking" style="display:none;">
  <table class="table table-bordered col-sm-8" style="margin-left:40px;">
    <thead>
    <tr>
    <th>Booked On</th>
    <th>Booking ID</th>
    <th>Booked On</th>
    <th>Services</th>
    </tr>
    </thead>

  </table>

</div>
<div id="edit" style="display:none;">
<table class="table table-bordered col-sm-3" >

<tr>
<th>Name :<input type="text" value="<?php echo $_SESSION['name']?>" id="name"></th>

</tr>
<tr>
<th>Address :<input type="text" value="<?php echo $_SESSION['addr']?>" id="addr"></th>

</tr>
<tr>
<th>Phone :<input type="text" value="<?php echo $_SESSION['phone']?>" id="ph"></th>

</tr>
<tr>
<th>Email :<input type="text" value="<?php echo $_SESSION['email']?>" id="em"></th>

</tr>
<tr>
<th>Username :<input type="text" value="<?php echo $user?>" id="user"></th>

</tr>
</table>
<button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="proedit" title="Upload/View data"><i class="fa fa-upload"></i>Save</button>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
<script>
$(document).ready(function(){
  $("#btn_proedit").on('click',function(){
      $("#edit").css("display","inline");
      $("#proedit").on('click',function(){
          // $("#pre-sc").append("<tr><td>"+$("#c1").val()+"</td><td>"+$("#c2").val()+"</td><td style='border-top:0px;text-align:center'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
          var name = $("#name").val();
          var addr=$("#addr").val();
          var phone=$("#ph").val();
          var email=$("#em").val();
          var uname=$("#user").val();
          $.ajax({
                url: "edit_customer.php",
                method:"POST",
                data :{ 
                  name:name,
                  address: addr,
                  phone:phone,
                  email:email,
                  uname:uname},
                success: function(result){
                  $('#sucess-msg').text("sucessfully entered");
                  $("#edit").css("display","none");
                  $("#profile").replaceWith(result);
               
                }
                
           });
          
        });
  });
});

function bksc()
{

}

$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#booking,#book').toggleClass('toggled');

});
  </script>
  </body>
</html>