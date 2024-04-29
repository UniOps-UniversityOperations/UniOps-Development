<?php

class Timetable_Model extends Model
{

    protected $table = "timetables";
    public $errors = [];

    protected $after_select = [

        'get_academic_year',
        'get_degree_name',
        'get_year',
        'get_semester',
    ];

    protected $before_update = [];

    protected $allowed_columns = [
        
        // 'user_id',
        'academic_year_id',
        'degree_name_id',
        'year_id',
        'semester_id',
        // 'degree_id',
        // 'num_of_students',
        // 'num_of_courses',
        'added_date',
    ];


    public function add_timetables($data) {
        $this->db->query('INSERT INTO timetables (
            academic_year,
            degree_name,
            year,
            semester,
            added_date
            ) VALUES (
                :academic_year_id,
                :degree_name_id,
                :year_id,
                :semester_id,
                :added_date
                )');
        //Bind values
        $this->db->bind(':academic_year_id', $data['academic_year_id']);
        $this->db->bind(':degree_name_id', $data['degree_name_id']);
        $this->db->bind(':year_id', $data['year_id']);
        $this->db->bind(':semester_id', $data['semester_id']);
        $this->db->bind(':added_date', $data['added_date']);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }


    public function validate($data)
    {
        if(empty($data['academic_year_id']))
        {
            $this->errors['academic_year_id'] = "Academic Year is required";
        }
        if(empty($data['degree_name_id']))
        {
            $this->errors['degree_name_id'] = "Degree Name is required";
        }
        if(empty($data['year_id']))
        {
            $this->errors['year_id'] = "Year is required";
        }
        if(empty($data['semester_id']))
        {
            $this->errors['semester_id'] = "Semester is required";
        }
        // if(empty($data['num_of_students']))
        // {
        //     $this->errors['num_of_students'] = "Number of students is required";
        // }
        // if(empty($data['num_of_courses']))
        // {
        //     $this->errors['num_of_courses'] = "Number of courses is required";
        // }
        


        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }

    public function getTimetables(){
        
        $this->db->query('SELECT * FROM timetables');

        $results = $this->db->resultSet();

        return $results;
    }

        public function updateRoom($data){
            $this->db->query('UPDATE rooms SET 
                id = :id,
                name = :name,
                type = :type,
                capacity = :capacity,
                current_availability = :current_availability,
                no_of_tables = :no_of_tables,
                no_of_chairs = :no_of_chairs,
                no_of_boards = :no_of_boards,
                no_of_projectors = :no_of_projectors,
                no_of_computers = :no_of_computers,
                is_ac = :is_ac,
                is_wifi = :is_wifi,
                is_media = :is_media,
                is_lecture = :is_lecture,
                is_lab = :is_lab,
                is_tutorial = :is_tutorial,
                is_meeting = :is_meeting,
                is_seminar = :is_seminar,
                is_exam = :is_exam
                WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':current_availability', $data['current_availability']);
            $this->db->bind(':no_of_tables', $data['no_of_tables']);
            $this->db->bind(':no_of_chairs', $data['no_of_chairs']);
            $this->db->bind(':no_of_boards', $data['no_of_boards']);
            $this->db->bind(':no_of_projectors', $data['no_of_projectors']);
            $this->db->bind(':no_of_computers', $data['no_of_computers']);
            $this->db->bind(':is_ac', $data['is_ac']);
            $this->db->bind(':is_wifi', $data['is_wifi']);
            $this->db->bind(':is_media', $data['is_media']);
            $this->db->bind(':is_lecture', $data['is_lecture']);
            $this->db->bind(':is_lab', $data['is_lab']);
            $this->db->bind(':is_tutorial', $data['is_tutorial']);
            $this->db->bind(':is_meeting', $data['is_meeting']);
            $this->db->bind(':is_seminar', $data['is_seminar']);
            $this->db->bind(':is_exam', $data['is_exam']);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getRoomById($id){
            $this->db->query('SELECT * FROM rooms WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deleteRoom($id){
            $this->db->query('UPDATE rooms SET r_isDeleted = 1 WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $id);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getCount(){
            $this->db->query('SELECT COUNT(*) AS count FROM rooms WHERE r_isDeleted = 0');
            $row = $this->db->single();
            return $row;
        }


    public function findAllTimetables($order = 'dsc')
    {

        $query = "select * from " .$this->table ." order by id $order ";

        $this->db->query($query);
        $result = $this->db->resultSet();

        // show($result);die;

        if(is_array($result))
        {
            if(property_exists($this, 'after_select'))
            {
                foreach($this->after_select as $func) {
                    $result = $this->$func($result);
                }
            }
            // show($result);die;
            return $result;
        }

        return false;
    }

    
    protected function get_academic_year($rows) {

        $db = new Database();

        if(!empty($rows[0]->academic_year_id)) {
            
            foreach($rows as $key => $row) {

                $query = "select * from academic_years where id = :id limit 1";
                $academic_years = $db->query($query, ['id'=>$row->academic_year_id]);
                if(!empty($academic_years)) {
                    $rows[$key]->academic_year_row = $academic_years[0];
                }
            }
        }
        return $rows;
    }

    protected function get_degree_name($rows) {
        $db = new Database();

        if(!empty($rows[0]->degree_name_id)) {
            foreach($rows as $key => $row) {

                $query = "select * from degree_names where id = :id limit 1";
                $degree_names = $db->query($query, ['id'=>$row->degree_name_id]);
                if(!empty($degree_names)) {
                    $rows[$key]->degree_name_row = $degree_names[0];
                }
            }
        }
        return $rows;
    }

    protected function get_year($rows) {
        $db = new Database();

        if(!empty($rows[0]->year_id)) {
            foreach($rows as $key => $row) {

                $query = "select * from year where id = :id limit 1";
                $years = $db->query($query, ['id'=>$row->year_id]);
                if(!empty($years)) {
                    $rows[$key]->year_row = $years[0];
                }
            }
        }
        return $rows;
    }

    protected function get_semester($rows) {
        $db = new Database();

        if(!empty($rows[0]->semester_id)) {
            foreach($rows as $key => $row) {

                $query = "select * from semester where id = :id limit 1";
                $semesters = $db->query($query, ['id'=>$row->semester_id]);
                if(!empty($semesters)) {
                    $rows[$key]->semester_row = $semesters[0];
                }
            }
        }
        return $rows;
    }


    public function save_timetable_details($details) {

        $array = json_decode($details);

        // show($array);
        $new_array = [];
        
        foreach($array as $obj) {
            $column = $obj->key;
            $value = $obj->value;

            $new_array[$column] = isset($value) ? $value : null;
        }

        foreach($this->allowed_columns as $key) {
            if (!array_key_exists($key, $new_array)) {
                $new_array[$key] = null;
            }
        }

        unset($new_array['num_of_students_value']);
        // show($new_array);die;
        return $new_array;
    }

}
