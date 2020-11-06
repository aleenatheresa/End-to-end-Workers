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
$sc=$_POST['sc'];


  

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

    $insert_login="INSERT into tbl_login(uname,password,role_id,aproval_status,is_delete)values('$uname','$pass',3,0,1)";
    $login_result=mysqli_query($con,$insert_login);

    $status="SELECT lid from tbl_login where uname='$uname'";
    $status_result=mysqli_query($con,$status);
    while($status_data=mysqli_fetch_array($status_result))
    {
        $login_id=$status_data['lid'];  
    }
    $insert_sql="INSERT into tbl_employee(employee_name,employee_address,employee_phone,employee_email,sc_id,location_id,login_id,created_on)VALUES('$name','$addr','$phone','$email','$sc','$loc_id','$login_id','$now')";
    $insert_result=mysqli_query($con,$insert_sql);
    header("url=login.php");

?>