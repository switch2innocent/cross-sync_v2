<?php

require_once '../config/dbcon.php';
require_once '../objects/upload.obj.php';

// Get database connection
$database = new Connection();
$db = $database->connect();

// Upload inventory data
$uploadinventorydata = new Upload_file($db);

// Upload central warehouse
$uploadcentralwarehouse = new Upload_file($db);

// Upload bom data
$uploadbomdata = new Upload_file($db);


// // For Inventory Data
// if (isset($_FILES['upload-inventoryData']) && $_FILES['upload-inventoryData']['error'] == 0) {
//     $fileImpPath_inventoryData = $_FILES['upload-inventoryData']['tmp_name'];
//     $fileName_inventoryData = $_FILES['upload-inventoryData']['name'];

//     $fileExtension_inventoryData = strtolower(pathinfo($fileName_inventoryData, PATHINFO_EXTENSION));

//     // Check if the uploaded file is a CSV
//     if ($fileExtension_inventoryData != 'csv') {
//         die("<script>alert('Please Select a CSV File');</script>");
//     }

//     // Open the CSV file for reading
//     if (($file_inventoryData = fopen($fileImpPath_inventoryData, 'r')) !== false) {

//         $header_inventoryData = null;
//         $headerMap = [];
//         $foundHeader = false;

//         // Loop through rows to find the header row
//         while (($row_inventoryData = fgetcsv($file_inventoryData)) !== false) {
//             // Define a set of known column names you're expecting in the header
//             $expectedHeaderColumns = ['Date', 'CBS Code', 'Item Code', 'Item Description', 'Purchase UOM', 'Item Classification', 'Trade Classification', 'Location', 'On Hand Quantity'];

//             // Check if the row contains the expected header columns
//             if (array_intersect($expectedHeaderColumns, $row_inventoryData)) {
//                 // If found, this is your header row
//                 $header_inventoryData = $row_inventoryData;
//                 $headerMap = array_flip($header_inventoryData);  // Map column names to their index
//                 $foundHeader = true;
//                 break;  // Stop searching once the header row is found
//             }
//         }

//         // If the header wasn't found, show an error
//         if (!$foundHeader || !$header_inventoryData) {
//             die("<script>alert('Error: Could not find the header row in the CSV file');</script>");
//         }

//         // Now process the rows after the header
//         while (($row_inventoryData = fgetcsv($file_inventoryData)) !== false) {
//             // Skip rows that don't have the expected number of columns
//             if (count($row_inventoryData) != count($header_inventoryData)) {
//                 continue; // Skip this row if it doesn't have the expected number of columns
//             }

//             // Dynamically map data from row based on header
//             $dateinventorydata = isset($row_inventoryData[$headerMap['Date']]) ? trim($row_inventoryData[$headerMap['Date']]) : null;
//             $cbscodeinventorydata = isset($row_inventoryData[$headerMap['CBS Code']]) ? trim($row_inventoryData[$headerMap['CBS Code']]) : null;
//             $itemcodeinventorydata = isset($row_inventoryData[$headerMap['Item Code']]) ? trim($row_inventoryData[$headerMap['Item Code']]) : null;
//             $itemdescriptioninventorydata = isset($row_inventoryData[$headerMap['Item Description']]) ? trim($row_inventoryData[$headerMap['Item Description']]) : null;
//             $purchaseuominventorydata = isset($row_inventoryData[$headerMap['Purchase UOM']]) ? trim($row_inventoryData[$headerMap['Purchase UOM']]) : null;
//             $itemclassificationinventorydata = isset($row_inventoryData[$headerMap['Item Classification']]) ? trim($row_inventoryData[$headerMap['Item Classification']]) : null;
//             $tradeclassificationinventorydata = isset($row_inventoryData[$headerMap['Trade Classification']]) ? trim($row_inventoryData[$headerMap['Trade Classification']]) : null;
//             $locationinventorydata = isset($row_inventoryData[$headerMap['Location']]) ? trim($row_inventoryData[$headerMap['Location']]) : null;
//             $onhandqtyinventorydata = isset($row_inventoryData[$headerMap['On Hand Quantity']]) ? trim($row_inventoryData[$headerMap['On Hand Quantity']]) : null;

