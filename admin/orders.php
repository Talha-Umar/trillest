<?php
include 'others/dbconn.php';
if (isset($_POST['add'])) {
 $cid=$_POST['cid'];
 $name=$_POST['name'];
 $price=$_POST['price'];
 $description=$_POST['description'];

// $adddate=date("Y-m-d H:i:s a");
$sql = "INSERT INTO package (cat_id,name,price,description)
VALUES ('$cid', '$name','$price','$description')";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Added!');</script>";
  echo "<script> window.location.href = 'packages.php';</script>";
  
}

}
 ?>
<?php include 'others/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/teachers.js"></script>
  <!-- Main Sidebar Container -->
<?php include 'others/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Information</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                      <h3 class="card-title">Orders Information</h3> 
                    </div>
                    <!-- <div class="col-md-6 col-md-6 col-sm-6 col-6" style="text-align: right;">
                      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#add"><i class="fa fa-plus-circle"> Add Package</i>
                      </button>
                  </div> -->
                </div>
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Package</h4>
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
                                  <label>Name</label>
                                  <input type="text" class="form-control"  placeholder="Enter Package Name" name="name" required>
                                </div>

                                <div class="form-group">
                                  <label>Price</label>
                                  <input type="number" class="form-control"  placeholder="Enter Package Price" name="price" required>
                                </div>

                                <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" name="description" required></textarea>
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
                    <th>User</th>
                    <th>Package</th>
                    <th>Freelancer</th>
                    <th>Status</th>
                   
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $k=0;
                   $sql1 = "SELECT * FROM orders";
                    $result1 = $conn->query($sql1);
                   if ($result1->num_rows > 0) {
                       // output data of each row
                     while($row = $result1->fetch_assoc()) {
                    ?>
                  <tr id="<?php echo $row['id'];?>">
                    <td><?php echo ++$k; ?></td>
                    <td><?php
                    $uid= $row['user_id']; 
                   $sql2 = "SELECT * FROM users WHERE id='$uid'";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    echo $row2['name'];
                  ?></td>
                   <td><?php
                    $pid= $row['pkg_id']; 
                   $sql3 = "SELECT * FROM package WHERE id='$pid'";
                    $result3 = $conn->query($sql3);
                    $row3 = $result3->fetch_assoc();
                    echo $row3['name'];
                  ?></td>
                    <td><?php
                    $fid= $row['freelancer_id']; 
                   $sql4 = "SELECT * FROM freelancer WHERE id='$fid'";
                    $result4 = $conn->query($sql4);
                    $row4 = $result4->fetch_assoc();
                    echo $row4['name'];
                  ?></td>
                    <td><?php
                    if ($row['status']=='1') {
                       echo "Continue";
                     } elseif ($row['status']=='2') {
                       echo "Completed";
                     }
                     else{
                      echo "Canceled";
                     }


                     ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    
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
                      $Tname=$_POST['Tname'];
                      $uid=$_POST['uid'];
                      $udate=date("Y-m-d H:i:s a");
                      $sql = "UPDATE teachers SET name='$Tname', UpdationDate='$udate' WHERE id='$uid'";

                       if ($conn->query($sql) === TRUE) {
                       echo "<script> alert('Record Updated!');</script>";
                    echo "<script> window.location.href = 'teachers.php';</script>";
                         } else {
                       echo "Error updating record: " . $conn->error;
                             }
                    }
                 ?>
                      <div class="modal fade" id="edit">
                        <div class="modal-dialog modal-sm">
                           <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Teacher</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" class="form-control" id="tname" name="Tname">
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
                $sql = "DELETE FROM teachers WHERE id='$did'";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Deleted!');</script>";
  echo "<script> window.location.href = 'teachers.php';</script>";
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
                              <h4 class="modal-title">Delete Service</h4>
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