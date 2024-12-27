<?php

class User {

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get_project()
    {
        $sql = "SELECT id, proj_name FROM projects";
        $get_project = $this->conn->prepare($sql);
        $get_project->execute();

        return $get_project;
    }

    // public function register_user()
    // {
    //     $sql = "INSERT INTO users SET firstname = ?, lastname = ?, position = ?, project = ?, date_hire = ?, department = ?, unit = ?, email = ?, username = ?";
    //     $register_user = $this->conn->prepare($sql);

    //     $register_user->bindParam(1, $this->firstname);
    //     $register_user->bindParam(2, $this->lastname);
    //     $register_user->bindParam(3, $this->position);
    //     $register_user->bindParam(4, $this->project);
    //     $register_user->bindParam(5, $this->date_hire);
    //     $register_user->bindParam(6, $this->department);
    //     $register_user->bindParam(7, $this->unit);
    //     $register_user->bindParam(8, $this->email);
    //     $register_user->bindParam(9, $this->username);

    //     return ($register_user->execute()) ? true : false;
    // }

}