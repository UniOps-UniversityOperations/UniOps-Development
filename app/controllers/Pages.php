<?php

    class Pages extends Controller{
        public function administrator_dashboard(){
            $data = [];
            $this->view('pages/administrator_dashboard');
        }

        public function lecturer_dashboard(){
            $data = [];
            $this->view('pages/Lecturer_dashboard');
        }

        public function Instructor_dashboard(){
            $data = [];
            $this->view('pages/Instructor_dashboard');
        }
    }