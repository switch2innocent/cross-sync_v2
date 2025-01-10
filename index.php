<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

    <style>
        .container {
            zoom: 90%;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 border p-4 shadow-lg">
                <center>
                    <img class="w-75 mt-4" src="assets/img/Innoland.png" alt="Company Logo">
                    <h3 class="text-success">Warehouse Inventory System</h3>
                </center>
                <form action="" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username">
                    </div>
                    <div class="form-group mt-4">
                        <label for="pwd">Password: </label>
                        <input type="password" class="form-control" id="txtPassword" placeholder="Enter Password">
                    </div>

                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Show password</label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-4 w-100" id="btnLogin" value="Login">

                </form>
                <div class="d-flex justify-content-between mt-2 p-3" style="background-color: #f8f9fa;">
                    <a href="forgot_pass.view.php" class="fade-link" style="text-decoration: none; color: #007bff;">Forgot Password?</a>
                    <a href="register.view.php" class="fade-link" style="text-decoration: none; color: #007bff;">Register Account.</a>
                </div>
            </div>
        </div>
    </div>

    <!-- loader -->
    <div id="loading-screen" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; background: rgba(255, 255, 255, 0.8); z-index: 9999; text-align: center; padding-top: 20%;">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <script src="assets/plugins/sweetalert2@11.js"></script>
    <script src="assets/script/login.script.js"></script>

</body>

</html>