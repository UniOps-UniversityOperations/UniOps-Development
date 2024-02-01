<?php

class M_variables{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get "lecturer_max_lec_hrs" and "lec_hrs_per_credit" 
    public function ASPage(){
        $this->db->query('SELECT * FROM variables WHERE v_name = "lecturer_max_lec_hrs" OR v_name = "lec_hrs_per_credit"');
        $results = $this->db->resultSet();
        return $results;
    }

    //Get all data
    public function getAll(){
        $this->db->query('SELECT * FROM variables');
        $results = $this->db->resultSet();
        return $results;
    }


}

/*
    The Column names are:
    v_id
    v_name
    v_value
*/