<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <style>
        .container {
            zoom: 90%;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 border p-4 shadow-lg mt-2">
                <center>
                    <img class="w-75 mt-3" src="assets/img/Innoland.png" alt="Company Logo">
                    <h2 class="text-success mt-2">Cross Sync</h2>
                </center>
                <form action="" method="POST" class="mt-4">
                    <div class="form-group position-relative">
                        <input type="text" class="form-control pl-5" id="txtUsername" placeholder="Username">
                        <i class="fas fa-user position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                    </div>
                    <div class="form-group position-relative mt-4">
                        <input type="password" class="form-control pl-5" id="txtPassword" placeholder="Password">
                        <i class="fas fa-lock position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                    </div>

                    <div class="custom-control custom-checkbox mt-4">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Show Password</label>
                    </div>
                    <input type="submit" class="btn btn-primary mt-4 w-100" id="btnLogin" value="Login">

                </form>
                <div class="d-flex justify-content-between mt-2 p-3" style="background-color: #f8f9fa;">
                    <a href="forgot_pass.view.php" class="fade-link" style="text-decoration: none; color: #007bff;">Forgot Password?</a>
                    <a href="register.view.php" class="fade-link" style="text-decoration: none; color: #007bff;">Create New Account.</a>
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