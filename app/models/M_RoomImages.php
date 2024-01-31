<?php

class M_RoomImages{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //u[load image
    
    public function upload($r_id, $name, $type, $data){
        // die('in model');
        $this->db->query('INSERT INTO roomImages (r_id, name, type, data) VALUES (:r_id, :name, :type, :data)');
        // Bind values
        $this->db->bind(':r_id', $r_id);
        $this->db->bind(':name', $name);
        $this->db->bind(':type', $type);
        $this->db->bind(':data', $data);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getImages(){
        $this->db->query('SELECT * FROM roomImages');
        // $this->db->bind(':r_id', $r_id);
        
        $results = $this->db->resultSet();
        return $results;
    }

    // // connect to the database
    // $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'username', 'password');
    // // insert the image data into the database
    // $stmt = $pdo->prepare("INSERT INTO images (name, type, data) VALUES (?, ?, ?)");
    // $stmt->bindParam(1, $name);
    // $stmt->bindParam(2, $type);
    // $stmt->bindParam(3, $data);
    // $stmt->execute();


}
