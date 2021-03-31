<?php
session_start();
if($_SESSION['role_id']!="1"){
  header('location:login.php');
}
$con=mysqli_connect("localhost","root","","projectdb");
$lid="";
// $_SESSION['uname']="asd";

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

// Insert Image
if(isset($_POST['insert'])){
  $pic=$_FILES['myImage']['name'];
  $target_dir = "images/";
  $target_path=$target_dir.$pic;
  move_uploaded_file($_FILES['myImage']['tmp_name'],$target_path);
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
        <link rel="stylesheet" href="admin_stylesheet.css">
        <link href="css/theme.css" rel="stylesheet" media="all">
        <script src="js/sidebarfun.js"></script>
        <script src="js/demo.js"></script>
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-2.1.4.js"></script> -->
        <!-- <script src='https://cdn.jsdelivr.net/jquery.cloudinary/1.0.18/jquery.cloudinary.js' type='text/javascript'></script> -->
        <!-- <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script> -->
  </head>
  <style>
     #sucess-msg
    {
      margin-left: 50%;
      background-color : #FFFF99;
      border : 1px black;
      width : 100%;

    }
    
.card .card-title {
    position: relative;
    font-weight: 600;
    margin-bottom: 10px;
}


.card .card-subtitle {
    font-weight: 300;
    margin-bottom: 10px;
    color: #a1aab2;
	  margin-top: -0.375rem;
}

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
											<li><a href="#new-district" onclick="admindist()" id="district">Add District</a></li>
											<li><a href="#new-location" onclick="adminloc()" id="location">Add Location</a></li>
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
											<li><a href="#service_cate" onclick="service_cat()" id="sc">Service Category</a></li>
											<li><a href="#services" onclick="serve()" id="serv">Services</a></li> 
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
         

          <li class="">
            <a class="nav-link text-left active" href="#servicepro" onclick="serviceprovider()" id="spdata"> Service Provider</a>
            </li>

            <li class="">
                <a class="nav-link text-left active" href="#emp" onclick="employe()"> Employee </a>
                </li>
                <li class="">
            <a class="nav-link text-left active"  role="button"
            aria-haspopup="true" aria-expanded="false" href="#customer" onclick="cust()">  Customers </a>
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

           <li class="nav-item dropdown">
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

                         </table></div>
												<!-- <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div> -->
											</div>
										</div>
									</a>

								</div>
								<!-- <div class="dropdown-menu-footer">
									<a href="#servicepro" class="text-muted">Show all notifications</a>
								</div> -->
							</div>
<?php } ?>
						</li>


            <!-- Nav Item - User Information -->
            <li>
              <a  href="#" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Welcome <?php echo $_SESSION['uname']; ?></b></label>
              </a>
            </li>
            <li>
              <a  href="logout.php" id="userDropdown" role="button" >
                <label ><b style="font-famiy: Times New Roman, Times, serif;">Signout</b></label>
              </a>
            </li>

          </ul>

        </nav>


        <!-- End of Topbar -->
