<?php

class M_requestedSubjects{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get the subjects that are requested by the lecturer
//     public function getSubjects($code){
//         $this->db->query('SELECT * FROM requestedSubjects WHERE isDeleted = 0 AND lecturer_code = :code');
//         $this->db->bind(':code', $code);
//         $results = $this->db->resultSet();
//         return $results;
//     }

    public function getSubjects($code){
        $this->db->query('SELECT requestedSubjects.*, subjects.sub_year, subjects.sub_stream 
                            FROM requestedSubjects 
                            INNER JOIN subjects ON requestedSubjects.subject_code = subjects.sub_code 
                            WHERE requestedSubjects.isDeleted = 0 AND requestedSubjects.lecturer_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }
 }