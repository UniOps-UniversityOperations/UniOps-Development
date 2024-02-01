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

        $hashed_pwd = $row->pwd;
        //if(pwd_verify($pwd, $hashed_pwd)){
        if($pwd == $hashed_pwd){
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

        // $role = $row->role;
        // if($role == $rl){
            return true;
    //     } else {
    //         return false;
    //     }
    }

    //add user
    public function addUser($data){
        $this->db->query("INSERT INTO users (user_id, username, pwd, role) VALUES (:user_id, :username, :pwd, :role)");
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pwd', $data['pwd']);
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
        pwd = :pwd,
        role = :role
        WHERE user_id = :user_id
        ');
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pwd', $data['pwd']);
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
    pwd   
    role
*/