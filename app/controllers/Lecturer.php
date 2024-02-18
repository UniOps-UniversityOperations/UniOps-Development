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

  }

