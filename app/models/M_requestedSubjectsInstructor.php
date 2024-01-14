<?php

class M_requestedSubjectsInstructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT requestedSubjectsInstructor.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits 
                            FROM requestedSubjectsInstructor 
                            INNER JOIN subjects ON requestedSubjectsInstructor.subject_code = subjects.sub_code 
                            WHERE requestedSubjectsInstructor.asi_isDeleted = 0 AND requestedSubjectsInstructor.instructor_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }


}


 /*
    he structure of the table
    instructor_code
    subject_code
    lecture
    practical
    tutorial
    asi_isDeleted

  */