<div id="sp_table" style="display:inline ;">
<h4 style="margin:30px;color:grey;">Dashboard</h4>
  <div class="container-fluid px-lg-4">
  <div class="row">
  <div class="col-md-12 mt-lg-4 mt-4">
          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
			Generate Report</a>
          </div> -->
    </div>
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
                            <div class="table-responsive" >
                            
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">License</th>
                                            <th class="border-top-0">Service Category</th>
                                            <!-- <th class="border-top-0">Service</th> -->
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
                    </div>
        <!-- /.container-fluid -->


		<!-- Service providers and employee details -->
    </div>
  </div>

    <!-- /#wrapper -->


 <!-- Admin District control -->
    <!-- <span id="error-msg"></span> -->

  
 <div id="adminlocation">
    <div id="new-district" style="display:none;">
      <div class="container">
        <button class="btn btn-primary" data-target="#demo-lg-modalSMSAll" data-toggle="modal" id="add-new-dis">Add New</button>

          <div class="row">
            <div class="col-12">
              <table class="table table-bordered" id="add-district" style="width: 800px; margin-left :40px;">
                <thead>
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
                    <th scope="row">
                    <?php

                      echo $data['district_name'];
                    ?>
                    </th>
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
        </div>
            <table class="table" id="new-dis" style="display:none;margin-left :250px;">
                    <thead>
                            <tr>
                                <th>District</th>
                                <th>Actions</th>
                            </tr>
                            <tbody>
                            <tr>
                                <td><input type="text" class="form-control" required="" id="dis"></input></td>
                                <!-- <td><input type="text" class="form-control" required="" id="c2"></input></td> -->
                                <td style="border-top:0px;">
                                <!-- <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="edit"><i class='fas fa-edit'></i></button><a>
                                <button class="btn btn-sm btn-danger del" title="Delete" id="del"><i class="fa fa-times" aria-hidden="true"></i></button></a><a> -->
                                <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload" title="Upload/View data"><i class="fa fa-upload"></i></button>
                                </a></td>

                            </tr>
                        </thead>
            </table>
       </div>
    </div>
  </div>               
