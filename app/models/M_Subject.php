<?php

class M_Subject{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function createSubject($data){
        $this->db->query('INSERT INTO subjects (
            s_code,
            s_name,
            s_credits,
            s_year,
            s_semester,
            s_type)
            VALUES (
                :s_code,
                :s_name,
                :s_credits,
                :s_year,
                :s_semester,
                :s_type)');
        //Bind values
        $this->db->bind(':s_code', $data['s_code']);
        $this->db->bind(':s_name', $data['s_name']);
        $this->db->bind(':s_credits', $data['s_credits']);
        $this->db->bind(':s_year', $data['s_year']);
        $this->db->bind(':s_semester', $data['s_semester']);
        $this->db->bind(':s_type', $data['s_type']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getSubjects(){
        $this->db->query('SELECT * FROM subjects');
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateSubject($data){
        $this->db->query('UPDATE subjects SET
            s_id = :s_id,
            s_code = :s_code,
            s_name = :s_name,
            s_credits = :s_credits,
            s_year = :s_year,
            s_semester = :s_semester,
            s_type = :s_type
            WHERE s_id = :s_id');
        //Bind values
        $this->db->bind(':s_id', $data['s_id']);
        $this->db->bind(':s_code', $data['s_code']);
        $this->db->bind(':s_name', $data['s_name']);
        $this->db->bind(':s_credits', $data['s_credits']);
        $this->db->bind(':s_year', $data['s_year']);
        $this->db->bind(':s_semester', $data['s_semester']);
        $this->db->bind(':s_type', $data['s_type']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getSubjectById($id){
        $this->db->query('SELECT * FROM subjects WHERE s_id = :s_id');
        $this->db->bind(':s_id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function deleteSubject($id){
        $this->db->query('DELETE FROM subjects WHERE s_id = :s_id');
        //Bind values
        $this->db->bind(':s_id', $id);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

}


/*
    Structure of the database table:
        s_id
        s_code
        s_name
        s_credits
        s_year
        s_semester
        s_type
*/