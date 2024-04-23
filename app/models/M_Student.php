<?php

class M_Student{

    private $db;
    // private $uid;

    public function __construct(){
        $this->db = new Database;
        $this->uid = $_SESSION['user_id'];
    }
    
    //Create Student
    public function createStudent($data){
        $this->db->query('INSERT INTO students (
            s_code,
            s_fullName,
            s_nameWithInitial,
            s_regNumber,
            S_indexNumber,
            s_email,
            s_dob,
            s_contactNumber,
            s_stream,
            s_year
            -- s_isDeleted
        ) VALUES (
            :s_code,
            :s_fullName,
            :s_nameWithInitial,
            :s_regNumber,
            :s_indexNumber,
            :s_email,
            :s_dob,
            :s_contactNumber,
            :s_stream,
            :s_year
            -- :s_semester
            -- :s_isDeleted
        )');

        //Bind Values
        $this->db->bind(':s_code', $data['s_code']);
        $this->db->bind(':s_fullName', $data['s_fullName']);
        $this->db->bind(':s_nameWithInitial', $data['s_nameWithInitial']);
        $this->db->bind(':s_regNumber', $data['s_regNumber']);
        $this->db->bind(':s_indexNumber', $data['s_indexNumber']);
        $this->db->bind(':s_email', $data['s_email']);
        $this->db->bind(':s_dob', $data['s_dob']);
        $this->db->bind(':s_contactNumber', $data['s_contactNumber']);
        $this->db->bind(':s_stream', $data['s_stream']);
        $this->db->bind(':s_year', $data['s_year']);  
        // $this->db->bind(':s_isDeleted', $data['s_isDeleted']); 

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Get all students

    public function getStudent(){
        $this->db->query('SELECT * FROM students WHERE s_isDeleted = 0 ORDER BY s_id ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    //Get student by id
    public function getStudentById($id){
        $this->db->query('SELECT * FROM students WHERE s_id = :id AND s_isDeleted = 0');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }


    //Up   date Student

    public function updateStudent($data){
        $this->db->query('UPDATE students SET
        s_id = :s_id,
        s_code = :s_code,
        s_fullName = :s_fullName,
        s_nameWithInitial = :s_nameWithInitial,
        s_regNumber = :s_regNumber,
        s_indexNumber = :s_indexNumber,
        s_email = :s_email,
        s_dob = :s_dob,
        s_contactNumber = :s_contactNumber,
        s_stream = :s_stream,
        s_year = :s_year
        -- s_semester = :s_semester,
        -- s_isDeleted = :s_isDeleted
        WHERE s_id = :s_id
        ');

        //Bind Values
        $this->db->bind(':s_id', $data['s_id']);
        $this->db->bind(':s_code', $data['s_code']);
        $this->db->bind(':s_fullName', $data['s_fullName']);
        $this->db->bind(':s_nameWithInitial', $data['s_nameWithInitial']);
        $this->db->bind(':s_regNumber', $data['s_regNumber']);
        $this->db->bind(':s_indexNumber', $data['s_indexNumber']);
        $this->db->bind(':s_email', $data['s_email']);  
        $this->db->bind(':s_dob', $data['s_dob']);
        $this->db->bind(':s_contactNumber', $data['s_contactNumber']);
        $this->db->bind(':s_stream', $data['s_stream']);
        $this->db->bind(':s_year', $data['s_year']);  
        // $this->db->bind(':s_semester', $data['s_semester']); 
        // $this->db->bind(':s_isDeleted', $data['s_isDeleted']);  
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    

    //Delete Student
    public function deleteStudent($id){
        $this->db->query('UPDATE students SET s_isDeleted = 1 WHERE s_id = :id');
        //Bind Values
        $this->db->bind(':id', $id);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getTimeTable($current_Day) {
        $this->db->query("SELECT s_year FROM students WHERE s_email = :uid");
        $this->db->bind(':uid', $this->uid);
        $studentYearResult = $this->db->resultSet();

        if($studentYearResult) {
            // $studentYear = $studentYearResult['s_code'];
            $studentYear = reset($studentYearResult);
            $current_day = $current_Day;
            $this->db->query("SELECT * FROM studenttimetable WHERE s_year = :studentYear AND day_of_week = :current_day ORDER BY start_time");
            $this->db->bind(':studentYear',$studentYear->s_year);
            // $this->db->bind(':uid',$this->uid);
            $this->db->bind(':current_day',$current_day);
            $result = $this->db->resultSet();
            if($result){
                return $result;
            } else {
                return "";
            }
        }else{
            return "";
        }
    }
    

    public function viewRooms() {
        $this->db->query("SELECT * FROM rooms");
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    // public function viewBookings($date,$roomId) {
    //     $this->db->query("SELECT * FROM roombookings WHERE r_id = :room_id AND booking_date = :dates ORDER BY start_time");
    //     $this->db->bind(':room_id',$roomId);
    //     $this->db->bind(':dates',$date);
    //     $result = $this->db->resultSet();
    //     if($result){
    //         return $result;
    //     } else {
    //         return "Empty";
    //     }
    // }

    public function viewProfile() {
        $this->db->query("SELECT * FROM students WHERE s_email = :uid");
        $this->db->bind(':uid',$this->uid);
        $result = $this->db->single();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }
    public function updateProfile($data){
        // $data['s_id']=130;
        if (!empty($data['s_id'])) {
        $this->db->query('UPDATE students SET
        s_id = :s_id,
        s_fullName = :s_fullName,
        s_nameWithInitial = :s_nameWithInitial,
        s_email = :s_email,
        s_contactNumber = :s_contactNumber
        WHERE s_id = :s_id
        ');

        //Bind Values
       
        $this->db->bind(':s_id', $data['s_id']);
        $this->db->bind(':s_fullName', $data['s_fullName']);
        $this->db->bind(':s_nameWithInitial', $data['s_nameWithInitial']);
        $this->db->bind(':s_email', $data['s_email']);  
        $this->db->bind(':s_contactNumber', $data['s_contactNumber']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    } else {
        return false; // Handle case where s_id is not set or empty
    }
    }


    public function viewBookingGrid($dateSelected) {
        $sql = "SELECT 
        r.id,
        r.name,
        rb.booking_date AS date,
        rb.start_time,
        rb.end_time,
        rb.event AS booking_name,
        rb.booked_by,
        'event' AS booking_type
    FROM 
        rooms r
    LEFT JOIN 
        roombookings rb ON r.id = rb.r_id

        WHERE rb.booking_date = :dates
    
    UNION ALL
    
    SELECT 
        r.id,
        r.name,
        lb.day_of_week AS date,
        lb.start_time,
        lb.end_time,
        lb.subject AS booking_name,
        lb.type AS booked_by,
        'lecture' AS booking_type
    FROM 
        rooms r
    LEFT JOIN 
        lecturebookings lb ON r.id = lb.r_id AND lb.day_of_week = :day_of_week
        
    ORDER BY 
        id, start_time;
    
     
        ";

        $day = date("l",strtotime($dateSelected));

        $this->db->query($sql);
        $this->db->bind(':dates',$dateSelected);
        $this->db->bind(':day_of_week',$day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    public function roomBookingRequest($r_id,$booking_date,$startTime,$endTime,$purpose){

        $sql = "INSERT INTO roombookingrequests (r_id,request_date,start_time,end_time,purpose,requested_by) VALUES (?,?,?,?,?,?);";
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$booking_date);
        $this->db->bind(3,$startTime);
        $this->db->bind(4,$endTime);
        $this->db->bind(5,$purpose);
        $this->db->bind(6,$this->uid);
        return $this->db->execute();
    }

    public function viewAssignedSubjects(){
        $sql = 'SELECT assignedSubjects.subject_code,subjects.sub_name, subjects.sub_year, subjects.sub_stream, subjects.sub_semester, subjects.sub_credits 
        FROM assignedSubjects 
        INNER JOIN subjects ON assignedSubjects.subject_code = subjects.sub_code 
        INNER JOIN lecturers ON assignedSubjects.lecturer_code = lecturers.l_code
        WHERE lecturers.l_email = :uid';
        $this->db->query($sql);
        $this->db->bind(':uid',$_SESSION['user_id']);
        //return $this->db->execute();
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }

    // public function updateProfilePicture($filePath) {
    //     $this->db->query("UPDATE students SET s_picture = :s_picture WHERE s_email = :uid");
    //     $this->db->bind(':s_picture', $filePath);
    //     $this->db->bind(':s_id', $this->uid);
    //     $this->db->execute();
    // }

    // public function updateProfile($s_id, $s_email) {
    //     $this->db->query("UPDATE students SET s_email = :email WHERE s_id = :uid");
    //     $this->db->bind(':email', $s_email);
    //     $this->db->bind(':uid', $s_id);

    //     // Execute the query
    //     if ($this->db->execute()) {
    //         return true; // Update successful
    //     } else {
    //         return false; // Update failed
    //     }
    // }

    // ... existing code ...

    // public function updateProfile(){
    //     $this->db->query("SELECT * FROM students WHERE s_email = :uid");
    //     $result = $this->db->resultSet();
    //     if($result){
    //         return $result;
    //     } else {
    //         return "Empty";
    //     }
    // }    



}


/*
    Structure of the database table:

    table name: Students
    s_id,
    s_fullName,
    s_nameWithInitial,
    s_regNumber,
    S_indexNumber,
    s_email,
    s_dob,
    s_contactNumber,
    s_stream,
    s_year,
    s_semester,
    s_isDeleted,
 
*/

