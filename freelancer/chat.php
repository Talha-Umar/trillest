<?php include 'others/dbconn.php'; 
  include 'others/header.php';
 include 'others/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      

          <div class="content-header">
            <div class="container">
                <div class="row">
                
                   
                    <div class="col-md-4 left" style="padding: 10px 15px;background-color: #fff;">
                       <div class="contact" id="contacts">
                       </div>
                    </div>
                    <div class="col-md-8" id="masghide">
                        <div class="card" style="padding: 10px 15px;">
                          <div class="row" style="padding: 5px 0px;border-bottom: 1px solid #000;">
                            <div class="col-md-1">
                                <img id='dp'src="image/gym.png" style="width: 50px;height: 50px;border-radius: 50px;">
                            </div>
                            <div class="col-md-11" style="margin-top:12px;">
                                <strong id='name'>Trillest</strong>
                                <!--<br><span style="font-size: 14px;color: #009B19;">Online</span>-->
                            </div>
                          </div> 

                          <div class="right" id="messageroom">
                                <div class="scond" id="messagesuser">
                                  
                                </div>
                                <div class="scond1">
                                  <form  onsubmit=" return sendMessage();">
                                      <div class="input-group">
                                        <input id='messagebox'name="" class="form-control type_msg" placeholder="Type your message..." style="border:1px solid #000;border-right: none;">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text send_btn" style="border-left: none;background: transparent;border:1px solid #000;" ><i class="fas fa-location-arrow" style="color: #1203f2;font-size: 24px;"></i>

                                            </button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
     </div>

     <style>



    ::-webkit-scrollbar {
          width: 2px;
        }

 
/* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888; 
    }
   .left{
      width: 100%;
      height: calc(600px - 70px);
      overflow-y: auto;
      display: flex;
   }
   .contact{
      height: 50px;
      width: 100%;
      justify-content: space-between;
   }
    .right{
      width: 100%;
    }
    .scond{
      width: 100%;
      height: calc(600px - 200px);
      overflow-y: auto;
    }
    .scond1{
      height: 50px;
      display: flex;
    }
    form{
      width: 100%;
      height: 40px;
      margin-top: 10px;
      border-radius: 5px;
    }
    .me{
      padding: 10px;
      background-color: #fff;
      border-radius: 15px 15px 0px 15px;
      max-width: 80%;
      font-size: 14px;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.15);
      float: right;
      clear: both;
      margin: 10px;
    }
    .u{
      padding: 10px;
      background-color: #E5F1FF;
       border-radius: 0px 15px 15px 15px;
      font-size: 14px;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.15);
      max-width: 80%;
      clear: both;
      float: left;
      margin: 10px;
    }
  </style>
  
      
     
  
 <div id="GetMessages">
                    <?php
                      $userid=$_SESSION["user_id"];
                      $sql = "SELECT * FROM freelancer WHERE id='$userid'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();

                     $sender_id= $row['id'];
                     $sender_name= $row['name'];
                     $sender_pic = $row['profile_image'];
                      
                  
                    
echo "   
<script>
        var ID;
        var NAME;
        var DP;
    function sendMessage() {
     

    getcookiesdata();
        var time=Date.now();
        // get message
        var message = document.getElementById('messagebox').value;
         if(message.trim()=='')return false;
        // save in database
        firebase.database().ref('user').child('messages').child(ID).child('$sender_id').push().set({
            'participant': 'receiver',
            'message': message,
            'name':'$sender_name',
             'timestemp':time,  
 
        });
         firebase.database().ref('freelancer').child('messages').child('$sender_id').child(ID).push().set({
            'name': '$sender_name',
            'message': message,
            'participant': 'sender',
            'timestemp':time,
        });
 
       firebase.database().ref('freelancer').child('user').child('$sender_id').child(ID).child('data').set({
            'name': NAME,
            'message': message,
            'timestemp':time,
            'dp':DP,
        });

         firebase.database().ref('user').child('freelancer').child(ID).child('$sender_id').child('data').set({
            'message': message,
            'name':'$sender_name',
             'timestemp':time,
             'dp':'$sender_pic',
        });
         firebase.database().ref('user').child('messagenotification').child(ID).child('$sender_id').push().set({
            'participant': 'receiver',
            'message': message,
            'name':'$sender_name',
             'timestemp':time, 
             'dp':'$sender_pic', 
             'readflg':'0',
             'id':'$sender_id'
 
        });
          document.getElementById('messagebox').value='';   

          return false;
    }
</script>
"
?>
 </div>


  <script>
 
   function getcookiesdata(){
     
       ID=getCookie('uid');
       NAME=getCookie('name');
       DP=getCookie('dp');
      
      
    }
    function getCookie(cookieName) {
  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
  })
  return cookie[cookieName];
}
         firebase.database().ref('freelancer').child('user').child('<?php echo $row['id'];?>').on('value',   function(snapshot) {
              $("#contacts").empty();
      snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      $(document).ready(function() {
                var myDiv = $('#'+childKey);
               
                 if (myDiv.length!=1)                              
                 
                  readdata(childKey);


                 });
      
    
    });
  });

  function readdata(key){
    
     firebase.database().ref('freelancer').child('user').child('<?php echo $row['id'];?>').child(key).on('child_added',   function(snapshot) {
        
     var msg=snapshot.val().message;
     if(msg.length>100)
      msg=msg.substring(0,98)+"...";
      var html = '';
        var name=snapshot.val().name;
        var dp=snapshot.val().dp;
       
        
      
        html +="<div id="+key+" class='row chatrow' style='padding: 5px 0px;border-bottom: 1px solid #000;cursor:pointer;' onclick='readmessage("+key+",\""+ name + "\",\""+ dp + "\");''>"+

        '<div class="col-md-2">'+
        '<img src='+snapshot.val().dp+' style="width: 50px;height: 50px;border-radius: 50px;">'+
        '</div>'+ 

        '<div class="col-md-8">'+
        '<strong>'+
        snapshot.val().name+
        '</strong><br>'+
        '<span style="font-size: 14px;">'+
          msg+
        '</span>'+
        '</div>'+

        // '<div class="col-md-2">'+

       
        //   '<span style="font-size: 12px;">12min'+
        //   '</span>'+
        
        '</div>'
               
        html += '</div>';
        document.getElementById('contacts').innerHTML += html;
     
     //});

  }); 

   } 


   
  function readmessage(key,name,dp){ 
   document.cookie = "uid="+key;
    document.cookie = "name="+name;
    document.cookie = "dp="+dp;
   
  document.getElementById('masghide').style.display='inline';
 firebase.database().ref("user").child("messages").on("child_added", function (snapshot) {

               
            if(dp!=""){

             document.getElementById('dp').src =dp;
             
            }
            if(name!="")
             document.getElementById('name').innerHTML =name;
          

         firebase.database().ref('freelancer').child('messages').child("<?php echo $sender_id; ?>").child(key).on('value',   function(snapshot) {
            $("#messagesuser").empty();
    snapshot.forEach(function(childSnapshot) {

      var childKey = childSnapshot.key;
      var childData = childSnapshot.val()['message'];
        // alert(childData);
         var name=childSnapshot.val()['name'];
          var html = "";
         if(childSnapshot.val()['participant']=='sender'){
         html += '<div class="me">'+childData
         html += '</div>';
         document.getElementById("messagesuser").innerHTML += html;
       }

else  if(childSnapshot.val()['participant']=='receiver'){
       html += '<div class="u">'+childData
         html += '</div>';
 document.getElementById("messagesuser").innerHTML += html;
        
      }
      html = ""; 
      var objDiv = document.getElementById("messagesuser");
       objDiv.scrollTop = objDiv.scrollHeight;
    });
  });
   });   
    }
 
</script>

<?php include 'others/footer.php'; ?>