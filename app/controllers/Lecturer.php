<?php

    class Lecturer extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
           // $this->R_postModel = $this->model('M_Room');
            //$this->Report_postModel = $this->model('M_Subject');
           // $this->P_postModel = $this->model('M_Lecturer');
        }

        //show Lecturer Profile
        public function viewProfile(){
          //  $profile = $this->P_postModel->getRooms();
            $data = [
                'title' => 'View Profile',
                //'posts' => $profile
                'posts' => []
            ];
            $this->view('Lecturer/v_viewProfile', $data);
        }

        public function updateProfile(){
            //  $profile = $this->P_postModel->getRooms();
              $data = [
                  'title' => 'Update Profile',
                  //'posts' => $profile
                  'posts' => []
              ];
              $this->view('Lecturer/v_updateProfile', $data);
          }

          public function viewrooms(){
            //  $profile = $this->P_postModel->getRooms();
              $data = [
                  'title' => 'Manage rooms',
                  //'posts' => $profile
                  'posts' => []
              ];
              $this->view('Lecturer/v_viewrooms', $data);
          }


    }

