<?php

class M_Notifications{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function viewroombookingrequests() {
        $date = date('Y-m-d');
        $current_time = date('H:i:s'); // Get the current time
        $sql = 'SELECT * FROM roombookingrequests WHERE request_date >= ? AND start_time >= ? ORDER BY r_id,request_date,start_time,end_time;';
        $this->db->query($sql);
        $this->db->bind(1,$date);
        $this->db->bind(2,$current_time);
        return $this->db->resultSet();
    }

    public function roombookingsconflictcheck($r_id,$request_date,$start_time) {
        $sql = "SELECT * FROM roombookings WHERE r_id = ? AND booking_date = ? AND start_time <= ? AND ? < end_time;";
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$request_date);
        $this->db->bind(3,$start_time);
        $this->db->bind(4,$start_time);
        return $this->db->resultSet();
    }

    public function lecturebookingconflictscheck($r_id,$dayOfWeek,$start_time) {
        $sql = "SELECT * FROM lecturebookings WHERE r_id = ? AND day_of_week = ? AND start_time <= ? AND ? < end_time;";
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$dayOfWeek);
        $this->db->bind(3,$start_time);
        $this->db->bind(4,$start_time);
        return $this->db->resultSet();
    }

    public function roomBookingRequestAccepted($r_id,$request_date,$start_time,$end_time,$purpose,$requested_by) {
        $sql = 'INSERT INTO roombookings VALUES(?,?,?,?,?,?);';
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$request_date);
        $this->db->bind(3,$start_time);
        $this->db->bind(4,$end_time);
        $this->db->bind(5,$purpose);
        $this->db->bind(6,$requested_by);
        $insertqueryresult =  $this->db->execute();

        $sql = "DELETE FROM roombookingrequests WHERE r_id = ? AND request_date = ? AND start_time = ? AND end_time = ? AND purpose = ? AND requested_by = ? ;";
        $this->db->query($sql);
        $this->db->bind(1,$r_id);
        $this->db->bind(2,$request_date);
        $this->db->bind(3,$start_time);
        $this->db->bind(4,$end_time);
        $this->db->bind(5,$purpose);
        $this->db->bind(6,$requested_by);
        $deletequeryresult =  $this->db->execute();
        return $deletequeryresult;
     
    }
}

