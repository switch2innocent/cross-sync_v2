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

    // public function upload_onsite()
    // {

    //     $sql = "INSERT INTO onsite (category, description, qty) VALUES (?, ?, ?)";
    //     $saveonsite = $this->conn->prepare($sql);

    //     $saveonsite->bindParam(1, $this->category_onsite);
    //     $saveonsite->bindParam(2, $this->description_onsite);
    //     $saveonsite->bindParam(3, $this->qty_onsite);

    //     return ($saveonsite->execute()) ? true : false;
    // }

    // public function view_office_onsite_record()
    // {
    //     $sql = "SELECT o.description,
    //     SUM(o.office_qty) AS office_quantity,
    //     SUM(IFNULL(n.onsite_qty, 0)) AS onsite_quantity,
    //     SUM(o.office_qty) - SUM(IFNULL(n.onsite_qty, 0)) AS quantity_difference
    //     FROM (
    //         SELECT description, SUM(qty) AS office_qty
    //         FROM office
    //         GROUP BY description
    //     ) o
    //     LEFT JOIN (
    //         SELECT description, SUM(qty) AS onsite_qty
    //         FROM onsite
    //         GROUP BY description
    //     ) n
    //     ON o.description = n.description
    //     GROUP BY o.description;";
        
    //     $view_office_onsite = $this->conn->prepare($sql);

    //     $view_office_onsite->execute();
    //     return $view_office_onsite;
    // }

    // public function delete_data_onsiteoffice() {

    // }
}
