<?php 
      include "../db.php";
      $userid = $_REQUEST['id'];
       $filename = $_FILES['file']['name'] ;
       $tempname = $_FILES['file']['tmp_name'] ; 
       $filesize = $_FILES['file']['size'] ;
       $fileextension = explode('.', $filename) ;
       $fileextension = strtolower(end($fileextension));

       $newfilename = uniqid().'userprofile'.'.'.$fileextension ;
       $path = "userprofile/".$newfilename;
      $message=array();


                      
          $query = mysqli_query($con," UPDATE users SET profile_image='$path' WHERE id='$userid'");
            if (move_uploaded_file($tempname, $path) && $query)  {
                  
                          $message['message']='successfully !!';  
                          $message['response']='200';
                  
     
     
           }
           
       echo json_encode($message); 
        
?>