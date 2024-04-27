<?php

class M_variables{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get "lecturer_max_lec_hrs" and "lec_hrs_per_credit" 
    public function ASPage(){
        $this->db->query('SELECT * FROM variables WHERE v_name = "lecturer_max_lec_hrs" OR v_name = "lec_hrs_per_credit" OR v_name = "max_students_per_lecturer"');
        $results = $this->db->resultSet();
        return $results;
    }

    //Get all data
    public function getAll(){
        $this->db->query('SELECT * FROM variables');
        $results = $this->db->resultSet();
        return $results;
    }

    //Edit / Update Variables
    public function updateVariables($data){
        $this->db->query('UPDATE variables
        SET v_value = CASE  WHEN  v_name = "lecturer_max_lec_hrs" THEN :lecturer_max_lec_hrs
                            WHEN v_name = "lec_hrs_per_credit" THEN :lec_hrs_per_credit
                            WHEN v_name = "practcal_hrs_per_credit" THEN :practcal_hrs_per_credit
                            WHEN v_name = "tutorial_hrs_per_credit" THEN :tutorial_hrs_per_credit
                            WHEN v_name = "instructor_max_practical_hrs" THEN :instructor_max_practical_hrs
                            WHEN v_name = "instructor_max_tutorial_hrs" THEN :instructor_max_tutorial_hrs
                            WHEN v_name = "max_students_per_lecturer" THEN :max_students_per_lecturer
                            WHEN v_name = "instructor_max_students_lecturer" THEN :instructor_max_students_lecturer
                            WHEN v_name = "instructor_max_students_practical" THEN :instructor_max_students_practical
                            WHEN v_name = "instructor_max_students_tutorial" THEN :instructor_max_students_tutorial
        END');
        //bind values
        $this->db->bind(':lecturer_max_lec_hrs', $data['lecturer_max_lec_hrs']);
        $this->db->bind(':lec_hrs_per_credit', $data['lec_hrs_per_credit']);
        $this->db->bind(':practcal_hrs_per_credit', $data['practcal_hrs_per_credit']);
        $this->db->bind(':tutorial_hrs_per_credit', $data['tutorial_hrs_per_credit']);
        $this->db->bind(':instructor_max_practical_hrs', $data['instructor_max_practical_hrs']);
        $this->db->bind(':instructor_max_tutorial_hrs', $data['instructor_max_tutorial_hrs']);
        $this->db->bind(':max_students_per_lecturer', $data['max_students_per_lecturer']);
        $this->db->bind(':instructor_max_students_lecturer', $data['instructor_max_students_lecturer']);
        $this->db->bind(':instructor_max_students_practical', $data['instructor_max_students_practical']);
        $this->db->bind(':instructor_max_students_tutorial', $data['instructor_max_students_tutorial']);

        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
        
    }

}

/*
    The Column names are:
    v_id
    v_name
    v_value
*/

// values are
//     'lecturer_max_lec_hrs' => trim($_POST['lecturer_max_lec_hrs']) > 0 ? trim($_POST['lecturer_max_lec_hrs']) : 0,
//     'lec_hrs_per_credit' => trim($_POST['lec_hrs_per_credit']) > 0 ? trim($_POST['lec_hrs_per_credit']) : 0,
//     'practcal_hrs_per_credit' => trim($_POST['practcal_hrs_per_credit']) > 0 ? trim($_POST['practcal_hrs_per_credit']) : 0,
//     'tutorial_hrs_per_credit' => trim($_POST['tutorial_hrs_per_credit']) > 0 ? trim($_POST['tutorial_hrs_per_credit']) : 0,
//     'instructor_max_practical_hrs' => trim($_POST['instructor_max_practical_hrs']) > 0 ? trim($_POST['instructor_max_practical_hrs']) : 0,
//     'instructor_max_tutorial_hrs' => trim($_POST['instructor_max_tutorial_hrs']) > 0 ? trim($_POST['instructor_max_tutorial_hrs']) : 0,
//     'max_students_per_lecturer' => trim($_POST['max_students_per_lecturer']) > 0 ? trim($_POST['max_students_per_lecturer']) : 0,
//     'instructor_max_students_lecturer' => trim($_POST['instructor_max_students_lecturer']) > 0 ? trim($_POST['instructor_max_students_lecturer']) : 0,
//     'instructor_max_students_practical' => trim($_POST['instructor_max_students_practical']) > 0 ? trim($_POST['instructor_max_students_practical']) : 0,
//     'instructor_max_students_tutorial' => trim($_POST['instructor_max_students_tutorial']) > 0 ? trim($_POST['instructor_max_students_tutorial']) : 0,