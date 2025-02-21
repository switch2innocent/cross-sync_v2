<?php

// require_once '../config/dbcon.php';
// require_once '../objects/upload.obj.php';

// $datebase = new Connection();
// $db = $datebase->connect();

// $view_uploaded_Bydate = new Upload_file($db);

// $view_uploaded_Bydate->start_date = $_POST['start_date'];
// $view_uploaded_Bydate->end_date = $_POST['end_date'];

// $view_upload = $view_uploaded_Bydate->view_all_uploaded_files();

// if ($view_upload) {

//     while ($row = $view_upload->fetch(PDO::FETCH_ASSOC)) {

//         // = Balance
//         // -+ Found in Netsuite / Found in Actual
//         // x Not found

//         $status = '';

//         $warehouse = $row['central_warehouse_soh'];
//         $inventory = $row['inventory_data_soh'];

//         if ($warehouse == 0 && $inventory == 0) {
//             $status = "Not Found";
//         } elseif ($warehouse == 0) {
//             $status = "Found in Inventory";
//         } elseif ($inventory == 0) {
//             $status = "Found in Warehouse";
//         } elseif ($warehouse === $inventory) {
//             $status = "Balanced";
//         } elseif ($warehouse > $inventory) {
//             $status = "High in Warehouse / Low in Inventory";
//         } elseif ($warehouse < $inventory) {
//             $status = "Low in Warehouse / High in Inventory";
//         }

//         echo '
//           <tr>
//               <td>' . htmlspecialchars($row['item_code']) . '</td> 
//               <td>' . htmlspecialchars($row['item_description']) . '</td> 
//               <td>' . htmlspecialchars($row['trading']) . '</td> 
//               <td>' . htmlspecialchars($row['uom']) . '</td> 
//               <td>' . htmlspecialchars($row['created_at']) . '</td>
//               <td>' . htmlspecialchars($row['central_warehouse_soh']) . '</td>
//               <td>' . htmlspecialchars($row['inventory_data_soh']) . '</td>
//               <td>' . htmlspecialchars($row['soh_difference']) . '</td>
//               <td>' . $status . '</td>
//           </tr>
//         ';
//     }

//     echo 1;

// } else {

//     echo 0;
    
// }
