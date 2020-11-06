
<?php

$con=mysqli_connect("localhost","root","","projectdb");
// $name=$_POST['name'];
// $addr=$_POST['address'];
// $phone=$_POST['phone'];
// $dist=$_POST['dist'];
// $city=$_POST['location'];
// $email=$_POST['email'];
// $uname=$_POST['username'];
// $pass=$_POST['password'];
if (isset($_POST['check_submit_btn'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM tbl_customer WHERE customer_email='$email'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo 'Username Already taken';	
    }
    else{
      echo 'not_taken';
    }
    
}
// if (isset($_POST['email_check'])) {
//     $email = $_POST['email'];
//     $sql = "SELECT * FROM tbl_customer WHERE customer_email='$email'";
//     $results = mysqli_query($con, $sql);
//     if (mysqli_num_rows($results) > 0) {
//       echo "taken";	
//     }else{
//       echo 'not_taken';
//     }
//     exit();
// }
// if (isset($_POST['save'])) {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $sql = "SELECT * FROM tbl_login WHERE uname='$username'";
//     $results = mysqli_query($con, $sql);
//     if (mysqli_num_rows($results) > 0) {
//       echo "exists";	
//       exit();
//     }else{
//       $query = "INSERT INTO tbl_login (uname, password) 
//                VALUES ('$username', '".md5($password)."')";
//       $results = mysqli_query($con, $query);
//       echo 'Saved!';
//       exit();
//     }
// }
?>