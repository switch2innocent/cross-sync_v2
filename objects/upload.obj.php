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

        $sql = "INSERT INTO inventory_data (date_inventory, cbs_code, item_code, item_description, purchase_uom, item_classification, trade_classification, location, on_hand_qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $save_inventory_data = $this->conn->prepare($sql);

        $save_inventory_data->bindParam(1, $this->date_inventory);
        $save_inventory_data->bindParam(2, $this->cbs_code);
        $save_inventory_data->bindParam(3, $this->item_code);
        $save_inventory_data->bindParam(4, $this->item_description);
        $save_inventory_data->bindParam(5, $this->purchase_uom);
        $save_inventory_data->bindParam(6, $this->item_classification);
        $save_inventory_data->bindParam(7, $this->trade_classification);
        $save_inventory_data->bindParam(8, $this->location);
        $save_inventory_data->bindParam(9, $this->on_hand_qty);

        return ($save_inventory_data->execute()) ? true : false;
    }

    public function upload_central_warehouse()
    {

        $sql = "INSERT INTO central_warehouse (item_code, item_description, trading, uom, soh, qty_received, qty_issued) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $save_central_warehouse = $this->conn->prepare($sql);

        $save_central_warehouse->bindParam(1, $this->item_code);
        $save_central_warehouse->bindParam(2, $this->item_description);
        $save_central_warehouse->bindParam(3, $this->trading);
        $save_central_warehouse->bindParam(4, $this->uom);
        $save_central_warehouse->bindParam(5, $this->soh);
        $save_central_warehouse->bindParam(6, $this->qty_received);
        $save_central_warehouse->bindParam(7, $this->qty_issued);

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

        // Complete sql with bom table
        // $sql = "SELECT 
        // COALESCE(c.item_code, b.item_code, i.item_code) AS item_code,
        // COALESCE(c.item_description, b.item_description, i.item_description) AS item_description,
        // COALESCE(c.trading, i.trade_classification) AS trading,
        // COALESCE(c.uom, b.uom, i.purchase_uom) AS uom,
        // SUM(COALESCE(c.soh, 0)) AS soh,
        // SUM(COALESCE(c.qty_received, 0)) AS qty_received,
        // SUM(COALESCE(c.qty_issued, 0)) AS qty_issued
        // FROM 
        // central_warehouse c
        // LEFT JOIN 
        // bom_data b ON c.item_code = b.item_code
        // LEFT JOIN 
        // inventory_data i ON c.item_code = i.item_code
        // GROUP BY 
        // COALESCE(c.item_code, b.item_code, i.item_code),
        // COALESCE(c.item_description, b.item_description, i.item_description),
        // COALESCE(c.trading, i.trade_classification),
        // COALESCE(c.uom, b.uom, i.purchase_uom);";

        $sql = "SELECT 
        COALESCE(c.item_code, i.item_code) AS item_code,
        COALESCE(c.item_description, i.item_description) AS item_description,
        COALESCE(c.trading, i.trade_classification) AS trading,
        COALESCE(c.uom, i.purchase_uom) AS uom,
        SUM(c.soh) AS central_soh,
        SUM(i.on_hand_qty) AS inventory_soh,
        

        
        ";

        $view_all_uploaded_data = $this->conn->prepare($sql);
        
        $view_all_uploaded_data->execute();
        return $view_all_uploaded_data;

    }

    public function view_office_onsite_record()
    {
        $sql = "SELECT o.description,
        SUM(o.office_qty) AS office_quantity,
        SUM(IFNULL(n.onsite_qty, 0)) AS onsite_quantity,
        SUM(o.office_qty) - SUM(IFNULL(n.onsite_qty, 0)) AS quantity_difference
        FROM (
            SELECT description, SUM(qty) AS office_qty
            FROM office
            GROUP BY description
        ) o
        LEFT JOIN (
            SELECT description, SUM(qty) AS onsite_qty
            FROM onsite
            GROUP BY description
        ) n
        ON o.description = n.description
        GROUP BY o.description;";

        $view_office_onsite = $this->conn->prepare($sql);

        $view_office_onsite->execute();
        return $view_office_onsite;
    }
}
