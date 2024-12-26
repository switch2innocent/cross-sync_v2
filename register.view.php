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



    <div class="container border shadow-lg bg-white p-4 mt-5 rounded">

        <form action="/action_page.php">
            <div class="row">
                <div class="col">
                    <label for="firstname">Firstname:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Your firstname">
                </div>
                <div class="col">
                    <label for="lastname">Lastname:</label>
                    <input type="text" class="form-control" placeholder="Your Lastname">
                </div>
                <div class="col">
                    <label for="position">Position:</label>
                    <input type="text" class="form-control" placeholder="Your Position">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="project">Project:</label>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            Select Project
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="date-hire">Date hire:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col">
                    <label for="project">Project:</label>
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
            <!-- <button type="submit" class="btn btn-primary mt-3">Submit</button> -->
        </form>

    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>