<?php

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$verifyuserEmail = new Users($dbMain);

$verifyuserEmail->email = $_POST['email'];

$execute = $verifyuserEmail->verify_user_email();

if($execute->fetchColumn() > 0) {
    echo 1;
} else {
    echo 0;
}