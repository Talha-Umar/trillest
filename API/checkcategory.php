<?php 
      include "../db.php";
      $cat_id=$_REQUEST['category'];
      $message=array();
    

          $sql = "SELECT * FROM freelancer WHERE  cat_id='$cat_id'";
         $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                          $message['message']='successfully !!';  
                          $message['response']='200';
 
           } else{
            $message['message']='Not Available!';  
            $message['response']='400';
           }
           
       echo json_encode($message); 
        
?>