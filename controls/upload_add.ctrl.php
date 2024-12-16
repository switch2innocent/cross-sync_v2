<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

$database = new Connection();
$db = $database->connect();

// Upload Inventory Data
$uploadinventorydata = new Upload_file($db);

if (isset($_FILES['upload-inventoryData']) && $_FILES['upload-inventoryData']['error'] == 0) {
    $fileImpPath_inventoryData = $_FILES['upload-inventoryData']['tmp_name'];
    $fileName_inventoryData = $_FILES['upload-inventoryData']['name'];

    $fileExtension_inventoryData = strtolower(pathinfo($fileName_inventoryData, PATHINFO_EXTENSION));
    // Check if the uploaded file is a CSV
    if ($fileExtension_inventoryData != 'csv') {
        die("<script>alert('Please Select a CSV File');</script>");
    }

    // Open the CSV file for reading
    if (($file_inventoryData = fopen($fileImpPath_inventoryData, 'r')) !== false) {

        // Get the header row (first row)
        $header_inventoryData = fgetcsv($file_inventoryData);

        if (!$header_inventoryData) {
            die("<script>alert('Error reading the header of the CSV file');</script>");
        }

        // Map the header to column names (this depends on your CSV format)
        // For example: header = ["category", "description", "qty"]
        $headerMap = array_flip($header_inventoryData); // Maps column names to their index in the CSV

        while (($row_inventoryData = fgetcsv($file_inventoryData)) !== false) {
            // Skip rows that don't have the expected number of columns
            if (count($row_inventoryData) != count($header_inventoryData)) {
                continue; // Skip this row
            }

            // Dynamically map data from row based on header
            $dateinventoryData = isset($row_inventoryData[$headerMap['Date']]) ? $row_inventoryData[$headerMap['Date']] : null;
            $cbscodeinventoryData = isset($row_inventoryData[$headerMap['CBS Code']]) ? $row_inventoryData[$headerMap['CBS Code']] : null;
            $itemcodeinventoryData = isset($row_inventoryData[$headerMap['Item Code']]) ? (int)$row_inventoryData[$headerMap['Item Code']] : null;
            $itemdescriptioninventoryData = isset($row_inventoryData[$headerMap['Item Description']]) ? $row_inventoryData[$headerMap['Item Description']] : null;
            $purchaseuominventoryData = isset($row_inventoryData[$headerMap['Purchase UOM']]) ? $row_inventoryData[$headerMap['Purchase UOM']] : null;
            $itemclassificationinventoryData = isset($row_inventoryData[$headerMap['Item Classification']]) ? $row_inventoryData[$headerMap['Item Classification']] : null;
            $tradeclassificationinventoryData = isset($row_inventoryData[$headerMap['Trade Classification']]) ? $row_inventoryData[$headerMap['Trade Classification']] : null;
            $locationinventoryData = isset($row_inventoryData[$headerMap['Location']]) ? $row_inventoryData[$headerMap['Location']] : null;
            $onhandqtyinventoryData = isset($row_inventoryData[$headerMap['On Hand Quantity']]) ? $row_inventoryData[$headerMap['On Hand Quantity']] : null;

            // Prepare the data for insertion
            $uploadinventorydata->date_inventory = $dateinventoryData;
            $uploadinventorydata->cbs_code = $cbscodeinventoryData;
            $uploadinventorydata->item_code = $itemcodeinventoryData;
            $uploadinventorydata->item_description = $itemdescriptioninventoryData;
            $uploadinventorydata->purchase_uom = $purchaseuominventoryData;
            $uploadinventorydata->item_classification = $itemclassificationinventoryData;
            $uploadinventorydata->trade_classification = $tradeclassificationinventoryData;
            $uploadinventorydata->location = $locationinventoryData;
            $uploadinventorydata->on_hand_qty = $onhandqtyinventoryData;

            // Call the method to upload data
            $uploadinventorydata->upload_inventory_data();
        }

        fclose($file_inventoryData);
        echo "<script>alert('Data Uploaded Successfully');</script>";
    } else {
        echo "<script>alert('Error opening the file');</script>";
    }
} else {
    echo "<script>alert('No file uploaded or there was an error');</script>";
}
