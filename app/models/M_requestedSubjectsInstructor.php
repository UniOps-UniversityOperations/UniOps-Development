<?php

class M_requestedSubjectsInstructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT requestedSubjectsInstructor.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits, subjects.sub_semester, subjects.sub_name
                            FROM requestedSubjectsInstructor 
                            INNER JOIN subjects ON requestedSubjectsInstructor.subject_code = subjects.sub_code 
                            WHERE requestedSubjectsInstructor.asi_isDeleted = 0 AND requestedSubjectsInstructor.instructor_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteForSubject($subject_code){
        $this->db->query('DELETE FROM requestedSubjectsInstructor WHERE subject_code = :subject_code');
        $this->db->bind(':subject_code', $subject_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //deleteForInstructor
    public function deleteForInstructor($instructor_code){
        $this->db->query('DELETE FROM requestedSubjectsInstructor WHERE instructor_code = :instructor_code');
        $this->db->bind(':instructor_code', $instructor_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
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