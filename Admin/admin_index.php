<?php
session_start();
if($_SESSION['role_id']!="1"){
  header('location:../login.php');
}
$con=mysqli_connect("localhost","root","","projectdb");
$lid="";
// $_SESSION['uname']=;

//  total num of customers
$count="SELECT * from tbl_customer";
$count_query=mysqli_query($con,$count);
$row = mysqli_num_rows($count_query);

//total num of service providers
$count_sp="SELECT * from tbl_login where role_id=4 and aproval_status=1";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);

// new requested service providers
$count_s="SELECT lid from tbl_login where role_id=4 and aproval_status=0 and is_delete=1";
$counts_query=mysqli_query($con,$count_s);
$row_s = mysqli_num_rows($counts_query);


// total number of employee
$count_emp="SELECT * FROM tbl_employee";
$emp_query=mysqli_query($con,$count_emp);
$row_emp = mysqli_num_rows($emp_query);

// Insert Image and update
if(isset($_POST['insertimg'])){
  $pic=$_FILES['myImage']['name'];
  $target_dir = "images/";
  $target_path=$target_dir.$pic;
  move_uploaded_file($_FILES['myImage']['tmp_name'],$target_path);

}
// service image
if(isset($_POST['insert_serv'])){
  $pic1=$_FILES['scImage']['name'];
  $target_dir1 = "images/icon/";
  $target_path1=$target_dir1.$pic1;
  move_uploaded_file($_FILES['scImage']['tmp_name'],$target_path1);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet"> -->
        <title>Admin Index</title>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../css/admin_stylesheet.css"  rel="stylesheet" media="all">
        <link href="../css/theme.css" rel="stylesheet" media="all">
        <script src="../js/sidebarfun.js"></script>
        <script src="../js/demo.js"></script>
      
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
        <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>
  </head>
  <style>

  </style>

  <body>


  <div id="wrapper">
   <div class="overlay"></div>

        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="Admin_index.php">
          <span class="align-middle">End To End Workers</span>
        </a>

				   <ul class="navbar-nav align-self-stretch">

          <li class="sidebar-header">
                Pages
		      </li>

	        <li class=""><a class="nav-link text-left active" href="#sp_table" onclick="adminhome()" id="home">Home
            <i class="flaticon-bar-chart-1"></i>
              </a>
          </li>
      <li class="has-sub">
		    <a class="nav-link collapsed text-left active" id="dropdown-toggle" href="#collapseExample2" role="button" data-toggle="collapse">
          Admin Location Control
         </a>
      <div class="collapse menu mega-dropdown" id="collapseExample2">

      <div class="dropmenu" aria-labelledby="navbarDropdown">
		    <div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box">
										<ul class="list-unstyled m-0" id="dropdown-menu">
											<li><a href="admin_location.php">Add District</a></li>
											<li><a href="admin_loc.php">Add Location</a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
		     </div>
		  </div>
		  </li>
      <li class="has-sub">
        <a class="nav-link collapsed text-left active" href="#collapseExample" role="button" data-toggle="collapse" >
          <i class="flaticon-user"></i>   Service
          </a>
        <div class="collapse menu mega-dropdown" id="collapseExample">
          <div class="dropmenu" aria-labelledby="navbarDropdown">
        <div class="container-fluid ">
                  <div class="row">
                    <div class="col-lg-12 px-2">
                      <div class="submenu-box">
                        <ul class="list-unstyled m-0">
                          <li><a href="admin_sc.php">Service Category</a></li>
                          <li><a href="admin_service.php" value="serv">Services</a></li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
            </div>
          </div>
		  </li>


          <li class="">
            <a class="nav-link text-left active" href="admin_sp.php" onclick="serviceprovider()" id="spdata"> Service Provider</a>
            </li>

            <li class="">
                <a class="nav-link text-left active" href="admin_emp.php"> Employee </a>
            </li>
            <li class="">
              <a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false" href="admin_bk.php" onclick="cust()">Customers </a>
            </li>


    </nav>
        <!-- /#sidebar-wrapper -->


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
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </button>
                  </div>
                </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown  d-sm-none">

              <!-- Dropdown - Messages -->
              <!-- <div class="dropdown-menu dropdown-menu-right p-3">
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
              </div> -->
            </li>

            <!-- Nav Item - Alerts -->

          


            <!-- Nav Item - User Information -->
            <li>
              <a  href="#" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Welcome <?php echo $_SESSION['uname']; ?></b></label>
              </a>
            </li>
            <li>
              <a  href="../logout.php" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Signout</b></label>
              </a>
            </li>

          </ul>

        </nav>
  </div>

        <!-- End of Topbar -->
<div id="sp_table" style="display:inline ;">
  <h4 style="margin:30px;color:grey;">Dashboard</h4>
    <div class="container-fluid px-lg-4">
      <div class="row">

      <div class="notify"><span id="notifyType" class=""></span></div>
        <div class="col-md-12">
          <div class="row">
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-4">Sevice Providers</h5>
                          <h1 class="display-5 mt-1 mb-3">
                          <?php
                              echo $row_sp;
                            ?>
                          </h1>

                        </div>
                      </div>

                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-4">Customers</h5>
                          <h1 class="display-5 mt-1 mb-3">
                            <?php
                              echo $row;
                            ?>
                          </h1>

                        </div>
                      </div>

                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-4">Employes</h5>
                          <h1 class="display-5 mt-1 mb-3"><?php echo $row_emp;?></h1>

                        </div>
                      </div>

                    </div>
                </div>
          </div>
      </div>
        <div class="col-md-12 mt-4">
                        <div class="card" id="servicepro" style="display:inline">
                            <div class="card-body">
                                <!-- title -->
                                <!-- <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Top booked services based on location</h4>
                                        <h5 class="card-subtitle">Research part</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="dl">
                                            <select class="custom-select">
                                                <option value="0" selected="">Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- title -->
                                <h3 style="font-family: Times New Roman, Times, serif;">Service Providers Request</h3>
                            </div>

                            <!-- Service provider data -->
                            <div id="Service_pro">
                              <div class="table-responsive">
                                  <table class="table v middle" id="tbl_home">
                                      <thead>
                                          <tr class="bg-light">
                                              <th class="border-top-0">Name</th>
                                              <th class="border-top-0">Licence</th>
                                              <th class="border-top-0">Category</th>
                                              <th class="border-top-0">District</th>
                                              <th class="border-top-0">Location</th>
                                              <th class="border-top-0">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        if($row_s>0)
                                        {

                                          $count_s="SELECT lid from tbl_login where role_id=4 and aproval_status=0 and is_delete=1";
                                          $counts_query=mysqli_query($con,$count_s);
                                          $row_s = mysqli_num_rows($counts_query);
                                          while($data=mysqli_fetch_array($counts_query))
                                      {

                                          $lid=$data['lid'];
                                          $_SESSION['lid']=$lid;
                                          $sp_name="select * from tbl_serviceproviders where login_id=$lid";
                                          $serv_query=mysqli_query($con,$sp_name);
                                          while($dta=mysqli_fetch_array($serv_query))
                                          {
                                          $sp_names=$dta['sp_name'];
                                          $lno=$dta['lisenceno'];
                                          $d=$dta['sc_id'];
                                          $dis=$dta['district_id'];
                                          $loc=$dta['location_id'];
                                        }
                                      ?>
                                          <tr>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <h4 class="m-b-0 font-16"><?php echo $sp_names; ?></h4>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                                <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"><?php echo $lno; ?></label>
                                                      </div>
                                                  </div>
                                                </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"> <?php
                                              $sc="SELECT * FROM tbl_service_category where sc_id=$d";
                                                $sc_query=mysqli_query($con,$sc);
                                                $data=mysqli_fetch_array($sc_query);
                                                $sc_name= $data['sc_name'];
                                                echo $sc_name;
                                              ?> </label>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"> <?php
                                                              $district="select * from tbl_district where district_id=$loc";
                                                              $dis_query=mysqli_query($con,$district);
                                                              $district_name=mysqli_fetch_array($dis_query);
                                                              echo $district_name['district_name'];
                                                              ?>
                                                          </label>
                                                      </div>
                                                  </div>

                                              </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16">
                                                          <?php
                                                            $location="select * from tbl_location where location_id=$loc";
                                                            $loc_query=mysqli_query($con,$location);
                                                            $location_name=mysqli_fetch_array($loc_query);
                                                            echo $location_name['location'];
                                                          ?>
                                                          </label>
                                                      </div>
                                                  </div>

                                              </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16">
                                                          <h5 class="m-b-0"><button class="btn btn-sm btn-success btn-inline sc_approve" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Approve">Approve</button><a>
                                                          <button class="btn btn-sm btn-danger btn-inline sc_reject" onclick=""  title="Delete">Reject</button></a><a>
                                                          </h5>
                                                          </label>
                                                      </div>
                                                  </div>

                                              </td>
                                          </tr>
                                          <?php
                                      }
                                    }
                                      ?>
                                      </tbody>
                                  </table>
                              </div>
                            <!-- Service provider data -->
                        </div>

                        <div id="searchresult" style="display:none">
                        <div id="result-body">

                        </div>
                        </div>
                    </div>
        <!-- /.container-fluid -->
    </div>

		<!-- Service providers and employee details -->
    </div>
  </div>

    <!-- /#wrapper -->


 <!-- Admin District control -->
    <span id="error-msg"></span>




  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>


$(document).ready(function(){

    $('#searchbar').keyup(function() {
        var value = $(this).val();
        console.log(value);
        if(value!= '')
        {
          $.ajax({
                    url: "../searchfetch.php",
                    method:"POST",
                    data :{
                      val : value
                      },
                    success: function(data){
                      console.log(data);
                      $('#result-body').html(data);
                      $("#searchresult").css("display", "inline");
                      $('#Service_pro').css("display","none");
                      $('.sc_approve').on('click',function()
                      {
                        var apr=$(this).closest('tr').find('th:nth-child(1)').text();
                        var sc_nam=apr.trim();
                        var log='<?php echo $lid; ?>';
                        $(this).closest("tr").remove();
                        $.ajax({
                          url: "admin_uploaddata.php",
                          method:"POST",
                          data :{
                          ser_name :sc_nam,
                          login :log,
                        },
                          success: function(response){
                            $('#sucess-msg').text(response);
                          }
                        });

                      });

                    }
                });
            }
            else
            {
              $('#searchresult').html('');
            }
    });
});

// Approve service Providers

$(document).on('click','.sc_approve',function()
{
  var serPro_name= $(this).closest('tr').find('th:nth-child(1)').text();
  var sc_name=serPro_name.trim();
  var login='<?php echo $lid; ?>';
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    ser_name :sc_name,
    login :login,
    },
      success: function(response){
        alert(result);
      }
  });

});

