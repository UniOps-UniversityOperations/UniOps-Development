<?php

    class Timetables extends Controller {

        private $T_postModel;

        public function __construct()
        {
            $this->T_postModel = $this->model('M_Timetable');
        }

        public function addTimetable() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Add Timetable',

                    'timetable_type' => trim($_POST['timetable_type']),
                    'degree' => trim($_POST['degree']),
                    'student_year' => trim($_POST['student_year']),
                    'semester' => trim($_POST['semester']),
                    'academic_year' => trim($_POST['academic_year']),
                    'course_code' => trim($_POST['course_code']),
                    'course_name' => trim($_POST['course_name']),
                    'lecturer_code' => trim($_POST['lecturer_code']),
                    'lecturer_name' => trim($_POST['lecturer_name']),
                    'lecture_room' => trim($_POST['lecture_room']),
                ];

                $this->view('posts/V_addTimetables', $data);
            }
            else {

                $data = [

                    'title' => 'Add Timetable',

                    'timetable_type' => '',
                    'degree' => '',
                    'student_year' => '',
                    'semester' => '',
                    'academic_year' => '',
                    'course_code' => '',
                    'course_name' => '',
                    'lecturer_code' => '',
                    'lecturer_name' => '',
                    'lecture_room' => '',
                ];

                $this->view('Timetables/V_addTimetables', $data);
            }
        }

        public function viewTimetables() {
            $posts = $this->T_postModel->getTimetables();
            $data = [
                'title' => 'Timetables',
                'posts' => $posts
            ];

            $this->view('Timetables/V_viewTimetables', $data);
        }
    }

?>
