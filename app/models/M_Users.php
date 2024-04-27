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
        $this->db->query("INSERT INTO users (user_id, username, pwd, role) VALUES (:user_id, :username, :pwd, :role)");
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pwd', $data['pwd']);
        $this->db->bind(':role', 'A');

        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //get all users
    public function getAdmins(){
        $this->db->query("SELECT * FROM users WHERE role = 'A'");
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
        // die($data['user_id'] . " -- " . $data['username'] . " -- " . $data['pwd']);
        $this->db->query('UPDATE users SET
        username = :username,
        pwd = :pwd
        WHERE user_id = :user_id
        ');
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pwd', $data['pwd']);
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

    //a function to return true if the user exists else false
    public function userExists($user_id){
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $this->db->single();
        $row = $this->db->rowCount();
        if($row > 0){
            return true;
        } else {
            return false;
        }
    }

}

/* User model Structure
    user_id
    username
    pwd   
    role
*/