<?php

session_start();

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$loginuser = new Users($dbMain);

$loginuser->username = $_POST['username'];
$loginuser->password = md5($_POST['password']);

$login = $loginuser->login_user();

if($row = $login->fetch(PDO::FETCH_ASSOC)) {
    
    $_SESSION["loggedin"] = true;
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    // $_SESSION['username'] = $row['username'];
    
    echo 1;
} else {
    echo 0;
}