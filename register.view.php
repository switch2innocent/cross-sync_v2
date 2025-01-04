<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap.min.css">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/css//select2.style.css">
    
</head>

<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-success text-center">
                    <h2>Account Registration</h2>
                </div>

                <div class="form-group border shadow-lg bg-white p-4 mt-4 rounded">

                    <h5 class="mb-4">Step 1: Employee Information</h5>

                    <label for="firstname">Firstname <i class="color-danger">*</i></label>
                    <input type="text" class="form-control" id="firstname" placeholder="Your firstname">

                    <label for="lastname" class="mt-2">Lastname <i class="color-danger">*</i></label>
                    <input type="text" class="form-control" id="lastname" placeholder="Your Lastname">

                    <label for="position" class="mt-2">Position <i class="color-danger">*</i></label>
                    <input type="text" class="form-control" id="position" placeholder="Your Position">

                    <!-- Project using select2 -->
                    <label for="project" class="mt-2">Project <i class="color-danger">*</i></label>
                    <select name="" id="project" class="form-control select2">
                        <option value="">Select a Project</option>
                    </select>

                    <label for="date-hire" class="mt-2">Date hire <i class="color-danger">*</i></label>
                    <input type="date" id="date-hire" class="form-control">

                    <!-- Department using select2 -->
                    <label for="department" class="mt-2">Department <i class="color-danger">*</i></label>
                    <select name="" id="department" class="form-control select2">
                        <option value="">Select a Department</option>
                    </select>

                    <label for="unit" class="mt-2">Unit <i class="color-danger">*</i></label>
                    <input type="number" class="form-control" id="unit" placeholder="Your Unit">

                    <label for="email" class="mt-2">Email <i class="color-danger">*</i></label>
                    <input type="email" class="form-control" id="email" placeholder="Your Email">

                </div>


                <div class="form-group border shadow-lg bg-white p-4 mt-5 rounded">

                    <h5 class="mb-4">Step 2: Login Information</h5>

                    <label for="username">Username <i class="color-danger">*</i></label>
                    <input type="text" class="form-control" id="username" placeholder="Your Username">

                    <label for="password" class="mt-2">Password <i class="color-danger">*</i></label>
                    <input type="password" class="form-control" id="password" placeholder="Your Password">

                    <label for="con-password" class="mt-2">Confirm Password <i class="color-danger">*</i></label>
                    <input type="password" class="form-control" id="con-password" placeholder="Confirm Password">

                    <div class="text-right mt-4">
                        <a href="index.php" class="btn btn-primary">Back to Login</a>
                        <input type="submit" class="btn btn-outline-success" id="save_user" onclick="save_user()">
                    </div>

                </div>
            </div>
        </div>
    </div>

     <!-- jQuery library -->
     <script src="plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <script src="assets/plugins/sweetalert2@11.js"></script>
    <script src="assets/script//register.script.js"></script>

</body>

</html>