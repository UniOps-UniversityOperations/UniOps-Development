<?php

    class Pages extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->R_postModel = $this->model('M_Room');
            // $this->S_postModel = $this->model('M_Subject');
            // $this->L_postModel = $this->model('M_Lecturer');
            // $this->I_postModel = $this->model('M_Instructor');
            // $this->U_postModel = $this->model('M_Users');
            // $this->A_postModel = $this->model('M_Asset');
            // $this->RS_postModel = $this->model('M_requestedSubjects');
            // $this->AS_postModel = $this->model('M_assignedSubjects');
            // $this->RSI_postModel = $this->model('M_requestedSubjectsInstructor');
            // $this->ASI_postModel = $this->model('M_assignedSubjectsInstructor');
            // $this->V_postModel = $this->model('M_variables');
        }



        public function administrator_dashboard(){
            $r_count = $this->R_postModel->getCount();

            $data = [
                'r_count' => $r_count
            ];
            $this->view('pages/administrator_dashboard');
        }
    }