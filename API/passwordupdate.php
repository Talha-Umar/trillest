<?php 
      include "../db.php";
      $userid = $_REQUEST['id'];
      $password=$_REQUEST['password'];
      $message=array();


                      
          $sql = "UPDATE users SET password='$password' WHERE id='$userid'";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>