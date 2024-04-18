<?php

class M_assignedSubjects{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT assignedSubjects.*, subjects.sub_year, subjects.sub_stream, subjects.sub_semester, subjects.sub_credits , sub_nStudents, sub_name, sub_code
                            FROM assignedSubjects 
                            INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code 
                            WHERE assignedSubjects.lecturer_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    //serach if exist a row with the same subject_code and lecturer_code
    public function search($sub_code, $lecturer_code){
        $this->db->query('SELECT * FROM assignedSubjects WHERE subject_code = :sub_code AND lecturer_code = :lecturer_code AND isDeleted = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':lecturer_code', $lecturer_code);
        $results = $this->db->resultSet();
        return $results;
    }

    //add a subject to the assignedSubjects table
    public function add($sub_code, $lecturer_code){
               
            // insert a new row first
            $this->db->query('INSERT INTO assignedSubjects (subject_code, lecturer_code) VALUES (:sub_code, :lecturer_code)');
            $this->db->bind(':sub_code', $sub_code);
            $this->db->bind(':lecturer_code', $lecturer_code);

            if ($this->db->execute()) {
                // If a new row was inserted
                return true;
            } else {
                return false;
            }
    }

    public function deleteRowAS($lecturer_code, $subject_code){
        //delete the entire row
        $this->db->query('DELETE FROM assignedSubjects WHERE lecturer_code = :lecturer_code AND subject_code = :subject_code');
        $this->db->bind(':lecturer_code', $lecturer_code);
        $this->db->bind(':subject_code', $subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
        
    }

    //get subject details for assign table
    public function getSubjectDetails(){
        $this->db->query('SELECT subjects.*, assignedSubjects.subject_code, assignedSubjects.lecturer_code 
                            FROM subjects 
                            LEFT JOIN assignedSubjects ON subjects.sub_code = assignedSubjects.subject_code
                            WHERE subjects.sub_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;

    }

    public function forceAssignLecturers($sub_code, $lecturer_code){
        $this->db->query('UPDATE assignedSubjects SET lecturer_code = :lecturer_code WHERE subject_code = :sub_code');
        $this->db->bind(':lecturer_code', $lecturer_code);
        $this->db->bind(':sub_code', $sub_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    // delete all rows for a perticular subject
    public function deleteForSubject($subject_code){
        $this->db->query('DELETE FROM assignedSubjects WHERE subject_code = :subject_code');
        $this->db->bind(':subject_code', $subject_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    // delete all rows for a perticular lecturer
    public function deleteForLecturer($lecturer_code){
        $this->db->query('DELETE FROM assignedSubjects WHERE lecturer_code = :lecturer_code');
        $this->db->bind(':lecturer_code', $lecturer_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //deleteForInstructor
    public function deleteForInstructor($instructor_code){
        $this->db->query('DELETE FROM assignedSubjects WHERE lecturer_code = :instructor_code');
        $this->db->bind(':instructor_code', $instructor_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }
}