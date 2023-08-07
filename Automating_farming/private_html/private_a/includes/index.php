<?php
session_start();
if(isset($_SESSION['user_id'])<=0)
{
 
  header('location:../../../admin/');
}
include("config.php");
if(isset($_POST["start_pipe1"])) {
  $pipe1="start";
  
  $pipe1_time=0;
          $sql = "UPDATE `irrigation` SET `pipe1`='$pipe1',`time_pipe1`='$pipe1_time' WHERE `id`=1";
          $stmt = $conn->prepare($sql);
           if($stmt->execute()){
              $resMessage = array(
                  "status" => "alert-success",
                  "message" => "Image uploaded successfully."
              );    
              echo "sucess";             
           }
          }

          if(isset($_POST["stop_pipe1"])) {
              $pipe1="stop";
             
              $pipe1_time=0;
                      $sql = "UPDATE `irrigation` SET `pipe1`='$pipe1',`time_pipe1`='$pipe1_time' WHERE `id`=1";
                      $stmt = $conn->prepare($sql);
                       if($stmt->execute()){
                          $resMessage = array(
                              "status" => "alert-success",
                              "message" => "Image uploaded successfully."
                          );    
                          echo "sucess";             
                       }
                      }

                      if(isset($_POST["start_pipe2"])) {
                          $pipe2="start";
                          
                          $pipe2_time=0;
                                  $sql = "UPDATE `irrigation` SET `pipe2`='$pipe2',`time_pipe2`='$pipe2_time' WHERE `id`=1";
                                  $stmt = $conn->prepare($sql);
                                   if($stmt->execute()){
                                      $resMessage = array(
                                          "status" => "alert-success",
                                          "message" => "Image uploaded successfully."
                                      );    
                                      echo "sucess";             
                                   }
                                  }

                                  if(isset($_POST["stop_pipe2"])) {
                                      $pipe2="stop";
                                      
                                      $pipe2_time=0;
                                              $sql = "UPDATE `irrigation` SET `pipe2`='$pipe2',`time_pipe2`='$pipe2_time' WHERE `id`=1";
                                              $stmt = $conn->prepare($sql);
                                               if($stmt->execute()){
                                                  $resMessage = array(
                                                      "status" => "alert-success",
                                                      "message" => "Image uploaded successfully."
                                                  );    
                                                  echo "sucess";             
                                               }
                                              }

                                              
                                                                      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Irrigation Control</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="info">
         <a href="#" class="d-block">Admin</a>
       </div>
     </div>

     

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
       
         <li class="nav-item menu-open">

         <ul class="nav nav-treeview">
             
             <li class="nav-item">
               <a href="./" class="nav-link active">
                 <i class="nav-icon fas fa-table"></i>
                 <p>Irrigation</p>
               </a>
             </li>
           </ul>
         <ul class="nav nav-treeview">
             
             <li class="nav-item">
               <a href="./ques" class="nav-link">
                 <i class="nav-icon fas fa-table"></i>
                 <p>Pesticide</p>
               </a>
             </li>
           </ul>


           <ul class="nav nav-treeview">
             
             <li class="nav-item">
               <a href="./logout" class="nav-link">
                 <i class="nav-icon fas fa-table"></i>
                 <p>Logout</p>
               </a>
             </li>
           </ul>
         </li>
         
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Irrigation</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Pipe 1</label>
                        <br>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="start_pipe1">Start</button>
                  <button type="submit" class="btn btn-danger" name="stop_pipe1">Stop</button>
                  <lable>Status:<?php 
                  $conn = new mysqli('localhost', 'root', 'root', 'farming');
                   $sql1 = "SELECT pipe1 FROM pesticide WHERE id='1'";
                   $result=mysqli_query($conn,$sql1);
                   
                   if(mysqli_num_rows($result)>0){
                       while($rows=mysqli_fetch_assoc($result)){
                          $id= $rows["pipe1"];
                       }
                      }
                       echo $id;
?></lable>
                </form>
<br>
                <form action="" method="post" enctype="multipart/form-data">
                  

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Pipe 2</label>
                        <br>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="start_pipe2">Start</button>
                  <button type="submit" class="btn btn-danger" name="stop_pipe2">Stop</button>

                  <lable>Status:<?php 
                  $conn = new mysqli('localhost', 'root', 'root', 'farming');
                   $sql1 = "SELECT pipe2 FROM irrigation WHERE id='1'";
                   $result=mysqli_query($conn,$sql1);
                   
                   if(mysqli_num_rows($result)>0){
                       while($rows=mysqli_fetch_assoc($result)){
                          $id= $rows["pipe2"];
                       }
                      }
                       echo $id;
?></lable>

                </form>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>