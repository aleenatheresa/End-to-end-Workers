<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
if(isset($_POST['service_catagory']))
{
$service=$_POST['service_catagory'];
$amount=$_POST['amount'];
$sql="INSERT INTO tbl_services(sc_name,is_delete,amount)values('$service',1,$amount)";
$sql_query=mysqli_query($con,$sql);
$row=mysqli_num_rows($sql_query);
if($row>0)
{
    echo "sucess";
}
}

// location enter

if(isset($_POST['location']))
{
    $location=$_POST['location'];
    $district=$_POST['district'];
    $dist="SELECT * FROM tbl_district where district_id=$district";
    $dis_query=mysqli_query($con,$dist);
    while($row=mysqli_fetch_array($dis_query))
    {
        $dis=$row['district_name'];
    }
    $loc="INSERT INTO tbl_location(location,is_delete,district_id)values('$location',1,$district)";
    $loc_query=mysqli_query($con,$loc);
    echo "<tr><th scope='row'>".$location."</th><th scope='row'>".$dis."</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
    // echo "$dis";
}

// district enter

if(isset($_POST['district']))
{
    $district=$_POST['district'];
    // $del="update tbl_district set is_delete=0 where district_name='$district'";
    // $del_query=mysqli_query($con,$del)or die('monee sence');
    $dis="INSERT INTO tbl_district(district_name,is_delete)values('$district',1)";
    $dis_query=mysqli_query($con,$dis);
    echo "<tr><th scope='row'>".$district."</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fa fa-pencil'></i></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
}

//  delete a row
if(isset($_POST['dist']))
{
    $dist=$_POST['dist'];
    echo"<script>alert('asd');</script>";
    $del="update tbl_district set is_delete=0 where district_name='$dist'";
    $del_query=mysqli_query($con,$del)or die('monee sence');
    echo "sucessfully deleted";
}
?>