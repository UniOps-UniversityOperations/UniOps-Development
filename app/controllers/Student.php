<?php

    class Student extends Controller{
        public function _construct(){
            
        }

        public function viewStudent(){
            $data = [];
            //$this->view('V_login.php', $data);
            $this->view('V_Student', $data);
        }

        public function viewprofile(){
            $M_student = $this->model("M_student");
            $stud_detail = $M_student->viewprofile();
            $this->view('studentviews/viewprofile',$stud_detail);
    
        }
    }