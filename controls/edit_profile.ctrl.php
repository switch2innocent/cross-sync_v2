<?php

session_start();

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$get_user_profile = new Users($dbMain);

$get_user_profile->id = $_SESSION['user_id'];

$get_user = $get_user_profile->get_user_profile();

while ($row = $get_user->fetch(PDO::FETCH_ASSOC)) {
    echo '
        <form>
              <div class="form-group">
                <label for="firstname">Firstname <span class="text-danger">*</span></label>
                <input type="text" id="up_id" value="'. $row['id'] .'" hidden>
                <input type="text" class="form-control" placeholder="" id="up_fname" required value="'. $row['firstname'] .'">
              </div>
              <div class="form-group">
                <label for="lastname">Lastname <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="" id="up_lname" required value="'. $row['lastname'] .'">
              </div>
              <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="" id="up_uname" readonly value="'. $row['username'] .'">
              </div>
              <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="" id="up_pass" required>
              </div>
              <div class="form-group">
                <label for="re_password">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="" id="up_repass" required>
              </div>
            </form>
    ';

}


?>