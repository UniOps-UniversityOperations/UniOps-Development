<?php

class Degree_Name extends Model
{

    protected $table = "degree_names";
    public $errors = [];

    protected $after_select = [

        // 'get_academic_year',
        // 'get_degree_name',
        // 'get_year',
        // 'get_semester',
    ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        'degree_name',
        'is_disabled',
    ];

    public function add_degree_name($data) {
        $this->db->query('INSERT INTO degree_names (
            degree_name,
            is_disabled,
            ) VALUES (
                :degree_name,
                :is_disabled,
            )');
        //Bind values
        $this->db->bind(':degree_name', $data['degree_name']);
        $this->db->bind(':is_disabled', $data['is_disabled']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    
    public function get_available_degree_names($id) {

        $table = 'years';
        $row = $this->get_name($id, $table);

        // $degree_name = $row[0]->degree_name;
        $year = $row[0]->student_year;

        define("TABLE_DEGREE_NAMES", "degree_names");
        define("DEGREE_NAME", "degree_name");
        define("1ST_YEAR", "1st year");
        define("2ND_YEAR", "2nd year");
        define("THIRD_YEAR", "3rd year");
        define("FOURTH_YEAR", "4th year");

        $values = [];

        if($year == '1st year' || $year == '2nd year') {
            $query = 'select * from '. TABLE_DEGREE_NAMES . ' where ' . DEGREE_NAME . '  = "BSc. in Computer Science" or '. DEGREE_NAME . ' = "BSc. in Information Systems"';
            $this->db->query($query);
            $results = $this->db->resultSet();


            foreach($results as $result) {

                $values[] = [$result->id, $result->degree_name];
            }

            return $values;
        }
        else if($year == THIRD_YEAR) {
            $query = 'select * from '. TABLE_DEGREE_NAMES . ' where ' . DEGREE_NAME . '  = "BSc. in Computer Science" or '. DEGREE_NAME . ' = "BSc. in Information Systems"
            or ' . DEGREE_NAME . ' = "BSc. Hons in Computer Science" or ' . DEGREE_NAME . ' = "BSc. Hons in Software Engineering" or ' . DEGREE_NAME . ' = "BSc. Hons in Information Systems";';
            $this->db->query($query);
            $results = $this->db->resultSet();

            foreach($results as $result) {

                $values[] = [$result->id, $result->degree_name];
            }

            return $values;
        }
        else if($year == FOURTH_YEAR) {
            $query = 'select * from '. TABLE_DEGREE_NAMES . ' where ' . DEGREE_NAME . ' = "BSc. Hons in Computer Science" or ' . DEGREE_NAME . ' = "BSc. Hons in Software Engineering" or ' . DEGREE_NAME . ' = "BSc. Hons in Information Systems";';
            $this->db->query($query);
            $results = $this->db->resultSet();

            foreach($results as $result) {

                $values[] = [$result->id, $result->degree_name];
            }

            return $values;
        }
    }

}
