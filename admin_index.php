<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");



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
        <title>Admin Index</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="admin_stylesheet.css">
         <script src="js/sidebarfun.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  </head>
  
  
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
	<li class=""><a class="nav-link text-left active"  href="#sp_tbale" onclick="adminhome()">Home
       <i class="flaticon-bar-chart-1"></i>  
         </a>
          </li>
          <li class="has-sub"> 
		  <a class="nav-link collapsed text-left active" href="#collapseExample2" role="button" data-toggle="collapse">
        <i class="flaticon-user"></i>  Admin Location Control
         </a>
		  <div class="collapse menu mega-dropdown" id="collapseExample2">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#new-district" onclick="admindist()">Add District</a></li>
											<li><a href="#new-location" onclick="adminloc()">Add Location</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
          <li class=""> 
            <a class="nav-link text-left active" href="#ascm" onclick="adminscmanagment()">
         <i class="flaticon-bar-chart-1"></i>  Category Management
           </a>
            </li>
          
          <li class=""> 
            <a class="nav-link text-left active"  role="button" 
            aria-haspopup="true" aria-expanded="false" href="#" name="sp" id="s2">
         <i class="flaticon-bar-chart-1"></i>  Service Provider
           </a>
            </li>

            <li class=""> 
                <a class="nav-link text-left active"  role="button" 
                aria-haspopup="true" aria-expanded="false" href="#" name="s3">
             <i class="flaticon-bar-chart-1"></i>  Employees
               </a>
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
           <li class="nav-item dropdown">
							<a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
								<div class="position-relative">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<!-- <a href="#" class="list-group-item"> -->
										<div class="row no-gutters align-items-center">
											<!-- <div class="col-2"> -->
												<!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> -->
                                                <!-- <span class="glyphicon glyphicon-bell"></span>
                                            </div> -->
											<div class="" id="notifications">
												<div class="text-dark"><a href="#">4 new Messages</a></div>
												<!-- <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div> -->
											</div>
										</div>
									<!-- </a> -->
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
          

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><label ><b style="font-famiy: Times New Roman, Times, serif;">Profile</b></label></span>
                <!-- <img class="img-profile rounded-circle" src="#"> -->
              </a>                                 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Update</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                           
                    </div>
                                              
		
            </li>

          </ul>

        </nav>

<span id="sucess-msg"></span>
        <!-- End of Topbar -->
<div id="sp_table" style="display: inline;">
        <!-- Begin Page Content -->
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
												<!-- <div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted"></span>
												</div> -->
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
												<h5 class="card-title mb-4">Employess</h5>
												<h1 class="display-5 mt-1 mb-3">2.382</h1>
												<!-- <div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
										
									</div>
									
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0">Service Provider</th>
                                            <th class="border-top-0">Service Category</th>
                                            <th class="border-top-0">Lisence Number</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                      $sp="SELECT * FROM tbl_serviceproviders";
                                      $sp_query=mysqli_query($con,$sp);
                                      $r=mysqli_num_rows($sp_query);
                                      if($r>0)
                                      {
                                      while($data=mysqli_fetch_assoc($sp_query))
                                      {
                                         $d= $data['sc_id'];
                                         $sp_name=$data['sp_name'];
                                         $lno=$data['lisenceno'];
                                          // $sc_name= $data['sc_name'] ;
                                      
                                      
                                      
                                      ?> 
                                      <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a class="btn btn-circle btn-info text-white">
                                                    <?php
                                                         echo $d;
                                                    
                                                    ?>
                                                    </a>
                                                    </div>
                                                    </td>
                                                    
                                                    <td>  
                                                    <div class="d-flex align-items-center">
                                                        
                                                        <?php
                                                              
                                                                echo $sp_name;
                                                        ?>
                                                      
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                            <?php
                                                $sc="SELECT * FROM tbl_services where sc_id=$d";
                                                $sc_query=mysqli_query($con,$sc);
                                                while($data=mysqli_fetch_assoc($sc_query))
                                                {
                                                    $sc_name= $data['sc_name'];
                                                    // $sp_name= $data['sp_name'] ;
                                                
                                                }
                                                  echo $sc_name;
                                                 
                                            ?>
                                            </td>

                                            <td>
                                             
                                            <?php
                                               echo $lno;
                                            ?>
                                            </td>
                                            </tr
                                        <?php 
                                       }}
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div> 

        </div>

        </div>
        <!-- /.container-fluid -->

      
		<!-- Service providers and emplyee details -->
    </div>	
  </div>   
                                     
    <!-- /#wrapper -->
   			
	
    <!-- Admin District control -->
 <div id="adminlocation">
  <div id="new-district" style="display:none;">
  <div class="container">
  <!-- <div style="float: left;"> -->
  <button class="btn btn-primary" data-target="#demo-lg-modalSMSAll" data-toggle="modal" id="add-new-dis">Add New</button>
  <!-- </div> -->
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
           <!-- <td>2.846</td>
            <td>2.846</td> -->
            <td style="border-top:0px;text-align:right;">
                        <button class="btn btn-sm btn-success btn-inline edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i></button><a>
                        <button class="btn btn-sm btn-danger btn-inline del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                        </a></td>
          </tr>
         <?php
             }
         ?>
         
        </tbody>
      </table>
    </div>
  </div>
  <table class="table table-bordered" id="new-dis" style="display:none;margin-left :250px;">
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
                        <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="edit"><i class="fa fa-pencil"></i></button><a>
                        <button class="btn btn-sm btn-danger del" title="Delete" id="del"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                        <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload" title="Upload/View data"><i class="fa fa-upload"></i></button>
                        </a></td>
                        
                    </tr>
                </thead>
            </table> 
       </div>
    </div>
