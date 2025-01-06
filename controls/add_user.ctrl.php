<?php

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$saveuser = new Users($dbMain);

$saveuser->firstname = ucwords($_POST['firstname']);
$saveuser->lastname = ucwords($_POST['lastname']);
$saveuser->position = ucwords($_POST['position']);
$saveuser->project = $_POST['project'];
$saveuser->date_hire = $_POST['date_hire'];
$saveuser->dept = $_POST['dept'];
$saveuser->unit = $_POST['unit'];
$saveuser->email = strtolower($_POST['email']);
$saveuser->username = $_POST['username'];
$saveuser->password = md5($_POST['password']);

$execute = $saveuser->save_user();

if($execute) {
    echo 1;
} else {
    echo 0;
}