<?php

include "../db.php";


    $cat_id = $_REQUEST['id'];
    
   $sql = "SELECT * FROM freelancer  where cat_id = '$cat_id'";
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

