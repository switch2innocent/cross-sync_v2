<?php

require_once 'config/dbcon.php';
require_once 'objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

$Viewofficeonsite = new Upload_csv($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload File</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Administrator</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Upload CSV
                  <!-- <i class="fas fa-angle-left right"></i> -->
                </p>
              </a>
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0">Upload CSV</h4>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
    
          <!-- New Added Content -->
          <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#uploadModal" data-backdrop="static">Add File</button>
          <table class="table table-bordered text-center mt-3" id="upload-datatable">
            <thead>
              <tr>
                <th>Description</th>
                <th>Office (Quantity)</th>
                <th>Onsite (Quantity)</th>
                <th>Difference</th>
                <th>Status</th>
                <th>Action</th>
              </tr>              
            </thead>
            <tbody>
              <?php
                $view = $Viewofficeonsite->view_office_onsite_record();
                while ($row = $view->fetch(PDO::FETCH_ASSOC)) {
                  if ($row['quantity_difference'] < 0) {
                    $status = "Low";
                  } elseif ($row['quantity_difference'] > 0) {
                    $status = "High";
                  } else {
                    $status = "Equal";
                  }

                  echo '
                    <tr>
                      <td>'.$row['description'].'</td>
                      <td>'.$row['office_quantity'].'</td>
                      <td>'.$row['onsite_quantity'].'</td>
                      <td>'.$row['quantity_difference'].'</td>
                      <td>'.$status.'</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type"submit" class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                  ';
                }
              ?>
            </tbody>
          </table>

        </div>
        <!--/.container-fluid-->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
      <strong>Copyright &copy; 2024 <a href="#">Innoland</a>.</strong>
      All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


            <!-- Modal for upload -->
            <div class="modal fade" id="uploadModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Upload CSV</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data" id="upload-form">
                    <h6>Step 1 : Upload Office CSV</h6>
                    <div class="form-group">
                      <input type="file" class="form-control" name="upload-office" id="upload-office">
                    </div>

                    <br>

                    <h6>Step 2 : Upload Onsite CSV</h6>
                    <div class="form-group">
                      <input type="file" class="form-control" name="upload-onsite" id="upload-onsite">
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" value="Upload" id="upload-submit">Upload</button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>






  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap 
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes 
<script src="dist/js/demo.js"></script>-->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="dist/js/pages/dashboard.js"></script>-->

  <!-- sweetalert2@11.js -->
  <script src="assets/plugins/sweetalert2@11.js"></script>

  <!-- dataTables.js -->
  <script src="assets/plugins/dataTables.js"></script>

  <!-- dataTables.bootstrap4.js -->
  <script src="assets/plugins/dataTables.bootstrap4.js"></script>

  <!-- Upload SCript -->
  <script src="assets/script/upload.script.js"></script>
</body>

</html>