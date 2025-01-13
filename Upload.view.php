<?php
session_start();

require_once 'config/dbcon.php';
require_once 'objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

$viewalluploadedfiles = new Upload_file($db);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload</title>

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/datatablecss/dataTables.dataTables.css">
  <link rel="stylesheet" href="assets/plugins/datatablecss/buttons.dataTables.css">
  <link rel="stylesheet" href="assets/css/date.style.css">

  <style>
    .content {
      zoom: 70%;
    }

    .modal-dialog {
      zoom: 70%;
    }
  </style>

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
            <a href="#" class="d-block" style="text-transform: capitalize;">Welcome! <?= htmlspecialchars($_SESSION['firstname']); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-upload"></i> &nbsp;
                <p>
                  Upload
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="controls/logout_user.ctrl.php" class="nav-link">
                <i class="fa fa-lock"></i> &nbsp;
                <p>
                  Logout
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
              <h5 class="m-0 font-weight-bold">Upload</h5>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid shadow-lg p-3 mb-5 bg-white rounded">

          <!-- New Added Content -->
          <div class="table-responsive">
            <table class="table table-bordered text-center table-hover" id="upload-datatable">
              <thead>
                <tr>
                  <th>Item Code</th>
                  <th>Description</th>
                  <th>Trading</th>
                  <th>UOM</th>
                  <th>Date</th>
                  <th>SOH (Warehouse)</th>
                  <th>SOH (Inventory)</th>
                  <th>Difference</th>
                  <th>Status</th>
                  <!-- <th>SOH (Inventory)</th> -->
                  <!-- <th>Quantity Received</th>
                <th>Quantity Issued</th> -->
                  <!-- <th>SOH Status</th> -->
                </tr>
              </thead>
              <tbody>
                <?php

                $view = $viewalluploadedfiles->view_all_uploaded_files();
                while ($row = $view->fetch(PDO::FETCH_ASSOC)) {

                  // = Balance
                  // -+ Found in Netsuite / Found in Actual
                  // x Not found

                  $status = '';

                  $warehouse = $row['central_warehouse_soh'];
                  $inventory = $row['inventory_data_soh'];

                  if ($warehouse == 0 && $inventory == 0) {
                    $status = "Not Found";
                  } elseif ($warehouse == 0) {
                    $status = "Found in Inventory";
                  } elseif ($inventory == 0) {
                    $status = "Found in Warehouse";
                  } elseif ($warehouse === $inventory) {
                    $status = "Balanced";
                  } elseif ($warehouse > $inventory) {
                    $status = "High in Warehouse / Low in Inventory";
                  } elseif ($warehouse < $inventory) {
                    $status = "Low in Warehouse / High in Inventory";
                  }

                  echo '
                  <tr>
                      <td>' . htmlspecialchars($row['item_code']) . '</td> 
                      <td>' . htmlspecialchars($row['item_description']) . '</td> 
                      <td>' . htmlspecialchars($row['trading']) . '</td> 
                      <td>' . htmlspecialchars($row['uom']) . '</td> 
                      <td>' . htmlspecialchars($row['created_at']) . '</td>
                      <td>' . htmlspecialchars($row['central_warehouse_soh']) . '</td>
                      <td>' . htmlspecialchars($row['inventory_data_soh']) . '</td>
                      <td>' . htmlspecialchars($row['soh_difference']) . '</td>
                      <td>' . $status . '</td>
                  </tr>
                ';
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
        <!--/.container-fluid-->
      </section>
      <!-- /.content -->
    </div>

    <!-- Modal for upload -->
    <div class="modal fade" id="uploadModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-dark">
            <h4 class="modal-title font-weight-bold">Upload</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" id="upload-form">

              <h6 class="font-weight-bold mt-3">Central Warehouse <i class="text-danger">*</i></h6>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="form-control custom-file-input" name="upload-centralWarehouse" id="upload-centralWarehouse">
                  <label for="upload-centralWarehouse" class="custom-file-label">Choose file</label>
                </div>
              </div>
              <hr>

              <h6 class="font-weight-bold">Inventory Data <i class="text-danger">*</i></h6>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="form-control form-control-sm custom-file-input" name="upload-inventoryData" id="upload-inventoryData">
                  <label for="upload-inventoryData" class="custom-file-label">Choose File</label>
                </div>
              </div>
              <!-- <hr>

            <h6>Upload BOM Data</h6>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="form-control custom-file-input" name="upload-bomData" id="upload-bomData">
                <label for="upload-bomData" class="custom-file-label">Choose file</label>
              </div>
            </div> -->
          </div>

          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" value="Upload" id="upload-submit">Submit</button>
            </form>
          </div>

        </div>
      </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="searchModal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-dark">
            <h4 class="modal-title font-weight-bold">Search By Date</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- // TODO: Search by date -->
            <div class="form-group">
              <label for="start-date">Start Date <i class="text-danger">*</i></label>
              <input type="date" class="custom-date-input" id="start-date">
            </div>
            <div class="form-group">
              <label for="end-date">End Date <i class="text-danger">*</i></label>
              <input type="date" class="custom-date-input" id="end-date">
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Done</button>
          </div>

        </div>
      </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
      <strong>Copyright &copy; 2025 <a href="#">Innoland</a>.</strong>
      All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="assets/plugins/sweetalert2@11.js"></script>
  <script src="assets/plugins/datatablejs/dataTables.js"></script>
  <script src="assets/plugins/datatablejs/dataTables.buttons.js"></script>
  <script src="assets/plugins/datatablejs/buttons.dataTables.js"></script>
  <script src="assets/plugins/datatablejs/jszip.min.js"></script>
  <script src="assets/plugins/datatablejs/pdfmake.min.js"></script>
  <script src="assets/plugins/datatablejs/vfs_fonts.js"></script>
  <script src="assets/plugins/datatablejs/buttons.html5.min.js"></script>
  <script src="assets/plugins/datatablejs/buttons.print.min.js"></script>
  <script src="assets/script/upload.script.js"></script>

</body>

</html>