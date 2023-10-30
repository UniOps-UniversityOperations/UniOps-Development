<?php

    class Student extends Controller{
        public function _construct(){
            
        }

        public function viewStudent(){
            $data = [];
            //$this->view('V_login.php', $data);
            $this->view('V_Student', $data);
        }
    }