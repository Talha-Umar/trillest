<?php include_once ("includes/header.php");
      include_once ("includes/topbar.php");
      include_once ("includes/sidebar.php");

    // Include paypal configuration file 
    include_once 'paypal_config.php';

    // Include database connection file 
    include_once '../db.php'; 

   $gym_id=$_REQUEST['bussinessid'];
        $sql = "SELECT * FROM gym WHERE id='$gym_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$g_id=$row['id'];

      $sql2 = "SELECT * FROM gym WHERE id='$g_id'";
      $result2 = $con->query($sql2);
      $row2 = $result2->fetch_assoc();
      

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container">
      <div class="row" style="padding:50px;">
       <?php 
            $bid=$_REQUEST['bussinessid'];
            $sql = "SELECT * FROM `packages` WHERE business_id='$bid'";
            $res = mysqli_query($con,$sql) or die("MySql Query Error".mysqli_error($con));
            if (mysqli_num_rows($res) > 0) {
            while($row=mysqli_fetch_assoc($res)){
            ?>

            <div class="col-md-4" style="margin: 5px 0px">
            <div class="userprofile text-center">
              <img src="../gym/<?php echo $row2['profile'];?>">
              <h2><?php echo $row2['businessName'];?></h2>
             
              <p style="border-top:1px solid #C4C4C4; padding-top: 6px;"><?php echo $row['name'];?></p>
              <div style="border-top:1px solid #C4C4C4;border-right:1px solid #C4C4C4;border-bottom:1px solid #C4C4C4;width: 50%;height: auto; padding-top: 3px;float: left;">
                <span style="font-size: 15px;font-weight: bold;">Duration</span><br>
                <span><?php echo $row['duration'];?></span>
              </div>
              <div style="border-top:1px solid #C4C4C4;border-bottom:1px solid #C4C4C4;width: 50%;height: auto; padding-top: 3px;float: left;">
                <span style="font-size: 15px;font-weight: bold;">Price</span><br>
                <span><?php echo $row['price']."$";?></span>
              </div>


            
            <form action="<?php echo PAYPAL_URL; ?>" method="post">

                

                    <!-- Paypal business test account email id so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <!-- Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
                     <input type="hidden" name="item_number" value="<?php echo $row['id'];?>"/>
                      <input type="hidden" name="business_id" value="<?php 
                      $_SESSION['business_id'] = $row['business_id'];
                       ;?>"/>
                    
                    <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>

                    <!-- Paypal currency -->
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                    <!-- Success and cancel URLs -->
                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                    <input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL; ?>'>

                   
                  <br><br><br>
                   
                    
                        
                        

                            <!-- payment button. -->
                            <button type="submit" class="btn btn-primary btn-sm" name="submit" role="button">Pay With Paypal Now</button>
            </form><br>
            <form method="post" action="Stripe-Payment/stripe_form.php">
               
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>

                            <button type="submit" class="btn btn-primary btn-sm" name="submit" role="button">Pay With Card Now</button>
                        
              
            </form>
           
                 <br> 
                
            </div>
          </div>
           <?php } } else { echo "There is no Package available for this Gym..";} ?>
      </div>
            

        </div>

      
            
</div>


<?php include_once ("includes/footer.php");?>