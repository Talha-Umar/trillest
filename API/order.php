<?php 
      include "../db.php";
      $pkg_id = $_REQUEST['pkg_id'];
      $user_id=$_REQUEST['user_id'];
      $freelancer_id=$_REQUEST['freelancer_id'];
      $payment_id = $_REQUEST['payment_id'];
      $status = $_REQUEST['status'];
      $order_date = $_REQUEST['order_date'];
      $message=array();


                      
          $sql = "INSERT INTO orders(pkg_id,user_id,freelancer_id,payment_id,status,order_date) VALUES ('$pkg_id','$user_id','$freelancer_id','$payment_id', '$status','$order_date')";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>