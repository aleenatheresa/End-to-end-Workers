<?php
session_start();

// print_r($_POST);
// die();

// $con=mysqli_connect("localhost","root","","projectdb");
require('../DbConnection.php');
if(isset($_POST['service_catagory']))
{
$service=$_POST['service_catagory'];
$amount=$_POST['amount'];
$img=$_POST['file'];
$check_sc="select * from tbl_service_category where sc_name='$service' and img='$img'";
$sc_check_query=mysqli_query($con,$check_sc) or die("$check_sc");
if (mysqli_num_rows($sc_check_query) > 0) 
    {
        echo '<script>alert("Already exist")</script>';  
    }
else
    {
        $s=ltrim($service);
        $sql="INSERT INTO tbl_service_category(sc_name,is_delete,amount,img)values('$service',1,'$amount','$img')";
        $sql_query=mysqli_query($con,$sql);
        echo "<tr><th>".$service."</th><th>".$amount."</th><th></th><td style='border-top:0px;text-align:center'><button class='btn btn-sm btn-success sc_edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
        
    }
}

// restore
if(isset($_POST['restor']))
{
    $restorsc=$_POST['restor'];
    $restoreamt=$_POST['resetamount'];
    $ressc="UPDATE `tbl_service_category` set `is_delete`=1 WHERE sc_name='$restorsc' and amount='$restoreamt'";
    $updatesc=mysqli_query($con,$ressc);
}

// location enter

if(isset($_POST['location']))
{
    $location=$_POST['location'];
    $district=$_POST['district'];
    $check_loc="select * from tbl_location where location='$location' and district_id='$district' and is_delete=1";
    $check_query=mysqli_query($con,$check_loc);
    if (mysqli_num_rows($check_query) > 0) 
    {
      echo "location Already Exist";	
    }
    else
    {
    $loc="INSERT INTO tbl_location(location,is_delete,district_id)values('$location',1,$district)";
    $loc_query=mysqli_query($con,$loc);
    // echo "<tr><td scope='row'>".$location."</td><td scope='row'>".$dis."</td><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success loc_edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></button><a><button class='btn btn-sm btn-danger loc_del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
    // echo "$dis";
    }
}

// district enter

if(isset($_POST['dis']))
{
    $district=$_POST['dis'];
    $check_dis="select * from tbl_district where district_name='$district'";
    $dist_query=mysqli_query($con,$check_dis);
    if (mysqli_num_rows($dist_query) >=1) 
    {
      echo "1";	
    }
    else
    {
    $dis="INSERT INTO tbl_district(district_name,is_delete)values('$district',1)";
    $dis_query=mysqli_query($con,$dis);
    // echo "<tr><th scope='row'>".$district."</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></button><a><button class='btn btn-sm btn-danger del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
    }
}
//  delete a district
if(isset($_POST['diste']))
{
    $diste=$_POST['diste'];
    $del="update tbl_district set is_delete=0 where district_name ='$diste'";
    $del_query=mysqli_query($con,$del)or die($del);
    echo " ";
    $d="SELECT district_id FROM tbl_district where district_name='$diste'";
    $res=mysqli_query($con,$d);
    $r=mysqli_fetch_array($res);
  
    $district_id=$r['district_id'];
    
    $update_loc="update tbl_location set is_delete=0 where district_name='$diste'";
    $update_sql=mysqli_query($con,$update_loc);
    
}

// delete location
if(isset($_POST['loce']))
{
    $loc=$_POST['loce'];
    $loc_id="select * from tbl_location where location='$loc'";
    $loc_query=mysqli_query($con,$loc_id);
    $loc_data=mysqli_fetch_array($loc_query);
    $id_location=$loc_data['location_id'];
    $del_loc="update tbl_location set is_delete=0 where location_id ='$id_location'";
    $del_query=mysqli_query($con,$del_loc);
    echo " ";
}
if(isset($_POST['ser_cat']))
{
    $ser=$_POST['ser_cat'];
    $del_sc="update tbl_service_category set is_delete=0 where sc_name ='$ser'";
    $sc_query=mysqli_query($con,$del_sc);
    echo " ";

}
// Edit district value
if(isset($_POST['dist_edit']))
{
    $dist_edit=$_POST['dist_edit'];
    $d=$_POST['distee'];
    $did="SELECT * FROM `tbl_district` WHERE `district_name`='$dist_edit' AND `is_delete`=1";
    $id1=mysqli_query($con,$did);
    $row=mysqli_fetch_array($id1);
    if(mysqli_num_rows($id1)>0)
    {
        echo "Cant'insert Already Exist"; 
    }
    else
    {
    $edit="UPDATE `tbl_district` SET `district_name`= '$dist_edit' where `district_name`='$d' AND `is_delete`=1";
    $edit_query=mysqli_query($con,$edit);
    echo "updated"; 
    }
    
}

