<?php

class Year extends Model
{

    protected $table = "years";
    public $errors = [];

    protected $after_select = [

    ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        'student_year',
        'is_disabled',
    ];

    public function add_year($data) {
        $this->db->query('INSERT INTO years (
            student_year,
            is_disabled,
            ) VALUES (
                :student_year,
                :is_disabled,
                )');
        //Bind values
        $this->db->bind(':student_year', $data['student_year']);
        $this->db->bind(':is_disabled', $data['is_disabled']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }


    public function get_available_years($id) {

        $table = 'degree_names';
        $row = $this->get_name($id, $table);

        // $degree_name = $row[0]->degree_name;
        $existing_years = $row[0]->num_of_existing_years;

        $values = [];

        if($existing_years == 2) {
            $query = 'select * from years where student_year = "3rd year" or student_year = "4th year"';
            $this->db->query($query);
            $results = $this->db->resultSet();

            foreach($results as $result) {

                $values[] = [$result->id, $result->student_year];
            }

            return $values;
        }
        else if($existing_years == 3) {
            $query = 'select * from years where student_year = "1st year" or student_year = "2nd year" or student_year = "3rd year"';
            $this->db->query($query);
            $results = $this->db->resultSet();

            foreach($results as $result) {
                $values[] = [$result->id, $result->student_year];
            }

            return $values;
        }
    }

}
