<?php 
      include "../db.php";
      $name=$_REQUEST['name'];
      $email = $_REQUEST['email'];
      $mobile=$_REQUEST['mobile'];
      $password = $_REQUEST['password'];
      $message=array();


                      
          $sql = "INSERT INTO users(name,email,mobile,password) VALUES ('$name','$email','$mobile','$password')";
          $result = mysqli_query($con, $sql);
            if ($result) {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>