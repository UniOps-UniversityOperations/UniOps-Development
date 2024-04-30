<?php

class Room {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRoomsByLectureType($lecture_type) {

        $rooms_array = [];

        if($lecture_type == 'Lecture') {

            $this->db->query('SELECT * FROM rooms WHERE type = "lecture"');
            $results = $this->db->resultSet();

            foreach($results as $obj) {
                $rooms_array[$obj->id] = $obj->name;
            }
            
        }
        return $rooms_array;
    }



    public function get_available_rooms($data) {

        // show($data);die;

        $rooms_array = [];

        if($data['lecture_type'] == 'lecture') {

            $query = 
            'SELECT *
              FROM room_timetable
              INNER JOIN lecturebookings ON id = r_id
              WHERE r_isDeleted = 0
              AND is_Booked = 0
              AND r_type = :lecture_type
              AND capacity >= :capacity
              AND day_of_week = :day_of_week
              AND start_time <= :start_time
              AND end_time >= :end_time';

            $this->db->query($query);

            // Bind the parameters
            $this->db->bind(':lecture_type', 'lecture');
            $this->db->bind(':capacity', $data['num_of_students']);
            $this->db->bind(':day_of_week', 'Friday');
            $this->db->bind(':start_time', '8:00:00');
            $this->db->bind(':end_time', '10:00:00');

            // Execute the query
            $this->db->execute();

            // Fetch all results
            $results = $this->db->resultSet();

            // show($results);die;

            return $results;


        }
        else if($data['lecture_type'] == 'practical') {

            $query = 
            'SELECT *
              FROM room_timetable
              INNER JOIN lecturebookings ON id = r_id
              WHERE r_isDeleted = 0
              AND is_Booked = 0
              AND r_type = :lecture_type
              AND capacity >= :capacity
              AND day_of_week = :day_of_week
              AND start_time <= :start_time
              AND end_time >= :end_time';

            $this->db->query($query);

            // Bind the parameters
            $this->db->bind(':lecture_type', 'practical');
            $this->db->bind(':capacity', $data['num_of_students']);
            $this->db->bind(':day_of_week', $data['day_of_week']);
            $this->db->bind(':start_time', $data['start_time']);
            $this->db->bind(':end_time', $data['end_time']);

            // Execute the query
            $this->db->execute();

            // Fetch all results
            $results = $this->db->resultSet();

            // show($results);die;

            return $results;


        }
        // else if($data['lecture_type'] == 'tutorial') {


        // }

    }
    
}
