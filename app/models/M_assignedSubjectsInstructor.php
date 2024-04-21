<?php

class M_assignedSubjectsInstructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // public function getSubjects($code){
    //     $this->db->query('SELECT assignedSubjectsInstructor.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits 
    //                         FROM assignedSubjectsInstructor 
    //                         INNER JOIN subjects ON assignedSubjectsInstructor.subject_code = subjects.sub_code 
    //                         WHERE assignedSubjectsInstructor.instructor_code = :code');
    //     $this->db->bind(':code', $code);
    //     $results = $this->db->resultSet();
    //     return $results;
    // }

    public function getSubjects($code){
        $this->db->query('SELECT assignedSubjects.*, i_assignedSubjects_practical.*, i_assignedSubjects_tutorial.*, subjects.sub_code, subjects.sub_year, subjects.sub_stream, subjects.sub_credits, subjects.sub_semester, subjects.sub_nStudents, subjects.sub_name
                            FROM subjects 
                            LEFT JOIN assignedSubjects 
                            ON subjects.sub_code = assignedSubjects.subject_code 
                            LEFT JOIN i_assignedSubjects_practical 
                            ON subjects.sub_code = i_assignedSubjects_practical.p_subject_code 
                            LEFT JOIN i_assignedSubjects_tutorial 
                            ON subjects.sub_code = i_assignedSubjects_tutorial.t_subject_code 
                            WHERE assignedSubjects.lecturer_code = :code OR i_assignedSubjects_practical.p_instructor_code = :code OR i_assignedSubjects_tutorial.t_instructor_code = :code
                            ');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    // public function deleteRowASI($instructor_code, $subject_code){
    //     //delete the entire row
    //     $this->db->query('DELETE FROM assignedSubjectsInstructor WHERE instructor_code = :instructor_code AND subject_code = :subject_code');
    //     $this->db->bind(':instructor_code', $instructor_code);
    //     $this->db->bind(':subject_code', $subject_code);

    //     if ($this->db->execute()) {
    //         // If a new row was inserted
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }

    // public function getSubjectDetails(){
    //     $this->db->query('SELECT subjects.*, assignedSubjectsInstructor.* 
    //                         FROM subjects 
    //                         LEFT JOIN assignedSubjectsInstructor 
    //                         ON subjects.sub_code = assignedSubjectsInstructor.subject_code 
    //                         WHERE subjects.sub_isDeleted = 0');
    //     $results = $this->db->resultSet();
    //     return $results;
    // }

    public function getSubjectDetails(){
        $this->db->query('SELECT subjects.*, assignedSubjects.*, i_assignedSubjects_practical.*, i_assignedSubjects_tutorial.* 
                            FROM subjects 
                            LEFT JOIN assignedSubjects 
                            ON subjects.sub_code = assignedSubjects.subject_code 
                            LEFT JOIN i_assignedSubjects_practical 
                            ON subjects.sub_code = i_assignedSubjects_practical.p_subject_code 
                            LEFT JOIN i_assignedSubjects_tutorial 
                            ON subjects.sub_code = i_assignedSubjects_tutorial.t_subject_code 
                            WHERE subjects.sub_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    //for practical...

    public function add_p($p_subject_code, $p_instructor_code){
               
        // insert a new row first
        $this->db->query('INSERT INTO i_assignedSubjects_practical (p_subject_code, p_instructor_code) VALUES (:p_subject_code, :p_instructor_code)');
        $this->db->bind(':p_subject_code', $p_subject_code);
        $this->db->bind(':p_instructor_code', $p_instructor_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    
    }

    public function deleteRow_p($p_instructor_code, $p_subject_code){
        //delete the entire row
        $this->db->query('DELETE FROM i_assignedSubjects_practical WHERE p_instructor_code = :p_instructor_code AND p_subject_code = :p_subject_code');
        $this->db->bind(':p_instructor_code', $p_instructor_code);
        $this->db->bind(':p_subject_code', $p_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
        
    }


    public function forceAssign_p($p_subject_code, $p_instructor_code){
        $this->db->query('UPDATE i_assignedSubjects_practical SET p_instructor_code = :p_instructor_code WHERE p_subject_code = :p_subject_code');
        $this->db->bind(':p_instructor_code', $p_instructor_code);
        $this->db->bind(':p_subject_code', $p_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //for tutorial...

    public function add_t($t_subject_code, $t_instructor_code){
               
        // insert a new row first
        $this->db->query('INSERT INTO i_assignedSubjects_tutorial (t_subject_code, t_instructor_code) VALUES (:t_subject_code, :t_instructor_code)');
        $this->db->bind(':t_subject_code', $t_subject_code);
        $this->db->bind(':t_instructor_code', $t_instructor_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    
    }


    public function deleteRow_t($t_instructor_code, $t_subject_code){
        //delete the entire row
        $this->db->query('DELETE FROM i_assignedSubjects_tutorial WHERE t_instructor_code = :t_instructor_code AND t_subject_code = :t_subject_code');
        $this->db->bind(':t_instructor_code', $t_instructor_code);
        $this->db->bind(':t_subject_code', $t_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
        
    }


    public function forceAssign_t($t_subject_code, $t_instructor_code){
        $this->db->query('UPDATE i_assignedSubjects_tutorial SET t_instructor_code = :t_instructor_code WHERE t_subject_code = :t_subject_code');
        $this->db->bind(':t_instructor_code', $t_instructor_code);
        $this->db->bind(':t_subject_code', $t_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    public function deleteForSubject_p($p_subject_code){
        $this->db->query('DELETE FROM i_assignedSubjects_practical WHERE p_subject_code = :p_subject_code');
        $this->db->bind(':p_subject_code', $p_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }


    public function deleteForSubject_t($t_subject_code){
        $this->db->query('DELETE FROM i_assignedSubjects_tutorial WHERE t_subject_code = :t_subject_code');
        $this->db->bind(':t_subject_code', $t_subject_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }
    
    //deleteForInstructor_p
    public function deleteForInstructor_p($p_instructor_code){
        $this->db->query('DELETE FROM i_assignedSubjects_practical WHERE p_instructor_code = :p_instructor_code');
        $this->db->bind(':p_instructor_code', $p_instructor_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //deleteForInstructor_t
    public function deleteForInstructor_t($t_instructor_code){
        $this->db->query('DELETE FROM i_assignedSubjects_tutorial WHERE t_instructor_code = :t_instructor_code');
        $this->db->bind(':t_instructor_code', $t_instructor_code);

        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }
    


}
