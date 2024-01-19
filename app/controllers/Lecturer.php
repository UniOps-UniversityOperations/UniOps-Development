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

    public function viewRooms() {
      $data = $this->lecturerModel->viewRooms();
      $this->view('Lecturer/v_viewrooms',$data);
    }

    public function viewroom(){
      $data = $this->lecturerModel->viewBookings('E401');
      $this->view('Lecturer/v_viewroom', $data);
    }

  }

