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
        $this->db->query('SELECT requestedSubjects.*, subjects.sub_year, subjects.sub_stream, subjects.sub_semester, subjects.sub_credits, subjects.sub_name, subjects.sub_nStudents
                            FROM requestedSubjects 
                            INNER JOIN subjects ON requestedSubjects.subject_code = subjects.sub_code 
                            WHERE requestedSubjects.isDeleted = 0 AND requestedSubjects.lecturer_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function deleteForSubject($subject_code){
        $this->db->query('DELETE FROM requestedSubjects WHERE subject_code = :subject_code');
        $this->db->bind(':subject_code', $subject_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    public function deleteForLecturer($lecturer_code){
        $this->db->query('DELETE FROM requestedSubjects WHERE lecturer_code = :lecturer_code');
        $this->db->bind(':lecturer_code', $lecturer_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }
    
 }