<br>
            <!-- Location Management -->
<div id="new-location" style="display: none;">
<button class="btn btn-primary" data-target="#demo-lg-modalSMSAll" data-toggle="modal" id="add-new-loc" style="margin-left:30px;">Add New</button>
  <!-- </div> -->
  <div class="row">
  <div class="col-12">
      <table class="table table-bordered" id="add-location" style="width: 800px; margin-left :40px;">
        <thead>
          <tr>
            <th scope="col">Location</th>
            <th scope="col">District</th>
            <th scope="col">Actions</th>
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
            <th scope="row">
             <?php
               echo $data['location'];
              
             ?>
            </th>
           <th>
             <?php
               $district="SELECT * FROM tbl_district where district_id=$dis_id";
               $dis_query=mysqli_query($con,$district);
               while($row=mysqli_fetch_array($dis_query))
               {
                 echo $row['district_name'];
               }  
             ?>
           </th>
            <td style="border-top:0px;text-align:right;">
               <button class="btn btn-sm btn-success btn-inline" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i></button><a>
              <button class="btn btn-sm btn-danger btn-inline" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
               </a>
              </td>
          </tr>
         <?php
             }
         ?>
         
        </tbody>
      </table>
   
  <!-- add new location  text field-->
  <table class="table table-bordered" id="new-loc" style="display:none;margin-left :250px;">
            <thead>
                    <tr>
                        <th>Location</th>
                        <th>District</th>
                        <th>Actions</th>
                    </tr>
                    <tbody>
                    <tr>
                    <td><input type="text" class="form-control" required="" id="loc-name"></input></td>
                    <td><div class="dropdown">
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
                        </td>
                      
                        <td style="border-top:0px;text-align:right">
                        <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="edit-data"><i class="fa fa-pencil"></i></button><a>
                        <button class="btn btn-sm btn-danger del" title="Delete" id="del-data"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                        <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload-data" title="Upload/View data"><i class="fa fa-upload"></i></button>
                        </a></td>
                        
                    </tr>
                </thead>
            </table> 
   </div>
</div>
</div>

<!-- #admin location control -->

<!--  admin service category management-->



<div id="admin_sc_management">
<div class="container" style="display: none;" id="ascm">

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <!-- <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div> -->
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-info add-new"  id="add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="pre-sc">
                <thead>
                    <tr>
                        <!-- <th>slno</th> -->
                        <th>Service Category</th>
                        <th>Amount/Month</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $services="SELECT * FROM tbl_services WHERE is_delete='1'";
                            $ser_query=mysqli_query($con,$services);
                            while($row=mysqli_fetch_array($ser_query))
                            {?>
                    <tr>
                        <!-- <td>John Doe</td> -->
                        <td>
                          <?php
                              echo $row['sc_name'];
                              $amt=$row['amount'];
                            
                          ?>
                        </td>
                        <td>
                          <?php
                            echo $amt;
                          ?>
                        </td>
                        <td style="border-top:0px;text-align:center;">
                        <button class="btn btn-sm btn-success btn-inline" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i></button><a>
                        <button class="btn btn-sm btn-danger btn-inline" onclick="" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                        <!-- <button class="btn btn-sm btn-primary btn-inline" style="padding-top: 3px;" onclick="" title="Upload/View data"><i class="fa fa-upload"></i></button> -->
                        </a></td>
                    </tr>
                    <?php
                        }
                    ?>    
                </tbody>
            </table>
           
        </div>
   
    

 <!-- Add new category --> 
 
 <table class="table table-bordered" id="new-sc" style="display : none;margin-left :50px;">
            <thead>
                    <tr>
                        <th>Service Category</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" required="" id="c1"></input></td>
                        <td><input type="text" class="form-control" required="" id="c2"></input></td>
                        <td style="border-top:0px;text-align:right">
                        <button class="btn btn-sm btn-success" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" id="sc1"><i class="fa fa-pencil"></i></button><a>
                        <button class="btn btn-sm btn-danger del" title="Delete" id="sc2"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                        <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="sc3" title="Upload/View data"><i class="fa fa-upload"></i></button>
                        </a></td>
                        
                    </tr>
                </thead>
            </table> 
         
            </div>  
      </div>  