// Dismiss active sp
    // $(document).on('click','.sp_dismiss',function()
    // {
    //   var dismiss_sp= $(this).closest('tr').find('td:eq(2)').text();
    //   $(this).closest("tr").remove();
    //   console.log(dismiss_sp);

    //   $.ajax({
    //     url: "admin_uploaddata.php",
    //     method:"POST",
    //     data :{
    //       dis:dismiss_sp
    //     },
    //     success:function(result)
    //     {

    //     }
    //   });
    // });

// End dismiss active sp


// reject sp sc_reject

$(document).on('click','.sc_reject',function()
{
  var rej_name= $(this).closest('tr').find('th:nth-child(1)').text();
  var rj_name=rej_name.trim();
  $(this).closest("tr").remove();
  var login='<?php echo $lid; ?>';
    console.log(login);

  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    reject :rj_name,
    login :login,
    },
      success: function(response){
        $('#sucess-msg').text(response);
      }
  });

});



$('#bar').click(function(){
	$(this).toggleClass('open');
  $('#page-content-wrapper ,#sidebar-wrapper,#adminlocation,#admin_sc_management,#service_management,#servicepro',).toggleClass('toggled');

});

$('home').click(function()
{
  $('#servicepro').show();
  $('#new-location,#service_cate,#new-district,#services','#serviceprovider').hide();
});
$('#spdata').click(function()
{
  $('#serviceprovider').show();
  $('#new-location,#service_cate,#new-district,#services').hide();
});
  </script>
  <?php
    mysqli_close($con);
  ?>
  </body>
</html>
