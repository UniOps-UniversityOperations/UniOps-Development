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

        public function bookingDateSubmitted() {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
              $room_id = $_POST['room_id'];
              $date = $_POST["selectedDate"];
              redirect('Student/viewroombookings/'.$date.'/'.$room_id);
            }
        }

        public function viewBookingGrid($date){
            $data = $this->studentModel->viewBookingGrid($date);
            $this->view('Student/v_viewBookingGrid',$data);
        }  
      

        public function viewBookingGridDateSubmitted() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $dateSelected = $_POST['selectedDate'];
            }
            else {
              $dateSelected = date('Y-m-d');
            }
            redirect('Student/viewBookingGrid/'.$dateSelected.'/');
           
        }
      
        public function roomBookingRequest() {

            IF($_SERVER['REQUEST_METHOD'] == 'POST') {
              $r_id = $_POST['r_id'];
              $booking_date = $_POST['request_date'];
              $startTime = $_POST['startTime'].':00:00';
              $endTime = $_POST['endTime'].':00:00';
              $purpose = $_POST['purpose'];
              $result = $this->studentModel->roomBookingRequest($r_id,$booking_date,$startTime,$endTime,$purpose);//$result variable holds true or false based on the insertion was success or failure.
      
              // Set session variable based on the result
              $_SESSION['booking_result'] = $result;
              echo 'is grid :- '.$_POST['is_Grid'];
              echo 'Start time :- '.$startTime;
              echo 'End Time :- '.$endTime;
              if($_POST['is_Grid'] == '1'){
                redirect('Student/viewBookingGridDateSubmitted');
              }else {
                redirect('Student/viewroombookings/'.$booking_date.'/'.$r_id);
              }
              
            }
      
        }
      

        public function viewProfile(){
            $data = $this->studentModel->viewProfile();
            $this->view('Student/v_viewProfile', $data);
        }

        // public function updateProfile($s_id){
        //     $data = $this->studentModel->updateStudent($s_id);
        //     $this->view('Student/v_updateProfile', $data);
        // }

        public function updateProfile($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST);

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


        // // Function to handle profile picture upload
        // private function uploadProfilePicture($file){
        //     $uploadDirectory = 'images/upload/';
        //     $fileName = uniqid() . '_' . basename($file['name']);
        //     $targetFilePath = $uploadDirectory . $fileName;
        //     if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
        //         return ['success' => true, 'file_path' => $targetFilePath];
        //     }else{
        //         return ['success' => false];
        //     }
        // }

    }

