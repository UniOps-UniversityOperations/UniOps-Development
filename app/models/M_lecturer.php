<?php

class M_Lecturer{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function viewProfile($id){
        $this->db->query('SELECT * FROM lecturers WHERE l_id = 1');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

/*     public function updateLecturer($data){
        $this->db->query('UPDATE lecturers SET
            l_id = :l_id,
            l_name = :l_name,
            l_email = :l_email,
            l_sub1_code = :l_sub1_code,
            l_sub2_code = :l_sub2_code,
            l_sub3_code = :l_sub3_code,
            l_exp1_code = :l_exp1_code,
            l_exp2_code = :l_exp2_code,
            l_exp3_code = :l_exp3_code,
            l_second_examinar_s_code = :l_second_examinar_s_code,
            l_is_exam_supervisor = :l_is_exam_supervisor
            WHERE l_id = :l_id
        ');
        // Bind values
        $this->db->bind(':l_id', $data['l_id']);
        $this->db->bind(':l_name', $data['l_name']);
        $this->db->bind(':l_email', $data['l_email']);
        $this->db->bind(':l_sub1_code', $data['l_sub1_code']);
        $this->db->bind(':l_sub2_code', $data['l_sub2_code']);
        $this->db->bind(':l_sub3_code', $data['l_sub3_code']);
        $this->db->bind(':l_exp1_code', $data['l_exp1_code']);
        $this->db->bind(':l_exp2_code', $data['l_exp2_code']);
        $this->db->bind(':l_exp3_code', $data['l_exp3_code']);
        $this->db->bind(':l_second_examinar_s_code', $data['l_second_examinar_s_code']);
        $this->db->bind(':l_is_exam_supervisor', $data['l_is_exam_supervisor']);    
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    } */



}