<?php

class M_Instructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function createInstructor($data){
        $this->db->query('INSERT INTO instructors(
            i_code,
            i_email,
            i_fullName,
            i_nameWithInitials,
            i_gender,
            i_dob,
            i_contactNumber,
            i_address,
            i_department,
            i_positionRank,
            i_dateOfJoin,
            i_qualifications,
            i_isExamInvigilator
            ) VALUES (
                :i_code,
                :i_email,
                :i_fullName,
                :i_nameWithInitials,
                :i_gender,
                :i_dob,
                :i_contactNumber,
                :i_address,
                :i_department,
                :i_positionRank,
                :i_dateOfJoin,
                :i_qualifications,
                :i_isExamInvigilator
                )');
            // Bind values
            $this->db->bind(':i_code', $data['i_code']);
            $this->db->bind(':i_email', $data['i_email']);
            $this->db->bind(':i_fullName', $data['i_fullName']);
            $this->db->bind(':i_nameWithInitials', $data['i_nameWithInitials']);
            $this->db->bind(':i_gender', $data['i_gender']);
            $this->db->bind(':i_dob', $data['i_dob']);
            $this->db->bind(':i_contactNumber', $data['i_contactNumber']);
            $this->db->bind(':i_address', $data['i_address']);
            $this->db->bind(':i_department', $data['i_department']);
            $this->db->bind(':i_positionRank', $data['i_positionRank']);
            $this->db->bind(':i_dateOfJoin', $data['i_dateOfJoin']);
            $this->db->bind(':i_qualifications', $data['i_qualifications']);
            $this->db->bind(':i_isExamInvigilator', $data['i_isExamInvigilator']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        
    }

    public function getInstructors(){
        $this->db->query('SELECT * FROM instructors WHERE i_isDeleted = 0');

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
            i_code = :i_code, 
            i_email = :i_email, 
            i_fullName = :i_fullName,
            i_nameWithInitials = :i_nameWithInitials,
            i_gender = :i_gender,
            i_dob = :i_dob,
            i_contactNumber = :i_contactNumber,
            i_address = :i_address,
            i_department = :i_department,
            i_positionRank = :i_positionRank,
            i_dateOfJoin = :i_dateOfJoin,
            i_qualifications = :i_qualifications,
            i_isExamInvigilator = :i_isExamInvigilator
            WHERE i_id = :i_id');

        // Bind values
        $this->db->bind(':i_id', $data['i_id']);
        $this->db->bind(':i_code', $data['i_code']);
        $this->db->bind(':i_email', $data['i_email']);
        $this->db->bind(':i_fullName', $data['i_fullName']);
        $this->db->bind(':i_nameWithInitials', $data['i_nameWithInitials']);
        $this->db->bind(':i_gender', $data['i_gender']);
        $this->db->bind(':i_dob', $data['i_dob']);
        $this->db->bind(':i_contactNumber', $data['i_contactNumber']);
        $this->db->bind(':i_address', $data['i_address']);
        $this->db->bind(':i_department', $data['i_department']);
        $this->db->bind(':i_positionRank', $data['i_positionRank']);
        $this->db->bind(':i_dateOfJoin', $data['i_dateOfJoin']);
        $this->db->bind(':i_qualifications', $data['i_qualifications']);
        $this->db->bind(':i_isExamInvigilator', $data['i_isExamInvigilator']);        

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteInstructor($id){
        $this->db->query('UPDATE instructors SET i_isDeleted = 1 WHERE i_id = :i_id');

        // Bind values
        $this->db->bind(':i_id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function getCount(){
        $this->db->query('SELECT COUNT(*) AS count FROM instructors WHERE i_isDeleted = 0');
        $row = $this->db->single();
        return $row;
    }
}

/*
    Structure of the database table:
    1	i_id Primary	int(11)				
	2	i_code	varchar(50)		
	3	i_email	varchar(50)		
	4	i_fullName	varchar(50)		
	5	i_nameWithInitials	varchar(50)	
	6	i_gender	char(1)
	7	i_dob	date		
	8	i_contactNumber	varchar(20)	
	9	i_address	varchar(255)		
	10	i_department	varchar(50)		
	11	i_positionRank	varchar(50)		
	12	i_dateOfJoin	date	
	13	i_qualifications	text	
	14	i_isExamInvigilator	tinyint(4)	
	15	i_isDeleted	tinyint(4)			
*/

