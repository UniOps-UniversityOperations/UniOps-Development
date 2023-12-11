<?php

class M_Lecturer {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getTimeTable($current_Day) {
        $current_day = $current_Day;
        $uid = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM lecturertimetables WHERE lecturer_id = :uid AND day_of_week = :current_day ORDER BY start_time");
        $this->db->bind(':uid',$uid);
        $this->db->bind(':current_day',$current_day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }
}