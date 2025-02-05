<?php

session_start();

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$update_user_profile = new Users($dbMain);

$update_user_profile->id = $_POST['id'];
$update_user_profile->firstname = $_POST['firstname'];
$update_user_profile->lastname = $_POST['lastname'];
$update_user_profile->password = md5($_POST['password']);

$update = $update_user_profile->update_user_profile();

if($update) {
    echo 1;
} else {
    echo 0;
}
?>