</div>

<!-- Admin sc management -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
<script>
// add edit and delete service category
$(document).ready(function(){
  $("#add-new").on('click',function(){
      $("#new-sc").css("display","inline");
      $("#sc3").on('click',function(){
          $("#pre-sc").append("<tr><td>"+$("#c1").val()+"</td><td>"+$("#c2").val()+"</td><td style='border-top:0px;text-align:center'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
          var sc = $("#c1").val();
          var amt=$("#c2").val();
          $.ajax({
                url: "admin_uploaddata.php",
                method:"POST",
                data :{ 
                  service_catagory :sc,
                  amount:amt},
                success: function(result){
                  $('#sucess-msg').text("1 row entered");
                  $("#c1").val(" ");
                  $("#c2").val(" ");
                // $('#error_uname').text(response);
                }
                // document.getElementById("c1").reset(); 
                // document.getElementById("c2").reset(); 
           });
          
        });
  });
});
  // district and location add
  $(document).ready(function(){
  $("#add-new-loc").on('click',function(){
    $("#new-loc").css("display","inline");
    $("#upload-data").on('click',function(){
    // $("#add-location").append("<tr><th scope='row'>"+$("#loc-name").val()+"</th><th scope='row' id='dname'>"+$("#dis-name").val()+"</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
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
        $("#loc-name").val(" ");
        // $('#error_uname').text(response);
        }
      });
  });
  });
  $("#add-new-dis").on('click',function(){
    $("#new-dis").css("display","inline");
    $("#upload").on('click',function(){
    // $("#add-district").append("<tr><th scope='row'>"+$("#dis").val()+"</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
    var district = $("#dis").val();
          $.ajax({
                url: "admin_uploaddata.php",
                method:"POST",
                data :{ 
                  district :district},
                success: function(result){
                  $("#add-district").append(result);
                  $("#dis").val(" ");
                  // $("#c2").reset();
                }
              });
  });
});

});
// delete from db 

$(document).on('click','.del',function()
{
  //  var dist= $(this).val();
  //  console.log(dist);
  $(this).closest("tr").remove();
  var dist= $('tr').attr('value');
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{ 
    district :dist},
    success: function(result){

    }
  });
});
// upload table items into database




// $(document).ready(function(){
// 	// $('[data-toggle="tooltip"]').tooltip();
// 	// var actions = $("table td:last-child").html();
// 	// Append table with add row form on add new button click
//     $("#add-new").click(function(){
// 		$(this).attr("disabled", "disabled");
// 		var index = $("table tbody tr:last-child").index();
//         var row = '<tr>' +
//             '<td><input type="text" class="form-control" name="name" id="name"></td>' +
//             '<td><input type="text" class="form-control" name="department" id="department"></td>' +
//             '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
// 			'<td>' + actions + '</td>' +
//         '</tr>';
//     	$("table").append(row);		
// 		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
//         $('[data-toggle="tooltip"]').tooltip();
//     });
// 	// Add row on add button click
// 	$(document).on("click", ".add", function(){
// 		var empty = false;
// 		var input = $(this).parents("tr").find('input[type="text"]');
//         input.each(function(){
// 			if(!$(this).val()){
// 				$(this).addClass("error");
// 				empty = true;
// 			} else{
//                 $(this).removeClass("error");
//             }
// 		});
// 		$(this).parents("tr").find(".error").first().focus();
// 		if(!empty){
// 			input.each(function(){
// 				$(this).parent("td").html($(this).val());
// 			});			
// 			$(this).parents("tr").find(".add, .edit").toggle();
// 			$(".add-new").removeAttr("disabled");
// 		}		
//     });
// 	// Edit row on edit button click
// 	$(document).on("click", ".edit", function(){		
//         $(this).parents("tr").find("td:not(:last-child)").each(function(){
// 			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
// 		});		
// 		$(this).parents("tr").find(".add, .edit").toggle();
// 		$(".add-new").attr("disabled", "disabled");
//     });
// 	// Delete row on delete button click
// 	$(document).on("click", ".delete", function(){
//         $(this).parents("tr").remove();
// 		$(".add-new").removeAttr("disabled");
//     });
// });


$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper,#adminlocation,#admin_sc_management').toggleClass('toggled');

});
  </script>
  </body>
</html>