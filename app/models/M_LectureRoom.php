<?php

    class M_LectureRoom {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function createLectureRoom($data){
            $this->db->query('INSERT INTO lecture_room (
                LR_ID, 
                LR_Name, 
                LR_Capacity, 
                LR_Current_Avaliability, 
                LR_No_of_Chairs, 
                LR_No_of_Tables, 
                LR_No_of_Bords, 
                LR_No_of_Projectors, 
                LR_is_AC, 
                LR_is_Media, 
                LR_is_Wifi, 
                LR_is_Lecture, 
                LR_is_Tutorial, 
                LR_is_Lab, 
                LR_is_Seminar, 
                LR_is_Exam, 
                LR_is_Meeeting) 
                VALUES (
                    :LR_ID, 
                    :LR_Name, 
                    :LR_Capacity, 
                    :LR_Current_Avaliability, 
                    :LR_No_of_Chairs, 
                    :LR_No_of_Tables, 
                    :LR_No_of_Bords, 
                    :LR_No_of_Projectors, 
                    :LR_is_AC, 
                    :LR_is_Media, 
                    :LR_is_Wifi, 
                    :LR_is_Lecture, 
                    :LR_is_Tutorial, 
                    :LR_is_Lab, 
                    :LR_is_Seminar, 
                    :LR_is_Exam, 
                    :LR_is_Meeeting)');

            //Bind values
            $this->db->bind(':LR_ID', $data['LR_ID']);
            $this->db->bind(':LR_Name', $data['LR_Name']);
            $this->db->bind(':LR_Capacity', $data['LR_Capacity']);
            $this->db->bind(':LR_Current_Avaliability', $data['LR_Current_Avaliability']);
            $this->db->bind(':LR_No_of_Chairs', $data['LR_No_of_Chairs']);
            $this->db->bind(':LR_No_of_Tables', $data['LR_No_of_Tables']);
            $this->db->bind(':LR_No_of_Bords', $data['LR_No_of_Bords']);
            $this->db->bind(':LR_No_of_Projectors', $data['LR_No_of_Projectors']);
            $this->db->bind(':LR_is_AC', $data['LR_is_AC']);
            $this->db->bind(':LR_is_Media', $data['LR_is_Media']);
            $this->db->bind(':LR_is_Wifi', $data['LR_is_Wifi']);
            $this->db->bind(':LR_is_Lecture', $data['LR_is_Lecture']);
            $this->db->bind(':LR_is_Tutorial', $data['LR_is_Tutorial']);
            $this->db->bind(':LR_is_Lab', $data['LR_is_Lab']);
            $this->db->bind(':LR_is_Seminar', $data['LR_is_Seminar']);
            $this->db->bind(':LR_is_Exam', $data['LR_is_Exam']);
            $this->db->bind(':LR_is_Meeeting', $data['LR_is_Meeeting']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateLectureRoom($data){
            $this->db->query('UPDATE lecture_room SET 
                LR_Name = :LR_Name, 
                LR_Capacity = :LR_Capacity, 
                LR_Current_Avaliability = :LR_Current_Avaliability, 
                LR_No_of_Chairs = :LR_No_of_Chairs, 
                LR_No_of_Tables = :LR_No_of_Tables, 
                LR_No_of_Bords = :LR_No_of_Bords, 
                LR_No_of_Projectors = :LR_No_of_Projectors, 
                LR_is_AC = :LR_is_AC, 
                LR_is_Media = :LR_is_Media, 
                LR_is_Wifi = :LR_is_Wifi, 
                LR_is_Lecture = :LR_is_Lecture, 
                LR_is_Tutorial = :LR_is_Tutorial, 
                LR_is_Lab = :LR_is_Lab, 
                LR_is_Seminar = :LR_is_Seminar, 
                LR_is_Exam = :LR_is_Exam, 
                LR_is_Meeeting = :LR_is_Meeeting 
                WHERE LR_ID = :LR_ID');

            //Bind values
            $this->db->bind(':LR_ID', $data['LR_ID']);
            $this->db->bind(':LR_Name', $data['LR_Name']);
            $this->db->bind(':LR_Capacity', $data['LR_Capacity']);
            $this->db->bind(':LR_Current_Avaliability', $data['LR_Current_Avaliability']);
            $this->db->bind(':LR_No_of_Chairs', $data['LR_No_of_Chairs']);
            $this->db->bind(':LR_No_of_Tables', $data['LR_No_of_Tables']);
            $this->db->bind(':LR_No_of_Bords', $data['LR_No_of_Bords']);
            $this->db->bind(':LR_No_of_Projectors', $data['LR_No_of_Projectors']);
            $this->db->bind(':LR_is_AC', $data['LR_is_AC']);
            $this->db->bind(':LR_is_Media', $data['LR_is_Media']);
            $this->db->bind(':LR_is_Wifi', $data['LR_is_Wifi']);
            $this->db->bind(':LR_is_Lecture', $data['LR_is_Lecture']);
            $this->db->bind(':LR_is_Tutorial', $data['LR_is_Tutorial']);
            $this->db->bind(':LR_is_Lab', $data['LR_is_Lab']);
            $this->db->bind(':LR_is_Seminar', $data['LR_is_Seminar']);
            $this->db->bind(':LR_is_Exam', $data['LR_is_Exam']);
            $this->db->bind(':LR_is_Meeeting', $data['LR_is_Meeeting']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getLectureRooms(){
            $this->db->query('SELECT * FROM lecture_room');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getLectureRoomById($postId){
            $this->db->query('SELECT * FROM lecture_room WHERE LR_ID = :id');

            $this->db->bind(':id', "$postId");

            $row = $this->db->single();

            return $row;
        }
    }
