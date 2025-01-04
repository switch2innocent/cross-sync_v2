<?php

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$logoutuser = new Users($dbMain);

$logoutuser->logout_user();

if($logoutuser) {
    header('Location: ../index.php');
}