<?php

session_start();

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$check_access = new Users($dbMain);

$check_access->user_id = $_SESSION['user_id'];
$check_access->system_id = 15;

$check = $check_access->check_access();

if ($check->fetchColumn() > 0) {
    echo 1;
} else {
    echo 0;
}



?>