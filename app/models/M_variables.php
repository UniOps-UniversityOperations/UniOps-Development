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
        $this->db->query('SELECT * FROM variables ORDER BY v_id');
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
                            WHEN v_name = "n_1_yr_cs" THEN :n_1_yr_cs
                            WHEN v_name = "n_2_yr_cs" THEN :n_2_yr_cs
                            WHEN v_name = "n_3_yr_cs" THEN :n_3_yr_cs
                            WHEN v_name = "n_4_yr_cs" THEN :n_4_yr_cs
                            WHEN v_name = "n_1_yr_is" THEN :n_1_yr_is
                            WHEN v_name = "n_2_yr_is" THEN :n_2_yr_is
                            WHEN v_name = "n_3_yr_is" THEN :n_3_yr_is
                            WHEN v_name = "n_4_yr_is" THEN :n_4_yr_is
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
        $this->db->bind(':n_1_yr_cs', $data['n_1_yr_cs']);
        $this->db->bind(':n_2_yr_cs', $data['n_2_yr_cs']);
        $this->db->bind(':n_3_yr_cs', $data['n_3_yr_cs']);
        $this->db->bind(':n_4_yr_cs', $data['n_4_yr_cs']);
        $this->db->bind(':n_1_yr_is', $data['n_1_yr_is']);
        $this->db->bind(':n_2_yr_is', $data['n_2_yr_is']);
        $this->db->bind(':n_3_yr_is', $data['n_3_yr_is']);
        $this->db->bind(':n_4_yr_is', $data['n_4_yr_is']);

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
    // 'lecturer_max_lec_hrs' => $vars[0]->v_value,
    // 'lec_hrs_per_credit' => $vars[1]->v_value,
    // 'practcal_hrs_per_credit' => $vars[2]->v_value,
    // 'tutorial_hrs_per_credit' => $vars[3]->v_value,
    // 'instructor_max_practical_hrs' => $vars[4]->v_value,
    // 'instructor_max_tutorial_hrs' => $vars[5]->v_value,
    // 'max_students_per_lecturer' => $vars[6]->v_value,
    // 'instructor_max_students_lecturer' => $vars[7]->v_value,
    // 'instructor_max_students_practical' => $vars[8]->v_value,
    // 'instructor_max_students_tutorial' => $vars[9]->v_value,
    // 'n_1_yr_cs' => $vars[10]->v_value,
    // 'n_2_yr_cs' => $vars[11]->v_value,
    // 'n_3_yr_cs' => $vars[12]->v_value,
    // 'n_4_yr_cs' => $vars[13]->v_value,
    // 'n_1_yr_is' => $vars[14]->v_value,
    // 'n_2_yr_is' => $vars[15]->v_value,
    // 'n_3_yr_is' => $vars[16]->v_value,
    // 'n_4_yr_is' => $vars[17]->v_value,