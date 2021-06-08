<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
// service image
if(isset($_POST['insert_serv'])){
    $pic1=$_FILES['scImage']['name'];
    $target_dir1 = "images/icon/";
    $target_path1=$target_dir1.$pic1;
    move_uploaded_file($_FILES['scImage']['tmp_name'],$target_path1);
  }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Services</title>

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
        <a class="nav-link text-left active" href="admin_emp.php"> Employee </a>
      </li>
      <li class="">
        <a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false" href="admin_bk.php">  Customers </a>
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

<div class="container">
    <div class="row">
        <div class="col-sm-12" id="services">
            <div>
                <button type="button" class="btn btn-info add-new"  id="new-service"><i class="fa fa-plus"></i> Add New</button>
                <button type="button" class="btn btn-info del"  id="del-s"> Deleted Services </button>
            </div>
            <table class="table table-data3" id="service-body">
                <thead>
                    <tr>
                        <th>Service Category</th>
                        <th>Service</th>
                        <th>Image</th>
                        <th>Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $services="SELECT * FROM tbl_service_category WHERE is_delete=1";
                $ser_query=mysqli_query($con,$services);
                while($row=mysqli_fetch_array($ser_query))
                {
                 ?>
                    <tr>
                        <th><?php
                            echo $row['sc_name'];
                            $rid=$row['sc_id'];
                            ?>
                        </th>
                            <?php
                            $ser="SELECT * from tbl_services where sc_id=$rid and is_delete=1";
                            $service_query=mysqli_query($con,$ser);
                            if(mysqli_num_rows($service_query)>0)
                            {
                            while($ser_data=mysqli_fetch_array($service_query))
                            {
                            $serimg=$ser_data['service_img'];
                            $seramt=$ser_data['service_amt'];
                            ?>
                    <tr>
                        <td></td>
                        <td>
                            <?php echo $ser_data['service_name'];?>
                        </td>
                        <td>
                            <img src="../images/icon/<?php echo $serimg;?>" id="ser_img" width="60px" height="50px"/>
                        </td>
                        <td class="process">
                            <?php echo $seramt;?>
                        </td>
                        <td style="border-top:0px;text-align:right;">
                            <button class="btn btn-sm btn-success btn-inline sedit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" value="<?php echo $rid; ?>"><i class='fas fa-edit'></i></button><a>
                            <button class="btn btn-sm btn-danger btn-inline sdel" title="Delete" value="<?php echo $rid; ?>"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php
                        }}
                        else
                        { ?>
                    <tr>
                        <td colspan="5" style="text-align:center">No service Category</td>
                    </tr>
                    <?php } ?>
                                             
                    </tr>
                        <?php
                            } 
                        ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="col" id="add-service" style="display:none">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Service</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <form action="#" name="service-upload" method="post" enctype="multipart/form-data">
                                <td><input type="text" class="form-control" required="" id="service"></input></td>
                                <td>
                                  <div class="dropdown">
                                      <select class="btn dropdown-toggle caret-dropdown-menu" type="button" data-toggle="dropdown" name="sc" id="service_id" required="">
                                      <span class="caret-dropdown-menu"></span>
                                      <option value="">-Select Category-</option>
                                      <?php
                                          $service_category="SELECT * FROM tbl_service_category WHERE is_delete=1";
                                          $sc_result=mysqli_query($con,$service_category);
                                          while($data_sc=mysqli_fetch_array($sc_result))
                                          {
                                            echo "<option value='".$data_sc['sc_id']."'>" .$data_sc['sc_name'] ."</option>";
                                          }
                                       ?>
                                    </div>
                                </td>
                                <td><input type="file" name="scImage" id="sc-img" accept="image/icon/*" /></td>
                                <td><input type="text" class="form-control" required="" id="ser-amt"></input></td>
                                <td style="border-top:0px;text-align:center;">
                                  <button class="btn btn-sm btn-primary" type="submit" style="padding-top: 3px; padding" id="service-submit" name="insert_serv" title="Upload/View data"><i class="fa fa-upload"></i></button>
                                </td>
                              </tr>
                            </thead>
            </table>
        </div>
    </div>
    <br>
    <div class="col" id="del-ser" style="display:none">
        <table class="table table-data3" id="del-service-body">
            <thead>
                <tr>
                    <th>Service Category</th>
                    <th>Service</th>
                    <th>Image</th>
                    <th>Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $ct_query=mysqli_query($con,"select * from tbl_services where is_delete=0");
                        if(mysqli_num_rows($ct_query)>0){
                        while($ct=mysqli_fetch_array($ct_query))
                        {
                            $scid=$ct['sc_id'];
                            $servi=mysqli_query($con,"select * from tbl_service_category where sc_id=$scid");
                            $sc=mysqli_fetch_array($servi);
                            echo $sc['sc_name'];
                       
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $ct['service_name'];
                        ?>
                    </td>
                    <td>
                        <img src="../images/icon/<?php echo $ct['service_img'];?>" id="del-ser-img" width="60px" height="50px"/>
                    </td>
                    <td>
                        <?php
                            echo $ct['service_amt'];
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success btn-inline ser-restore" title="Restore">Restore</button>
                    </td>
                </tr>
                <?php
                 }}
                 else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center">No deleted services</td>
                </tr>
                <?php } ?>
            </tbody>
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
    $('#page-content-wrapper ,#sidebar-wrapper,#service_cate').toggleClass('toggled');
    });

    // Service Management
