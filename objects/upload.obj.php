<?php

class Contacts_tbl {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;        
    }

    public function upload_file() {

        $sql = "INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)";
        $save = $this->conn->prepare($sql);
        
        $save->bindParam(1, $this->name);
        $save->bindParam(2, $this->email);
        $save->bindParam(3, $this->phone);

        return ($save->execute()) ? true : false;
    }

    public function upload_file_two() {

        $sql = "INSERT INTO contacttwo (name, email, phone) VALUES (?, ?, ?)";
        $savetwo = $this->conn->prepare($sql);

        $savetwo->bindParam(1, $this->nametwo);
        $savetwo->bindParam(2, $this->emailtwo);
        $savetwo->bindParam(3, $this->phonetwo);

        return ($savetwo->execute()) ? true : false;
    }
}