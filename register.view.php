<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div class="container border shadow-lg bg-white p-4 mt-5 rounded">
        <div class="d-flex justify-content-start">
            <a href="index.php" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="d-flex justify-content-center text-success">
            <h2>Account Registration</h2>
        </div>

        <form action="/action_page.php">
            <div class="row mt-5">
                <div class="col">
                    <label for="firstname">Firstname:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Your firstname">
                </div>
                <div class="col">
                    <label for="lastname">Lastname:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Your Lastname">
                </div>
                <div class="col">
                    <label for="position">Position:</label>
                    <input type="text" class="form-control" id="position" placeholder="Your Position">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="project">Project:</label>
                    <!-- Select2 Dropdown -->
                    <select type="text" id="project" class="form-control select2 w-100 js-example-basic-single">
                        <option class="form-control" value="0" selected disabled>Select a project</option>
                        <?php
                            // $get_proj = $project->get_project();
                            // while ($row = $get_proj->fetch(PDO::FETCH_ASSOC)) {
                            //    echo '
                            //    <option value="'.$row['id'].'">'.$row['proj_name'].'</option>
                            //    ';
                            // }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="date-hire">Date hire:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col">
                    <label for="project">Department:</label>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            Select Department
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="unit">Unit:</label>
                    <input type="number" class="form-control" id="number" placeholder="Your Unit">
                </div>
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Your Eamil">
                </div>
                <div class="col">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Your Username">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success mt-5">Submit</button>
            </div>
        </form>

    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Register Script -->
    <script src="assets/script//register.script.js"></script>
</body>

</html>