<?php
session_start();

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
  <link rel="stylesheet" href="assets/css/date.style.css">
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="assets/bulma/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bulma/css/dataTables.bulma.css">
  <link rel="stylesheet" href="assets/bulma/css/buttons.bulma.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .modal-backdrop {
      z-index: -1;
    }

    .modal-dialog {
      zoom: 80%;
      font-family: Arial, sans-serif;
    }

    .table {
      zoom: 80%;
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

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user-circle fa-lg" style="color: #007FFF">&nbsp;</i>Welcome! <?php echo $_SESSION['firstname']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="#" class="dropdown-item" id="editProfile">
              <i class="fas fa-cog mr-2"></i> Account Settings
            </a>
            <?php

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

              echo '
               <a href="admin_side.view.php" class="dropdown-item" id="">
               <i class="fas fa-user-tie mr-2"></i> View as Administrator
               </a>
              ';
            } else {

              echo '
               <a href="admin_side.view.php" class="dropdown-item" id="" style="display: none;">
               <i class="fas fa-user-tie mr-2"></i> View as Administrator
               </a>
              ';
              
            }

            ?>
          </div>
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
            <a href="upload.view.php"><i class="fa fa-sync text-success fa-3x"></i></a>
          </div>
          <div class="info">
            <a href="upload.view.php" class="d-block text-white" style="text-transform: capitalize; font-size: 24px;"><b>CROSS SYNC</b></a>
          </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-5">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-upload"></i> &nbsp;
                <p>
                  Upload
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="controls/logout_user.ctrl.php" class="nav-link logout">
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Upload</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid shadow-lg p-3 mb-5 bg-white rounded">
          <!-- New Added Content -->
          <div class="table-responsive">
            <!-- Table to display the data -->
            <table class="table table-bordered table-hover is-striped mt-3" id="upload-datatable">
              <thead>
                <tr>
                  <th>
                    <center>Item Code</center>
                  </th>
                  <th>
                    <center>Description</center>
                  </th>
                  <th>
                    <center>Trading</center>
                  </th>
                  <th>
                    <center>UOM</center>
                  </th>
                  <th>
                    <center>Date Uploaded</center>
                  </th>
                  <th>
                    <center>Project Warehouse SOH</center>
                  </th>
                  <th>
                    <center>Inventory SOH</center>
                  </th>
                  <th>
                    <center>Difference</center>
                  </th>
                  <th>
                    <center>Status</center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php

                require_once 'config/dbcon.php';
                require_once 'objects/upload.obj.php';

                $datebase = new Connection();
                $db = $datebase->connect();

                $view_uploaded_Bydate = new Upload_file($db);

                $view_uploaded_Bydate->start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
                $view_uploaded_Bydate->end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;

                $view_upload = $view_uploaded_Bydate->view_all_uploaded_files();

                while ($row = $view_upload->fetch(PDO::FETCH_ASSOC)) {

                  $status = '';
                  $warehouse = $row['central_warehouse_soh'];
                  $inventory = $row['inventory_data_soh'];

                  if ($warehouse === $inventory) {
                    $status = "Items Matched";
                  } elseif ($warehouse > $inventory) {
                    $status = "Materials not yet IRed";
                  } elseif ($warehouse < $inventory) {
                    $status = "Materials not yet MIed";
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
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-dark">
            <h4 class="modal-title font-weight-bold"><i class="fas fa-file-csv"></i>&nbsp; Add File</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" id="upload-form">

              <h6 class="font-weight-bold mt-3">Project Warehouse <i class="text-danger">*</i></h6>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="form-control custom-file-input" name="upload-centralWarehouse" id="upload-centralWarehouse" accept=".csv">
                  <label for="upload-centralWarehouse" class="custom-file-label">Choose file</label>
                </div>
              </div>
              <hr>

              <h6 class="font-weight-bold">Inventory <i class="text-danger">*</i></h6>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="form-control form-control-sm custom-file-input" name="upload-inventoryData" id="upload-inventoryData" accept=".csv">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Upload" id="upload-submit">Submit</button>
            </form>
          </div>

        </div>
      </div>
    </div>


    <!-- Search Modal -->
    <div class="modal fade" id="searchModal">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header bg-dark">
            <h4 class="modal-title font-weight-bold"><i class="fa fa-calendar"></i> Search Date</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form method="POST" action="">
              <!-- Search by date -->
              <div class="form-group">
                <label for="start-date">From: <i class="text-danger">*</i></label>
                <input type="date" class="custom-date-input form-control" name="start_date" id="start-date">
              </div>
              <div class="form-group">
                <label for="end-date">To: <i class="text-danger">*</i></label>
                <input type="date" class="custom-date-input form-control" name="end_date" id="end-date">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="searchDate">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-dark">
            <h4 class="modal-title font-weight-bold"><i class="fa fa-cog fa-lg"></i> Account Settings</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="editProfileBody">
            <!-- data goes here -->
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="up_profile">Save Changes</button>
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

  <!-- loader -->
  <div id="loading-screen" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; padding-top: 20%;">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <!-- jQuery -->
  <script src="assets/bulma/js/jquery-3.7.1.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="assets/plugins/sweetalert2@11.js"></script>
  <script src="assets/plugins/toastr/toastr.min.js"></script>
  <script src="assets/bulma/js/dataTables.js"></script>
  <script src="assets/bulma/js/dataTables.bulma.js"></script>
  <script src="assets/bulma/js/dataTables.buttons.js"></script>
  <script src="assets/bulma/js/buttons.bulma.js"></script>
  <script src="assets/bulma/js//jszip.min.js"></script>
  <script src="assets/bulma/js/pdfmake.min.js"></script>
  <script src="assets/bulma/js/vfs_fonts.js"></script>
  <script src="assets/bulma/js/buttons.html5.min.js"></script>
  <script src="assets/bulma/js/buttons.print.min.js"></script>
  <script src="assets/bulma/js/buttons.colVis.min.js"></script>
  <script src="assets/script/upload.script.js"></script>

</body>

</html>