// Edit Location
if(isset($_POST['loc_edit']))
{
    $location_new=$_POST['loc_edit'];
    $locat=$_POST['locat'];
    $new_dis=$_POST['new_dis'];
    $dis1="SELECT * FROM tbl_district where district_id=$new_dis and is_delete=1";
    $dis1_query=mysqli_query($con,$dis1);
    while($row=mysqli_fetch_array($dis1_query))
    {
        $dist1=$row['district_name'];
        // $id_dis=$row['district_id'];
    }
    $lo="select * from tbl_location where location='$locat' and is_delete=1";
    $lo_query=mysqli_query($con,$lo);
    $r=mysqli_fetch_array($lo_query);
    $l_id=$r['location_id'];
    $check_loca="Select * from tbl_location where location='$location_new' and district_id=$new_dis";
    $loca_query=mysqli_query($con,$check_loca);
    if(mysqli_num_rows($loca_query)>0)
    {
        echo "Cant'insert Already Exist";
    }
    else
    {
    $edit_loc="UPDATE `tbl_location` SET `location`= '$location_new',district_id=$new_dis where `location_id`=$l_id AND `is_delete`=1";
    $edit_loc_query=mysqli_query($con,$edit_loc);
    echo "updated";
    // echo "<tr><th scope='row'>".$location_new."</th><th scope='row'>".$dist1."</th><td style='border-top:0px;text-align:right'><button class='btn btn-sm btn-success loc_edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></button><a><button class='btn btn-sm btn-danger loc_del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
    // echo $dis;
    
    }


}

// Edit SC

if(isset($_POST['ser']))
{
   $new_sc= $_POST['ser'];
   $new_amt=$_POST['new_amt'];
   $old_sc=$_POST['old_sc'];
   $imgage_new=$_POST['image'];
   $pre_sc="select * from tbl_service_category where sc_name='$old_sc' and is_delete=1";
   $pre_query=mysqli_query($con,$pre_sc);
   $r=mysqli_fetch_array($pre_query);
   $sc_id=$r['sc_id'];
//    $check_service="select * from tbl_service_category where sc_name='$new_sc'";
//     $service_check_query=mysqli_query($con,$check_service);
//     if (mysqli_num_rows($service_check_query) > 0) 
//         {
//         echo "Service Already Exist";	
//         }
//         else
//         {
// $s=ltrim($service);

            $new_serv="update tbl_service_category set sc_name='$new_sc',amount='$new_amt',img='$imgage_new' where sc_id=$sc_id";
            $newsc_query=mysqli_query($con,$new_serv);
            echo "<tr><th>".$new_sc."</th><th>".$new_amt."</th><td style='border-top:0px;text-align:center'><button class='btn btn-sm btn-success sc_edit' data-target='#demo-lg-modal1' data-toggle='modal' title='Edit' id='sc1'><i class='fas fa-edit'></button><a><button class='btn btn-sm btn-danger sc_del' title='Delete' id='sc2'><i class='fa fa-times' aria-hidden='true'></i></button></a></td>";
            
        // }
}

// Aprove service Providers

