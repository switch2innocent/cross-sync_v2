<?php
require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

// Create the database connection
$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();  // Get the PDO connection

// Instantiate the Users class with the correct DB connection
$getproj = new Users($dbMain);

// Fetch projects from the database
$proj = $getproj->get_project();
$result = $proj->fetchAll(PDO::FETCH_ASSOC);

// Return the result as JSON
echo json_encode($result);
?>
