<?php
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
$name=$_POST['fusername'];
$phno=$_POST['fphno'];
$pass=$_POST['npass'];
$cpass=$_POST['ncpass'];
$pass=md5($pass);


$query = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE  `uname`='$name' AND `aproval_status`=1")or die("Sign in Error q");
if(mysqli_num_rows($query)) 
{
$row = mysqli_fetch_array($query);
$lid=$row['lid'];
$query1 = mysqli_query($con,"SELECT * FROM `tbl_customer`  WHERE `login_id`='$lid' AND `customer_phone`='$phno'")or die("Sign in Error q1");

$query2 = mysqli_query($con,"SELECT * FROM `tbl_serviceproviders` WHERE `login_id`='$lid' AND `sp_phone`='$phno'")or die("Sign in Error q4");

$query3 = mysqli_query($con,"SELECT * FROM `tbl_employee` WHERE `login_id`='$lid' AND `employee_phone`='$phno'")or die("Sign in Error q4");
 
    if(mysqli_num_rows($query1) or mysqli_num_rows($query2) or mysqli_num_rows($query3) ){ 
     $query3 = mysqli_query($con,"UPDATE `tbl_login` SET `password`='$pass' WHERE `lid`='$lid'")or die("Sign in Error q2");
     mysqli_close($con);
     ?>
<script>
alert("Password successfuly updated");
location.href="login.php";
</script>
<?php
  }else{
     ?>
<script>
alert("Values does not match !! try again..");
location.href="login.php";
</script>
<?php
  }
}
else{
     ?>
<script>
alert("Values does not match !! try again..");
location.href="login.php";
</script>
<?php
  }
?>
