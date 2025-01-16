<?php

class Upload_file
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function upload_inventory_data()
    {

        $sql = "INSERT INTO inventory_data (date_inventory, cbs_code, item_code, item_description, purchase_uom, item_classification, trade_classification, location, on_hand_qty, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $save_inventory_data = $this->conn->prepare($sql);

        $current_datetime = date('Y-m-d H:i:s');

        $save_inventory_data->bindParam(1, $this->date_inventory);
        $save_inventory_data->bindParam(2, $this->cbs_code);
        $save_inventory_data->bindParam(3, $this->item_code);
        $save_inventory_data->bindParam(4, $this->item_description);
        $save_inventory_data->bindParam(5, $this->purchase_uom);
        $save_inventory_data->bindParam(6, $this->item_classification);
        $save_inventory_data->bindParam(7, $this->trade_classification);
        $save_inventory_data->bindParam(8, $this->location);
        $save_inventory_data->bindParam(9, $this->on_hand_qty);
        $save_inventory_data->bindParam(10, $current_datetime);

        return ($save_inventory_data->execute()) ? true : false;
    }

    public function upload_central_warehouse()
    {

        $sql = "INSERT INTO central_warehouse (item_code, item_description, trading, uom, soh, qty_received, qty_issued, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $save_central_warehouse = $this->conn->prepare($sql);

        $current_datetime = date('Y-m-d H:i:s');

        $save_central_warehouse->bindParam(1, $this->item_code);
        $save_central_warehouse->bindParam(2, $this->item_description);
        $save_central_warehouse->bindParam(3, $this->trading);
        $save_central_warehouse->bindParam(4, $this->uom);
        $save_central_warehouse->bindParam(5, $this->soh);
        $save_central_warehouse->bindParam(6, $this->qty_received);
        $save_central_warehouse->bindParam(7, $this->qty_issued);
        $save_central_warehouse->bindParam(8, $current_datetime);

        return ($save_central_warehouse->execute()) ? true : false;
    }

    // public function upload_bom_data()
    // {

    //     $sql = "INSERT INTO bom_data (cbs_code, item_code, item_description, planned_qty, uom, approved_pdn_qty, current_qty, total_po_qty_to_date, total_icto_qty_to_date, remaining_qty_tobe_requested_to_date, total_qty_received_to_date, remaining_qty_tobe_received_to_date, total_qty_issued_to_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    //     $save_bom_data = $this->conn->prepare($sql);

    //     $save_bom_data->bindParam(1, $this->cbs_code);
    //     $save_bom_data->bindParam(2, $this->item_code);
    //     $save_bom_data->bindParam(3, $this->item_description);
    //     $save_bom_data->bindParam(4, $this->planned_qty);
    //     $save_bom_data->bindParam(5, $this->uom);
    //     $save_bom_data->bindParam(6, $this->approved_pdn_qty);
    //     $save_bom_data->bindParam(7, $this->current_qty);
    //     $save_bom_data->bindParam(8, $this->total_po_qty_to_date);
    //     $save_bom_data->bindParam(9, $this->total_icto_qty_to_date);
    //     $save_bom_data->bindParam(10, $this->remaining_qty_tobe_requested_to_date);
    //     $save_bom_data->bindParam(11, $this->total_qty_received_to_date);
    //     $save_bom_data->bindParam(12, $this->remaining_qty_tobe_received_to_date);
    //     $save_bom_data->bindParam(13, $this->total_qty_issued_to_date);

    //     return ($save_bom_data->execute()) ? true : false;
    // }

    public function view_all_uploaded_files()
    {

        $sql = "SELECT
            cw.item_code, 
            cw.item_description, 
            cw.trading, 
            cw.uom, 
            cw.created_at,
            SUM(IFNULL(cw.soh, 0)) AS central_warehouse_soh,
            SUM(IFNULL(id.on_hand_qty, 0)) AS inventory_data_soh,
            SUM(IFNULL(cw.soh, 0)) - SUM(IFNULL(id.on_hand_qty, 0)) AS soh_difference
        FROM
            (SELECT item_code, item_description, trading, uom, created_at, SUM(soh) AS soh
            FROM central_warehouse
            GROUP BY item_code, item_description, trading, uom, created_at) cw
        LEFT JOIN 
            (SELECT item_code, item_description, trade_classification, purchase_uom, created_at, SUM(on_hand_qty) AS on_hand_qty
            FROM inventory_data
            GROUP BY item_code, item_description, trade_classification, purchase_uom, created_at) id
        ON cw.item_code = id.item_code
        AND cw.item_description = id.item_description
        AND cw.trading = id.trade_classification
        AND cw.uom = id.purchase_uom
        AND cw.created_at = id.created_at
        GROUP BY 
            cw.item_code, 
            cw.item_description, 
            cw.trading, 
            cw.uom, 
            cw.created_at

        UNION

        SELECT
            id.item_code, 
            id.item_description, 
            id.trade_classification, 
            id.purchase_uom, 
            id.created_at,
            SUM(IFNULL(cw.soh, 0)) AS central_warehouse_soh,
            SUM(IFNULL(id.on_hand_qty, 0)) AS inventory_data_soh,
            SUM(IFNULL(cw.soh, 0)) - SUM(IFNULL(id.on_hand_qty, 0)) AS soh_difference
        FROM 
            (SELECT item_code, item_description, trading, uom, created_at, SUM(soh) AS soh
            FROM central_warehouse
            GROUP BY item_code, item_description, trading, uom, created_at) cw
        RIGHT JOIN 
            (SELECT item_code, item_description, trade_classification, purchase_uom, created_at, SUM(on_hand_qty) AS on_hand_qty
            FROM inventory_data
            GROUP BY item_code, item_description, trade_classification, purchase_uom, created_at) id
        ON cw.item_code = id.item_code
        AND cw.item_description = id.item_description
        AND cw.trading = id.trade_classification
        AND cw.uom = id.purchase_uom
        AND cw.created_at = id.created_at
        GROUP BY 
            id.item_code, 
            id.item_description, 
            id.trade_classification, 
            id.purchase_uom, 
            id.created_at

        ORDER BY 
            created_at ASC;";

        $view_all_uploaded_data = $this->conn->prepare($sql);

        $view_all_uploaded_data->execute();
        return $view_all_uploaded_data;
    }
}


