<?php

session_start();
$con=mysqli_connect("localhost","root","","projectdb");
$password=$_POST["pass"];
$username=$_POST["name"];
$sql="select * from tbl_login where uname='$username' and password='$password'";
$result=mysqli_query($con,$sql);
$n=mysqli_num_rows($result);
$_SESSION['uname']=$username;

$log_data="SELECT aproval_status FROM tbl_login where uname='$username'";
$log_query=mysqli_query($con,$log_data);
while($log=mysqli_fetch_array($log_query))
{
	$status=$log['aproval_status'];
}
if($status==1)
{
	if($n > 0)
{
	while($a=mysqli_fetch_array($result))
	{
		if($a['role_id']=='1')
		{
			header("location:admin_index.html");
		}
		elseif($a['role_id']=='2')
		{
			header("location:cust_indext.html");
		}
		elseif($a['role_id']=='3')
		{
			header("location:emp_index.html");
		}
		elseif($a['role_id']=='4')
		{
			header("location:sp_indext.html");
		}
	
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