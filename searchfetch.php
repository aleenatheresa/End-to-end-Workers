<?php
session_start();
$con=mysqli_connect("localhost","root","","projectdb");
if(!empty($_POST["val"]))
{
    $txt=$_POST["val"];
            ?>
            <div class="table-responsive">
                                  <table class="table v middle" id="tbl_home">
                                      <thead>
                                          <tr class="bg-light">
                                              <th class="border-top-0">Name</th>
                                              <th class="border-top-0">Licence</th>
                                              <th class="border-top-0">Category</th>
                                              <th class="border-top-0">District</th>
                                              <!-- <th class="border-top-0">Location</th> -->
                                              <th class="border-top-0">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $sql_search="SELECT s.sp_id,s.sp_name,s.sc_id,s.lisenceno,s.login_id,s.district_id,s.location_id,l.lid,l.role_id,l.aproval_status,l.is_delete,c.sc_name,d.district_name FROM tbl_serviceproviders s join tbl_login l on s.login_id=l.lid join tbl_service_category c on s.sc_id=c.sc_id JOIN tbl_district d on s.district_id=d.district_id WHERE s.login_id=l.lid and c.sc_name LIKE '%".$txt."%' and l.aproval_status=0";
                                      $search_query=mysqli_query($con,$sql_search);
                                      if(mysqli_num_rows($search_query)>0)
                                      {
                                          while($r=mysqli_fetch_array($search_query))
                                          {
                                         
                                   
                                      ?>
                                          <tr>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <h4 class="m-b-0 font-16"><?php echo $r['sp_name']; ?></h4>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>  
                                                <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"><?php echo $r['lisenceno']; ?></label>
                                                      </div>
                                                  </div>
                                                </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"><?php echo $r['sc_name'];?> </label>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"> <?php echo $r['district_name'];?></label>
                                                      </div>
                                                  </div>
                                              
                                              </td>
                                              <!-- <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16"></label>
                                                      </div>
                                                  </div>
                                            
                                              </td> -->
                                              <td>
                                              <div class="d-flex align-items-center">
                                                      <div class="">
                                                          <label class="m-b-0 font-16">
                                                          <h5 class="m-b-0"><button class="btn btn-sm btn-success btn-inline sc_approve" data-target="#demo-lg-modal1" onclick="" data-toggle="modal" title="Approve">Approve</button><a>
                                                         
                                                          </h5>
                                                          </label>
                                                      </div>
                                                  </div>
                                                  
                                              </td>
                                          </tr>
                                          <?php  
                                            } 
                                        }
                                          else
                                          {
                                         ?>
                                          <tr><td colspan="5" style="text-align:center">No search Result</td></tr>
                                         <?php } ?>
                                      </tbody>
                                  </table>
                              </div>
   <?php    
    }
?>