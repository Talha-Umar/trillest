<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!isset($_SESSION["user_id"])){
     echo "<script type='text/javascript'>location.replace('../user_login.php')</script>";
    
}
$userid=$_SESSION["user_id"]; 
 ?>
<?php 
    /* coded by Rahul Barui ( https://github.com/Rahul-Barui ) */

    // Include paypal configuration file 
    include_once 'paypal_config.php';
 
    // Include database connection file 
    include_once '../db.php';
date_default_timezone_set("Asia/Karachi"); 
    // get Current Date and Time
    function getCurrentDate(){  
        $date = date("Y-m-d");
        return $date;
    }
    function getCurrentTime(){
        $time = date("H:i:s");
        return $time;
    }

    // If transaction data is available in the URL

    if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 

        // Get transaction information from URL 
        $in = $_GET['item_number'];  
        $tid = $_GET['tx']; 
        $pg = $_GET['amt']; 
        $cc = $_GET['cc']; 
        $pst = $_GET['st'];
        $bid= $_SESSION['business_id'];

        $dt = getCurrentDate();
        $tm = getCurrentTime();

        //Get product info from the database table
        $sql_get = "SELECT * FROM `packages` WHERE `id`='$tid'";
        $data_get = mysqli_query($con,$sql_get) or die('MySQL Error (Paypal Success1'.mysqli_error($con));
        $row = mysqli_fetch_assoc($data_get);

        // Check if transaction data exists with the same TXN ID. 
        $sql_c = "SELECT * FROM `payments` WHERE `txn_id` = '$tid'"; 
        $data_c = mysqli_query($con,$sql_c) or die('MySQL Error (Paypal Success2)'.mysqli_error($con));
        $count = mysqli_num_rows($data_c);
               //Update follower data 
             $sql8="SELECT * FROM packages WHERE id='$in'";
           $result8 = mysqli_query($con, $sql8);
           $row8 = mysqli_fetch_assoc($result8);
           $valid=$row8['duration'];
           $start_date=date("d-m-Y");
           if ($valid=='Yearly') {
                $date = strtotime($start_date);
              $date = strtotime("+1 year", $date);
                $end_date= date('d-m-Y', $date);
           }
            if ($valid=='Monthly') {
               $date = strtotime($start_date);
              $date = strtotime("+1 month", $date);
                $end_date= date('d-m-Y', $date);
           }
           if ($valid=='Weekly') {
                $date = strtotime($start_date);
              $date = strtotime("+7 days", $date);
                $end_date= date('d-m-Y', $date);
           }


        if($count==0){

            // Insert tansaction data into the database 
            $sql_tr = "INSERT INTO `payments`(`user_id`,`business_id`,`method`,`package`,`txn_id`,`amount`,`currency`,`status`,`date`,`time`) VALUES ('$userid','$bid','Paypal','$in','$tid','$pg','$cc','$pst','$dt','$tm')";
            $data_tr = mysqli_query($con,$sql_tr) or die('MySQL Error (Insert)'.mysqli_error($con));
            
         
            
            // Get last tansaction data from database
            $sql_last = "SELECT * FROM `payments` WHERE txn_id='$tid'";
            $data_last = mysqli_query($con,$sql_last) or die('MySQL Query Error (Insert1)'.mysqli_error($con));
            $row_last=mysqli_fetch_assoc($data_last);
                $last_id = $row_last['id'];
                 $sql10="INSERT INTO `inindiatech_followers`(`gym_id`, `user_id`, `confirm`, `validity`, `currency`, `total_price`, `transaction_id`, `start_date`, `end_date`) VALUES('$bid','$userid','$pst','$valid','$cc','$pg','$last_id','$start_date','$end_date')";
          if (mysqli_query($con, $sql10)) {
} else {
  echo "Error: " . $sql10 . "<br>" . mysqli_error($con);
}
            

        } else {

            // Update tansaction data into the database 
            $sql_tr = "UPDATE `payments` SET `user_id`='$userid',`business_id`='$bid', `method`='Paypal', `package`='$in',`txn_id`='$tid',`amount`='$pg',`currency`='$cc',`status`='$pst',`date`='$dt',`time`='$tm' WHERE `txn_id` = '$tid'";
            $data_tr = mysqli_query($con,$sql_tr) or die('MySQL Error (Paypal update-1)'.mysqli_error($con));
            
     //Update followers
            // Get last tansaction data from database
            $sql_last = "SELECT * FROM `payments` WHERE txn_id='$tid'";
            $data_last = mysqli_query($con,$sql_last) or die('MySQL Query Error (Insert1)'.mysqli_error($con));
            $row_last=mysqli_fetch_assoc($data_last);
                $last_id = $row_last['id'];

$sql9 = "UPDATE `inindiatech_followers` SET `gym_id`='$bid',`user_id`='$userid',`confirm`='$pst',`validity`='$valid',`currency`='$cc',`total_price`='$pg',`transaction_id`='$last_id',`start_date`='$start_date',`end_date`='$end_date' WHERE `transaction_id` = '$last_id'";

if (mysqli_query($con, $sql9)) {
 
} else {
  echo "Error updating record: " . mysqli_error($con);
}
           
          
            // Get last tansaction data from database
            $sql_last = "SELECT * FROM `payments`";
            $data_last = mysqli_query($con,$sql_last) or die('MySQL Query Error update-2'.mysqli_error($con));
            while($row_last=mysqli_fetch_assoc($data_last)){
                $last_id = $row_last['id'];
            }
            
        }

        //Get tansaction data from database
        $sql_tr2 = "SELECT * FROM `payments` WHERE `id`='$last_id'";
        $data_tr2 = mysqli_query($con,$sql_tr2) or die('MySQL Error (Paypal Success1'.mysqli_error($con));
        $row_tr2 = mysqli_fetch_assoc($data_tr2);
        
    }
