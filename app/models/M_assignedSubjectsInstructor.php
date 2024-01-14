<?php

class M_assignedSubjectsInstructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT assignedSubjectsInstructor.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits 
                            FROM assignedSubjectsInstructor 
                            INNER JOIN subjects ON assignedSubjectsInstructor.subject_code = subjects.sub_code 
                            WHERE assignedSubjectsInstructor.instructor_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteRowASI($instructor_code, $subject_code){
        //delete the entire row
        $this->db->query('DELETE FROM assignedSubjectsInstructor WHERE instructor_code = :instructor_code AND subject_code = :subject_code');
        $this->db->bind(':instructor_code', $instructor_code);
        $this->db->bind(':subject_code', $subject_code);

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

  */