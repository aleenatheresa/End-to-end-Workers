<?php

session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$password=$_POST["pass"];
$password=md5($password);
$username=$_POST["name"];
$sql="select * from tbl_login where uname='$username' and password='$password'";
echo $sql;
$result=mysqli_query($con,$sql);
$n=mysqli_num_rows($result);
$rows=mysqli_fetch_array($result);

$_SESSION['uname']=$username;
$_SESSION['role_id']=$rows['role_id'];

$log_data="select aproval_status FROM tbl_login where uname='$username' and password='$password' ";
echo $log_data;
$log_query=mysqli_query($con,$log_data);
while($log=mysqli_fetch_array($log_query))
{
	$status=$log['aproval_status'];
}
if($status==1)
{
	if($n > 0)
{
	
		if($rows['role_id']=='1')
		{
			header("location:admin_index.php");
		}
		elseif($rows['role_id']=='2')
		{
			header("location:customer_index.php");
		}
		elseif($rows['role_id']=='3')
		{
			header("location:#");
		}
		elseif($rows['role_id']=='4')
		{
			header("location:servicepro/index4.php");
		}
	
	
}
}

else
{
?>
<script>alert("no user found");
location.href ="login.php";
</script>
<?php
}
mysqli_close($con);
?>