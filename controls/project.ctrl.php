<?php

require_once '../config/dbconmain.php';
require_once '../objects/user.obj.php';

$databaseMain = new ConnectionMain();
$dbMain = $databaseMain->connect();

$get_project = new User($dbMain);

$project = $_GET['position'];
$result = $get_project->get_project($project);

$data = [];

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'id' => $row['id'],
        'text' => $row['proj_name']
    ];
}

echo json_encode($data);