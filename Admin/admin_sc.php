<?php

session_start();
$con=mysqli_connect("localhost","root","","projectdb");


// Insert Image and update
if(isset($_POST['insertimg'])){
    $pic=$_FILES['myImage']['name'];
    $target_dir = "../images/";
    $target_path=$target_dir.$pic;
    move_uploaded_file($_FILES['myImage']['tmp_name'],$target_path);
  
  }
 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Category Management</title>

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
                      <li><a href="admin_sc.php">Service Category</a></li>
                      <li><a href="admin_service.php" id="serv" value="serv">Services</a></li>
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
        <!-- page content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="service_cate" style="display:inline;">
                <div id="cate-body">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div>
                                        <button type="button" class="btn btn-info add-new"  id="add-new"><i class="fa fa-plus"></i> Add New</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-info add-new"  id="deleted-sc"><i class=""></i> Deleted Services</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="pre-sc">
                                <thead>
                                    <tr>
                                        <th>Service Category</th>
                                        <th>Amount/Month</th>
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
                                        <img src="../images/<?php echo $image; ?>" width="60px" height="50px"/>
                                        </th>
                                        <td style="border-top:0px;text-align:center;">
                                        <button class="btn btn-sm btn-success btn-inline sc_edit" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                                        <button class="btn btn-sm btn-danger btn-inline sc_del" onclick=""  title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                                        
                                        </a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" id="new-sc" style="display:none;">
                <table class="table table-bordered">
                <thead class="thead-light">
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
                                <button class="btn btn-sm btn-primary" type="submit" style="padding-top: 3px; padding" id="sc3" name="insertimg" title="Upload/View data"><i class="fa fa-upload"></i></button>
                            </td>
                            </form>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col" id="delsc" style="display:none;">
                <div class="table-responsive">
                    <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                        <th>Service Category</th>
                        <th>Amount/Month</th>
                        <th>Image</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                    $services="SELECT * FROM tbl_service_category WHERE is_delete='0'";
                                    $ser_query=mysqli_query($con,$services);
                                    if(mysqli_num_rows($ser_query)>0)
                                    {
                                    while($row=mysqli_fetch_array($ser_query))
                                    {?>
                            <tr>
                                
                                <td>
                                <?php
                                    echo $row['sc_name'];
                                    $amt=$row['amount'];
                                    $ima=$row['img'];

                                ?>
                                </td>

                        <td><?php echo $amt; ?></td>
                        <td><img src="images/<?php echo $ima; ?>" width="60px" height="50px"/></td>
                        <td><button class="btn btn-sm btn-success btn-inline sc-restore" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit">Restore</button><a></td>
                        </tr>
                        <?php
                                    }}
                                    else{?>
                                    <tr>
                                    <td colspan="4" style="text-align:center">No Deleted Category</td>
                                    </tr>
                                    <?php 
                                    } ?>
                    </tbody>
                    </table>
                </div>
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
  $('#page-content-wrapper ,#sidebar-wrapper,#service_cate').toggleClass('toggled');
});

$(document).ready(function(){
    $("#add-new").on('click',function(){
        $("#delsc").css("display","none");
        $("#new-sc").css("display","inline");
        $("#sc3").on('click',function(){
            var sc = $("#c1").val();
            var amt=$("#c2").val();
            var filename = document.getElementById('img').files[0].name;
            $.ajax({
                    url: "admin_uploaddata.php",
                    method:"POST",
                    data :{
                    service_catagory :sc,
                    amount:amt,
                    file:filename
                    },
                    success: function(result){
                    $('#pre-sc').append(result);
                    $("#c1").val(" ");
                    $("#c2").val(" ");
                    }
                    // timeout: 5000
            });
        });

    });

  // restore deleted sc
    $("#deleted-sc").on('click',function(){
        
            $("#new-sc").css("display","none");
            $('#delsc').css('display','inline');
            $('.sc-restore').on('click',function(){
                var restore= $(this).closest('tr').find('td:eq(0)').text();
                var resetamt=$(this).closest('tr').find('td:eq(1)').text();

                // $(this).closest("tr").remove();
                var res=restore.trim();
                console.log(resetamt);
                $.ajax({
                    url: "admin_uploaddata.php",
                    method:"POST",
                    data :{
                    restor :res,
                    resetamount:resetamt
                    },
                    success: function(result){
                    $("#pre-sc").append(result);
                    }
                });
            });
    });
  // end deleted sc
});

// delete sc
$(document).on('click','.sc_del',function()
{
  var sc= $(this).closest('tr').find('th:nth-child(1)').text();
  var ser_cat=sc.trimStart();
  $(this).closest("tr").remove();
  console.log(ser_cat);
  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
      ser_cat :ser_cat
      },
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
  // $("#c1").val(sc);
  $(this).closest("tr").remove();
  $("#sc3").on('click',function(){
    var sc_new=$("#c1").val();
    var amt_new=$("#c2").val();
    // var img_new=$("#img").val();
    var filename = document.getElementById('img').files[0].name;

  $.ajax({
    url: "admin_uploaddata.php",
    method:"POST",
    data :{
    ser :sc_new,
    old_sc :sc,
    new_amt:amt_new,
    image:filename
    },
      success: function(result){
        $('#pre-sc').append(result);
        $("#c1").val(" ");
        $("#c2").val(" ");
      }
    });
  });
});

</script>
</body>
</html>