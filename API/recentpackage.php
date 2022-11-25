<?php

include "../db.php";


    $userid = $_REQUEST['id'];
    
   $sql = "SELECT * FROM package  where user_id = '$userid' order by id DESC";
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

