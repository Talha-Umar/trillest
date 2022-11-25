<?php 

 include("dbconn.php");

$qid = $_POST['qid'];  

 $sql = "SELECT * FROM options WHERE q_id ='$qid'";  
 $result = $conn->query($sql);

$users_arr = array();
 while($row = $result->fetch_assoc()) {

    $userid = $row['id'];
    $name = $row['option'];

    $users_arr[] = array("id" => $userid, "name" => $name);

}
// encoding array to json format
echo json_encode($users_arr); 