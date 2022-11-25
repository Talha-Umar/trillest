<?php
include 'others/dbconn.php';
 ?>
<?php include 'others/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/teachers.js"></script>
  <!-- Main Sidebar Container -->
<?php include 'others/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Freelancer Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Freelancer Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    $fid=$_SESSION["user_id"];
      $sql = "SELECT * FROM freelancer WHERE id='$fid'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
     ?>

    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <strong>Freelancer Name:</strong>
              <span style="margin-left: 20px;"><?php echo $row['name']; ?></span><br><br>
              <strong>Email:</strong>
              <span style="margin-left: 70px;"><?php echo $row['email']; ?></span><br><br>
              <strong>Phone No:</strong>
              <span style="margin-left: 40px;"><?php echo $row['mobile']; ?></span><br><br>
             <div class="text-center">
               <img class="border-success" src="<?php if($row['profile_image']!=''){echo $row['profile_image'];} else{
                echo "img/avatar.png";
               } ?>" width="200px" height="200px" style="border-radius: 50%;">
             </div>
            </div>



    <?php 
       if(isset($_POST['profile'])){
           $upid = $_POST['upid'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $filename = $_FILES['file']['name'] ;
            $tempname = $_FILES['file']['tmp_name'] ; 
            $filesize = $_FILES['file']['size'] ;
            $fileextension = explode('.', $filename) ;
            $fileextension = strtolower(end($fileextension));

            $newfilename = uniqid().'adminprofile'.'.'.$fileextension ;
            $path = "img/adminprofile/".$newfilename ;

            
            $query = mysqli_query($conn," UPDATE freelancer SET name = '$name', email = '$email', mobile = '$phone', password = '$password', profile_image = '$path' WHERE id ='$upid'");


             if (move_uploaded_file($tempname, $path) && $query)  {
                   echo "<script> alert('Profile Updated!');</script>";
                    echo "<script>window.location.href='profile.php';</script>";
                    exit;
                    }
              else{
                  $_SESSION['status']="Error";
                  $_SESSION['btn_code']="error";
               }
           }  

      ?>


            <div class="col-md-6">
                <?php
                  $fetch = mysqli_query($conn, "SELECT * FROM freelancer WHERE id='$fid'") ;
                  $res = mysqli_fetch_array($fetch) ;
                  $adminid = $res['id'];
                  $uname = $res['name'];
                  $uemail = $res['email'];
                  $uphone = $res['mobile'];
                  $upass = $res['password'];
                  $image = $res['profile_image'];                    
                ?>
              <form method="post" action="" enctype='multipart/form-data'> 
                <input type="hidden" name="upid" value="<?php echo $adminid ?>">
                <div class="form-group">
                    <label >Freelancer Name</label>
                    <input type="text" class="form-control"  name="name" value="<?php echo $uname ?>" required>
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control"  name="email" value="<?php echo $uemail ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone No</label>
                    <input type="text" class="form-control"  name="phone" value="<?php echo $uphone ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control"  name="password" value="<?php echo $upass ?>" required>
                </div>
                <div class="form-group">
                    <label >Profile Image</label>
                    <input type="file" class="form-control" name="file" value="<?php echo $image ?>" required>
                </div>
            <button type="submit" class="btn btn-primary" name="profile">Submit</button>
        </form>
            </div>
          </div>
        </div>
      </div> 
    </div>


  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'others/footer.php'; ?>