// SELECT 
//     central_warehouse.item_code, 
//     central_warehouse.item_description, 
//     central_warehouse.trading, 
//     central_warehouse.uom, 
//     central_warehouse.created_at,
//     SUM(IFNULL(central_warehouse.soh, 0)) AS central_warehouse_soh,
//     SUM(IFNULL(inventory_data.on_hand_qty, 0)) AS inventory_data_soh,
//     SUM(IFNULL(central_warehouse.soh, 0)) - SUM(IFNULL(inventory_data.on_hand_qty, 0)) AS soh_difference
// FROM 
//     central_warehouse
// LEFT JOIN 
//     inventory_data ON central_warehouse.item_code = inventory_data.item_code
//     AND central_warehouse.item_description = inventory_data.item_description
//     AND central_warehouse.trading = inventory_data.trade_classification
//     AND central_warehouse.uom = inventory_data.purchase_uom
// GROUP BY 
//     central_warehouse.item_code, 
//     central_warehouse.item_description, 
//     central_warehouse.trading, 
//     central_warehouse.uom, 
//     central_warehouse.created_at

// UNION

// SELECT 
//     inventory_data.item_code, 
//     inventory_data.item_description, 
//     inventory_data.trade_classification,
//     inventory_data.purchase_uom, 
//     inventory_data.created_at,
//     SUM(IFNULL(central_warehouse.soh, 0)) AS central_warehouse_soh,
//     SUM(IFNULL(inventory_data.on_hand_qty, 0)) AS inventory_data_soh,
//     SUM(IFNULL(central_warehouse.soh, 0)) - SUM(IFNULL(inventory_data.on_hand_qty, 0)) AS soh_difference
// FROM 
//     central_warehouse
// RIGHT JOIN 
//     inventory_data ON central_warehouse.item_code = inventory_data.item_code
//     AND central_warehouse.item_description = inventory_data.item_description
//     AND central_warehouse.trading = inventory_data.trade_classification
//     AND central_warehouse.uom = inventory_data.purchase_uom
// GROUP BY 
//     inventory_data.item_code, 
//     inventory_data.item_description, 
//     inventory_data.trade_classification, 
//     inventory_data.purchase_uom, 
//     inventory_data.created_at

// ORDER BY 
//     item_code ASC;


//     $sql = "SELECT 
//     cw.item_code,
//     cw.item_description,
//     cw.trading,
//     cw.uom,
//     cw.created_at,
//     SUM(cw.soh) AS central_warehouse_soh,
//     SUM(IFNULL(id.on_hand_qty, 0)) AS inventory_data_soh,
//     SUM(cw.soh) - SUM(IFNULL(id.on_hand_qty, 0)) AS soh_difference
// FROM 
//     (
//         SELECT DISTINCT item_code, item_description, trading, uom, created_at, soh
//         FROM central_warehouse
//     ) cw
// LEFT JOIN 
//     (
//         SELECT DISTINCT item_code, created_at, on_hand_qty
//         FROM inventory_data
//     ) id
// ON 
//     cw.item_code = id.item_code 
//     AND cw.created_at = id.created_at
// GROUP BY 
//     cw.item_code, 
//     cw.item_description, 
//     cw.trading, 
//     cw.uom, 
//     cw.created_at
// ORDER BY cw.created_at ASC;";