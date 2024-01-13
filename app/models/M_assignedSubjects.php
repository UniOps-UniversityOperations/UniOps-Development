<?php

class M_assignedSubjects{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT assignedSubjects.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits 
                            FROM assignedSubjects 
                            INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code 
                            WHERE assignedSubjects.isDeleted = 0 AND assignedSubjects.lecturer_code = :code');
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
        // // Check if there is a deleted row with the same subject_code and lecturer_code
        // $this->db->query('UPDATE assignedSubjects SET isDeleted = 0 WHERE subject_code = :sub_code AND lecturer_code = :lecturer_code AND isDeleted = 1');
        // $this->db->bind(':sub_code', $sub_code);
        // $this->db->bind(':lecturer_code', $lecturer_code);

        // if ($this->db->execute()) {
        //     // If there was a deleted row, it has been updated
        //     return true;
        // } else {
        //     // If no row was updated, insert a new row
        //     $this->db->query('INSERT INTO assignedSubjects (subject_code, lecturer_code) SELECT :sub_code, :lecturer_code WHERE NOT EXISTS (SELECT * FROM assignedSubjects WHERE subject_code = :sub_code AND lecturer_code = :lecturer_code)');
        //     $this->db->bind(':sub_code', $sub_code);
        //     $this->db->bind(':lecturer_code', $lecturer_code);

        //     if ($this->db->execute()) {
        //         // If a new row was inserted
        //         return true;
        //     } else {
        //         // If the insert failed
        //         return false;
        //     }
        // }

        // Ccall search() to check if there is a deleted row with the same subject_code and lecturer_code
        $results = $this->search($sub_code, $lecturer_code);

        if($results){
            //Update the deleted row
            $this->db->query('UPDATE assignedSubjects SET isDeleted = 0 WHERE subject_code = :sub_code AND lecturer_code = :lecturer_code AND isDeleted = 1');
            $this->db->bind(':sub_code', $sub_code);
            $this->db->bind(':lecturer_code', $lecturer_code);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }else{
            // Try to insert a new row first
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