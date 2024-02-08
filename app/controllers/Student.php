<?php

    class Student extends Controller{
    
        public $studentModel;

        public function __construct(){
            $this->studentModel = $this->model('M_Student');
        }

        // //show Lecturer Profile
        // public function viewProfile(){
        //   //  $profile = $this->P_postModel->getRooms();
        //     $data = [
        //         'title' => 'View Profile',
        //         //'posts' => $profile
        //         'posts' => []
        //     ];
        //     $this->view('Student/v_viewProfile', $data);
        // }

        // public function updateProfile(){
        //     //  $profile = $this->P_postModel->getRooms();
        //       $data = [
        //           'title' => 'Update Profile',
        //           //'posts' => $profile
        //           'posts' => []
        //       ];
        //       $this->view('Lecturer/v_updateProfile', $data);
        //   }

        public function viewRooms() {
            $data = $this->studentModel->viewRooms();
            $this->view('Student/v_viewRooms',$data);
        }

        public function viewroombookings($date,$roomId){
            $data = $this->studentModel->viewBookings($date,$roomId);
            $this->view('Student/v_viewRoomBookings', $data);
        }

        public function viewProfile(){
            $data = $this->studentModel->viewProfile();
            $this->view('Student/v_viewProfile', $data);
        }

        public function updateProfile(){
            $data = $this->studentModel->updateProfile();
            $this->view('Student/updateProfile', $data);
        }

        //   public function lecturer_dashboard(){
        //     $lecturerModel = $this->model('lecturermodels/M_Lecturer');
        //     $current_Day = date('l');
        //     $data = $lecturerModel->getTimeTable($current_Day);
        //     $this->view('pages/Lecturer_dashboard',$data);
        // }


    }

