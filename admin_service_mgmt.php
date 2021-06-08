<?php
session_start();
// $con=mysqli_connect("localhost","root","","projectdb");
require('DbConnection.php');
if(!empty($_POST['dat'])){
    $d=$_POST['dat'];
    

?>
    <!-- <div class="col-md-12"> 
        <div>
            <button type="button" class="btn btn-info add-new"  id="new-service"><i class="fa fa-plus"></i> Add New</button>
        </div>
               
        <table class="table table-data3">
            <thead>
                <tr>
                    <th>Service Category</th>
                    <th>Service</th>
                    <th>Image</th>
                    <th>Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $services="SELECT * FROM tbl_service_category WHERE is_delete='1'";
                    $ser_query=mysqli_query($con,$services);
                    while($row=mysqli_fetch_array($ser_query))
                        {
                            ?>
                <tr>
                    <th><?php
                        echo $row['sc_name'];
                        $rid=$row['sc_id'];
                        ?>
                    </th>
                        <?php
                            $ser="SELECT * from tbl_services where sc_id=$rid";
                            $service_query=mysqli_query($con,$ser);
                            if(mysqli_num_rows($service_query)>0)
                                {
                                    while($ser_data=mysqli_fetch_array($service_query))
                                        {
                                            $serimg=$ser_data['service_img'];
                                            $seramt=$ser_data['service_amt'];
                        ?>
                <tr>
                    <td colspan="1"></td>
                    <td>
                        <?php echo $ser_data['service_name'];?>
                    </td>
                    <td><img src="images/icon/<?php echo $serimg;?>" id="ser_img" width="60px" height="50px"/></td>
                    <td class="process"><?php echo $seramt;?></td>
                    <td style="border-top:0px;text-align:right;">
                        <button class="btn btn-sm btn-success btn-inline sedit" data-target="#demo-lg-modal1" data-toggle="modal" title="Edit" value=<?php echo $rid; ?>><i class='fas fa-edit'></i></button><a>
                        <button class="btn btn-sm btn-danger btn-inline sdel" title="Delete"><i class="fa fa-times" aria-hidden="true" value=<?php echo $rid; ?>></i></button>
                    </td>
                </tr>
                <?php
                    }}
                    else
                    { ?>
                <tr>
                    <td colspan="5" style="text-align:center">No service Category</td></tr>
                        <?php } ?>
                </tr>
                    <?php
                        } 
                     ?>
            </tbody>
        </table>
    </div> -->
<?php
}
 
if(!empty($_POST['categ']))
{                 
?>
    <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                       
                        <div>
                            <button type="button" class="btn btn-info add-new"  id="add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-info add-new"  id="deleted-sc"><i class=""></i> Deleted Services</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="pre-sc">
                    <thead>
                        <tr>
                            <th>Service Category</th>
                            <th>Amount/Month</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                                $services="SELECT * FROM tbl_service_category WHERE is_delete='1'";
                                $ser_query=mysqli_query($con,$services);
                                while($row=mysqli_fetch_array($ser_query))
                                {?>
                        <tr>
                            <th>
                              <?php
                                  echo $row['sc_name'];
                                  $amt=$row['amount'];
                                  $image=$row['img'];

                              ?>
                            </th>
                            <th>
                              <?php
                                echo $amt;
                              ?>
                            </th>
                            <th>
                              <img src="images/<?php echo $image; ?>" width="60px" height="50px"/>
                            </th>
                            <td style="border-top:0px;text-align:center;">
                            <button class="btn btn-sm btn-success btn-inline sc_edit" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Edit"><i class='fas fa-edit'></i></button><a>
                            <button class="btn btn-sm btn-danger btn-inline sc_del" onclick=""  title="Delete"><i class="fa fa-times" aria-hidden="true"></i></button></a><a>
                            
                            </a></td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
              </div>
        </div>

<?php
}
mysqli_close($con);
?>