//             // Prepare the data for insertion
//             $uploadinventorydata->date_inventory = $dateinventorydata;
//             $uploadinventorydata->cbs_code = $cbscodeinventorydata;
//             $uploadinventorydata->item_code = $itemcodeinventorydata;
//             $uploadinventorydata->item_description = $itemdescriptioninventorydata;
//             $uploadinventorydata->purchase_uom = $purchaseuominventorydata;
//             $uploadinventorydata->item_classification = $itemclassificationinventorydata;
//             $uploadinventorydata->trade_classification = $tradeclassificationinventorydata;
//             $uploadinventorydata->location = $locationinventorydata;
//             $uploadinventorydata->on_hand_qty = $onhandqtyinventorydata;

//             // Call the method to upload data
//             $uploadinventorydata->upload_inventory_data();
//         }

//         fclose($file_inventoryData);  // Close the file after processing
//         echo "<script>alert('Data Uploaded Successfully');</script>";
//     } else {
//         echo "<script>alert('Error opening the file');</script>";
//     }
// } else {
//     echo "<script>alert('No file uploaded or there was an error');</script>";
// }


// // For Central Warehouse
// if (isset($_FILES['upload-centralWarehouse']) && $_FILES['upload-centralWarehouse']['error'] == 0) {
//     $fileImpPath_centralWarehouse = $_FILES['upload-centralWarehouse']['tmp_name'];
//     $fileName_centralWarehouse = $_FILES['upload-centralWarehouse']['name'];

//     $fileExtension_centralWarehouse = strtolower(pathinfo($fileName_centralWarehouse, PATHINFO_EXTENSION));

//     // Check if the uploaded file is a CSV
//     if ($fileExtension_centralWarehouse != 'csv') {
//         die("<script>alert('Please Select a CSV File');</script>");
//     }

//     // Open the CSV file for reading
//     if (($file_centralWarehouse = fopen($fileImpPath_centralWarehouse, 'r')) !== false) {

//         $header_centralWarehouse = null;
//         $headerMap = [];
//         $foundHeader = false;

//         // Loop through rows to find the header row
//         while (($row_centralWarehouse = fgetcsv($file_centralWarehouse)) !== false) {
//             // Define a set of known column names you're expecting in the header
//             $expectedHeaderColumns = ['Item Code', 'Item Description', 'Trading', 'UOM', 'SOH', 'Qty Received', 'Qty Issued'];

//             // Check if the row contains the expected header columns
//             if (array_intersect($expectedHeaderColumns, $row_centralWarehouse)) {
//                 // If found, this is your header row
//                 $header_centralWarehouse = $row_centralWarehouse;
//                 $headerMap = array_flip($header_centralWarehouse);  // Map column names to their index
//                 $foundHeader = true;
//                 break;  // Stop searching once the header row is found
//             }
//         }

//         // If the header wasn't found, show an error
//         if (!$foundHeader || !$header_centralWarehouse) {
//             die("<script>alert('Error: Could not find the header row in the CSV file');</script>");
//         }

//         // Now process the rows after the header
//         while (($row_centralWarehouse = fgetcsv($file_centralWarehouse)) !== false) {
//             // Skip rows that don't have the expected number of columns
//             if (count($row_centralWarehouse) != count($header_centralWarehouse)) {
//                 continue; // Skip this row if it doesn't have the expected number of columns
//             }

