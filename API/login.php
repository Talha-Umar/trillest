<?php

include "../db.php";


    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
   $sql = "SELECT * FROM users  where email = '$email' AND password  = '$password' " ;
    $result=  mysqli_query($con, $sql);
   $row  = mysqli_fetch_array($result);
    $message=array();
 if ($con->connect_error) {
               $message['message']="failed";
               $message['response']="409";
    }
   
   else  if($result->num_rows > 0) {
                $message['message']="successfully!!";
                $message['response']="200";
                $message['data']=$row;
         
     }
     
      else{
        $message['message']="Does not exist!!";
        $message['response']="409";
    
        
    }
    
     echo json_encode($message);  
?>

