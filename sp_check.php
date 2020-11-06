<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM tbl_serviceproviders WHERE sp_email='$email'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) 
    {
      echo 'Email Already Taken';	
    }

}
if(isset($_POST['username']))
{
    $uname=$_POST['username'];
    $sql = "SELECT * FROM tbl_login WHERE uname='$uname'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) 
    {
      echo 'Username Already Taken';	
    }
   
}  
?>