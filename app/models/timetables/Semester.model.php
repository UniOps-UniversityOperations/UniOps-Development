<?php

class Semester extends Model
{

    protected $table = "semester";
    public $errors = [];

    protected $after_select = [

        // 'get_academic_year',
        // 'get_degree_name',
        // 'get_year',
        // 'get_semester',
    ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        'semester',
        'is_disabled',
    ];

    public function add_semester($data) {
        $this->db->query('INSERT INTO semester (
            semester,
            is_disabled,
            ) VALUES (
                :semester,
                :is_disabled,
                )');
        //Bind values
        $this->db->bind(':semester', $data['semester']);
        $this->db->bind(':is_disabled', $data['is_disabled']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    function get_current_academic_year() {

        $query = "SELECT * FROM academic_years ORDER BY academic_year DESC LIMIT 1 ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        $result = $result[0]->academic_year;
        // show($result);die;

        return $result;
    }


    function get_current_academic_year_id() {

        $query = "SELECT * FROM academic_years ORDER BY academic_year DESC LIMIT 1 ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        $result = $result[0]->id;
        // show($result);die;

        return $result;
    }

}