//             // Dynamically map data from row based on header
//             $itemcodecentralWarehouse = isset($row_centralWarehouse[$headerMap['Item Code']]) ? trim($row_centralWarehouse[$headerMap['Item Code']]) : null;
//             $itemdescriptioncentralWarehouse = isset($row_centralWarehouse[$headerMap['Item Description']]) ? trim($row_centralWarehouse[$headerMap['Item Description']]) : null;
//             $tradingcentralWarehouse = isset($row_centralWarehouse[$headerMap['Trading']]) ? trim($row_centralWarehouse[$headerMap['Trading']]) : null;
//             $uomcentralWarehouse = isset($row_centralWarehouse[$headerMap['UOM']]) ? trim($row_centralWarehouse[$headerMap['UOM']]) : null;
//             $sohcentralWarehouse = isset($row_centralWarehouse[$headerMap['SOH']]) ? trim($row_centralWarehouse[$headerMap['SOH']]) : null;
//             $qty_receivedcentralWarehouse = isset($row_centralWarehouse[$headerMap['Qty Received']]) ? trim($row_centralWarehouse[$headerMap['Qty Received']]) : null;
//             $qty_issuedcentralWarehouse = isset($row_centralWarehouse[$headerMap['Qty Issued']]) ? trim($row_centralWarehouse[$headerMap['Qty Issued']]) : null;

//             // Prepare the data for insertion
//             $uploadcentralwarehouse->item_code = $itemcodecentralWarehouse;
//             $uploadcentralwarehouse->item_description = $itemdescriptioncentralWarehouse;
//             $uploadcentralwarehouse->trading = $tradingcentralWarehouse;
//             $uploadcentralwarehouse->uom = $uomcentralWarehouse;
//             $uploadcentralwarehouse->soh = $sohcentralWarehouse;
//             $uploadcentralwarehouse->qty_received = $qty_receivedcentralWarehouse;
//             $uploadcentralwarehouse->qty_issued = $qty_issuedcentralWarehouse;

//             // Call the method to upload data
//             $uploadcentralwarehouse->upload_central_warehouse();
//         }

//         fclose($file_centralWarehouse);  // Close the file after processing
//         echo "<script>alert('Data Uploaded Successfully');</script>";
//     } else {
//         echo "<script>alert('Error opening the file');</script>";
//     }
// } else {
//     echo "<script>alert('No file uploaded or there was an error');</script>";
// }


