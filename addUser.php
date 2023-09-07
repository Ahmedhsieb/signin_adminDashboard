<?php
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $job_title = $_POST['job_title'];
    $role = $_POST['role'];
    
    $tmp = $_FILES['img']['tmp_name'];
    $ex = $_FILES['img']['type'];
    $ex = explode("/", $_FILES['img']['type']);
    $ex = end($ex);
    $file_name = $_POST['name'].'.'.$ex;
    // $img_location = "uploaded_imge/{$file_name}";
    move_uploaded_file($tmp, "uploaded_imge/{$file_name}");

    // print_r($_POST);die;
    $connection =  mysqli_connect("localhost","root","","user");
    $query = mysqli_query($connection,"INSERT INTO `user_info`(`user_name`, `jop_title`, `user_pass`, `img_location`, `role`) VALUES('$name' ,'$job_title' ,'$password','uploaded_imge/$file_name', '$role')");
    // echo mysqli_affected_rows($connection);die;
    if(mysqli_affected_rows($connection) >= 0){
        header("location: dashboard.php");
    }else{
        echo "errror";
    }

}

?>

<?php include "header.php"; ?>         

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add User</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card-body">



             <form action="addUser.php" method="post" class="card-body" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter user name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">job title</label>
                    <input type="text" name="job_title"  class="form-control" id="exampleInputPassword1" placeholder="Enter job title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                  </div>
                  <?php if($_COOKIE['role'] == 1): ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">role</label>
                    <input type="text" name="role" class="form-control" id="exampleInputPassword1" placeholder="Enter role: 1 for admin and 0 for user">
                  </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="id" class="form-control" id="exampleInputPassword1" placeholder="Password">

                  <!-- <div class="card-footer"> -->
                  <button type="submit" class="btn btn-primary">Add</button>
                <!-- </div> -->
                </form>
                <!-- /.card-body -->

              
              



      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!-- Footer -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>


<?php include "footer.php"; ?>         
