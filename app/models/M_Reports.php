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

    //get Department count Lecturers
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

    //get Assigned Subjects count for Lecturers
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

    //get Lecturer details
    public function getLecturer($l_code){
        $this->db->query('SELECT * FROM lecturers WHERE l_code = :l_code AND l_isDeleted = 0');
        $this->db->bind(':l_code', $l_code);
        $result = $this->db->single();
        return $result;
    }

    //get Instructor details
    public function getInstructors(){
        $this->db->query('SELECT * FROM instructors WHERE i_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    //get Department count Instructors
    public function getDepartmentCountI(){
        $this->db->query('SELECT COUNT(DISTINCT i_department) as department_count FROM instructors WHERE i_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    // get Assigned Instructor count
    public function getAssignedLecturerCountI(){
        $this->db->query('SELECT COUNT(DISTINCT i_code) AS assigned_lec_count 
                          FROM instructors 
                          LEFT JOIN assignedSubjects ON instructors.i_code = assignedSubjects.lecturer_code
                          LEFT JOIN i_assignedSubjects_practical ON instructors.i_code = i_assignedSubjects_practical.p_instructor_code
                          LEFT JOIN i_assignedSubjects_tutorial ON instructors.i_code = i_assignedSubjects_tutorial.t_instructor_code
                          WHERE instructors.i_isDeleted = 0 AND 
                          (assignedSubjects.lecturer_code IS NOT NULL OR 
                          i_assignedSubjects_practical.p_instructor_code IS NOT NULL OR 
                          i_assignedSubjects_tutorial.t_instructor_code IS NOT NULL)');
        $result = $this->db->single();
        return $result;
    }

    //get Assigned Subjects count for Instructors (form assignedSubjects table)
    public function getAssignedSubjectsCountIast(){
        $this->db->query('SELECT COUNT(DISTINCT subjects.sub_code) as assigned_subjects_count_iast 
                          FROM instructors
                          LEFT JOIN assignedSubjects ON instructors.i_code = assignedSubjects.lecturer_code
                          LEFT JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code
                          WHERE subjects.sub_isDeleted = 0 AND instructors.i_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get Assigned Subjects count for Instructors (form i_assignedSubjects_practical table and i_assignedSubjects_tutorial table)
    public function getAssignedSubjectsCountIpt(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) as assigned_subjects_count_ipt 
                          FROM instructors
                          LEFT JOIN i_assignedSubjects_practical ON instructors.i_code = i_assignedSubjects_practical.p_instructor_code
                          LEFT JOIN i_assignedSubjects_tutorial ON instructors.i_code = i_assignedSubjects_tutorial.t_instructor_code
                          LEFT JOIN subjects ON i_assignedSubjects_practical.p_subject_code = subjects.sub_code
                          OR i_assignedSubjects_tutorial.t_subject_code = subjects.sub_code
                          WHERE subjects.sub_isDeleted = 0 AND instructors.i_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }

    //get sum of assigned subjects count for Instructors
    public function getAssignedSubjectsCountI(){
        $assigned_subjects_count_iast = $this->getAssignedSubjectsCountIast();
        $assigned_subjects_count_ipt = $this->getAssignedSubjectsCountIpt();
        $assigned_subjects_count = $assigned_subjects_count_iast->assigned_subjects_count_iast + $assigned_subjects_count_ipt->assigned_subjects_count_ipt;
        return $assigned_subjects_count;
    }

    //get Instructor details
    public function getInstructor($i_code){
        $this->db->query('SELECT * FROM instructors WHERE i_code = :i_code AND i_isDeleted = 0');
        $this->db->bind(':i_code', $i_code);
        $result = $this->db->single();
        return $result;
    }

    //get student count
    public function getStudentCount(){
        $this->db->query('SELECT COUNT(DISTINCT s_id) as student_count FROM students WHERE s_isDeleted = 0');
        $result = $this->db->single();
        return $result;
    }
    
}