<?php

class M_Asset{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get all assets
    public function getAssets(){
        $this->db->query('SELECT * FROM assets WHERE a_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    //Create asset
    public function createAsset($data){
        $this->db->query('INSERT INTO assets (a_code, a_type, a_addedDate, a_isInUse) VALUES (:a_code, :a_type, :a_addedDate, :a_isInUse)');
        // Bind values
        $this->db->bind(':a_code', $data['a_code']);
        $this->db->bind(':a_type', $data['a_type']);
        $this->db->bind(':a_addedDate', $data['a_addedDate']);
        $this->db->bind(':a_isInUse', $data['a_isInUse']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Get asset by id
    public function getAssetById($id){
        $this->db->query('SELECT * FROM assets WHERE a_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    //Update asset
    public function updateAsset($data){
        $this->db->query('UPDATE assets SET a_id = :a_id, a_code = :a_code, a_type = :a_type, a_addedDate = :a_addedDate, a_isInUse = :a_isInUse WHERE a_id = :a_id');
        // Bind values
        $this->db->bind(':a_id', $data['a_id']);
        $this->db->bind(':a_code', $data['a_code']);
        $this->db->bind(':a_type', $data['a_type']);
        $this->db->bind(':a_addedDate', $data['a_addedDate']);
        $this->db->bind(':a_isInUse', $data['a_isInUse']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Delete asset
    public function deleteAsset($id){
        $this->db->query('UPDATE assets SET a_isDeleted = 1 WHERE a_id = :a_id');
        // Bind values
        $this->db->bind(':a_id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


}



/* 
            the structure of the assets table

            a_id
            a_code
            a_type
            a_addedDate
            a_isInUse
            a_isDeleted
        */