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
    $id = $_POST['id'];
    
    $tmp = $_FILES['img']['tmp_name'];
    $ex = $_FILES['img']['type'];
    $ex = explode("/", $_FILES['img']['type']);
    $ex = end($ex);
    $file_name = $_POST['name'].'.'.$ex;
    setcookie("file_name", "$file_name", time() + 3600*24*30, "/", "localhost");
    // $img_location = "uploaded_imge/{$file_name}";
    move_uploaded_file($tmp, "uploaded_imge/{$file_name}");


    // print_r($_POST);die;
    $connection =  mysqli_connect("localhost","root","","user");

    $query = mysqli_query($connection,"UPDATE `user_info` SET `user_name` = '$name' , `jop_title` = '$job_title' , `user_pass` = '$password' , `img_location` = 'uploaded_imge/$file_name'  WHERE `id` = $id");
    
    setcookie("userName","$name", time() + 3600*24*30, "/", "localhost");
    setcookie("jopTitle","$job_title", time() + 3600*24*30, "/", "localhost");
    setcookie("img","uploaded_imge/{$file_name}", time() + 3600*24*30, "/", "localhost");


    if(mysqli_affected_rows($connection) >= 0){
        header("location: profile.php");
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



             <form action="userUpdate.php" method="post" class="card-body" enctype="multipart/form-data">
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
                  <?php if($_COOKIE['role'] == 1): ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">role</label>
                    <input type="text" name="role" value="<?=  $row['role']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
