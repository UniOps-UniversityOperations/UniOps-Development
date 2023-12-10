<?php

class M_Lecturer{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    //Create Lecturer
    public function createLecturer($data){
        $this->db->query('INSERT INTO lecturers (
            l_code,
            l_email,
            l_fullName,
            l_nameWithInitials,
            l_gender,
            l_dob,
            l_contactNumber,
            l_address,
            l_department,
            l_positionRank,
            l_dateOfJoin,
            l_qualifications,
            l_isExamSupervisor,
            l_isSecondExaminar
        ) VALUES (
            :l_code,
            :l_email,
            :l_fullName,
            :l_nameWithInitials,
            :l_gender,
            :l_dob,
            :l_contactNumber,
            :l_address,
            :l_department,
            :l_positionRank,
            :l_dateOfJoin,
            :l_qualifications,
            :l_isExamSupervisor,
            :l_isSecondExaminar
        )');

        //Bind Values
        $this->db->bind(':l_code', $data['l_code']);
        $this->db->bind(':l_email', $data['l_email']);
        $this->db->bind(':l_fullName', $data['l_fullName']);
        $this->db->bind(':l_nameWithInitials', $data['l_nameWithInitials']);
        $this->db->bind(':l_gender', $data['l_gender']);
        $this->db->bind(':l_dob', $data['l_dob']);
        $this->db->bind(':l_contactNumber', $data['l_contactNumber']);
        $this->db->bind(':l_address', $data['l_address']);
        $this->db->bind(':l_department', $data['l_department']);
        $this->db->bind(':l_positionRank', $data['l_positionRank']);
        $this->db->bind(':l_dateOfJoin', $data['l_dateOfJoin']);
        $this->db->bind(':l_qualifications', $data['l_qualifications']);
        $this->db->bind(':l_isExamSupervisor', $data['l_isExamSupervisor']);
        $this->db->bind(':l_isSecondExaminar', $data['l_isSecondExaminar']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getLecturers(){
        $this->db->query('SELECT * FROM lecturers');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getLecturerById($id){
        $this->db->query('SELECT * FROM lecturers WHERE l_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateLecturer($data){
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
    }

    public function deleteLecturer($id){
        $this->db->query('DELETE FROM lecturers WHERE l_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}


/*
    Structure of the database table:
        l_id
        l_name
        l_email
        l_sub1_code
        l_sub2_code
        l_sub3_code
        l_exp1_code
        l_exp2_code
        l_exp3_code
        l_second_examinar_s_code
        l_is_exam_supervisor
*/

