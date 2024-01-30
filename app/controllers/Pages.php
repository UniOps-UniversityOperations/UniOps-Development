<?php

    class Pages extends Controller{
        public function administrator_dashboard(){
            $data = [];
            $this->view('pages/administrator_dashboard');
        }

        public function lecturer_dashboard(){
            $lecturerModel = $this->model('lecturermodels/M_Lecturer');
            $current_Day = date('l');
            $data = $lecturerModel->getTimeTable($current_Day);
            $this->view('pages/Lecturer_dashboard',$data);
        }

        public function Instructor_dashboard(){
            $data = [];
            $this->view('pages/Instructor_dashboard');
        }

        public function student_dashboard(){
            $studentModel = $this->model('M_Student');
            $current_Day = date('l');
            $data = $studentModel->getTimeTable($current_Day);
            $this->view('pages/Student_dashboard',$data);
        }
    }