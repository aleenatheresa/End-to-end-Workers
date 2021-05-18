<?php
session_start();
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
$logid=mysqli_fetch_array($cust_query);
$cust_id=$logid['customer_id'];
$_SESSION['lid']=$cust_id;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Details</title>

    <script src="../js/custsidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Customer Index</title>

        <link href="../css/font-face.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="cust_index.css">
        <link href="../css/theme.css" rel="stylesheet" media="all">

        <link href="../css/cust_index.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Modal class -->

</head>
<body>

<div id="wrapper">
   <div class="overlay"></div>

        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
			<a class="sidebar-brand" href="customer_index.php.php">
                <span class="align-middle">End To End Workers</span>
            </a>

            <ul class="navbar-nav align-self-stretch">
                <li>
                    <a href="edit_pro.php" id="userDropdown" role="button" style="text-color:white;">
                    <label ><b style="font-famiy: Times New Roman, Times, serif;"> <?php echo $_SESSION['uname']; ?></b></label>
                    </a>
                </li>

                <li class="sidebar-header">
                    Pages
                </li>

                <li class=""><a class="nav-link text-left active" href="customer_index.php" onclick="home()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                    </svg>&ensp;Home</a>
                </li>
                <li class="has-sub">
                    <a class="nav-link collapsed text-left active" href="#collapseExample2" role="button" data-toggle="collapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg>&ensp;  Customer Booking
                    </a>
                    <div class="collapse menu mega-dropdown" id="collapseExample2">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                    <div class="submenu-box">
                                        <ul class="list-unstyled m-0" id="dropdown-menu">
                                        <li><a href="customer_index.php" onclick="home()">Booking</a></li>
                                        <li><a href="booked_details.php" onclick="cust_book()">Booked Details</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                    <!-- <li class="">
                    <a class="nav-link text-left active" href="#profile" onclick="userprofile()">
                    <i class="fa fa-user" aria-hidden="true"></i>  Profile
                    </a>
                    </li> -->

                <li class="">
                    <a class="nav-link text-left active"  role="button" href="service_rate.php" id="ser-rate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg> &ensp;Service Rate
                    </a>
                </li>

                    <!-- <li class="">
                    <a class="nav-link text-left active"  role="button" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        </svg>&ensp;Shop
                    </a>
                    </li> -->
            </ul>
              
        </div>
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
                <button class="btn btn-primary" type="button" id="search_submit"><i class="fas fa-search fa-sm"></i>
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

<!-- Book Details -->
<div class="container">
  <div id="bookdetails">
      <table class="table table-bordered col-sm-8" style="margin-left:100px;">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Booked On</th>
            <th>Category</th>
            <th>Service</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
              <?php
                $bkdate="select * from tbl_booking where customer_id=$cust_id and status=1 and servicecompleted=0";
                $bkdate_query=mysqli_query($con,$bkdate);
                if(mysqli_num_rows($bkdate_query)>0){
                while($bkrow=mysqli_fetch_array($bkdate_query))
                {
                  $bkon=$bkrow['booked_on'];
                  $bking_id=$bkrow['booking_id'];
                  $bk_service=$bkrow['sc_id'];
                  $bk_status=$bkrow['servicecompleted'];
                  $bk_emp=$bkrow['employee_id'];
                  $ap=$bkrow['aproval_status'];
                  $stat=$bkrow['status'];
                  $ap=$bkrow['aproval_status'];
                  $serid=$bkrow['service_id'];

                  $bk_category="Select * from tbl_service_category where sc_id=$bk_service";
                  $cat_query=mysqli_query($con,$bk_category);
                  
                  $service_query=mysqli_query($con,"select * from tbl_services where service_id=$serid");
                  $ser_data=mysqli_fetch_array($service_query);
                  ?>
          <tr>
              <td>
                <?php
                  echo $bking_id;
                ?>
              </td>
              <td>
                <?php
                      echo $bkon;
                ?>
              </td>
              <td>
                <?php
                    $rcat=mysqli_fetch_array($cat_query);
                    echo $rcat['sc_name'];
                ?>
              </td>
              <td><?php echo $ser_data['service_name'];?></td>
              <td>
                <?php
                 if($bk_status==1)
                  {
                      echo "Work completed";

                  }
                elseif($bk_emp!=0 && $ap==1)
                {
                    echo "Employee Assigned, will be there soon";
                }
                else
                {
                  echo "Requested";
                }
                ?>
              </td>
              <td>
                  <button class="btn btn-sm btn-primary btn-inline cmplt" title="Work Finished" id="c1" value="<?php echo $bking_id;?>"<?php if($ap==0) {?> disabled <?php }?>>Completed</button>
                  <button class="btn btn-sm btn-danger btn-inline cancel" title="Cancel Booking" value="<?php echo $bking_id;?>" id="can2" <?php if($bk_emp!=0 && $ap==1){?> disabled <?php }?>>Cancel</button>

              </td>
            </tr>
                <?php
                  }}
                  else{?>
                      <th colspan="6" style="text-align:center">No current Booking</th>
                <?php  }
                ?>
        </tbody>
      </table>
    </div>
     



    <!-- End Book details -->


</div>


<script>
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#bookdetails,#book').toggleClass('toggled');
});



$(".cmplt").on('click',function()
    {
    var bookid=$(this).val();
    console.log(bookid);
            $.ajax({
                  url: "edit_customer.php",
                  method:"POST",
                  data :{
                  comp : bookid
                },
                  success: function(result){
                    console.log(result);
                    $("#msg").css("display","inline");
                    $("#msg").delay(1000).fadeOut();

                  }
              });

      });
      // End Complete work button function

// Cancel booking
$(".cancel").on('click',function()
      {
        var bkid_cancel=$(this).val();
        $(this).closest("tr").remove();
        console.log(bkid_cancel);
          $.ajax({
                url: "edit_customer.php",
                method:"POST",
                data :{
                can : bkid_cancel
              },
                success: function(result){
                  console.log(result);
                  $("#msg").css("display","inline");
                  $("#msg").delay(1000).fadeOut();

                }
            });

      });

      // End Cancel booking

</script>
</body>
</html>