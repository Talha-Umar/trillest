<?php

include "../db.php";


   $sql = "SELECT * FROM category" ;
    $result=  mysqli_query($con, $sql);
 
    $message=array();
    $dataarray=array();
 if ($con->connect_error) {
               $message['message']="failed";
               $message['response']="409";
    }
   
   else  if($result->num_rows > 0) {
                $message['message']="successfully!!";
                $message['response']="200";
                 while($row = $result->fetch_assoc()) {
                    array_push($dataarray,$row);
                   
                
                }
                $message['data']=$dataarray;
                   
         
     }
     
      else{
        $message['message']="Does not exist!!";
        $message['response']="409";
    
        
    }
    
     echo json_encode($message);  
?>

