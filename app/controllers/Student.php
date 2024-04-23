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

        public function viewBookingGridDateSubmitted() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $dateSelected = $_POST['selectedDate'];
            }
            else {
              $dateSelected = date('Y-m-d');
            }
            redirect('Lecturer/viewBookingGrid/'.$dateSelected.'/');
           
        }
      
        public function roomBookingRequest() {
      
            IF($_SERVER['REQUEST_METHOD'] == 'POST') {
              $r_id = $_POST['r_id'];
              $booking_date = $_POST['request_date'];
              $startTime = $_POST['startTime'].':00:00';
              $endTime = $_POST['endTime'].':00:00';
              $purpose = $_POST['purpose'];
              $result = $this->lecturerModel->roomBookingRequest($r_id,$booking_date,$startTime,$endTime,$purpose);//$result variable holds true or false based on the insertion was success or failure.
      
              // Set session variable based on the result
              $_SESSION['booking_result'] = $result;
              echo 'is grid :- '.$_POST['is_Grid'];
              echo 'Start time :- '.$startTime;
              echo 'End Time :- '.$endTime;
              if($_POST['is_Grid'] == '1'){
                redirect('Lecturer/viewBookingGridDateSubmitted');
              }else {
                redirect('Lecturer/viewroombookings/'.$booking_date.'/'.$r_id);
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

        //   public function lecturer_dashboard(){
        //     $lecturerModel = $this->model('lecturermodels/M_Lecturer');
        //     $current_Day = date('l');
        //     $data = $lecturerModel->getTimeTable($current_Day);
        //     $this->view('pages/Lecturer_dashboard',$data);
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

        // public function uploadProfilePicture() {
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
        //         $file = $_FILES['profile_picture'];
        //         // Check file type, size, and perform any necessary validation
        
        //         // Move the uploaded file to a directory on the server
        //         $uploadDirectory = 'path/to/upload/directory/';
        //         $uploadedFilePath = $uploadDirectory . basename($file['name']);
        //         move_uploaded_file($file['tmp_name'], $uploadedFilePath);
        
        //         // Update user's profile picture in the database
        //         $this->studentModel->updateProfilePicture($uploadedFilePath);
        //     }
        // }
        

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

