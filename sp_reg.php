<?php

session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$name=$_POST['name'];
$addr=$_POST['address'];
$phone=$_POST['phone'];
$dist=$_POST['dist'];
$city=$_POST['location'];
$email=$_POST['email'];
$uname=$_POST['username'];
$pass=$_POST['password'];
$lcno=$_POST['licensceno'];

  

    $sql_sc="select sc_id from tbl_services";
    $sc_result=mysqli_query($con,$sql_sc);
    while($sc_data=mysqli_fetch_array($sc_result))
    {
        $sc=$sc_data['sc_id'];
    }

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

    $now = date('Y-m-d H:i:s');
    

    $insert_login="INSERT into tbl_login(uname,password,role_id,aproval_status,is_delete)values('$uname','$pass',4,0,1)";
    $login_result=mysqli_query($con,$insert_login);

   
    $status="SELECT lid from tbl_login where uname='$uname'";
    $status_result=mysqli_query($con,$status);
    while($status_data=mysqli_fetch_array($status_result))
    {
        // $aproval_id=$status_data['aproval_status'];
        $login_id=$status_data['lid'];
    }

    $insert_sql="INSERT into tbl_serviceproviders(sp_name,sp_address,sp_phone,sp_email,lisenceno,sc_id,district_id,location_id,login_id,created_on)VALUES('$name','$addr','$phone','$email','$lcno','$sc','$dis_id',' $loc_id','$login_id','$now')";
    $insert_result=mysqli_query($con,$insert_sql);
    // $n=mysqli_num_rows($insert_result);
    
    // if($n>0)
    // {
        // header("refresh:5; url=login.php");


    // }


?>