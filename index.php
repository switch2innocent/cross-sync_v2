<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

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

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Show password</label>
                    </div>
                    <input type="submit" class="btn mt-3 w-100 text-white" id="btnLogin" value="Login" style="background-color: #343a40">
                    <center>
                        <p class=" mt-4">Don't have an account? <a href="register.view.php" style="text-decoration: none;"> Click here to register account.</a></p>
                    </center>
                </form>
            </div>
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