<?php
session_start();
$userid=$_SESSION["user_id"];
if(!isset($_SESSION["user_id"])){
     header("Location:index.php");    
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lab Management System</title>
  <link rel="icon" href="img/logo.jpeg">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-power-off"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>  
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      
     <!--  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>  -->
    </ul>
  </nav>
  <!-- /.navbar -->
 <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
 
<!-- include firebase database -->
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-firestore.js"></script>
 
<script >
 
  const firebaseConfig = {
    apiKey: "AIzaSyDJYmKGLTc4YWh04xeilQLP8XZu9CY8Ssg",
    authDomain: "trillest.firebaseapp.com",
    databaseURL: "https://trillest-default-rtdb.firebaseio.com",
    projectId: "trillest",
    storageBucket: "trillest.appspot.com",
    messagingSenderId: "484901583842",
    appId: "1:484901583842:web:9a58fc8d32693c0a9c57bb",
    measurementId: "G-LJVN0CDZ5M"
}
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
   var dbstore = firebase.firestore();
  
</script>

  <script type="text/javascript">
   var totalmsgnotify=0;
  
   var keylist={};


       firebase.database().ref('gym').child('messagenotification').child('<?php echo $gymid;?>').on('value',   function(snapshot) {
              totalmsgnotify=0;
             $("#msgnotify").empty();

      snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
        

       messagenotify(childKey);
   
    });
         
  });

         function messagenotify(key){
       firebase.database().ref('gym').child('messagenotification').child('<?php echo $gymid;?>').child(key).on('child_added',   function(snapshot) {
      
       //alert(snapshot.key)
     var msg=snapshot.val().message;
     if(snapshot.val().readflg=='0')
      totalmsgnotify=totalmsgnotify+1;
     if(msg.length>40)
      msg=msg.substring(0,38)+"...";
      var html = '';
        var name=snapshot.val().name;
        var dp="../user/"+snapshot.val().dp;
              keylist[snapshot.key] =key;
              
            
        var idkey=key+name;
          if(totalmsgnotify<=6){
        html +="<a  href='chat.php' id="+idkey+" class='dropdown-item' style='border-bottom: 1px solid #000;cursor:pointer;height:40px;'>"+

        '<img src='+dp+' style="width: 30px;height: 30px;border-radius: 50px;margin-left:-7px;">'+

        '<strong style="font-size:14px;left:5px;top:-7px;position:relative">'+
        snapshot.val().name+
        '</strong>'+

        '<br>'+
        '<span style="font-size: 10px;left:35px;top:-17px;position:relative">'+
          msg+
        '</span>'
               
        html += '</a>';
        document.getElementById('msgnotify').innerHTML += html;
    }
    if(totalmsgnotify>0){
           var totalmsgobj=document.getElementById('totalnotfymsg')  ;
            totalmsgobj.innerHTML=totalmsgnotify;
            totalmsgobj.style.display="inline";
        }
     
     });

  

   } 

   function delnotifymsg(){
    for (var kk in keylist)
         {
             firebase.database().ref('gym').child('messagenotification').child('<?php echo $gymid;?>').child(keylist[kk]).child(kk).update({
           
                 'readflg':'1',
             
 
            });
                  
         }
           var totalmsgobj=document.getElementById('totalnotfymsg')  ;
           
            totalmsgobj.style.display="none";

            keylist={};
   }
  </script>
