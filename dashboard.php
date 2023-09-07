<?php
session_start();
$connection =  mysqli_connect("localhost","root","","user");
$query = mysqli_query($connection,"SELECT * FROM `user_info`");

while($row =  mysqli_fetch_assoc($query)){
    $data[] = $row; 
}


?>



     <?php include "header.php"; ?>         


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool"  title="Add">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card-body">


        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>job title</th>
                      <th>role</th>
                      <th></th>
                      <th ></th>
                    </tr>
                  </thead>
                  <tbody>
              <?php foreach($data as $user): ?>
                    <tr>
                      <td><?= $user['id']; ?></td>
                      <td><?= $user['user_name']; ?></td>
                      <td><?= $user['jop_title']; ?></td>
                      <td><?= ($user['role']==1) ? "Admin" : "User" ; ?></td>
                      <td><a href="update.php?id=<?= $user['id']; ?>">update</a></td>
                      <td><a href="delete.php?id=<?= $user['id']; ?>">delete</a></td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>



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
