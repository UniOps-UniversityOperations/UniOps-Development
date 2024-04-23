<?php

class M_Reports{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get Lecturers details
    public function getLecturers(){
        $this->db->query('SELECT * FROM lecturers WHERE l_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    //get Department count
    public function getDepartmentCount(){
        $this->db->query('SELECT COUNT(DISTINCT l_department) as department_count FROM lecturers WHERE l_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get Assigned Lecturer count
    public function getAssignedLecturerCount(){
        $this->db->query('SELECT COUNT(DISTINCT l_code) AS assigned_lec_count 
                          FROM lecturers 
                          INNER JOIN assignedSubjects ON lecturers.l_code = assignedSubjects.lecturer_code
                          WHERE lecturers.l_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get Total Subjects count
    public function getTotalSubjectsCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) as total_subjects_count FROM subjects WHERE sub_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get Assigned Subjects count
    public function getAssignedSubjectsCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) as assigned_subjects_count FROM assignedSubjects
                            INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code
                            WHERE subjects.sub_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get Lecturer variables
    public function getVariables(){
        $this->db->query('SELECT * FROM variables');
        $results = $this->db->resultSet();
        return $results;
    }

}