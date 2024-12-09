<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

// For upload 1
$uploadfile = new Contacts_tbl($db);

if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
    $fileImpPath = $_FILES['fileUpload']['tmp_name'];
    $fileName = $_FILES['fileUpload']['name'];

    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileExtension != 'csv') {
        die("Please upload a CSV file");
    }

    if (($file = fopen($fileImpPath, 'r')) !== false) {

        while (($row = fgetcsv($file)) !== false) {
            $name = $row[0];
            $email = $row[1];
            $phone = $row[2];

            $uploadfile->name = $name;
            $uploadfile->email = $email;
            $uploadfile->phone = $phone;

            $execute = $uploadfile->upload_file();
        }

        fclose($file);
        echo "
            <script>
                alert('Data Uploaded');
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Error opening the file');
            </script>
            ";
    } 
} else {
    echo "
        <script>
            alert('No file uploaded or there was an error');
        </script>
    ";
}


// For upload 2
$uploadfiletwo = new Contacts_tbl($db);

if (isset($_FILES['fileUploadtwo']) && $_FILES['fileUploadtwo']['error'] == 0) {
    $fileImpPathtwo = $_FILES['fileUploadtwo']['tmp_name'];
    $fileNametwo = $_FILES['fileUploadtwo']['name'];

    $fileExtensiontwo = strtolower(pathinfo($fileNametwo, PATHINFO_EXTENSION));
    if ($fileExtensiontwo != 'csv') {
        die("Please upload a CSV file");
    }

    if (($filetwo = fopen($fileImpPathtwo, 'r')) !== false) {

        while (($rowtwo = fgetcsv($filetwo)) !== false) {
            $nametwo = $rowtwo[0];
            $emailtwo = $rowtwo[1];
            $phonetwo = $rowtwo[2];

            $uploadfiletwo->nametwo = $nametwo;
            $uploadfiletwo->emailtwo = $emailtwo;
            $uploadfiletwo->phonetwo = $phonetwo;

            $executetwo = $uploadfiletwo->upload_file_two();
        }

        fclose($filetwo);
        echo "
            <script>
                alert('Data Uploaded');
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Error opening the file');
            </script>
            ";
    } 
} else {
    echo "
        <script>
            alert('No file uploaded or there was an error');
        </script>
    ";
}

?>