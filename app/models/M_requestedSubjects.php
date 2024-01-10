<?php

class M_requestedSubjects{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get the subjects that are requested by the lecturer
    public function getSubjects($code){
        $this->db->query('SELECT * FROM requestedSubjects WHERE isDeleted = 0 AND lecturer_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }
}