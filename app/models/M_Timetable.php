<?php

    class M_Timetable {

        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function addTimetable($data) {
            $this->db->query('INSERT INTO timetables (
                timetable_type,
                degree,
                student_year,
                semester,
                academic_year,
                course_code,
                course_name,
                lecturer_code,
                lecturer_name,
                lecture_room
            ) VALUES (
                :timetable_type,
                :degree,
                :student_year,
                :semester,
                :academic_year,
                :course_code,
                :course_name,
                :lecturer_code,
                :lecturer_name,
                :lecture_room
            )');
            $this->db->bind(':timetable_type', $data['timetable_type']);
            $this->db->bind(':degree', $data['degree']);
            $this->db->bind(':student_year', $data['student_year']);
            $this->db->bind(':semester', $data['semester']);
            $this->db->bind(':academic_year', $data['academic_year']);
            $this->db->bind(':course_code', $data['course_code']);
            $this->db->bind(':course_name', $data['course_name']);
            $this->db->bind(':lecturer_code', $data['lecturer_code']);
            $this->db->bind(':lecturer_name', $data['lecturer_name']);
            $this->db->bind(':lecture_room', $data['lecture_room']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getTimetables() {
            $this->db->query('SELECT * FROM timetables');
            $result = $this->db->resultSet();
            return $result;
        }

        public function getTimetableById($id) {
            $this->db->query('SELECT * FROM timetables WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }
    }

?>
