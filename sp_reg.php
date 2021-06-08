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
$lcno=$_POST['licensceno'];
$pass=md5($pass);
$sc=$_POST['sc'];

  



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

    $insert_sql="INSERT into tbl_serviceproviders(sp_name,sp_address,sp_phone,sp_email,lisenceno,sc_id,district_id,location_id,login_id,created_on)VALUES('$name','$addr','$phone','$email','$lcno','$sc','$dist',' $city','$login_id','$now')";
    $insert_result=mysqli_query($con,$insert_sql);
    header("refresh:2; url=login.php");
?>