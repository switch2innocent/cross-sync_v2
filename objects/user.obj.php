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
        $sql = "INSERT INTO users SET firstname=?, lastname=?, position=?, project=?, date_hire=?, dept=?, unit=?, email=?, username=?, password=?, access=1, role=1, logcount=1, status=1";
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

    public function login_user() {

        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $login_user = $this->conn->prepare($sql);

        $login_user->bindParam(1, $this->username);
        $login_user->bindParam(2, $this->password);

        $login_user->execute();
        return $login_user;
    }

    public function check_access() {

        $sql = "SELECT count(user_id) AS count, access, role FROM access WHERE user_id = ? AND system_id = ? AND status != 0";
        $check_access = $this->conn->prepare($sql);

        $check_access->bindParam(1, $this->user_id);
        $check_access->bindParam(2, $this->system_id);

        $check_access->execute();
        return $check_access;

    }

    public function logout_user() {

        session_start();
        if (session_destroy()) {
            return true;
            unset($_seession["id"]);
            unset($_seession["firstname"]);
            unset($_seession["lastname"]);
        } else {
            return false;
        }

    }

    public function verify_user_email() {

        $sql = "SELECT COUNT(*) FROM users WHERE email=?";
        $verify_user_email = $this->conn->prepare($sql);

        $verify_user_email->bindParam(1, $this->email);
        $verify_user_email->execute();

        return $verify_user_email;
    }
    public function get_user_profile() {

        $sql = "SELECT * FROM users WHERE id=?";
        $get_user_profile = $this->conn->prepare($sql);

        $get_user_profile->bindParam(1, $this->id);
        $get_user_profile->execute();

        return $get_user_profile;
    }

    public function update_user_profile() {

        $sql = "UPDATE users SET firstname=?, lastname=?, password=? WHERE id=?";
        $update_user_profile = $this->conn->prepare($sql);

        $update_user_profile->bindParam(1, $this->firstname);
        $update_user_profile->bindParam(2, $this->lastname);
        $update_user_profile->bindParam(3, $this->password);
        $update_user_profile->bindParam(4, $this->id);

        return ($update_user_profile->execute()) ? true : false;
        
    }
    
    public function get_emails() {

        $sql = "SELECT * FROM users WHERE email=? AND status != 0";
        $get_emails = $this->conn->prepare($sql);

        $get_emails->bindParam(1, $this->email);

        $get_emails->execute();
        return $get_emails;

    }

    public function email_by_id() {

        $sql = "SELECT id FROM users WHERE email = ? AND status != 0";
        $email_by_id = $this->conn->prepare($sql);

        $email_by_id->bindParam(1, $this->email);
        
        $email_by_id->execute();
        return $email_by_id;
    }

    public function change_password() {

        $sql = "UPDATE users SET password=? WHERE id=? AND status != 0";
        $change_password = $this->conn->prepare($sql);

        $change_password->bindParam(1, $this->password);
        $change_password->bindParam(2, $this->id);
        
        if ($change_password->execute()) {
            return true;
        } else {
            return false;
        }

    }
}