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

    //get user by id
    public function getUserById($id){
        $this -> db -> query("SELECT * FROM users WHERE user_id = :user_id");
        $this -> db -> bind(':user_id', $id);
        $row = $this -> db -> single();
        return $row;
    }

    //update user
    public function updateUser($data){
        $this->db->query('UPDATE users SET
        user_id = :user_id,
        username = :username,
        password = :password,
        role = :role
        WHERE user_id = :user_id
        ');
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

    //delete user
    public function deleteUser($id){
        $this->db->query('DELETE FROM users WHERE user_id = :user_id');
        //bind values
        $this->db->bind(':user_id', $id);
        //execute
        if($this->db->execute()){
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