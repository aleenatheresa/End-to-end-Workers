<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');

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

  
</head>
<body>
    
<?php
include("header.php");
?>
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

  
<script>
  

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