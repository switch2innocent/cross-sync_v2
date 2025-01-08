<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

$deleteData_central_warehouse = new Upload_file($db);
$deleteData_inventory_data = new Upload_file($db);

if ($deleteData_central_warehouse->deleteData_central_warehouse() && $deleteData_inventory_data->deleteData_inventory_data()) {
        
    echo 1;
} else {
    echo 0;
}

