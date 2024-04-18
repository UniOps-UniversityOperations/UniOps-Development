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

    //Get all lecturers

    public function getLecturers(){
        $this->db->query('SELECT * FROM lecturers WHERE l_isDeleted = 0 ORDER BY l_id ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    //Get lecturer by id
    public function getLecturerById($id){
        $this->db->query('SELECT * FROM lecturers WHERE l_id = :id AND l_isDeleted = 0');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    // get Lecturer l_nameWithInitials uing the postId(Lecturer code)
    public function getLecturerByCode($l_code){
        $this->db->query('SELECT l_nameWithInitials FROM lecturers WHERE l_code = :l_code AND l_isDeleted = 0');
        $this->db->bind(':l_code', $l_code);
        $row = $this->db->single();
        if (!$row) {
            // No instructor found with the given ID
            return null; // or return an empty array: return [];
        } else {
            return $row;
        }
    }

    // get Lecturer l_email uing the postId(Lecturer code)
    public function getEmail($l_code){
        $this->db->query('SELECT l_email FROM lecturers WHERE l_code = :l_code AND l_isDeleted = 0');
        $this->db->bind(':l_code', $l_code);
        $row = $this->db->single();
        if (!$row) {
            // No instructor found with the given ID
            return null; // or return an empty array: return [];
        } else {
            return $row;
        }
    }


    //Update Lecturer

    public function updateLecturer($data){
        $this->db->query('UPDATE lecturers SET
        l_id = :l_id,
        l_code = :l_code,
        l_email = :l_email,
        l_fullName = :l_fullName,
        l_nameWithInitials = :l_nameWithInitials,
        l_gender = :l_gender,
        l_dob = :l_dob,
        l_contactNumber = :l_contactNumber,
        l_address = :l_address,
        l_department = :l_department,
        l_positionRank = :l_positionRank,
        l_dateOfJoin = :l_dateOfJoin,
        l_qualifications = :l_qualifications,
        l_isExamSupervisor = :l_isExamSupervisor,
        l_isSecondExaminar = :l_isSecondExaminar
        WHERE l_id = :l_id
        ');

        //Bind Values
        $this->db->bind(':l_id', $data['l_id']);
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

    
    //Delete Lecturer
    public function deleteLecturer($id){
        $this->db->query('UPDATE lecturers SET l_isDeleted = 1 WHERE l_id = :id');
        //Bind Values
        $this->db->bind(':id', $id);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getCount(){
        $this->db->query('SELECT COUNT(*) AS count FROM lecturers WHERE l_isDeleted = 0');
        $row = $this->db->single();
        return $row;
    }


}


/*
    Structure of the database table:

    table name: lecturers

    l_id 
    l_code 
    l_email 
    l_fullName 
    l_nameWithInitials 
    l_gender 
    l_dob 
    l_contactNumber 
    l_address 
    l_department 
    l_positionRank 
    l_dateOfJoin 
    l_qualifications
    l_isExamSupervisor 
    l_isSecondExaminar 
    l_lectureHrs
*/