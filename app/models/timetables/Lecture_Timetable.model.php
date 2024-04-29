<?php

class Lecture_Timetable {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addLectureTimetable($data){

            $this->db->query('INSERT INTO rooms (
                id,
                academic_year,
                study_year,
                stream,
                semester,
                day_of_week,
                start_time,
                end_time,
                sub_code,
                lecture_type,
                room_code,
                is_Deleted
                )
                VALUES (
                    :id,
                    :academic_year,
                    :study_year,
                    :stream,
                    :semester,
                    :day_of_week,
                    :start_time,
                    :end_time,
                    :sub_code,
                    :lecture_type,
                    :room_code,
                    :is_Deleted)');
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':academic_year', $data['name']);
            $this->db->bind(':study_year', $data['type']);
            $this->db->bind(':stream', $data['capacity']);
            $this->db->bind(':semester', $data['current_availability']);
            $this->db->bind(':day_of_week', $data['no_of_tables']);
            $this->db->bind(':start_time', $data['no_of_chairs']);
            $this->db->bind(':end_time', $data['no_of_boards']);
            $this->db->bind(':sub_code', $data['no_of_projectors']);
            $this->db->bind(':lecture_type', $data['no_of_computers']);
            $this->db->bind(':room_code', $data['is_ac']);
            $this->db->bind(':is_Deleted', $data['is_wifi']);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getLectureTimetables(){
            $this->db->query('SELECT * FROM rooms WHERE r_isDeleted = 0');

            $results = $this->db->resultSet();

            return $results;
        }

        public function updateLectureTimetables($data){
            $this->db->query('UPDATE rooms SET 
                id = :id,
                academic_year = :academic_year,
                study_year,
                stream,
                semester,
                day_of_week,
                start_time,
                end_time,
                sub_code,
                lecture_type,
                room_code,
                is_Deleted
                WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':academic_year', $data['name']);
            $this->db->bind(':study_year', $data['type']);
            $this->db->bind(':stream', $data['capacity']);
            $this->db->bind(':semester', $data['current_availability']);
            $this->db->bind(':day_of_week', $data['no_of_tables']);
            $this->db->bind(':start_time', $data['no_of_chairs']);
            $this->db->bind(':end_time', $data['no_of_boards']);
            $this->db->bind(':sub_code', $data['no_of_projectors']);
            $this->db->bind(':lecture_type', $data['no_of_computers']);
            $this->db->bind(':room_code', $data['is_ac']);
            $this->db->bind(':is_Deleted', $data['is_wifi']);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getLectureTimetableById($data){

            $this->db->query('SELECT * FROM lecture_timetables WHERE id = :id');
            $this->db->bind(':id', $data['id']);

            $rows = $this->db->resultSet();

            return $rows;
        }


        public function deleteLectureTimetable($id){
            $this->db->query('UPDATE rooms SET r_isDeleted = 1 WHERE id = :id');
            //Bind values
            $this->db->bind(':id', $id);

            //Execute function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getCount(){
            $this->db->query('SELECT COUNT(*) AS count FROM rooms WHERE r_isDeleted = 0');
            $row = $this->db->single();
            return $row;
        }
}
