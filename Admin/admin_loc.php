<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Location Management</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
 select {
        width: 140px;
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
                      <li><a href="admin_sc.php">Service Category</a></li>
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
          <ul class="navbar-nav ml-auto py-2">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           
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
            <!-- Nav Item - Alerts -->

          </ul>
        </nav>

        <!-- End Top bar -->

<div class="col-xs-6">
  <h4 style="padding-left:30px;padding-top:20px;color:grey;">Dashboard</h4>
</div>
<br>
    <div class="row">
        <div class="col">
            <button class="btn btn-dark" id="add-new-loc">Add New</button>
                                
            <div class="table-responsive" id="loc-body">
                <table class="table table-data3" id="add-location" style="margin-left:20px;">
                    <thead>
                        <tr>
                            <th>District</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT * FROM tbl_district where is_delete=1";
                        $sql_query=mysqli_query($con,$sql);
                        $num=mysqli_num_rows($sql_query);
                        while($data=mysqli_fetch_array($sql_query))
                        {
                            $dis_id=$data['district_id'];
                        ?>
                        <tr>
                            <th rowspan="1" style="text-align:left;"> 
                                <?php
                                echo $data['district_name'];
                                ?>
                            </th>
                                <?php
                                    $loc_data="select * from tbl_location where district_id=$dis_id and is_delete='1'";
                                    $loc_data_query=mysqli_query($con,$loc_data);
                                    while($loc_details=mysqli_fetch_array($loc_data_query))
                                    {?>
                        <tr style="text-align:center;">
                            <td></td>
                            <td>
                                <?php
                                    echo $loc_details['location'];
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success btn-inline loc_edit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                <button class="btn btn-sm btn-danger btn-inline loc_del" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                            </td>
                        </tr>
                            <?php
                                }
                            ?>
                        </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col bg-white" id="new-loc" style="display:none;">
            <table class="table table-bordered" style="margin-top:150px;">
                    <thead class="thead-light">
                        <tr>
                            <th>Location</th>
                            <th>District</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" class="form-control" required="" id="loc-name"></input></th>
                            <th>
                            <div class="dropdown">
                                <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="dist" id="dis-name" required="">
                                <span class="caret-dropdown-menu"></span>
                                <option value="">-District-</option>
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
                                <button class="btn btn-sm btn-primary" style="padding-top: 3px; padding" id="upload-data" title="Upload/View data"><i class="fa fa-upload"></i></button>
                            </td>
                        </tr>
                    </thead>
            </table>
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
  $('#page-content-wrapper ,#sidebar-wrapper,#loc-body').toggleClass('toggled');
});


// Insert New Location
$(document).ready(function(){
  $("#add-new-loc").on('click',function(){
    $("#loc-body").width("50%");
    $("#new-loc").css("display","inline");
    $("#upload-data").on('click',function(){
    // $("#add-location").append("<tr><td scope='row'>"+$("#loc-name").val()+"</td><td scope='row' id='dname'>"+$("#dis-name").val()+"</td><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>");
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
        $("#loc-name").val(" ");
        }
      });
    });
  });
});

// End 

// Edit Location

$(document).on('click','.loc_edit',function()
{
    $("#loc-body").width("50%");
    $("#new-loc").css("display","inline");
    var loc= $(this).closest('tr').find('td:eq(1)').text();
    var loca=loc.trim();
    $("#loc-name").val(loca);
    // $(this).closest("tr").remove();
    $("#upload-data").on('click',function(){
        var loc_new=$("#loc-name").val();
        var dis=$("#dis-name").val();


  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    loc_edit :loc_new,
    locat:loca,
    new_dis :dis
    },
      success: function(result){
        alert(result);
        $("#add-location").append(result);
        $("#loc-name").val(" ");
      }
    });
  });
});
// End Edit Location

// Delete Location
$(document).on('click','.loc_del',function()
{
  var loca= $(this).closest('tr').find('td:eq(1)').text();
  var loce=loca.trim();
//   $(this).closest("tr").remove();
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

// End delete Location
</script>
    
</body>
</html>