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

        $sql = "INSERT INTO inventory_data (date_inventory, cbs_code, item_code, item_description, purchase_uom, item_classification, trade_classification, location, on_hand_qty, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
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

        $sql = "INSERT INTO central_warehouse (item_code, item_description, trading, uom, soh, qty_received, qty_issued, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)";
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
        if ($this->start_date && $this->end_date) {
            $dateCondition = "AND created_at BETWEEN ? AND ?";
        } else {
            $dateCondition = "AND DATE(created_at) = CURDATE()";
        }

        $sql = "
            SELECT
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
                WHERE status != 0
                $dateCondition
                GROUP BY item_code, item_description, trading, uom, created_at) cw
            LEFT JOIN 
                (SELECT item_code, item_description, trade_classification, purchase_uom, created_at, SUM(on_hand_qty) AS on_hand_qty
                FROM inventory_data
                WHERE status != 0
                $dateCondition
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
                WHERE status != 0
                $dateCondition
                GROUP BY item_code, item_description, trading, uom, created_at) cw
            RIGHT JOIN 
                (SELECT item_code, item_description, trade_classification, purchase_uom, created_at, SUM(on_hand_qty) AS on_hand_qty
                FROM inventory_data
                WHERE status != 0
                $dateCondition
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

            ORDER BY soh_difference DESC;
            ";
       
        $view_all_uploaded_data = $this->conn->prepare($sql);
        if ($this->start_date && $this->end_date) {
            $view_all_uploaded_data->bindParam(1, $this->start_date);
            $view_all_uploaded_data->bindParam(2, $this->end_date);
            $view_all_uploaded_data->bindParam(3, $this->start_date);
            $view_all_uploaded_data->bindParam(4, $this->end_date);
            $view_all_uploaded_data->bindParam(5, $this->start_date);
            $view_all_uploaded_data->bindParam(6, $this->end_date);
            $view_all_uploaded_data->bindParam(7, $this->start_date);
            $view_all_uploaded_data->bindParam(8, $this->end_date);
        }
    
        $view_all_uploaded_data->execute();
        return $view_all_uploaded_data;
    }


    public function deleteData_central_warehouse()
    {

        $sql = "UPDATE central_warehouse SET status = 0 WHERE DATEDIFF(CURDATE(), created_at) >= 30";
        $deleteData_central_warehouse = $this->conn->prepare($sql);

        return ($deleteData_central_warehouse->execute()) ? true : false;
    }

    public function deleteData_inventory_data()
    {

        $sql = "UPDATE inventory_data SET status = 0 WHERE DATEDIFF(CURDATE(), created_at) >= 30";
        $deleteData_inventory_data = $this->conn->prepare($sql);

        return ($deleteData_inventory_data->execute()) ? true : false;
    }

    public function deleteData_by_dates() {

        $sql_central_warehouse = "UPDATE central_warehouse SET status = 0 WHERE created_at BETWEEN ? AND ?";
        $delete_central_warehouse = $this->conn->prepare($sql_central_warehouse);
        $delete_central_warehouse->bindParam(1, $this->start_date);
        $delete_central_warehouse->bindParam(2, $this->end_date);
        $result_central_warehouse = $delete_central_warehouse->execute();

        $sql_inventory_data = "UPDATE inventory_data SET status = 0 WHERE created_at BETWEEN ? AND ?";
        $delete_inventory_data = $this->conn->prepare($sql_inventory_data);
        $delete_inventory_data->bindParam(1, $this->start_date);
        $delete_inventory_data->bindParam(2, $this->end_date);
        $result_inventory_data = $delete_inventory_data->execute();

        return ($result_central_warehouse && $result_inventory_data) ? true : false;
    }
}
