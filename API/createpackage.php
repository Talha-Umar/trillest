<?php 
      include "../db.php";
      $userid=$_REQUEST['userid'];
      $cat_id = $_REQUEST['category'];
      $name=$_REQUEST['name'];
      $price = $_REQUEST['price'];
      $description = $_REQUEST['description'];
      $message=array();


                      
          $sql = "INSERT INTO package(cat_id,user_id,name,price, description) VALUES ('$cat_id','$userid','$name','$price', '$description')";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>