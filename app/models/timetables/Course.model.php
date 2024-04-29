<?php

class Course {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // private $sub_stream;
    // private $sub_semester;
    // private $sub_year;

    public function get_name($id, $table) {
        $query = "select * from " . $table ." where id = ". $id;
        $this->db->query($query);
        $row = $this->db->resultSet();
        return $row;
    }

    // public function send_timetable_details($data) {

    //     $this->sub_stream = $this->get_name($data['degree_name_id'], 'degree_names')[0]->stream;
    //     $this->sub_semester = $this->get_name($data['semester_id'], 'semester')[0]->semester;
    //     $this->sub_year = $this->get_name($data['year_id'], 'years')[0]->student_year;

    // }

    // public function get_timetable_details() {
    //     return $this->sub_semester;
    // }

    public function get_courses($data) {

        // $this->get_name($data['degree_name_id'], 'degree_names')[0]->stream


        $this->db->query('SELECT * FROM subjects WHERE sub_isDeleted = 0 AND sub_year = :sub_year AND sub_stream = :sub_stream AND sub_semester = :sub_semester');

        
        // Bind the parameters
        $this->db->bind(':sub_year', '2');
        $this->db->bind(':sub_stream', 'CS');
        $this->db->bind(':sub_semester', '1');

        // Execute the query
        $this->db->execute();

        // Fetch all results
        $results = $this->db->resultSet();

        return $results;
    }


    public function get_courses_by_lecture_type($data) {

        // $data['course_code'] = 'practical';

        $course_codes = $data['course_codes'];
        $lecture_type = '';
        
        $course_code_array = [];

        if($data['lecture_type'] == 'lecture') {
            $lecture_type = 'sub_isHaveLecture';
        }
        else if($data['lecture_type'] == 'practical') {
            $lecture_type = 'sub_isHavePractical';
        }
        else if($data['lecture_type'] == 'tutorial') {
            $lecture_type = 'sub_isHaveTutorial';
        }

        foreach ($data['course_codes'] as $obj) {
            if (isset($obj->$lecture_type) && $obj->$lecture_type == 1) {
                $course_code_array[] = $obj;
            }
        }

        return $course_code_array;

    }


    public function course_added($course) {

        $this->db->query('UPDATE subjects SET sub_isAdded = 1 WHERE sub_code = :sub_id');
        //Bind values
        $this->db->bind(':sub_id', $course);

        //Execute function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getCourseCodes() {

        // $array = $this->getSubjects();

        // $new_array = [];
        
        // foreach($array as $obj) {
        //     if(property_exists($obj, 'sub_code')) {
        //         $new_obj = new stdClass();
        //         $new_obj->id = $obj->sub_id;
        //         $new_obj->course_code = $obj->sub_code;
        //         $new_array[] = $new_obj;
        //     }
        // }
        // return $new_array;


    }


    public function getCourseNames() {

        // $array = $this->getSubjects();

        // $new_array = [];
        
        // foreach($array as $obj) {
        //     if(property_exists($obj, 'sub_name')) {
        //         $new_obj = new stdClass();
        //         $new_obj->id = $obj->sub_id;
        //         $new_obj->course_name = $obj->sub_name;
        //         $new_array[] = $new_obj;
        //     }
        // }
        // return $new_array;
    }

    public function get_course_name($course_id) {

        // $course_id = json_decode($course_id);
        // $course_name = $this->getSubjectById($course_id)->sub_name;

        // // show($course_name);die;
        // return $course_name;

    }
}
