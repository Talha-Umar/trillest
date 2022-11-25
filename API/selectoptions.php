<?php 
      include "../db.php";
      $q_id=$_REQUEST['id'];
      $message=array();
      $dataarray=array();
          $sql = "SELECT * FROM options WHERE  q_id='$q_id'";
         $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
          
 
         

                   $message['message']="successfully!!";
                $message['response']="200";
                while($row = $result->fetch_assoc()) {
                    array_push($dataarray,$row);
                   
                
                }
                $message['data']=$dataarray;
                   
                 
             
     
     
           }
           
       echo json_encode($message); 
        
?>