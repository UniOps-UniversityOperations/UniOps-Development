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
            return "";
        }
    }

    public function viewBookings($room_id) {
        $this->db->query("SELECT * FROM roombookings WHERE r_id = :room_id AND booking_date = :today ORDER BY start_time");
        $today = date("Y-m-d");
        $this->db->bind(':room_id',$room_id);
        $this->db->bind(':today',$today);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
            return "Empty";
        }
    }
}