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

    //getCS1yrSubjectCount
    public function getCS1yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS cs_1yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 1
                             AND sub_stream = "CS"');
        $result = $this->db->single();
        return $result;
    }

    //getCS2yrSubjectCount
    public function getCS2yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS cs_2yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 2
                             AND sub_stream = "CS"');
        $result = $this->db->single();
        return $result;
    }

    //getCS3yrSubjectCount
    public function getCS3yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS cs_3yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 3
                             AND sub_stream = "CS"');
        $result = $this->db->single();
        return $result;
    }
    
    //getCS4yrSubjectCount
    public function getCS4yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS cs_4yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 4
                             AND sub_stream = "CS"');
        $result = $this->db->single();
        return $result;
    }

    //getIS1yrSubjectCount
    public function getIS1yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS is_1yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 1
                             AND sub_stream = "IS"');
        $result = $this->db->single();
        return $result;
    }

    //getIS2yrSubjectCount
    public function getIS2yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS is_2yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 2
                             AND sub_stream = "IS"');
        $result = $this->db->single();
        return $result;
    }

    //getIS3yrSubjectCount
    public function getIS3yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS is_3yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 3
                             AND sub_stream = "IS"');
        $result = $this->db->single();
        return $result;
    }

    //getIS4yrSubjectCount
    public function getIS4yrSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS is_4yr_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_year = 4
                             AND sub_stream = "IS"');
        $result = $this->db->single();
        return $result;
    }

    //getSem1SubjectCount
    public function getSem1SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS sem1_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_semester = 1');
        $result = $this->db->single();
        return $result;
    }

    //getSem2SubjectCount
    public function getSem2SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS sem2_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_semester = 2');
        $result = $this->db->single();
        return $result;
    }

    //getSem1and2SubjectCount
    public function getSem1and2SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS sem1and2_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_semester = 0');
        $result = $this->db->single();
        return $result;
    }

    //getCoreSubjectCount
    public function getCoreSubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS core_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_isCore = 1');
        $result = $this->db->single();
        return $result;
    }

    //getCredit1SubjectCount
    public function getCredit1SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS credit1_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_credits = 1');
        $result = $this->db->single();
        return $result;
    }

    //getCredit2SubjectCount
    public function getCredit2SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS credit2_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_credits = 2');
        $result = $this->db->single();
        return $result;
    }

    //getCredit3SubjectCount
    public function getCredit3SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS credit3_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_credits = 3');
        $result = $this->db->single();
        return $result;
    }

    //getCredit4SubjectCount
    public function getCredit4SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS credit4_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_credits = 4');
        $result = $this->db->single();
        return $result;
    }

    //getCredit8SubjectCount
    public function getCredit8SubjectCount(){
        $this->db->query('SELECT COUNT(DISTINCT sub_code) AS credit8_sub_count
                             FROM subjects 
                             WHERE sub_isDeleted = 0 
                             AND sub_credits = 8');
        $result = $this->db->single();
        return $result;
    }

    //getRooms
    public function getRooms(){
        $this->db->query('SELECT * FROM rooms WHERE r_isDeleted = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    // getLecturerCodefromEmail
    public function getLecturerCodefromEmail($email){
        $this->db->query('SELECT l_code FROM lecturers WHERE l_email = :email AND l_isDeleted = 0');
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result;
    }

    //setReportLogin set data as LOGIN
    public function setReportLogin($user_id, $role){
        $this->db->query('INSERT INTO user_log_report(user_id, user_role, data) VALUES(:user_id, :role, "LOGIN")');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':role', $role);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    //getLogs
    public function getLogs(){
        $this->db->query('SELECT * FROM user_log_report ORDER BY id');
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function numofLecHours($l_email) {
        $sql = 'SELECT
        day_of_week,
        SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time))/60 AS total_hours
        FROM
            lecturertimetables
        WHERE
            l_code = :l_email
        GROUP BY
            day_of_week
        ORDER BY
            FIELD(day_of_week, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        ';

        $this->db->query($sql);
        // $this->db->bind(':l_email',$_SESSION['user_id']);
        $this->db->bind(':l_email',$l_email);
        $result = $this->db->resultSet();

        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    //getEmailfromLecturerCode
    public function getEmailfromLecturerCode($l_code){
        $this->db->query('SELECT l_email FROM lecturers WHERE l_code = :l_code AND l_isDeleted = 0');
        $this->db->bind(':l_code', $l_code);
        $result = $this->db->single();
        return $result;
    }


}