<br>
            <!-- Location Management -->
      <div id="new-location" style="display: none;">
       
            <div class="row m-t-30">
                            <div class="col-md-12">
                               <button class="btn btn-primary" data-target="#demo-lg-modalSMSAll" data-toggle="modal" id="add-new-loc" style="margin-left:30px;">Add New</button>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="add-location">
                                        <thead>
                                            <tr>
                                                <th>Location</th>
                                                <th>District</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql="SELECT * FROM tbl_location where is_delete=1";
                                            $sql_query=mysqli_query($con,$sql);
                                            while($data=mysqli_fetch_array($sql_query))
                                            {
                                              $dis_id=$data['district_id'];

                                          ?>
                                            <tr>
                                                <td> <?php echo $data['location']; ?></td>
                                                <td> <?php
                                                  $district="SELECT * FROM tbl_district where district_id=$dis_id and is_delete=1";
                                                  $dis_query=mysqli_query($con,$district);
                                                  while($row=mysqli_fetch_array($dis_query))
                                                  {
                                                    echo $row['district_name'];
                                                  }
                                                ?></td>
                                                <td>
                                                <button class="btn btn-sm btn-success btn-inline loc_edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                                <button class="btn btn-sm btn-danger btn-inline loc_del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                                                </a>
                                                </td>
                                                
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                                                  

 
  <!-- </div> -->
 
         

  <!-- add new location  text field-->
             <table class="table" id="new-loc" style="display:none;margin-left :250px;">
                          <thead>
                                  <tr>
                                      <th>Location</th>
                                      <th>District</th>
                                      <th>Actions</th>
                                  </tr>
                                  <tbody>
                                  <tr>
                                  <th><input type="text" class="form-control" required="" id="loc-name"></input></th>
                                  <th><div class="dropdown">
                                  <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="dist" id="dis-name" required="">
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
                                      </th>

                                      <td style="border-top:0px;text-align:right">
                                      <!-- <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="edit-data"><i class='fas fa-edit'></i></button><a>
                                      <button class="btn btn-sm btn-danger loc_del" title="Delete" id="del-data"><i class="fa fa-times" aria-hidden="true"></i></button></a><a> -->
                                      <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload-data" title="Upload/View data"><i class="fa fa-upload"></i></button>
                                      </a></td>

                                  </tr>
                              </thead>
            </table>
      </div>
    <!-- </div>
  </div>
</div> -->
<!-- #admin location control -->

<!--  admin service category management-->
 
    <div id="service_cate" style="display:none;">
      <div class="container col-sm-12" >
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <!-- <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div> -->
                        <div>
                            <button type="button" class="btn btn-info add-new"  id="add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="pre-sc">
                    <thead>
                        <tr>
                            <!-- <th>slno</th> -->
                            <th>Service Category</th> 
                            <th>Amount/Day</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                $services="SELECT * FROM tbl_service_category WHERE is_delete='1'";
                                $ser_query=mysqli_query($con,$services);
                                while($row=mysqli_fetch_array($ser_query))
                                {?>
                        <tr>
                            <!-- <td>John Doe</td> -->
                            <th>
                              <?php
                                  echo $row['sc_name'];
                                  $amt=$row['amount'];
                                  $image=$row['img'];

                              ?>
                            </th>
                            <th>
                              <?php
                                echo $amt;
                              ?>
                            </th>
                            <th>
                              <img src="images/<?php echo $image;?>" width="60px" height="50px"/>

                            </th>
                            <td style="border-top:0px;text-align:center;">
                            <button class="btn btn-sm btn-success btn-inline sc_edit" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                            <button class="btn btn-sm btn-danger btn-inline sc_del" onclick=""  title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                            <!-- <button class="btn btn-sm btn-primary btn-inline" style="padding-top: 3px;" onclick="" title="Upload/View data"><i class="fa fa-upload"></i></button> -->
                            </a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
              </div>
        </div>   
      </div> 
    </div>
       <!-- Add new category -->

   <table class="table" id="new-sc" style="display : none;margin-left :50px;">
              <thead>
                      <tr>
                          <th>Service Category</th>
                          <th>Amount</th>
                          <th>Image</th>
                          <th>Actions</th>
                      </tr>
                      <tbody>
                      <tr>
                        <form action="#" name="upload" method="post" enctype="multipart/form-data">
                          <td><input type="text" class="form-control" required="" id="c1"></input></td>
                          <td><input type="text" class="form-control" required="" id="c2"></input></td>
                          <td><input type="file" name="myImage" id="img" accept="image/*" /></td>
                          <td style="border-top:0px;text-align:right">
                          <!-- <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="sc1"><i class='fas fa-edit'></i></button><a>
                          <button class="btn btn-sm btn-danger" title="Delete" id="sc2"><i class="fa fa-times" aria-hidden="true"></i></button></a><a> -->
                          <button class="btn btn-sm btn-primary" type="submit" style="padding-top: 3px; padding" id="sc3" name="insert" title="Upload/View data"><i class="fa fa-upload"></i></button>
                          </a></td>
                        </form>
                      </tr>
                  </thead>
              </table>

    <!-- services inside each service category -->
       <div id="services" style="display:none;">
             <div class="row m-t-30">
                            <div class="col-md-12">
                              <div>
                                <button type="button" class="btn btn-info add-new"  id=""><i class="fa fa-plus"></i> Add New</button>
                              </div>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>type</th>
                                                <th>description</th>
                                                <th>status</th>
                                                <th>price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>Mobile</td>
                                                <td>iPhone X 64Gb Grey</td>
                                                <td class="process">Processed</td>
                                                <td>$999.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                      </div>
                </div>
<!-- Admin sc management -->




<!-- Employee Details -->
  <div id="emp" style="display:none;">
  <table class="table table-bordered">
  <thead>

  <tr>
  <th>Name</th>
  <th>Service Provider</th>
  <th>Service Category</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $employe="select * from tbl_employee";
    $employee_query=mysqli_query($con,$employe);
    while($r=mysqli_fetch_array($employee_query))
    {
      $name=$r['employee_name'];
      $sp=$r['sp_id'];
      $sc=$r['sc_id'];
    ?>
  <tr>
  <th><?php echo $name; ?></th>
  <th><?php
  $service_providers="select * from tbl_serviceproviders where sc_id=$sc";
  $sp_query=mysqli_query($con,$service_providers);
  while($row=mysqli_fetch_array($sp_query))
  {
    echo $row['sp_name'];
  }
  ?></th>
  <th>
  <?php
  $sc="select * from tbl_services where sc_id=$sc";
  $sc_query=mysqli_query($con,$sc);
  while($row=mysqli_fetch_array($sc_query))
  {
    echo $row['sc_name'];
  }
  ?>
  </th>
  <td>
    <button class="btn btn-sm btn-success btn-inline sc_edit" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
    <button class="btn btn-sm btn-danger btn-inline sc_del" onclick=""  title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
  </td>
  </tr>
  <?php
    }
  ?>
  </tbody>
  </table>
  </div>

<!-- Employee Details -->

<!-- customer Details -->
  <div id="customer" style="display:none;">
    <h2 style="font-family: Times New Roman, Times, serif;">Booking Details</h2>
      <table class="table table-bordered">
      <thead>
      <tr>
      <th>Customer Name</th>
      <th>Service</th>
      <th>Booking Date</th>
      
      </tr>
      </thead>
      <tbody>
        <?php
        $custom_data="select * from tbl_booking where status=1";
        $cu_query=mysqli_query($con,$custom_data);
        while($c=mysqli_fetch_array($cu_query))
        {
          $custm_id=$c['customer_id'];
          $bk=$c['booking_id'];
          $bk_date=$c['booked_on'];
          $ser_cat=$c['service_id'];
          $cus_id="select * from tbl_customer where customer_id=$custm_id";
          $cus_query=mysqli_query($con,$cus_id);
          $cu=mysqli_fetch_array($cus_query);
          $cu_name=$cu['customer_name'];
          $service="select * from tbl_services where service_id=$ser_cat";
          $ser_query=mysqli_query($con,$service);
          $service_category=mysqli_fetch_array($ser_query);
          $service_name=$service_category['service_name'];
        ?>
      <tr>
      <th><?php echo $cu_name; ?></th>
      <th><?php echo $service_name; ?></th>
      <th><?php echo $bk_date; ?></th>
      </tr>
      <?php
        }
      ?>
      </tbody>
      </table>
    </div>
<!-- customer Details -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
// add edit and delete service category
$(document).ready(function(){

  $("#add-new").on('click',function(){
      $("#new-sc").css("display","inline");
      $("#sc3").on('click',function(){
          // $("#pre-sc").append("<tr><td>"+$("#c1").val()+"</td><td>"+$("#c2").val()+"</td><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
          var sc = $("#c1").val();
          var amt=$("#c2").val();

          var fileInput = document.getElementById('img');
          var filename = fileInput.files[0].name;

        // var fd = new FormData(this);
        // var files = $('#img')[0].files[0];
        //    fd.append('file',files);
        //    console.log(fd);

          $.ajax({
                url: "admin_uploaddata.php",
                method:"POST",
                data :{

                  service_catagory :sc,
                  amount:amt,
                  file:filename

                  },
                success: function(result){
                  console.log('RESULT : ' + this);
                  $('#pre-sc').append(result);
                  $("#c1").val(" ");
                  $("#c2").val(" ");

                }

           });
        });

  });
});
  // district and location add
  $(document).ready(function(){
  $("#add-new-loc").on('click',function(){
    $("#new-loc").css("display","inline");
    $("#upload-data").on('click',function(){
    $("#add-location").append("<tr><td scope='row'>"+$("#loc-name").val()+"</td><td scope='row' id='dname'>"+$("#dis-name").val()+"</td><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
    var loc = $("#loc-name").val();
    var dis=$("#dis-name").val();
    $.ajax({
        url: "admin_uploaddata.php",
        method:"POST",
        data :{
        location:loc,
        district :dis,
        },
        success: function(result){
        $('#add-location').append(result);
        $("#loc-name").val(" ");

        // $('#error_uname').text(response);
        }
      });
  });
  });
  $("#add-new-dis").on('click',function(){
    $("#new-dis").css("display","inline");
    $("#upload").on('click',function(){
    $("#add-district").append("<tr><th scope='row'>"+$("#dis").val()+"</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
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
                 
                  // $("#c2").reset();
                }
              });
  });
});

});
// delete district from db

$(document).on('click','.del',function()
{
  var dist= $(this).closest('tr').find('th:nth-child(1)').text();
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
                  // $("#dis").val(" ");
    }
  });

});
// Edit District values
$(document).on('click','.edit',function()
{
  $("#new-dis").css("display","inline");
  var dis= $(this).closest('tr').find('th:nth-child(1)').text();
  var dist=dis.trim();
  $("#dis").val(dist);
  $(this).closest("tr").remove();
  $("#upload").on('click',function(){
    var dist_new=$("#dis").val();
    console.log(dist_new);

  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    dist_edit :dist_new,
    distee:dist
  },
    success: function(result){
      $("#add-district").append(result);
      $("#dis").val(" ");
    }
  });
  });
});

