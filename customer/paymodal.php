<?php
session_start();
require('payment/config.php');
require('../DbConnection.php');
if(!empty($_POST['bkid']))
{
    $bk=$_POST['bkid'];
    $dat=$_POST['workdate'];
    $cmplt=$_POST['compdate'];
    $cat=$_POST['category'];
    $ser=$_POST['service'];
    $_SESSION['bookid']=$bk;
    $_SESSION['workon']=$dat;
    $_SESSION['complete']=$cmplt;
    $_SESSION['categ']=$cat;
    $_SESSION['service']=$ser;
    $seramt=mysqli_query($con,"select * from tbl_services where service_name='$ser' and sc_id=(select sc_id from tbl_service_category where sc_name='$cat')");
    $s=mysqli_fetch_array($seramt);
    $amt=$s['service_amt'];
    $bal=($amt-150);
  
?>
    
      <div class="modal fade" id="payModal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">  
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body" style="height: auto; width:auto;">
               
                    <div class="table">
                        <div class="head1" style="text-align:center">
                          <h4>End To End Workers</h4>
                        </div>
                        <div class="head" style="text-align:center">
                                <h4>Pay Online</h4>
                              
                        </div>
                        <div class="container">
                            <table class="table">
                                <tr>
                                    <th>Category</th>
                                    <td><?php echo $cat;?></td>
                                </tr>
                                <tr>
                                    <th>Service </th>
                                    <td><?php echo $ser;?></td>
                                </tr>
                                <tr>
                                    <th>Rate</th>
                                    <td><?php echo $bal;?></td>
                                </tr>
                                <tr>
                                    <th>Work Date</th>
                                    <td><?php echo $dat;?></td>
                                </tr>
                                <tr>
                                    <th>Completed Date</th>
                                    <td><?php echo $cmplt;?></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <form action="payment/fullpaysub.php" method="POST" id="frmdata">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $pubk?>"
                    data-amount="<?php echo $bal*100;?>"
                    data-name="Payment with E2E workers"
                    data-description="Payment with E2E workers description"
                    data-image=""
                    data-currency="inr"></script>
                </form>
            </div>
           
            </div>
          </div>
      </div>
   
    <!-- </body>
    </html> -->
   
   
    <?php
    

}

?>