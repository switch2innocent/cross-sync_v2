<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

$deleteData_by_date = new Upload_file($db);

$deleteData_by_date->start_date = $_POST['start_date'];
$deleteData_by_date->end_date = $_POST['end_date'];

$delete = $deleteData_by_date->deleteData_by_dates();

if ($delete) {
    echo 1;
} else {
    echo 0;
}
