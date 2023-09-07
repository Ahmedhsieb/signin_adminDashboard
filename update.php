<?php



if(isset($_GET['id'])){

    $id = $_GET['id'];


    $connection =  mysqli_connect("localhost","root","","user");
    $query = mysqli_query($connection,"SELECT * FROM `user_info` WHERE `id` = $id");

    $row =  mysqli_fetch_assoc($query);
}


if(isset($_POST['name'])){

    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $job_title = $_POST['job_title'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    // print_r($_POST);die;
    $connection =  mysqli_connect("localhost","root","","user");

    $query = mysqli_query($connection,"UPDATE `user_info` SET `user_name` = '$name' , `jop_title` = '$job_title' , `user_pass` = '$password' , `role` = '$role' WHERE `id` = $id");
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
          <h3 class="card-title">Update</h3>

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



             <form action="update.php" method="post" class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" name="name" value="<?=  $row['user_name']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">job title</label>
                    <input type="text" name="job_title" value="<?=  $row['jop_title']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">password</label>
                    <input type="text" name="password" value="<?=  $row['user_pass']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">role</label>
                    <input type="text" name="role" value="<?=  $row['role']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <input type="hidden" name="id" value="<?=  $id; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">

                  <!-- <div class="card-footer"> -->
                  <button type="submit" class="btn btn-primary">update</button>
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
