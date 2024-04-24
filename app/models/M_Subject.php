<?php

class M_Subject{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function createSubject($data){
        $this->db->query('INSERT INTO subjects (
            sub_code,
            sub_name,
            sub_credits,
            sub_year,
            sub_semester,
            sub_stream,
            sub_nStudents,
            sub_isCore,
            sub_isHaveLecture,
            sub_isHaveTutorial,
            sub_isHavePractical
            ) VALUES (
                :sub_code,
                :sub_name,
                :sub_credits,
                :sub_year,
                :sub_semester,
                :sub_stream,
                :sub_nStudents,
                :sub_isCore,
                :sub_isHaveLecture,
                :sub_isHaveTutorial,
                :sub_isHavePractical
                )');
        //Bind values
        $this->db->bind(':sub_code', $data['sub_code']);
        $this->db->bind(':sub_name', $data['sub_name']);
        $this->db->bind(':sub_credits', $data['sub_credits']);
        $this->db->bind(':sub_year', $data['sub_year']);
        $this->db->bind(':sub_semester', $data['sub_semester']);
        $this->db->bind(':sub_stream', $data['sub_stream']);
        $this->db->bind(':sub_nStudents', $data['sub_nStudents']);
        $this->db->bind(':sub_isCore', $data['sub_isCore']);
        $this->db->bind(':sub_isHaveLecture', $data['sub_isHaveLecture']);
        $this->db->bind(':sub_isHaveTutorial', $data['sub_isHaveTutorial']);
        $this->db->bind(':sub_isHavePractical', $data['sub_isHavePractical']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getSubjects(){
        $this->db->query('SELECT * FROM subjects WHERE sub_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    public function updateSubject($data){
        $this->db->query('UPDATE subjects SET
            sub_id = :sub_id,
            sub_code = :sub_code,
            sub_name = :sub_name,
            sub_credits = :sub_credits,
            sub_year = :sub_year,
            sub_semester = :sub_semester,
            sub_stream = :sub_stream,
            sub_nStudents = :sub_nStudents,
            sub_isCore = :sub_isCore,
            sub_isHaveLecture = :sub_isHaveLecture,
            sub_isHaveTutorial = :sub_isHaveTutorial,
            sub_isHavePractical = :sub_isHavePractical
            WHERE sub_id = :sub_id');
        //Bind values
        $this->db->bind(':sub_id', $data['sub_id']);
        $this->db->bind(':sub_code', $data['sub_code']);
        $this->db->bind(':sub_name', $data['sub_name']);
        $this->db->bind(':sub_credits', $data['sub_credits']);
        $this->db->bind(':sub_year', $data['sub_year']);
        $this->db->bind(':sub_semester', $data['sub_semester']);
        $this->db->bind(':sub_stream', $data['sub_stream']);
        $this->db->bind(':sub_nStudents', $data['sub_nStudents']);
        $this->db->bind(':sub_isCore', $data['sub_isCore']);
        $this->db->bind(':sub_isHaveLecture', $data['sub_isHaveLecture']);
        $this->db->bind(':sub_isHaveTutorial', $data['sub_isHaveTutorial']);
        $this->db->bind(':sub_isHavePractical', $data['sub_isHavePractical']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getSubjectById($id){
        $this->db->query('SELECT * FROM subjects WHERE sub_id = :sub_id');
        $this->db->bind(':sub_id', $id);
        $row = $this->db->single();
        return $row;
    }


    public function deleteSubject($id){
        $this->db->query('UPDATE subjects SET sub_isDeleted = 1 WHERE sub_id = :sub_id');
        //Bind values
        $this->db->bind(':sub_id', $id);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getCount(){
        $this->db->query('SELECT COUNT(*) AS count FROM subjects WHERE sub_isDeleted = 0');
        $row = $this->db->single();
        return $row;
    }

    public function getSubjectDetailsByCode($code){
        $this->db->query('SELECT * FROM subjects WHERE sub_code = :sub_code');
        $this->db->bind(':sub_code', $code);
        $row = $this->db->single();
        return $row;
    }

}


/*
    Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub_nStudents
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted
*/