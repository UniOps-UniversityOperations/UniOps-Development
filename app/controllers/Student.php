<?php

    class Student extends Controller{
    
        public $studentModel;

        public function __construct(){
            $this->studentModel = $this->model('M_Student');
            // $this->Stu_postModel = $this->model('M_Student');
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
        //       $this->view('Student/v_updateProfile', $data);
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

        // public function updateProfile($s_id){
        //     $data = $this->studentModel->updateStudent($s_id);
        //     $this->view('Student/v_updateProfile', $data);
        // }

        //   public function lecturer_dashboard(){
        //     $lecturerModel = $this->model('lecturermodels/M_Lecturer');
        //     $current_Day = date('l');
        //     $data = $lecturerModel->getTimeTable($current_Day);
        //     $this->view('pages/Lecturer_dashboard',$data);
        // }

        public function updateProfile($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Student',
                     
                    's_id' => $postId,
                    // 's_id' => trim($_POST['s_id']),
                    's_fullName' => trim($_POST['s_fullName']),
                    's_nameWithInitial' => trim($_POST['s_nameWithInitial']),
                    's_email' => trim($_POST['s_email']),
                    's_contactNumber' => trim($_POST['s_contactNumber']),                
                ];

                if(1){
                    if($this->studentModel->updateProfile($data)){
                        redirect('Student/viewProfile');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->studentModel->getStudentById($postId);
                $data = [
                    'title' => 'Update Profile',

                    's_id' => $post->s_id,
                    's_fullName' => $post->s_fullName,
                    's_nameWithInitial' => $post->s_nameWithInitial,
                    's_email' => $post->s_email,
                    's_contactNumber' => $post->s_contactNumber,
                ];
                $this->view('Student/v_updateProfile', $data);
            }
        }
        

        // public function updateProfile($id){
        //     $data = $this->studentModel->updateProfile();
        //     if($data-> getRow($id)){
        //         $data['row'] = $data->getRow($id);
        //         $this->view('Student/v_updateProfile', $data);
        //     }
        //     else{
        //         echo "error";
        //     }
        // }

    }