// delete location


$(document).on('click','.loc_del',function()
{
  var loca= $(this).closest('tr').find('th:nth-child(1)').text();
  var loce=loca.trim();
  $(this).closest("tr").remove();

  console.log(loce);
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
      loce :loce},
    success: function(result){
      $("#add-location").append(result);
                  $("#loc-name").val(" ");
    }
  });

});

// Edit Location

$(document).on('click','.loc_edit',function()
{
  $("#new-loc").css("display","inline");
  var loc= $(this).closest('tr').find('td:ntd-child(1)').text();
  var loca=loc.trim();
  $("#loc-name").val(loca);
  $(this).closest("tr").remove();
  $("#upload-data").on('click',function(){
    var loc_new=$("#loc-name").val();
    var dis=$("#dis-name").val();
    console.log(loc_new);
    
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    loc_edit :loc_new,
    locat:loca,
    new_dis :dis
  },
    success: function(result){
      $("#add-location").append(result);
      $("#loc-name").val(" ");
    }
  });
  });
});
// delete sc
$(document).on('click','.sc_del',function()
{
  var sc= $(this).closest('tr').find('td:ntd-child(1)').text();
  var ser_cat=sc.trimStart();
  $(this).closest("tr").remove();

  console.log(ser_cat);
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
      ser_cat :ser_cat},
    success: function(result){
      $("#pre-sc").append(result);
                  // $("#loc-name").val(" ");
    }
  });

});

