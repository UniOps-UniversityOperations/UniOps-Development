<?php

    class M_Timetable {

        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function addTimetable($data) {
            $this->db->query('INSERT INTO timetables (
                
                )'
            )
        }
    }

?>
