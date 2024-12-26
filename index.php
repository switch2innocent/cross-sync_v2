<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 border p-4">
                <center>
                    <img class="w-75 mt-4" src="assets/img/Innoland.png" alt="Company Logo">
                    <h3 class="text-success">Warehouse Inventory System</h3>
                </center>
                <form action="" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group mt-4">
                        <label for="pwd">Password: </label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-success mt-4 w-100">Login</button>
                    <center>
                        <p class="mt-4">Don't have an account? <a href="register.view.php" style="text-decoration: none;"> Click here to register account.</a></p>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>