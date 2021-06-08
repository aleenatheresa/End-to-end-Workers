<?php

session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
$name=$_POST['name'];
$addr=$_POST['address'];
$phone=$_POST['phone'];
$dist=$_POST['dist'];
$city=$_POST['location'];
$email=$_POST['email'];
$uname=$_POST['username'];
$pass=$_POST['password'];

// $log_id="select lid from tbl_login where uname='$uname'";
// $log_result=mysqli_query($con,$log_id);
// $log_row=mysqli_num_rows($log_result);
// if($log_row>0)
// {
// while($log_data=mysqli_fetch_array($log_result))
//     {
//         $log_id=$log_data['lid'];
//     }
//     }      

    $sql="select location_id from tbl_location where location_id='$city'";
    $result=mysqli_query($con,$sql);
    $loc_row=mysqli_num_rows($result);
    if($loc_row>0)
    {
    while($loc_data=mysqli_fetch_array($result))
    {
        $loc_id=$loc_data['location_id'];
    }
    }  

    
    $now = date('Y-m-d H:i:s');
    

    $sql3="select district_id from tbl_district where district_id='$dist'";
    $result3=mysqli_query($con,$sql3);
    $dis_row=mysqli_num_rows($result3);
    if($dis_row>0)
    {
    while($dis_data=mysqli_fetch_array($result3))
    {
        $dis_id=$dis_data['district_id'];
    }
    }

    $insert_login="INSERT into tbl_login(uname,password,role_id,aproval_status,is_delete)values('$uname','$pass',2,1,1)";
    $login_result=mysqli_query($con,$insert_login);

   
    $status="SELECT lid,aproval_status from tbl_login where uname='$uname'";
    $status_result=mysqli_query($con,$status);
    while($status_data=mysqli_fetch_array($status_result))
    {
        $aproval_id=$status_data['aproval_status'];
        $login_id=$status_data['lid'];
    }

    $insert_sql="INSERT into tbl_customer(customer_name,customer_address,customer_phone,customer_email,district_id,location_id,login_id,created_on) VALUES('$name','$addr','$phone','$email','$dis_id',' $loc_id','$login_id','$now')";
    $insert_result=mysqli_query($con,$insert_sql);
    
    
    if($aproval_id==1)
    {
        // header("refresh:2; url=login.php");


    }
    // $num_row=mysqli_num_rows($insert_result);
    // if($num_row>0)
    // {
    //     echo "sucessfully enterted";
    // }
   




?>