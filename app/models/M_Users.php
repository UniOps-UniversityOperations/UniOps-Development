<?php

class M_Users {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findUserById($user_id){
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->single();

        //check row count
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }


    //login user
    public function login($user_id, $pwd){
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();

        $hashed_password = $row->password;
        //if(password_verify($pwd, $hashed_password)){
        if($pwd == $hashed_password){
            return $row;
        } else {
            return false;
        }
    }

    //check role
    public function checkRole($user_id, $rl){
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id AND role = :role");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':role', $rl);
        $row = $this->db->single();

        $role = $row->role;
        if($role == $rl){
            return true;
        } else {
            return false;
        }
    }


}

/* User model Structure
    user_id
    username
    password   
    role
*/