$(document).on('click','#new-service',function()
{
  $('#add-service').css("display","inline");
  $("#service-submit").on('click',function(){
    var name_ser= $('#service').val();
    // var name_ser = $("#service").val();
    var ser_amt=$("#ser-amt").val();
    // var ser_categ=$("#sc-name").val();
    var sercat_id=$("#service_id").val();
    var service_img = document.getElementById('sc-img');
    var sc_filename = service_img.files[0].name;
    
    $.ajax({
      url: "admin_uploaddata.php",
      method:"POST",
      data :{
      service_id: sercat_id,
      service_name :name_ser,
      service_amt:ser_amt,
      // service_catogery:sercat_id,
      service_image:sc_filename
      },
      success: function(data){
        // alert(data)
        $('#add-service').html(data);
        
      }
    });
  });
});

// End Edit services

// Edit Service
$(document).on('click','.sedit',function(){
  $('#add-service').css("display","inline");
    var btnval=$(this).val();
    var oldserv=$(this).closest('tr').find('td:eq(1)').text();
    oldser=oldserv.trim();
      $("#service-submit").on('click',function()
      {
        var ser_name = $("#service").val();
        var ser_amte=$("#ser-amt").val();
        // var ser_categ=$("#sc-name").val();
        var serv_id=$("#service_id").val();
        var service_img = document.getElementById('sc-img');
        var ser_filename = service_img.files[0].name;
        $.ajax({
          url: "admin_uploaddata.php",
          method:"POST",
          data :{
          serv_name : ser_name,
          serv_amount : ser_amte,
          serv_img : ser_filename,
          serv_id : serv_id,
          oldscid :btnval,
          oldserv : oldser
          },
          success: function(data){
            // alert(data)
            $('#add-service').html(data);
          }
      });
    });
});

// end of edit service

// Delete Services

$(document).on('click','.sdel',function(){
    var id=$(this).val();
    var sname=$(this).closest('tr').find('td:eq(1)').text();
    var snam=sname.trim();
    var samount=$(this).closest('tr').find('td:eq(3)').text();
    var samt=samount.trim();
    $.ajax({
          url: "admin_uploaddata.php",
          method:"POST",
          data :{
          ser_nam :snam,
          ser_amt : samt,
          sid : id
          },
          success: function(data){
            // alert(data);
          }
      });
    
});
// End delete service

// Restore deleted Services
    $(document).on('click','.del',function(){
        $('#add-service').css('display','none');
        $('#del-ser').css('display','inline');
        $('.ser-restore').on('click',function()
        {
            var categ= $(this).closest('tr').find('td:eq(0)').text();
            var serv=$(this).closest('tr').find('td:eq(1)').text();
            var cat=categ.trim();
            var ser=serv.trim();

            $.ajax({
                url: "admin_uploaddata.php",
                method:"POST",
                data :{
                    rcate :cat,
                    rser:ser
                    },
                success: function(result){
                   alert(result); 
                }
            });

        }); 
    });

</script>
</body>
</html>