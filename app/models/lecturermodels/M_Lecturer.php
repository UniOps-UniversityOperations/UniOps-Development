<?php

class M_Lecturer {
    private $db;
    private $uid;

    public function __construct(){
        $this->db = new Database();
        $this->uid = $_SESSION['user_id'];

    }

    public function getTimeTable($current_Day) {
        $current_day = $current_Day;
        $this->db->query("SELECT * FROM lecturertimetables WHERE l_code = :uid AND day_of_week = :current_day ORDER BY start_time");
        $this->db->bind(':uid',$this->uid);
        $this->db->bind(':current_day',$current_day);
        $result = $this->db->resultSet();
        if($result){
            return $result;
        } else {
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

    public function viewBookings($date,$roomId) {
        $this->db->query("SELECT * FROM roombookings WHERE r_id = :room_id AND booking_date = :dates ORDER BY start_time");
        $this->db->bind(':room_id',$roomId);
        $this->db->bind(':dates',$date);
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
}