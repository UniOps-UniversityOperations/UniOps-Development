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

    //add user
    public function addUser($data){
        $this->db->query("INSERT INTO users (user_id, username, password, role) VALUES (:user_id, :username, :password, :role)");
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);

        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //get all users
    public function getUsers(){
        $this->db->query("SELECT * FROM users");
        $results = $this->db->resultSet();
        return $results;
    
    }

}

/* User model Structure
    user_id
    username
    password   
    role
*/