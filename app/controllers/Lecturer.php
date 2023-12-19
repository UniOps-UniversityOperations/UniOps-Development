<?php

    class Lecturer extends Controller{

      public $lecturerModel;

      public function __construct(){
        $this->lecturerModel = $this->model('lecturermodels/M_Lecturer');
      }

        //show Lecturer Profile
        public function viewProfile(){
          $data = $this->lecturerModel->viewProfile();
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
            $data = $this->lecturerModel->viewBookings('E401');
            $this->view('Lecturer/v_viewrooms', $data);
          }


    }

