<?php

class Academic_Year
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected $table = "academic_years";
    public $errors = [];

    // protected $after_select = [

    //     'get_academic_year',
    //     'get_degree_name',
    //     'get_year',
    //     'get_semester',
    // ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        'academic_year',
        'year_start_date',
        'year_end_date',
        'is_disabled',
    ];

    public function add_academic_year($data) {
        $this->db->query('INSERT INTO academic_years (
            academic_year,
            year_start_date,
            year_end_date,
            is_disabled,
            ) VALUES (
                :academic_year,
                :year_start_date,
                :year_end_date,
                :is_disabled,
                )');
        //Bind values
        $this->db->bind(':academic_year', $data['academic_year']);
        $this->db->bind(':year_start_date', $data['year_start_date']);
        $this->db->bind(':year_end_date', $data['year_end_date']);
        $this->db->bind(':is_disabled', $data['is_disabled']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    public function getAcademicYears() {

        $query = "SELECT * FROM academic_years";
        $this->db->query($query);

        $results = $this->db->resultSet();

        return $results;
    }

    function get_current_academic_year() {

        $query = "SELECT * FROM academic_years ORDER BY academic_year DESC LIMIT 1 ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        $result = $result[0]->academic_year;

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

