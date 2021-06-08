<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
$lid="";
//total num of service providers
$count_sp="SELECT * from tbl_login where role_id=4 and aproval_status=1";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Location</title>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      

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

	        <li class=""><a class="nav-link text-left active" href="admin_index.php" >Home
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
                              <li><a href="admin_location.php" id="district">Add District</a></li>
                              <li><a href="admin_loc.php" onclick="adminloc()" id="location">Add Location</a></li>
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
                      <li><a href="admin_sc.php" id="sc">Service Category</a></li>
                      <li><a href="#services" id="serv" value="serv">Services</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		  </li>
      <li class="">
        <a class="nav-link text-left active" href="admin_sp.php" id="spdata"> Service Provider</a>
      </li>
      <li class="">
        <a class="nav-link text-left active" href="admin_emp.php" onclick="employe()"> Employee </a>
      </li>
      <li class="">
        <a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false" href="admin_bk.php" onclick="cust()">  Customers </a>
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
              <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search" id="searchbar">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="search_submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           

            <!-- Nav Item - Alerts -->

           <!-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown" href="" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
								<div class="position-relative">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
									<span class="indicator" >
                    <?php
                    echo $row_s;
                  ?>
                </span>
                </div>
              </a>
              <?php if ($row_s>0){ ?>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
                  <?php echo $row_s;
                  ?> new notifications
								</div>
								<div class="list-group">
									<a href="#servicepro" class="list-group-item">
										<div class="row no-gutters align-items-center">

											<div class="col-12">
                        <div class="text-dark"><table><?php
                        while($d=mysqli_fetch_array($counts_query))
                        {

                           $logid=$d['lid'];
                           $sp_na="select * from tbl_serviceproviders where login_id=$logid";
                           $ser_query=mysqli_query($con,$sp_na);
                            while($spr=mysqli_fetch_array($ser_query))
                            {
                              $n=$spr['sp_name'];
                            }
                          ?><tr><?php
                          echo $n." sends you an aproval Request<br>";
                          ?></tr>
                        <?php
                       }
                       ?>

                         </table>
                      </div>
                        </div>
										</div>
									</a>

								</div></div>
                            <?php } ?>
					</li> -->


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
<div class="col-xs-6">
  <h4 style="padding-left:30px;padding-top:20px;color:grey;">Dashboard</h4>
</div>
<div class="container">
  <div class="row">
    <div class="col">
        <button class="btn btn-dark" id="add-new-dis">Add New</button>
      <table class="table table-bordered" id="add-district">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">District</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                        $sql="SELECT * FROM tbl_district where is_delete=1";
                        $sql_query=mysqli_query($con,$sql);
                        while($data=mysqli_fetch_array($sql_query))
                        {
                          $dis_id=$data['district_id'];
                      ?>
                  <tr>
                    <td scope="row">
                    <?php

                      echo $data['district_name'];
                    ?>
                    </td>
                    <td style="border-top:0px;text-align:right;">
                            <button class="btn btn-sm btn-success btn-inline edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                <button class="btn btn-sm btn-danger btn-inline del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </td>
                  </tr>
                <?php
                    }
                ?>

                </tbody>
      </table>
    </div>
    <div class="col bg-white" id="new-dis" style="display:none;">
      <table class="table table-bordered" style="margin-top:150px;">
        <thead class="thead-light">
          <tr>
            <th scope="col">District</th>
            <th scope="col">Actions</th>
          </tr>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" required="" id="dis"></input></td>
            <td style="border-top:0px;">
              <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload" title="Upload/View data"><i class="fa fa-upload"></i></button>  
            </td>
          </tr>
        </thead>
      </table>            
    </div>
  </div>
</div>
                   

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
  $('#bar').click(function(){
	$(this).toggleClass('open');
  $('#page-content-wrapper ,#sidebar-wrapper,#adminlocation').toggleClass('toggled');
});
  $(document).ready(function(){
    $("#add-new-dis").on('click',function(){
      $("#add-district").width("60%");
      $("#new-dis").css("display","inline");
      $("#upload").on('click',function(){
      // $("#add-district").append("<tr><th scope='row'>"+$("#dis").val()+"</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
      var district = $("#dis").val();
            $.ajax({
                  url: "admin_uploaddata.php",
                  method:"POST",
                  data :{
                    dis :district},
                  success: function(result){
                    if(result==1)
                    {
                        alert("District already exist");
                    }
                    else
                    {
                      $("#add-district").append(result)
                      $("#dis").val(" ");
                    }
                  }
                });
          });
      });
    });
  
// delete district from db

  $(document).on('click','.del',function()
  {
    var dist= $(this).closest('tr').find('td:eq(0)').text();
    var diste=dist.trim();
    //  var dist= $(this).val();
    //  console.log(dist);
    $(this).closest("tr").remove();
    console.log(diste);
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      diste :diste},
      success: function(result){
        // $("#add-district").append(result);
                    $("#dis").val(" ");
      }
    });

  });
// Edit District values
  $(document).on('click','.edit',function()
  {
    
    $("#add-district").width("60%");
    $("#new-dis").css("display","inline");
    var dis= $(this).closest('tr').find('td:eq(0)').text();
    var dist=dis.trim();
    $("#dis").val(dist);
    $("#upload").on('click',function(){
      var dist_new=$("#dis").val();
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      dist_edit :dist_new,
      distee:dist
    },
      success: function(data){
        alert(data);
        $("#add-district").append(data);
        $("#dis").val(" ");
      }
    });
    });
  });
  
  </script>
</body>
</html>