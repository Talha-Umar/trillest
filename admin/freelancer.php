<?php
include 'others/dbconn.php';
if (isset($_POST['add'])) {
 $cid=$_POST['cid'];
 $ctid=$_POST['ctid'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];

// $adddate=date("Y-m-d H:i:s a");
$sql = "INSERT INTO `freelancer` (`cat_id`,`city_id`,`name`,`email`,`password`)
VALUES ('$cid','$ctid','$name','$email','$password')";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Added!');</script>";
  echo "<script> window.location.href = 'freelancer.php';</script>"; 
}
else {
  echo "Error inserting record: " . $conn->error;
}

}
 ?>
<?php include 'others/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/freelancers.js"></script>
  <!-- Main Sidebar Container -->
<?php include 'others/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Freelancer Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Information</a></li>
              <li class="breadcrumb-item active">Freelancer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <div class="row" style="padding: 10px 20px;">
                    <div class="col-md-6 col-sm-6 col-6">
                      <h3 class="card-title">Freelancer Information</h3> 
                    </div>
                    <div class="col-md-6 col-md-6 col-sm-6 col-6" style="text-align: right;">
                      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#add"><i class="fa fa-plus-circle"> Add Freelancer</i>
                      </button>
                  </div>
                </div>
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Freelancer</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Category</label>
                                  <select class="form-control" name="cid" required>
                                    <option value="">Select Category</option>
                                    <?php
                                        $sql = "SELECT * FROM category";
                                         $result = $conn->query($sql);
                                              // output data of each row
                                         while($row = $result->fetch_assoc()) { ?>
                                          <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                        <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>City</label>
                                  <select class="form-control" name="ctid" required>
                                    <option value="">Select City</option>
                                    <?php
                                        $sql2 = "SELECT * FROM cities";
                                        $result2 = $conn->query($sql2);
                                              // output data of each row
                                         while($row2 = $result2->fetch_assoc()) { ?>
                                          <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option>
                                        <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control"  placeholder="Enter Freelancer Name" name="name" required>
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control"  placeholder="Enter Freelancer Email" name="email" required>
                                </div>

                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" class="form-control"  placeholder="Enter Freelancer Password" name="password" required>
                                </div>
                                
                               
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr#</th>
                    <th>Category</th>
                    <th>City</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $k=0;
                   $sql1 = "SELECT * FROM freelancer";
                    $result1 = $conn->query($sql1);
                   if ($result1->num_rows > 0) {
                       // output data of each row
                     while($row = $result1->fetch_assoc()) {
                    ?>
                  <tr id="<?php echo $row['id'];?>">
                    <td><?php echo ++$k; ?></td>
                    <td style="display: none;" data-target="cid"><?php echo $row['cat_id']; ?></td>
                    <td data-target="cname"><?php
                    $cid= $row['cat_id']; 
                   $sql2 = "SELECT * FROM category WHERE id='$cid'";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    echo $row2['name'];
                  ?></td>
                   <td style="display: none;" data-target="ctid"><?php echo $row['city_id']; ?></td>
                    <td data-target="ctname"><?php
                    $ctid= $row['city_id']; 
                   $sql2 = "SELECT * FROM cities WHERE id='$ctid'";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    echo $row2['name'];
                  ?></td>
                    <td data-target="name"><?php echo $row['name']; ?></td>
                    <td data-target="email"><?php echo $row['email']; ?></td>
                    <td data-target="password"><?php echo $row['password']; ?></td>
                    
                    <td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-role="edit" data-id="<?php echo $row["id"];?>" title="Edit"><i class="fa fa-pencil-alt"></i></a> <a  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete" data-role="delete" data-id="<?php echo $row["id"];?>" title="Delete" ><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                   <?php } } else { ?>
                    <tr>
                      <th colspan="6">No Record Exists!!!!</th>
                    </tr>
                     <?php } ?>
                  </tbody>
                 
                </table>
                <?php
                    if (isset($_POST['update'])) {
                      $uid=$_POST['uid'];
                     $Cid=$_POST['Cid'];
                     $CTid=$_POST['CTid'];
                     $Name=$_POST['Name'];
                     $Email=$_POST['Email'];
                     $Password=$_POST['Password'];

                      $sql = "UPDATE freelancer SET `cat_id`='$Cid',`city_id`='$CTid',`name`='$Name',`email`='$Email',`password`='$Password' WHERE id='$uid'";

                       if ($conn->query($sql) === TRUE) {
                       echo "<script> alert('Record Updated!');</script>";
                    echo "<script> window.location.href = 'freelancer.php';</script>";
                         } else {
                       echo "Error updating record: " . $conn->error;
                             }
                    }
                 ?>
                      <div class="modal fade" id="edit">
                        <div class="modal-dialog modal-md">
                           <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Freelancer</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Category</label>
                                  <select class="form-control" name="Cid" required>
                                    <option id="category">Select Category</option>
                                    <?php
                                        $sql = "SELECT * FROM category";
                                         $result = $conn->query($sql);
                                              // output data of each row
                                         while($row = $result->fetch_assoc()) { ?>
                                          <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                        <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>City</label>
                                  <select class="form-control" name="CTid" required>
                                    <option id="city">Select City</option>
                                    <?php
                                        $sql2 = "SELECT * FROM cities";
                                         $result2 = $conn->query($sql2);
                                              // output data of each row
                                         while($row2 = $result2->fetch_assoc()) { ?>
                                          <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option>
                                        <?php } ?>
                                  </select>
                                </div>
                                
                                <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control"  placeholder="Enter Freelancer Name" name="Name" id="name" required>
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control"  placeholder="Enter Freelancer Email" name="Email" id="email" required>
                                </div>

                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" class="form-control"  placeholder="Enter Freelancer Password" name="Password" id="password" required>
                                </div>
                               
                                <input type="hidden" name="uid" id="Uid">
                                
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> 
                              <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?php 
              if (isset($_POST['delete'])) {
                $did=$_POST['did'];
                $sql = "DELETE FROM freelancer WHERE id='$did'";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Deleted!');</script>";
  echo "<script> window.location.href = 'freelancer.php';</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}
              }
            ?>
             <div class="modal fade" id="delete">
                        <div class="modal-dialog modal-sm">
                          <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Freelancer</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <input type="hidden" name="did" id="Did">
                                <p>Are you sure want to delete?</p>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" name="delete" class="btn btn-primary"><i class="fa fa-check"></i> Delete</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'others/footer.php'; ?>