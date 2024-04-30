<?php

class Timetables {

    protected $db;
    private $stream;
    private $academic_year;
    private $year;
    private $tableName;

    public function __construct() {

        $this->db = new Database();
    }

    public function get_name($id, $table) {
        $query = "select * from " . $table ." where id = ". $id;
        $this->db->query($query);
        $row = $this->db->resultSet();
        return $row;
    }
    

    public function create_timetable_table($academic_year, $year, $stream) {

        // $this->stream = $this->get_name($stream, 'degree_names')[0]->stream;
        // $this->academic_year = $this->get_name($academic_year, 'academic_years')[0]->academic_year;
        // $this->year = $this->get_name($year, 'years')[0]->student_year;

        $this->tableName = $academic_year . "_" . $year . "_" . $stream . "_timetable"; 
        $sql = "CREATE TABLE IF NOT EXISTS `$this->tableName` (
            semester int(11) NOT NULL,
            day int(11) NOT NULL,
            timeslot int(11) NOT NULL,
            sub_code varchar(50) DEFAULT NULL,
            room_code varchar(50) DEFAULT NULL,
            PRIMARY KEY (semester, day, timeslot)
        )";

        $this->db->query($sql);
        return $this->db->execute();

    }


    public function fill_timetable($academic_year, $year, $stream) {
        
        // $this->stream = $this->get_name($stream, 'degree_names')[0]->stream;
        // $this->academic_year = $this->get_name($academic_year, 'academic_years')[0]->academic_year;
        // $this->year = $this->get_name($year, 'years')[0]->student_year;

        $this->tableName = $academic_year . "_" . $year . "_" . $stream . "_timetable";

        $semesters = [1, 2];
        $days = [1, 2, 3, 4, 5, 6, 7];
        $timeslots = [1, 2, 3, 4, 5, 6];

        for($i = 1; $i <= 2; $i++) {

            for($j = 1; $j <= 7; $j++) {

                for($k = 1; $k <= 6; $k++) {

                    $this->db->query("INSERT INTO `$this->tableName` (
                        semester,
                        day,
                        timeslot,
                        sub_code,
                        room_code
                        ) VALUES (
                            :semester,
                            :day,
                            :timeslot,
                            :sub_code,
                            :room_code
                        )
                    ");
                    $this->db->bind(':semester', $i);
                    $this->db->bind(':day', $j);
                    $this->db->bind(':timeslot', $k);
                    $this->db->bind(':sub_code', null);
                    $this->db->bind(':room_code', null);

                    try {
                        $this->db->execute();
                    } catch (PDOException $e) {
                        // Handle the error or log it
                        echo "Error: " . $e->getMessage();
                        // Optionally, return false or throw an exception
                        return false;
                    }

                }
            }
        }
    }


    public function update_timetable($data) {

        // show($data);die;

        $this->tableName = $data['academic_year'] . "_" . $data['year'] . "_" . $data['stream'] . "_timetable";

        $this->db->query("UPDATE `$this->tableName` SET
            sub_code = :sub_code,
            room_code = :room_code

            WHERE semester = :semester
            AND day = :day
            AND timeslot = :timeslot
        ");

        $this->db->bind(':sub_code', $data['selected_course_code']);
        $this->db->bind(':room_code', $data['selected_room']);
        $this->db->bind(':semester', $data['semester']);
        $this->db->bind(':day', $data['day_of_week']);
        $this->db->bind(':timeslot', $data['start_date']);

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            // Handle the error or log it
            echo "Error: " . $e->getMessage();
            // Optionally, return false or throw an exception
            return false;
        }

    }

    public function update_lecturebookings_table($data) {

        // show($data);die;

        $this->db->query("UPDATE lecturebookings SET
            subject = :sub_code,
            type = :room_code,
            is_Booked = 0

            WHERE r_id = :room_code
            AND day_of_week = :day
            AND start_time = :start_time
            AND end_time = :end_time
        ");

        $this->db->bind(':subject', $data['selected_course_code']);
        $this->db->bind(':type', 'L');
        $this->db->bind(':is_Booked', '1');
        $this->db->bind(':room_code', $data['selected_room']);
        $this->db->bind(':day', 'Friday');
        $this->db->bind(':start_time', '08:00:00');
        $this->db->bind(':end_time', '10:00:00');

        // show($data);die;

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            // Handle the error or log it
            echo "Error: " . $e->getMessage();
            // Optionally, return false or throw an exception
            return false;
        }

    }

}
