<?php

    class Student extends Controller{
        public function _construct(){
            
        }

        public function viewStudent(){
            $data = [];
            //$this->view('V_login.php', $data);
            $this->view('V_Student', $data);
        }

        //show Student Profile
        public function viewProfile(){
          //  $profile = $this->P_postModel->getRooms();
            $data = [
                'title' => 'View Profile',
                //'posts' => $profile
                'posts' => []
            ];
            $this->view('Student/viewProfile', $data);
        }

        // //show all users
        // public function viewUsers(){
        //     $posts = $this->U_postModel->getUsers();
        //     $data = [
        //         'title' => 'View Users',
        //         'posts' => $posts
        //     ];
        //     $this->view('Pages/administrator_dashboard', $data);
        // }
//Update Profile
        public function updateProfile(){
            //  $profile = $this->P_postModel->getRooms();
              $data = [
                  'title' => 'Update Profile',
                  //'posts' => $profile
                  'posts' => []
              ];
              $this->view('Student/updateProfile', $data);
          } 
    }