// Edit SC

$(document).on('click','.sc_edit',function()
{
  $("#new-sc").css("display","inline");
  var ser_cat= $(this).closest('tr').find('th:nth-child(1)').text();
  var sc=ser_cat.trim();
  $("#c1").val(sc);
  $(this).closest("tr").remove();
  $("#sc3").on('click',function(){
    var sc_new=$("#c1").val();
    var amt_new=$("#c2").val();
    console.log(sc_new);

  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    ser :sc_new,
    old_sc :sc,
    new_amt:amt_new
  },
    success: function(result){
      $('#pre-sc').append(result);
      $("#c1").val(" ");
      $("#c2").val(" ");
    }
  });
  });
});

// Approve service Providers

$(document).on('click','.sc_approve',function()
{
  var serPro_name= $(this).closest('tr').find('th:nth-child(1)').text();
  var sc_name=serPro_name.trim();
  $(this).closest("tr").remove();
  var login='<?php echo $lid; ?>';
    console.log(sc_name);

  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    ser_name :sc_name,
    login :login,
  },
    success: function(response){
      $('#sucess-msg').text(response);
      // $("#c1").val(" ");
      // $("#c2").val(" ");
    }
  });

});

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

  $('#district').click(function()
{
  $('#new-district').show();
  $('#new-location,#service_cate,#services,#servicepro').hide();

})
$('#location').click(function()
{
  $('#new-location').show();
  $('#new-district,#service_cate,#services,#servicepro').hide();
})
$('#sc').click(function()
{
  $('#service_cate').show();
  $('#new-location,#new-district,#services,#servicepro').hide();
})
$('#serv').click(function()
{
  $('#services').show();
  $('#new-location,#service_cate,#new-district,#servicepro').hide();
})
$('home').click(function()
{
  $('#servicepro').show();
  $('#new-location,#service_cate,#new-district,#services').hide();
})
$('#spdata').click(function()
{
  $('#servicepro').show();
  $('#new-location,#service_cate,#new-district,#services').hide();
})
});


  </script>
  </body>
</html>