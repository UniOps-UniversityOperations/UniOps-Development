<?php

class M_assignedSubjects{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT assignedSubjects.*, subjects.sub_year, subjects.sub_stream 
                            FROM assignedSubjects 
                            INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code 
                            WHERE assignedSubjects.isDeleted = 0 AND assignedSubjects.lecturer_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    //add a subject to the assignedSubjects table
    public function add($sub_code, $lecturer_code){
        $this->db->query('INSERT INTO assignedSubjects (subject_code, lecturer_code) VALUES (:sub_code, :lecturer_code)');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':lecturer_code', $lecturer_code);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRowAS($lecturer_code, $subject_code){
        $this->db->query('UPDATE assignedSubjects SET isDeleted = 1 WHERE lecturer_code = :lecturer_code AND subject_code = :subject_code');
        $this->db->bind(':lecturer_code', $lecturer_code);
        $this->db->bind(':subject_code', $subject_code);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}