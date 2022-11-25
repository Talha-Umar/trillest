<?php 
      include "../db.php";
      $userid = $_REQUEST['id'];
      $message=array();


                      
          $sql = "UPDATE orders SET status='2' WHERE user_id='$userid'";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>