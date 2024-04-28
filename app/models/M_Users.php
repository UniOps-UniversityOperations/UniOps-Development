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

    //Reset Password
    public function resetpwd($email,$selector,$token,$expires) {
        //Deleting already exist token from the resetpwd table
        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = :email ;";
        $this->db->query($sql);
        $this->db->bind(":email",$email);
        $this->db->execute();

        //Inserting new record
        $sql = "INSERT INTO pwdreset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        $this->db->query($sql);
        $this->db->bind(1,$email);
        $this->db->bind(2,$selector);
        $this->db->bind(3,$hashedToken);
        $this->db->bind(4,$expires);
        return $this->db->execute();
    }

    public function resetpasswordsubmit($selector,$currentDate) {
        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? && pwdResetExpires >= ?;";
        $this->db->query($sql);
        $this->db->bind(1,$selector);
        $this->db->bind(2,$currentDate);
        return $this->db->single();
    }

    public function updatePassword($pwd,$tokenemail) {
        $sql = 'UPDATE users SET pwd = ? WHERE user_id = ?;';
        $this->db->query($sql);
        $this->db->bind(1,$pwd);
        $this->db->bind(2,$tokenemail);
        $this->db->execute();

        //Deleting the token from pwdreset table
        $sql = 'DELETE FROM pwdreset WHERE pwdResetEmail = ?;';
        $this->db->query($sql);
        $this->db->bind(1,$tokenemail);
        $this->db->execute();

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