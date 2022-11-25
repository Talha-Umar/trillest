<?php 
      include "../db.php";
      $user_id=$_REQUEST['user_id'];
      $pkg_id = $_REQUEST['pkg_id'];
      $method=$_REQUEST['method'];
      $txn_id = $_REQUEST['txn_id'];
      $currency = $_REQUEST['currency'];
      $amount = $_REQUEST['amount'];
      $status = $_REQUEST['status'];
      $date_time = $_REQUEST['date_time'];
      $message=array();


                      
          $sql = "INSERT INTO payments(user_id,pkg_id,method,txn_id,currency,amount,status,date_time) VALUES ('$cat_id','$userid','$name','$price', '$description')";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>