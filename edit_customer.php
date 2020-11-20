<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$login=$_SESSION['login'];
if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $ph=$_POST['phone'];
    $em=$_POST['email'];
    $uname=$_POST['uname'];
    $edit="update tbl_customer set customer_name='$name',customer_address='$address',customer_phone='$ph',customer_email='$em' where login_id=$login";
    $edit_query=mysqli_query($con,$edit);
    $user_edit="update tbl_login set uname='$uname' where lid=$login";
    $user_query=mysqli_query($con,$user_edit);
    echo " ";
}