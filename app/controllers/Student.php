<?php

    class Student extends Controller{
        public function _construct(){
            
        }

        public function viewStudent(){
            $data = [];
            //$this->view('V_login.php', $data);
            $this->view('V_Student', $data);
        }

        public function viewprofie(){
            $M_student = $this->model("M_student");
            $stud_detail = $M_student->vieprofile();
            $this->view('studentviews/viewprofile',$stud_detail);
    
        }
    }