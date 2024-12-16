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

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Datatable CSS -->
  <link rel="stylesheet" href="assets/plugins/datatablecss/dataTables.dataTables.css">
  <link rel="stylesheet" href="assets/plugins/datatablecss/buttons.dataTables.css">

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
            <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
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
                <i class="fa fa-upload"></i> &nbsp;
                <p>
                  Upload CSV
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
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 font-weight-bold">Upload CSV</h5>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Add file button 
          <div class="d-flex">
            <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#uploadModal" data-backdrop="static"><i class="fa fa-plus"></i> &nbsp; Add File</button>
          </div> -->

          <!-- New Added Content -->
          <table class="table table-bordered text-center table-hover" id="upload-datatable">
            <thead>
              <tr>
                <th>Description</th>
                <th>Office (Quantity)</th>
                <th>Onsite (Quantity)</th>
                <th>Difference</th>
                <th>Status</th>
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
                      <td>' . $row['description'] . '</td>
                      <td>' . $row['office_quantity'] . '</td>
                      <td>' . $row['onsite_quantity'] . '</td>
                      <td>' . $row['quantity_difference'] . '</td>
                      <td>' . $status . '</td>
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
            <h6><span class="font-weight-bold">Step 1:</span> Upload Office CSV</h6>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="form-control custom-file-input" name="upload-office" id="upload-office" class="">
                <label for="upload-office" class="custom-file-label">Choose File</label>
              </div>
            </div>

            <h6><span class="font-weight-bold">Step 2:</span> Upload Onsite CSV</h6>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="form-control custom-file-input" name="upload-onsite" id="upload-onsite">
                <label for="upload-onsite" class="custom-file-label">Choose file</label>
              </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" value="Upload" id="upload-submit">Upload</button>
          </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>



  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- sweetalert2@11.js -->
  <script src="assets/plugins/sweetalert2@11.js"></script>

  <!-- Datatable plugins -->
  <script src="assets/plugins/datatablejs/dataTables.js"></script>
  <script src="assets/plugins/datatablejs/dataTables.buttons.js"></script>
  <script src="assets/plugins/datatablejs/buttons.dataTables.js"></script>
  <script src="assets/plugins/datatablejs/jszip.min.js"></script>
  <script src="assets/plugins/datatablejs/pdfmake.min.js"></script>
  <script src="assets/plugins/datatablejs/vfs_fonts.js"></script>
  <script src="assets/plugins/datatablejs/buttons.html5.min.js"></script>
  <script src="assets/plugins/datatablejs/buttons.print.min.js"></script>

  <!-- Upload SCript -->
  <script src="assets/script/upload.script.js"></script>







</body>

</html>