?>
<?php include_once ("includes/header.php");
      include_once ("includes/topbar.php");
      include_once ("includes/sidebar.php");
?>
<div class="content-wrapper">
        <div class="content-header">

            <div class="Container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card"style="width: 70%;margin: auto;">
                          <div class="card-body">
                           <div class="status">
                                   <?php if(!empty($last_id)){ ?>
                                        <h3 style="text-align: center; color: green;">Your Payment has been Successful. </h3>
                                    <?php } else { ?>
                                        <h2 style="text-align: center; color: blue;">Sorry !!</h2>
                                    <?php } ?>
                                     <br>
                                   <?php if(!empty($last_id)){ ?>
                                        <h4 class="heading">Payment Information</h4>
                                        <br>
                                        <p><b>Reference ID : </b> <strong><?php echo $last_id; ?></strong></p>
                                        <p><b>Transaction ID : </b> <?php echo $tid; ?></p>
                                        <p><b>Paid Amount  : </b> <?php echo $pg;?></p>
                                        <p><b>Currency : </b> <?php echo $cc; ?></p>
                                        <p><b>Payment Status : </b> <?php echo $pst; ?></p>
                                         <br>
                                        <h4 class="heading">Product Information</h4>
                                        
                                        <p><b>Name : </b> <?php echo $row8['name'];; ?></p>
                                        <p><b>Price : </b> <?php echo $pg?></p>

                                        <h4 class="heading">Date & Time</h4>
                                        <p><b>Pay Date : </b> <?php echo date("M d, Y", strtotime($row_tr2['date'])); ?></p>
                                        <p><b>Pay Time : </b> <?php echo date("h:i A", strtotime($row_tr2['time'])); ?></p>

                                    <?php } else { ?>

                                        <h1 class="error">Sorry !! Your Payment has Failed.</h1>

                                    <?php } ?>
                           </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

             
        </div>
    </div>
<?php include_once ("includes/footer.php");?>
