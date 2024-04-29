<?php

class Lecture_Bookings extends Model
{

    protected $table = "lecturebookings";
    public $errors = [];

    protected $after_select = [

        // 'get_academic_year',
        // 'get_degree_name',
        // 'get_year',
        // 'get_semester',
    ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        'r_id',
        'day_of_week',
        'start_time',
        'end_time',
        'subject',
        'type'
    ];

    public function add_degree_name($data) {
        $this->db->query('INSERT INTO lecturebookings (
            r_id,
            day_of_week,
            start_time,
            end_time,
            subject,
            type
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

    
    

}
