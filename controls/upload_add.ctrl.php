<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

// For upload office
$uploadoffice = new Upload_csv($db);

if (isset($_FILES['upload-office']) && $_FILES['upload-office']['error'] == 0) {
    $fileImpPath_office = $_FILES['upload-office']['tmp_name'];
    $fileName_office = $_FILES['upload-office']['name'];

    $fileExtension_office = strtolower(pathinfo($fileName_office, PATHINFO_EXTENSION));
    if ($fileExtension_office != 'csv') {
        die("Please upload a CSV file");
    }

    if (($file_office = fopen($fileImpPath_office, 'r')) !== false) {

        while (($row_office = fgetcsv($file_office)) !== false) {
            $categoryoffice = $row_office[0];
            $descriptionoffice = $row_office[1];
            $qtyoffice = $row_office[2];

            $uploadoffice->category_office = $categoryoffice;
            $uploadoffice->description_office = $descriptionoffice;
            $uploadoffice->qty_office = $qtyoffice;

            $execute_office = $uploadoffice->upload_office();
        }

        fclose($file_office);
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


// For upload onsite
$uploadonsite = new Upload_csv($db);

if (isset($_FILES['upload-onsite']) && $_FILES['upload-onsite']['error'] == 0) {
    $fileImpPath_onsite = $_FILES['upload-onsite']['tmp_name'];
    $fileName_onsite = $_FILES['upload-onsite']['name'];

    $fileExtension_onsite = strtolower(pathinfo($fileName_onsite, PATHINFO_EXTENSION));
    if ($fileExtension_onsite != 'csv') {
        die("Please upload a CSV file");
    }

    if (($file_onsite = fopen($fileImpPath_onsite, 'r')) !== false) {

        while (($row_onsite = fgetcsv($file_onsite)) !== false) {
            $category_onsite = $row_onsite[0];
            $description_onsite = $row_onsite[1];
            $qty_onsite = $row_onsite[2];

            $office_id = 1;

            $uploadonsite->office_id = $office_id;
            $uploadonsite->category_onsite = $category_onsite;
            $uploadonsite->description_onsite = $description_onsite;
            $uploadonsite->qty_onsite = $qty_onsite;

            $execute_onsite = $uploadonsite->upload_onsite();
        }

        fclose($file_onsite);
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