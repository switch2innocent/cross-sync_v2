<?php

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$getdept = new Users($dbMain);

$dept = $getdept->get_department();
$result = $dept->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);