// For bom data
if (isset($_FILES['upload-bomData']) && $_FILES['upload-bomData']['error'] == 0) {
    $fileImpPath_bomData = $_FILES['upload-bomData']['tmp_name'];
    $fileName_bomData = $_FILES['upload-bomData']['name'];

    $fileExtension_bomData = strtolower(pathinfo($fileName_bomData, PATHINFO_EXTENSION));

    // Check if the uploaded file is a CSV
    if ($fileExtension_bomData != 'csv') {
        die("<script>alert('Please Select a CSV File');</script>");
    }

    // Open the CSV file for reading
    if (($file_bomData = fopen($fileImpPath_bomData, 'r')) !== false) {

        $header_bomData = null;
        $headerMap = [];
        $foundHeader = false;

        // Loop through rows to find the header row
        while (($row_bomData = fgetcsv($file_bomData)) !== false) {
            // Define a set of known column names you're expecting in the header
            $expectedHeaderColumns = ['CBS Code', 'Item Code', 'Item Description', 'Planned Quantity', 'UOM', 'Approved PDN Quantity', 'Current Quantity', 'Total PO Quantity to-date', 'Total ICTO Quantity to-date', 'Remaining Quantity to be Requested to-date', 'Total Quantity Received to-date', 'Remaining Quantity to be Received to-date', 'Total Quantity Issued to-date'];

            // Check if the row contains the expected header columns
            if (array_intersect($expectedHeaderColumns, $row_bomData)) {
                // If found, this is your header row
                $header_bomData = $row_bomData;
                $headerMap = array_flip($header_bomData);  // Map column names to their index
                $foundHeader = true;
                break;  // Stop searching once the header row is found
            }
        }

        // If the header wasn't found, show an error
        if (!$foundHeader || !$header_bomData) {
            die("<script>alert('Error: Could not find the header row in the CSV file');</script>");
        }

        // Now process the rows after the header
        while (($row_bomData = fgetcsv($file_bomData)) !== false) {
            // Skip rows that don't have the expected number of columns
            if (count($row_bomData) != count($header_bomData)) {
                continue; // Skip this row if it doesn't have the expected number of columns
            }

            // Dynamically map data from row based on header
            $cbscodebomdata = isset($row_bomData[$headerMap['CBS Code']]) ? trim($row_bomData[$headerMap['CBS Code']]) : null;
            $itemcodebomdata = isset($row_bomData[$headerMap['Item Code']]) ? trim($row_bomData[$headerMap['Item Code']]) : null;
            $itemdescriptionbomdata = isset($row_bomData[$headerMap['Item Description']]) ? trim($row_bomData[$headerMap['Item Description']]) : null;
            $plannedqtybomdata = isset($row_bomData[$headerMap['Planned Quantity']]) ? trim($row_bomData[$headerMap['Planned Quantity']]) : null;
            $uombomdata = isset($row_bomData[$headerMap['UOM']]) ? trim($row_bomData[$headerMap['UOM']]) : null;
            $approvedpdnqtybomdata = isset($row_bomData[$headerMap['Approved PDN Quantity']]) ? trim($row_bomData[$headerMap['Approved PDN Quantity']]) : null;
            $currentqtybomdata = isset($row_bomData[$headerMap['Current Quantity']]) ? trim($row_bomData[$headerMap['Current Quantity']]) : null;
            $totalpoqtytodatebomdata = isset($row_bomData[$headerMap['Total PO Quantity to-date']]) ? trim($row_bomData[$headerMap['Total PO Quantity to-date']]) : null;
            $totalictoqtytodatebomdata = isset($row_bomData[$headerMap['Total ICTO Quantity to-date']]) ? trim($row_bomData[$headerMap['Total ICTO Quantity to-date']]) : null;
            $remainingqtytoberequestedtodatebomdata = isset($row_bomData[$headerMap['Remaining Quantity to be Requested to-date']]) ? trim($row_bomData[$headerMap['Remaining Quantity to be Requested to-date']]) : null;
            $totalqtyreceivedtodatebomdata = isset($row_bomData[$headerMap['Total Quantity Received to-date']]) ? trim($row_bomData[$headerMap['Total Quantity Received to-date']]) : null;
            $remainingqtytobereceivedtodatebomdata = isset($row_bomData[$headerMap['Remaining Quantity to be Received to-date']]) ? trim($row_bomData[$headerMap['Remaining Quantity to be Received to-date']]) : null;
            $totalqtyissuedtodatebomdata = isset($row_bomData[$headerMap['Total Quantity Issued to-date']]) ? trim($row_bomData[$headerMap['Total Quantity Issued to-date']]) : null;

            // Prepare the data for insertion
            $uploadbomdata->cbs_code = $cbscodebomdata;
            $uploadbomdata->item_code = $itemcodebomdata;
            $uploadbomdata->item_description = $itemdescriptionbomdata;
            $uploadbomdata->planned_qty = $plannedqtybomdata;
            $uploadbomdata->uom = $uombomdata;
            $uploadbomdata->approved_pdn_qty = $approvedpdnqtybomdata;
            $uploadbomdata->current_qty = $currentqtybomdata;
            $uploadbomdata->total_po_qty_to_date = $totalpoqtytodatebomdata;
            $uploadbomdata->total_icto_qty_to_date = $totalictoqtytodatebomdata;
            $uploadbomdata->remaining_qty_tobe_requested_to_date = $remainingqtytoberequestedtodatebomdata;
            $uploadbomdata->total_qty_received_to_date = $totalqtyreceivedtodatebomdata;
            $uploadbomdata->remaining_qty_tobe_received_to_date = $remainingqtytobereceivedtodatebomdata;
            $uploadbomdata->total_qty_issued_to_date = $totalqtyissuedtodatebomdata;


            // Call the method to upload data
            $uploadbomdata->upload_bom_data();
        }

        fclose($file_bomData);  // Close the file after processing
        echo "<script>alert('Data Uploaded Successfully');</script>";
    } else {
        echo "<script>alert('Error opening the file');</script>";
    }
} else {
    echo "<script>alert('No file uploaded or there was an error');</script>";
}

?>