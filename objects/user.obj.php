<?php

class Users {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get_project() {
        $sql = "SELECT id, proj_name FROM projects ORDER BY proj_name";
        $get_project = $this->conn->prepare($sql);
        $get_project->execute();

        return $get_project;
    }

    public function get_department() {
        $sql = "SELECT id, dept_name FROM departments ORDER BY dept_name";
        $get_department = $this->conn->prepare($sql);
        $get_department->execute();

        return $get_department;
    }

    public function save_user() {
        $sql = "INSERT INTO users SET firstname=?, lastname=?, position=?, project=?, date_hire=?, dept=?, unit=?, email=?, username=?, password=?, status=1";
        $save_user = $this->conn->prepare($sql);

        $save_user->bindParam(1, $this->firstname);
        $save_user->bindParam(2, $this->lastname);
        $save_user->bindParam(3, $this->position);
        $save_user->bindParam(4, $this->project);
        $save_user->bindParam(5, $this->date_hire);
        $save_user->bindParam(6, $this->dept);
        $save_user->bindParam(7, $this->unit);
        $save_user->bindParam(8, $this->email);
        $save_user->bindParam(9, $this->username);
        $save_user->bindParam(10, $this->password);

        return ($save_user->execute()) ? true : false;

    }



}