<?php 
      include "../db.php";
      $userid = $_REQUEST['id'];
      $name=$_REQUEST['name'];
      $email=$_REQUEST['email'];
      $mobile = $_REQUEST['mobile'];
      $password=$_REQUEST['password'];
      $message=array();


                      
          $sql = "UPDATE users SET password='$password',name='$name',email='$email',mobile='$mobile' WHERE id='$userid'";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>