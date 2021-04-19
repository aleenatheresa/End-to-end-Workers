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
$logid=mysqli_fetch_array($cust_query);
$cust_id=$logid['customer_id'];
$_SESSION['lid']=$cust_id;



//  total num of customers
$count="SELECT * from tbl_customer";
$count_query=mysqli_query($con,$count);
$row = mysqli_num_rows($count_query);

//total num of service providers
$count_sp="SELECT * from tbl_serviceproviders";
$countsp_query=mysqli_query($con,$count_sp);
$row_sp = mysqli_num_rows($countsp_query);


// Confirm booking

if(isset($_POST['confirmbooking']))
{

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/custsidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
        <title>Customer Index</title>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	      <!--fontawesome-->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="cust_index.css">
        
        <link href="css/cust_index.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src = "https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Modal class -->
       
  </head> 
  
 

  <style>
  fieldset {
    border: 1px solid #000;
    width:auto;
}
.asd{
  border-radius:5px;
  width:300px;
  height:35px;
}
  </style>
<script>

var c=[0];
function button()
{
    var l = c.length;
    var s=0;
    for(var i=0;i<l;i++)
    {
        s=s+c[i];
    }
    if(l==s)
    {
        document.getElementById("addStu").disabled = false;
    }
    else
    {
         document.getElementById("addStu").disabled = true;
    }
}

var c=[0,0];
// validation date picker
function checkDate()
{
  var date=document.getElementById("datepicker").value;
  var ToDate=new Date();
  if(date=="")
  {
    document.getElementById("datepicker").style.borderColor="red";
    //document.getElementById("cbk").disabled = true;
    var today=new Date();
  }
  else if(new Date(date).getDate() <= ToDate.getDate()) 
  {
    document.getElementById("datepicker").style.borderColor="red";
    c[0]=0;
  }
  else
  {
    document.getElementById("datepicker").style.borderColor="green";
    c[0]=1;
  }
 button();
}

function checkTime()
{
  var t=document.getElementById("timepicker").value;
  if((t>"09:00") && (t<"17:00"))
  {
  document.getElementById("timepicker").style.borderColor="green";
  c[1]=1;
  }
  else{
    document.getElementById("timepicker").style.borderColor="red";
    c[1]=0;
  }
  button();
}


function button()
{
    var l = c.length;
    var s=0;
    for(var i=0;i<l;i++)
    {
        s=s+c[i];
    }
    if(l==s)
    {
        document.getElementById("cbk").disabled = false;
    }
    else
    {
      document.getElementById("cbk").disabled = true;
    }
}

</script>
<body>


  <div id="wrapper">
    <div class="overlay"></div>
            <!-- Sidebar -->
      <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
              <a class="sidebar-brand" href="customer_index.php">
                <span class="align-middle">End To End Workers</span>
              </a>
              <ul class="navbar-nav align-self-stretch">
              <li class="sidebar-header">
                Pages
              </li>
              <li class=""><a class="nav-link text-left active" href="#book" onclick="home()">
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
                                  <li><a href="#book" onclick="home()">Booking</a></li>
                                  <li><a href="#bookdetails" onclick="cust_book()">Booked Details</a></li>
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
            <a class="nav-link text-left active"  role="button" href="#service_rate">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
            </svg> &ensp;Service Rate
            </a>
          </li>

          <li class="">
            <a class="nav-link text-left active"  role="button" href="#service_rate">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
            </svg>&ensp;Shop
            </a>
          </li> 

        </ul>
      </nav>
      <!-- /#sidebar-wrapper -->

  </div>




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
                            <a class="dropdown-item" href="#ProModal" data-toggle="modal" data-target="#ProModal" onclick="userprofile()">Update</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>

                        </div>
                </li>

              </ul>

            </nav>

    
            <!-- End of Topbar -->
        </div>
      </div>
    
<!-- Sucess Message -->
<br><br>
<div class="alert alert-success" id="msg" style="display:none;">
    <strong>Success!</strong> Sucessfully completed action.
  </div>

  <!-- End Sucess Msg -->
        <!-- /#wrapper -->
            <!-- Service Category -->

    <div class="container" id="maindiv">
        <div id="book" style="text-align:center;display:block">
                <div class="row">
                          
                          <?php
                            $noarray=array();
                            $services="SELECT * FROM tbl_service_category WHERE is_delete='1'";
                            $ser_query=mysqli_query($con,$services);
                            $num=mysqli_num_rows($ser_query);
                            // $sizeofnoarray=$num;
                            while($row=mysqli_fetch_array($ser_query))
                            {
                              
                              $image=$row['img'];
                              $scname=$row['sc_name'];
                              $scrate=$row['amount'];
                              $scid=$row['sc_id'];
                              $_SESSION['id']=$scid;
                              $ser_cat= $_SESSION['id'];
                              // $noarray[$row['sc_id']]++; 
                              for($i=0;$i<$num;$i++)
                              {
                                $noarray[$i]=$row['sc_id'];
                              }
                          ?>
                          
                          <div class="column" style="margin-left:10px;margin-top:15px">
                            <div class="card" style="width: 15rem; display:block;">
                                <img src="images/<?php echo $image;?>" class="card-img-top" alt="9.jpg" width="60px" height="180px">
                                <div class="card-body">
                                <form action="" method="POST">
                                  <!-- <a href="#exampleModal" class="btn btn-link"></a> -->
                                  <button type="button" class="test btn btn-link btn-lg" name="ser" id="<?php echo $scid?>" value="<?php echo $scid; ?>"><?php echo $scname;?>
                                  </button>
                                  </form>
                                </div>
                            </div>
                            </div>
                            <?php
                                    }
                          ?>
                  </div>
              </div>
              <div id="services_under_sc" style="display:none">
                <div class="row" id="services_under_sc_body">
                 
                </div>
              </div>
    </div>

    <!-- modal class for confirm booking -->
       
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Datepicker</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="height: 200px;">
            <label>Date</label>  <br>
            <input type="date" class="asd" id="datepicker" min="2021-01-01"  onblur="checkDate();">
              <br><br>
              <label>Time</label> <br>
              <input type="time" class="asd" id="timepicker" onblur="checkTime();"  required>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal" disabled href="#msg" id="cbk">Book</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- ends modal class -->

        <!-- customer Profile -->
    <div id="profile" style="display:none">
      <div class="container col-sm-6">
        <!-- <fieldset>
          <table class="table table-borderless">
          <legend style="text-align:center;"><h1>Profile</h1></legend>
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
          <button type="button" class="btn btn-link" id="btn_proedit" data-toggle="modal" data-target="#ProModal"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
        </div> -->

        <!-- Modal -->
    <div class="modal fade" id="ProModal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="height: auto;">
          <table class="table table-borderless col-sm-3" >
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a class="btn btn-success" data-dismiss="modal" href="#" onclick="" id="proedit">Save</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- ends modal class -->
      </div>
    </div>

   

    
    <!-- Book Details -->
    <div id="bookdetails" style="display: none;">
      <table class="table table-bordered col-sm-8" style="margin-left:270px;">
        <thead>
        <tr>
        <th>Booking ID</th>
        <th>Booked On</th>
        <th>Service</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
              <?php
                $bkdate="select * from tbl_booking where customer_id=$cust_id and status=1";
                $bkdate_query=mysqli_query($con,$bkdate);
                $bk_row = mysqli_num_rows($bkdate_query);
                while($bkrow=mysqli_fetch_array($bkdate_query))
                {
                  $bkon=$bkrow['booked_on'];
                  $bking_id=$bkrow['booking_id'];
                  $bk_service=$bkrow['sc_id'];
                  $bk_status=$bkrow['servicecompleted'];
                  $bk_emp=$bkrow['employee_id'];
                  $stat=$bkrow['status'];
                  $bk_category="Select * from tbl_service_category where sc_id=$bk_service";
                  $cat_query=mysqli_query($con,$bk_category);?>
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
            <td>
             <?php
              if($bk_emp==0 && $stat==1 && $bk_status==0)
              {
                echo "Requested";
                $c=0;
               
              }
              elseif($bk_status==1 && $bk_emp!=0)
              {
                  echo "Work completed";
                  
              }
              elseif($stat==1 && $bk_emp!=0)
              {
                  echo "Work in progress";
             
             } 
             
             ?>    
            </td>
            <td>
              
                <button class="btn btn-sm btn-primary btn-inline cmplt" title="Work Finished"  value="<?php echo $bking_id;?>"  <?php if ($c==0) {?> disabled <?php } ?> id="c1" >Completed</button>
                <button class="btn btn-sm btn-danger btn-inline cancel" title="Cancel Booking" value="<?php echo $bking_id;?>" id="can2">Cancel</button>
                
          </td>
          </tr>
          
               <?php
                }
              ?>
        </tbody>
      </table>
    </div>
      <div id="service_rate" style="display: none;">
      <table class="table table-bordered col-sm-8" style="margin-left:270px;">
        <thead>
        <tr>
        <th>Servie Category</th>
        <th>Rate</th>
        </tr>
        </thead>
        
        <tbody>
              <?php
                $cata="SELECT * FROM `tbl_service_category` where is_delete=1";
                $cata_query=mysqli_query($con,$cata);
                $cata_row = mysqli_num_rows($cata_query);
                while($crow=mysqli_fetch_array($cata_query))
                {
                  $n=$crow['sc_name'];
                  $amt=$crow['amount'];
                 ?>
         <tr>
              <td>
                    <?php
                  echo $n;
              ?>
            </td>
            <td>
                  <?php 
                    echo $amt;
                  ?>
            </td>
          </tr>
               <?php
                }
              ?>
        </tbody>
      </table>
      </div>

    

    <!-- End Book details -->

    <!-- Service Rate Details -->


    <!-- End Service Rate Details -->

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

<script>


$(document).ready(function(){
    $('.test').click(function(){
    // var id = $(this).attr("id");
    var id = $(this).val();
    console.log(id);
    $.ajax({  
                url:"services.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){ 
                     $('#services_under_sc_body').html(data);  
                     $("#services_under_sc").css("display", "inline");
                     $('.bkser').click(function()
                     {
                        var sc=$(this).val();
                        
                        $('#cbk').on('click',function(){
                        var datee=$("#datepicker").val();
                        var timee=$("#timepicker").val();
                        
                        $.ajax({
                          url: "edit_customer.php",
                          method:"POST",
                          data :{
                          dat :datee,
                          tim:timee,
                          service_id : sc,
                          category_id:id
                        },
                          success: function(result){
                            console.log(result);
                            $("#msg").css("display","inline");
                            $("#msg").delay(1000).fadeOut();
                            
                          }
                          });
                        });
                        
                     });
                    //  $("#maindiv").css("display", "none");    
                   
                }  
           });  
 });


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
                  $('#msg').text("sucessfully entered");
                  $("#edit").css("display","none");
                  $("#profile").replaceWith(result);

                }
           });
        });