if(isset($_POST['ser_name']))
{
    $name=$_POST['ser_name'];
    $login=$_POST['login'];
    $ap="update tbl_login set aproval_status=1 where role_id=4 and lid='$login'";
    $aproval_query=mysqli_query($con,$ap);
    $sp_email="select * from tbl_serviceproviders where login_id=$login";
    $em_query=mysqli_query($con,$sp_email);
    $e=mysqli_fetch_array($em_query);
    $email=$e['sp_email'];
    $to_email = "$email";
    $subject = "End To End Workers";
    $body = "Hi, $name This is to inform that, we are happy to work with you.";
    $headers = "From: aleenatgv@gmail.com";
    
    if (mail($to_email, $subject, $body, $headers)) {
        echo "Aproved. Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
}

// reject Service providers

if(isset($_POST['reject']))
{
    $na=$_POST['reject'];
    $log=$_POST['login'];
    $rej_query=mysqli_query($con,"update tbl_login set is_delete=0 where role_id=4 and lid=$log");
    echo "Delete one person";
    
}

// Service Management

// add services
if(isset($_POST['service_id']))
{
    $sid=$_POST['service_id'];
    $sname=$_POST['service_name'];
    $samt=$_POST['service_amt'];
    // $scat=$_POST['service_catogery'];
    $simg=$_POST['service_image'];
    // $scat=""
    $ser="select * from tbl_services where sc_id=$sid and service_name='$sname' and service_amt=$samt and service_img='$simg'and is_delete=1";
    $serv_query=mysqli_query($con,$ser);
    if(mysqli_num_rows($serv_query)>0)
    {
        echo "already exist";
    }
    else
    {
        $addser="INSERT INTO `tbl_services`(`service_name`, `service_amt`,`service_img`, `sc_id`, `is_delete`) VALUES ('$sname','$samt','$simg','$sid',1)";
        $addser_query=mysqli_query($con,$addser);
        echo "inserted";
    }
}


// Edit service
if(isset($_POST['serv_name']))
{
    $serv_name=$_POST['serv_name'];
    $ser_amt=$_POST['serv_amount'];
    $ser_id=$_POST['serv_id'];
    $sc_id=$_POST['oldscid'];
    $ser_img=$_POST['serv_img'];
    $old_service=$_POST['oldserv'];
    $check_ser_query=mysqli_query($con,"select * from tbl_services where sc_id=$ser_id and service_name='$serv_name' and service_img='$ser_img' and service_amt=$ser_amt");
    if(mysqli_num_rows($check_ser_query)>0)
    {
        echo "<tr><td colspan='4'>Service Already Exist<td></tr>";
    }
    else
    {
        $sql_up="update tbl_services set service_name='$serv_name',service_amt=$ser_amt,service_img='$ser_img',sc_id=$ser_id where service_name='$old_service' and sc_id=$sc_id";
        $ser_update=mysqli_query($con,$sql_up);
        echo "<tr><td colspan='4'>sucessfully updated<td></tr>";
       
    }
}
// End edit service

// DELETE SERVICE
if(isset($_POST['ser_nam']))
{
    $sername=$_POST['ser_nam'];
    $seramt=$_POST['ser_amt'];
    $serid=$_POST['sid'];
    $del_ser_sql="update tbl_services set is_delete=0 where sc_id=$serid and service_name='$sername' and service_amt=$seramt";
    $del_ser_query=mysqli_query($con,$del_ser_sql);
    echo "sucessfully deleted";
}

// END DELETE SERVICE

// RESTORE DELETED SERVICE

if(isset($_POST['rcate']))
{
 $cate=$_POST['rcate'];
 $serv=$_POST['rser'];
 $cat_query=mysqli_query($con,"select * from tbl_service_category where sc_name='$cate' and is_delete=1");
 $c=mysqli_fetch_array($cat_query);
 $cat_id=$c['sc_id'];
 $ser_query=mysqli_query($con,"select * from tbl_services where sc_id=$cat_id and is_delete=0");
 if(mysqli_num_rows($ser_query)>0)
 {
    $restore=mysqli_fetch_array($ser_query);
    $ser_name=$restore['service_name'];
    $updateser=mysqli_query($con,"update tbl_services set is_delete=1 where sc_id=$cat_id and service_name='$ser_name'");
    
 }
 else
 {
     ?>
     <tr>
         <td colspan="5">
            No  deleted Services
         </td>
    </tr>
     <?php
 }
 

}
// END
