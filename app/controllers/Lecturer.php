<?php

    class Lecturer extends Controller{

        public function __construct(){

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
            $lecturerModel = $this->model('lecturermodels/M_Lecturer');
            $data = $lecturerModel->viewBookings('E401');
            $this->view('Lecturer/v_viewrooms', $data);
          }


    }

