<?php
$quid=$_REQUEST['quid'];
include 'others/dbconn.php';
if (isset($_POST['add'])) {
 $option=$_POST['option'];
 $price=$_POST['price'];

$sql = "INSERT INTO `options` (`q_id`,`option`,`price`)
VALUES ('$quid', '$option','$price')";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Added!');</script>";
  echo "<script> window.location.href = 'options.php?quid=".$quid."'</script>"; 
}
else {
  echo "Error inserting record: " . $conn->error;
}

}
 ?>
<?php include 'others/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/options.js"></script>
  <!-- Main Sidebar Container -->
<?php include 'others/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Options Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Information</a></li>
              <li class="breadcrumb-item active">Options</li>
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
                      <h3 class="card-title">Options Information</h3> 
                    </div>
                    <div class="col-md-6 col-md-6 col-sm-6 col-6" style="text-align: right;">
                      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#add"><i class="fa fa-plus-circle"> Add Options</i>
                      </button>
                  </div>
                </div>
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Options</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Question</label>
                                    <?php
                                        $sql = "SELECT * FROM questions WHERE id='$quid'";
                                         $result = $conn->query($sql);
                                             
                                        $row = $result->fetch_assoc();
                                          ?>
                                          <input class="form-control" type="text" readonly value="<?php echo $row['question'] ?>">
                                </div>
                                
                                <div class="form-group">
                                  <label>Option</label>
                                  <input type="text" class="form-control"  placeholder="Enter Option Here" name="option" required>
                                </div>

                                <div class="form-group">
                                  <label>Price</label>
                                  <input type="number" class="form-control"  placeholder="Enter option price" name="price" required>
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
                      <th>Question:</th>
                      <td colspan="3"><?php echo $row['question'] ?></td>
                    </tr>
                  <tr>
                    <th>Sr#</th>
                    <th>Option</th>
                    <th>Price</th>
                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $k=0;
                   $sql1 = "SELECT * FROM options WHERE q_id='$quid'";
                    $result1 = $conn->query($sql1);
                   if ($result1->num_rows > 0) {
                       // output data of each row
                     while($row = $result1->fetch_assoc()) {
                    ?>
                  <tr id="<?php echo $row['id'];?>">
                    <td><?php echo ++$k; ?></td>
                   
                    <td data-target="option"><?php echo $row['option']; ?></td>
                    <td data-target="price"><?php echo $row['price']; ?></td>
                   
                    
                    <td>
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-role="edit" data-id="<?php echo $row["id"];?>" title="Edit"><i class="fa fa-pencil-alt"></i></a> <a  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete" data-role="delete" data-id="<?php echo $row["id"];?>" title="Delete" ><i class="fa fa-trash"></i></a>
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
                      $Option=$_POST['Option'];
                       $Price=$_POST['Price'];                      
                      $sql = "UPDATE `options` SET `option`='$Option',`price`='$Price' WHERE id='$uid'";

                       if ($conn->query($sql) === TRUE) {
                       echo "<script> alert('Record Updated!');</script>";
                    echo "<script> window.location.href = 'options.php?quid=".$quid."';</script>";
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
                              <h4 class="modal-title">Edit Option</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                
                                <div class="form-group">
                                  <label>Question</label>
                                    <?php
                                        $sql = "SELECT * FROM questions WHERE id='$quid'";
                                         $result = $conn->query($sql);
                                             
                                        $row = $result->fetch_assoc();
                                          ?>
                                          <input class="form-control" type="text" readonly value="<?php echo $row['question'] ?>">
                                </div>
                                
                                <div class="form-group">
                                  <label>Option</label>
                                  <input type="text" class="form-control"  placeholder="Enter Option Here" name="Option" id="option" required>
                                </div>

                                <div class="form-group">
                                  <label>Price</label>
                                  <input type="number" class="form-control"  placeholder="Enter option price" name="Price" id="price" required>
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
                $sql = "DELETE FROM options WHERE id='$did'";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Record Deleted!');</script>";
  echo "<script> window.location.href = 'options.php?quid=".$quid."';</script>";
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
                              <h4 class="modal-title">Delete Option</h4>
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