<?php

class Upload_csv {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;        
    }

    public function upload_office() {

        $sql = "INSERT INTO office (category, description, qty) VALUES (?, ?, ?)";
        $saveoffice = $this->conn->prepare($sql);
        
        $saveoffice->bindParam(1, $this->category_office);
        $saveoffice->bindParam(2, $this->description_office);
        $saveoffice->bindParam(3, $this->qty_office);

        return ($saveoffice->execute()) ? true : false;
    }

    public function upload_onsite() {

        $sql = "INSERT INTO onsite (category, description, qty) VALUES (?, ?, ?)";
        $saveonsite = $this->conn->prepare($sql);

        $saveonsite->bindParam(1, $this->category_onsite);
        $saveonsite->bindParam(2, $this->description_onsite);
        $saveonsite->bindParam(3, $this->qty_onsite);

        return ($saveonsite->execute()) ? true : false;
    }

    public function view_office_onsite_record() {

        $sql = "SELECT o.description, o.qty AS office_quantity, n.qty AS onsite_quantity, (o.qty - IFNULL(n.qty, 0)) AS quantity_difference FROM office o LEFT JOIN onsite n ON o.description = n.description";
        $view_office_onsite = $this->conn->prepare($sql);

        $view_office_onsite->execute();
        return $view_office_onsite;
    }
}