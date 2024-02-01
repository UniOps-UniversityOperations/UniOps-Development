<?php

class M_Student {
    private $db;
    private $uid;

    public function __construct(){
        $this->db = new Database();
        $this->uid = $_SESSION['user_id'];

    }

    public function getTimeTable($current_Day) {
        $current_day = $current_Day;
        $this->db->query("SELECT * FROM studenttimetable WHERE s_code = :uid AND day_of_week = :current_day ORDER BY start_time");
        $this->db->bind(':uid',$this->uid);
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

    public function viewProfile() {
        $this->db->query("SELECT * FROM lecturers WHERE l_email = :uid");
        $this->db->bind(':uid',$this->uid);
        $result = $this->db->single();
        if($result){
            return $result;
        } else {
            return "Empty";
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
}