<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">      <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/sidebarfun.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
      crossorigin="anonymous"/>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"/>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cust_index.css">
    <title>Customer Index</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top">
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="1home.html">End To End Workers</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle p-0"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="material-icons icon">
                person
              </i>
              <span class="text">Account</span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="navbarDropdown"
            >
              <a class="dropdown-item" href="#">Edit</a>
              <a class="dropdown-item" href="#">Logout</a>
              <div class="dropdown-divider"></div>
              <!-- <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="wrapper d-flex">
      <div class="sideMenu bg-mattBlackLight">
        <div class="sidebar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="customer_index.php" class="nav-link px-2">
                <i class="material-icons icon">
                  dashboard
                </i>
                <span class="text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">User Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
              <i class="fa fa-ticket" aria-hidden="true" style="color:grey;width:30px;height;20px;"></i>
                <span class="text">Booking Details</span></a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  settings
                </i>
                <span class="text">Settings</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  pages
                </i>
                <span class="text">Pages</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  computer
                </i>
                <span class="text">Demo</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link px-2 sideMenuToggler">
                <i class="material-icons icon expandView ">
                  view_list
                </i>
                <span class="text">Resize</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="content">
        <main>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 my-3">
                <div class="bg-mattBlackLight px-3 py-3">
                  <h4 class="mb-2">Activity</h4>
                </div>
              </div>
              <div class="col-md-4 my-3">
                <div class="bg-mattBlackLight px-3 py-3">
                  <h4 class="mb-2">Rating</h4>
                  <div class="progress" style="height: 16px;">
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-3">
                <div class="bg-mattBlackLight p-3">
                  <h4 class="mb-2">BookDetails</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="bg-mattBlackLight my-2 p-3">
                  User Activity
                </div>
              </div>
              <div class="col-md-6">
                <div class="bg-mattBlackLight my-2 p-3">
                  Booking Details
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
    $('.sideMenuToggler').on('click', function() {
    $('.wrapper').toggleClass('active');
  });

 
  var adjustSidebar = function() {
    $('.sidebar').slimScroll({
      height: document.documentElement.clientHeight - $('.navbar').outerHeight()
    });
  };

  adjustSidebar();
  $(window).resize(function() {
    adjustSidebar();
  });
});

    </script>

</body>
</html>