// Booking

// $(document).on('click','"#ser_cat"',function()
//     {
//       var dat=$(this).val();
//       // $("#book").css('display','none');
//       $('#services_under_sc').css('display','block');
//       $.ajax({
//         url: "customer_index.php",
//         method:"POST",
//         data :{
//         data :dat,
//        },
//        success:function(result)
//        {

//        }
//       });
//     });
      
//  $(document).on('click','.bkcat',function()
      //             {
      //               var sc_val=$(this).val();
      //               console.log(sc_val);
      //               $('#services_under_sc').css('display','block');
      //               // $.ajax({
      //               //   method:"POST",
      //               //   data :{
      //               //   data :sc_val,
      //               // },
      //               // success:function(result)
      //               // {

      //               // }
      //              });
      
    //   $(document).on('click','#cbk',function(){
    //     var datee=$("#datepicker").val();
    //     var timee=$("#timepicker").val();
    //     console.log(sc);
    //     $.ajax({
    //       url: "edit_customer.php",
    //       method:"POST",
    //       data :{
    //       dat :datee,
    //       tim:timee,
    //       // sc : dat
    //     },
    //       success: function(result){
    //         console.log(result);
    //         $("#msg").css("display","inline");
    //         $("#msg").delay(1000).fadeOut();
            
    //       }
    // });
    // });
  // })

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
// End booking
// Date picker for employee booking
// $(function(){
//   $('#datepicker').datepicker();
// });

// End


$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper,#profile,#bookdetails,#book').toggleClass('toggled');
});



});
  </script>
  </body>
</html>