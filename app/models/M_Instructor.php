<?php

class M_Instructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

        public function createInstructor($data){
            $this->db->query('INSERT INTO instructors(
                i_name, 
                i_email, 
                i_sub1_code, 
                i_sub2_code, 
                i_sub3_code, 
                i_exp1_code, 
                i_exp2_code, 
                i_exp3_code
                ) VALUES (
                    :i_name, 
                    :i_email, 
                    :i_sub1_code, 
                    :i_sub2_code, 
                    :i_sub3_code, 
                    :i_exp1_code, 
                    :i_exp2_code, 
                    :i_exp3_code
                    )');
                // Bind values
                $this->db->bind(':i_name', $data['i_name']);
                $this->db->bind(':i_email', $data['i_email']);
                $this->db->bind(':i_sub1_code', $data['i_sub1_code']);
                $this->db->bind(':i_sub2_code', $data['i_sub2_code']);
                $this->db->bind(':i_sub3_code', $data['i_sub3_code']);
                $this->db->bind(':i_exp1_code', $data['i_exp1_code']);
                $this->db->bind(':i_exp2_code', $data['i_exp2_code']);
                $this->db->bind(':i_exp3_code', $data['i_exp3_code']);

                // Execute
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            
        }

    public function getInstructors(){
        $this->db->query('SELECT * FROM instructors');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getInstructorById($id){
        $this->db->query('SELECT * FROM instructors WHERE i_id = :i_id');

        $this->db->bind(':i_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateInstructor($data){
        $this->db->query('UPDATE instructors SET 
            i_id = :i_id,
            i_name = :i_name, 
            i_email = :i_email, 
            i_sub1_code = :i_sub1_code, 
            i_sub2_code = :i_sub2_code, 
            i_sub3_code = :i_sub3_code, 
            i_exp1_code = :i_exp1_code, 
            i_exp2_code = :i_exp2_code, 
            i_exp3_code = :i_exp3_code
            WHERE i_id = :i_id');

        // Bind values
        $this->db->bind(':i_id', $data['i_id']);
        $this->db->bind(':i_name', $data['i_name']);
        $this->db->bind(':i_email', $data['i_email']);
        $this->db->bind(':i_sub1_code', $data['i_sub1_code']);
        $this->db->bind(':i_sub2_code', $data['i_sub2_code']);
        $this->db->bind(':i_sub3_code', $data['i_sub3_code']);
        $this->db->bind(':i_exp1_code', $data['i_exp1_code']);
        $this->db->bind(':i_exp2_code', $data['i_exp2_code']);
        $this->db->bind(':i_exp3_code', $data['i_exp3_code']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteInstructor($id){
        $this->db->query('DELETE FROM instructors WHERE i_id = :i_id');

        // Bind values
        $this->db->bind(':i_id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}

/*
    Structure of the database table:
        i_id
        i_name
        i_email
        i_sub1_code
        i_sub2_code
        i_sub3_code
        i_exp1_code
        i_exp2_code
        i_exp3_code
*/

