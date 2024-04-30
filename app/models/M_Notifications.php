<?php

class M_Notifications{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function viewroombookingrequests() {
        $date = date('Y-m-d');
        $current_time = date('H:i:s'); // Get the current time
        $sql = 'SELECT * FROM roombookingrequests WHERE request_date >= ? ORDER BY r_id,request_date,start_time,end_time;';
        $this->db->query($sql);
        $this->db->bind(1,$date);
        /* $this->db->bind(2,$current_time); */
        return $this->db->resultSet();
    }

    public function roombookingsconflictcheck($r_id,$request_date,$start_time,$end_time) {
        $sql = "SELECT * FROM roombookings WHERE r_id = :id AND booking_date = :bdate AND ((start_time <= :starttime AND end_time > :starttime) OR (start_time <= :endtime AND end_time> :endtime) OR (start_time >= :starttime AND end_time <=:endtime ) );";
        $this->db->query($sql);
        $this->db->bind(':id',$r_id);
        $this->db->bind(':bdate',$request_date);
        $this->db->bind(':starttime',$start_time);
        $this->db->bind(':endtime',$end_time);
        return $this->db->resultSet();
    }

    public function lecturebookingconflictscheck($r_id,$dayOfWeek,$start_time,$end_time) {
        $sql = "SELECT * FROM roombookings WHERE r_id = :id AND booking_date = :bdate AND ((start_time <= :starttime AND end_time > :starttime) OR (start_time <= :endtime AND end_time> :endtime) OR (start_time >= :starttime AND end_time <=:endtime ) );";
        $this->db->query($sql);
        $this->db->bind(':id',$r_id);
        $this->db->bind(':bdate',$dayOfWeek);
        $this->db->bind(':starttime',$start_time);
        $this->db->bind(':endtime',$end_time);
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

    public function viewroombookings() {
        $date = date('Y-m-d');
        $current_time = date('H:i:s'); // Get the current time
        $sql = "SELECT * FROM roombookings  WHERE (booking_date > :bdate OR (booking_date = :bdate AND start_time >= :crntime)) ORDER BY r_id,booking_date,start_time,end_time;";
        $this->db->query($sql);
        $this->db->bind(':bdate',$date);
        $this->db->bind(':crntime',$current_time);
        return $this->db->resultSet();
    }

    public function roomBookingdelete($r_id,$booking_date,$start_time,$end_time,$event,$booked_by) {
        $sql = 'DELETE FROM roombookings WHERE r_id = :rid AND booking_date = :bdate AND start_time = :starttime AND end_time = :endtime AND event = :event AND booked_by = :booked_by;';
        $this->db->query($sql);
        $this->db->bind(':rid',$r_id);
        $this->db->bind(':bdate',$booking_date);
        $this->db->bind(':starttime',$start_time);
        $this->db->bind(':endtime',$end_time);
        $this->db->bind(':event',$event);
        $this->db->bind(':booked_by',$booked_by);
        return $this->db->execute();
    }

    public function roomBookingRequestdenied($r_id,$request_date,$start_time,$end_time,$purpose,$requested_by) {
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

