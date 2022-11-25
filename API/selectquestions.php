<?php 
      include "../db.php";
      $cat_id=$_REQUEST['id'];
      $message=array();
      $dataarray=array();

          $sql = "SELECT * FROM questions WHERE  cat_id='$cat_id'";
         $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                          $message['message']='successfully !!';  
                          $message['response']='200';
 
          while($row = $result->fetch_assoc()) {

                   
                          
                          array_push($dataarray,$row);
                   
                 
             }
             $message['data']=$dataarray;
     
     
           }
           
       echo json_encode($message); 
        
?>