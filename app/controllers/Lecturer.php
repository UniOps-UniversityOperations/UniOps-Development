<?php

  class Lecturer extends Controller{

    public $lecturerModel;
    public $userModel;

    public function __construct(){
      $this->lecturerModel = $this->model('lecturermodels/M_Lecturer');
    }

    //show Lecturer Profile
    public function viewProfile(){
      $data = $this->lecturerModel->viewProfile();
      $this->view('Lecturer/v_viewProfile', $data);
    }

    //Edit Profile
    public function editProfile(){
      $data = $this->lecturerModel->viewProfile();
      $this->view('Lecturer/v_updateProfile',$data);
    }

    public function viewRooms() {
      $data = $this->lecturerModel->viewRooms();
      $this->view('Lecturer/v_viewRooms',$data);
    }

    public function viewroombookings($date,$roomId){
      $data = $this->lecturerModel->viewBookings($date,$roomId);
      $this->view('Lecturer/v_viewRoomBookings', $data);
    }

    public function bookingDateSubmitted() {
      if($_SERVER['REQUEST_METHOD'] == "POST") {
        $room_id = $_POST['room_id'];
        $date = $_POST["selectedDate"];
        redirect('Lecturer/viewroombookings/'.$date.'/'.$room_id);
      }
    }

    public function viewBookingGrid($date){
      $data = $this->lecturerModel->viewBookingGrid($date);
      $this->view('Lecturer/v_viewBookingGrid',$data);
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

    public function viewSubjects(){
      $assignedSubjects = $this->lecturerModel->viewAssignedSubjects();
      $PrefferedSubjects = $this->lecturerModel->viewPrefferedSubjects();
      $numofLecHours = $this->lecturerModel->numofLecHours();
      $subjects = $this->lecturerModel->viewSubjects();

      // Initialize an associative array to hold the total hours for each day
      $hourData = [
        'Monday' => 0,
        'Tuesday' => 0,
        'Wednesday' => 0,
        'Thursday' => 0,
        'Friday' => 0,
/*         'Saturday' => 0,
        'Sunday' => 0, */
      ];

      // Iterate through your fetched data and update the total hours for each day
      if(is_array($numofLecHours)){
        foreach ($numofLecHours as $item) {
          $day = $item -> day_of_week;
          $totalHours = $item -> total_hours;
          $hourData[$day] = $totalHours;
        }
      }

      $data = [
        'numofLecHours' => $hourData,
        'assignedSubjects' => $assignedSubjects,
        'PrefferedSubjects' => $PrefferedSubjects,
        'subjects' => $subjects
      ];
      
      $this->view('Lecturer/v_viewSubjects', $data);
    }

    public function timeTable() {
      $timetable = $this->lecturerModel->timeTable();
    }

    public function uploadProfilePicture() {
      if(isset($_POST['submit'])){
        $file = $_FILES['profilePic'];
        $fileName = $file['name'];
        $fileParts = explode('.',$fileName);
        $fileExt = strtolower(end($fileParts));
        $allowedExt = array('jpeg','png','jpg');

        if(in_array($fileExt,$allowedExt)){
          if(!$file['error']){
            if($file['size'] < 5000000) {
              $fileNameNew = $_SESSION['user_id'].".".$fileExt;
              $fileDestination = dirname(dirname(dirname(__FILE__)))."\public\images\profilePictures\lecturerProfilePics\\".$fileNameNew;
  
                // Attempt to move the uploaded file
                if(move_uploaded_file($file['tmp_name'], $fileDestination)) {
        
                    $this->lecturerModel->updateProfilePicture("lecturerProfilePics/".$fileNameNew);
                    $data = $this->lecturerModel->viewProfile();
                    unset($_SESSION['profilePicture']);
                    $this->userModel = $this->model('M_Users');
                    $user = $this->userModel->findUserById($_SESSION['user_id']);
                    $_SESSION['profilePicture'] = $user->profilePicture;
                    $this->view('Lecturer/v_viewProfile', $data);
                } else {
                    echo "Failed to move file.";
                }
              
            } else {
              echo "Your Image is too big.";
            }
          } else {
            echo "There was an error uploading your profile picture.";
          }
        } else {
          echo "You can not upload files of this type.";
        }
      }
    }

    public function clearProfilePicture() {
      $this->lecturerModel->updateProfilePicture("defaultPicture.svg");
      $data = $this->lecturerModel->viewProfile();
      unset($_SESSION['profilePicture']);
      $this->userModel = $this->model('M_Users');
      $user = $this->userModel->findUserById($_SESSION['user_id']);
      $_SESSION['profilePicture'] = $user->profilePicture;
      $this->view('Lecturer/v_viewProfile', $data);
    }

    public function requestSubject() {
      if(isset($_POST['submit'])){
        $sub_code = $_POST['sub_code'];

        //This finds the number of requested subjetcs by a lecturer so that we can set the preference level
        $num_of_requested_subjects = (int) $this->lecturerModel->findnumofrequestedsub();
        $result = $this->lecturerModel->requestSubject($sub_code,$num_of_requested_subjects);
        redirect('Lecturer/viewSubjects');
      }
    }

    public function deletePreferredSubject($sub_code) {
      $this->lecturerModel->deletePreferredSubject($sub_code);
      redirect('Lecturer/viewSubjects');
    }

  }

