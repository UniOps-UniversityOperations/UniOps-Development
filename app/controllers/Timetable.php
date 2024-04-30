<?php

    class Timetable extends Controller {

        // private $model;
        private $course;
        private $timetable;

        public function __construct()
        {
            $model = $this->model('timetables/Model.model');
            $timetable = $this->model('timetables/Timetable_Model.model');
            $academic_year = $this->model('timetables/Academic_Year.model');
            $degree_name = $this->model('timetables/Degree_Name.model');
            $year = $this->model('timetables/Year.model');
            $semester = $this->model('timetables/Semester.model');
            $admin = $this->model('timetables/Auth.model');
            $course = $this->model('timetables/Course.model');
            $lecture_bookings = $this->model('timetables/Lecture_Bookings.model');
            $room = $this->model('timetables/Room.model');
            $timetables = $this->model('timetables/Timetables.model');
            $lecture_timetables = $this->model('timetables/Lecture_Timetable.model');
        }

        // public function timetable($action = null, $id = null) {
        //     // if(!Auth::logged_in()) {
        //     //     message("Please login to view admin section");
        //     //     redirect('login');
        //     // }

        //     // Create a timetable model
        //     $timetable = new Timetable_Model();

        //     $date = date("Y-m-d H:i:s");
        //     // Timetable data
        //     $data = [];
        //     $data['action'] = $action;
        //     $data['id'] = $id;


        //     if($action == 'add')
        //     {

        //         $data['timetables'] = $timetable->findAll('desc');
        //         // Create a calendar model
        //         // $calendar = new Calendar();
        //         // $data['calendars'] = $calendar->findAll('desc');

        //         $academic_year = new Academic_Year();
        //         $data['academic_years'] = $academic_year->findAll('asc');
        //         $data['current_academic_year'] = $academic_year->get_current_academic_year();
        //         $data['current_academic_year_id'] = $academic_year->get_current_academic_year_id();

        //         $degree_name = new Degree_Name();
        //         $data['degree_names'] = $degree_name->findAll();

        //         $year = new Year();
        //         $data['years'] = $year->findAll();

        //         $semester = new Semester();
        //         $data['semesters'] = $semester->findAll();

        //         // $timetable_course = new Timetable_Course();

        //         $course = new Course();
        //         $room = new Room();


        //         if (isset($_GET['type']) && $_GET['type'] === 'fetchCourseCodes') {
        //             $data['course_codes'] = $course->getCourseCodes();
        //             echo json_encode($data['course_codes']);
        //         }

        //         if (isset($_GET['type']) && $_GET['type'] === 'fetchCourseNames') {
        //             $data['course_names'] = $course->getCourseNames();
        //             echo json_encode($data['course_names']);
        //         }



        //         if($id == '1') {
        //             $this->view('timetables/timetables_add_academic.view', $data);
        //         }

        //         else if($id == '2') {

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submitLectureTimetableDetails"])) {

        //                 $timetable_details = $_POST["submitLectureTimetableDetails"];
        //                 // show($timetable_details);die;
        //                 $data_array = $timetable->save_timetable_details($timetable_details);

        //                 if($timetable->validate($data_array)) {

        //                     $user_id = Auth::getId();
                            
        //                     $data_array['added_date'] = $date;
        //                     $data_array['user_id'] = $user_id;

        //                     // show($data_array);die;
        //                     // $timetable->create_timetable($data_array);

        //                     $row = $timetable->first(['user_id'=>$user_id,], 'desc');
                            
                            
        //                     if($row) {
                                
        //                         redirect('timetable/timetable/view/'.$row->id);
        //                         message("Successfully created!");
        //                     }
        //                     else {
        //                         message("Unsuccessful");
        //                         redirect('timetable/timetable');
        //                     }
        //                 }
        //                 $data['errors'] = $timetable->errors;
        //             }



        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submitLectureTimetableCourses"])) {

        //                 $timetable_courses = $_POST["submitLectureTimetableCourses"];

        //                 // $data_array = $timetable_course->save_timetable_courses($timetable_courses);


        //                 $user_id = Auth::getId();

        //                 $count = count($data_array);
        //                 for ($i = 1; $i <= $count; $i++) {
        //                     $data_array['card'.$i]['added_date'] = $date;
        //                     $data_array['card'.$i]['user_id'] = $user_id;
        //                 }
                            
        //                 for ($i = 1; $i <= $count; $i++) {
        //                     // $timetable_course->insert($data_array['card'.$i]);
        //                 }

                        
        //                 // show($data_array);die;
        //             }
                    

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["degreeNameId"])) {
        //                 $degree_name_id = $_POST["degreeNameId"];
        //                 $data['available_years'] = $year->get_available_years($degree_name_id);
        //                 echo json_encode($data['available_years']);
        //                 die;
        //             }

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["yearId"])) {
        //                 $year_id = $_POST["yearId"];
        //                 $data['available_degree_names'] = $degree_name->get_available_degree_names($year_id);
        //                 echo json_encode($data['available_degree_names']);
        //                 die;
        //             }

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["semesterId"])) {
        //                 $semester_id = $_POST["semesterId"];
        //                 echo json_encode($semester_id);
        //                 die;
        //             }

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["courseId"])) {
        //                 $course_id = $_POST["courseId"];
        //                 $data['course_name'] = $course->get_course_name($course_id);
        //                 echo json_encode($data['course_name']);
        //                 die;
        //             }

        //             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["lectureType"])) {
        //                 $lecture_type = $_POST["lectureType"];
        //                 $data['rooms_by_lecture_type'] = $room->getRoomsByLectureType($lecture_type);
        //                 echo json_encode($data['rooms_by_lecture_type']);
        //                 die;
        //             }


        //             $this->view('timetables/add_l_timetable_details.view', $data);
        //         }

        //         else if($id == '3') {
        //             $this->view('timetables/timetables_add_exam.view', $data);
        //         }

        //         if($_SERVER['REQUEST_METHOD'] == "POST") {
        //             if($timetable->validate($_POST))
        //             {
        //                 $_POST['added_date'] = $date;

        //                 $timetable->insert($_POST);
        //                 $row = $timetable->first(['added_date'=>$date,], 'desc');
        //                 // message("Successfully created!");
        //                 if($row) {
        //                     redirect('timetable/timetable/view/'.$row->id);
        //                     // redirect('admin/timetable');
        //                 }
        //                 else {
        //                     message("Unsuccessful");
        //                     redirect('timetable/timetable');
        //                 }
        //             }
        //             $data['errors'] = $timetable->errors;
        //         }
                
        //     }

        //     else if($action == 'edit') {
        //         $this->view('timetables/timetables_edit.view', $data);

        //     }

        //     else if($action == 'view') {
        //         $data['rows'] = $timetable->where(['id'=> $id], 'desc');
        //         $this->view('timetables/timetables_view.view', $data);

        //     }

        //     else {
        //         $data['rows'] = $timetable->findAll('desc');
        //         $this->view('timetables/timetables_index.view', $data);
        //     }

        // }

        public function timetableIndex($action = null, $id = null) {

            $timetable = new Timetable_Model();

            $data['rows'] = $timetable->getTimetables();

            $this->view('timetables/timetables_index.view', $data);

        }


        public function viewTimetable($action = null, $id = null) {

            $lecture_timetables = new Lecture_Timetable();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $data = [

                    'id' => trim($_POST['id']),
                ];

                $data['rows'] = $lecture_timetables->getLectureTimetableById($data);

                // show($data);die;

                $this->view('timetables/timetables_view.view', $data);

            }

        }


        public function showTimetable() {

            $this->view('timetables/timetables_view.view'); 
        }


        public function editTimetable() {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $data = [

                    'id' => trim($_POST['id']),
                ];

                // show($data);die;

                $this->view('timetables/add_l_timetable_courses.view', $data);

            }

        }


        // ----------------------- Timetable Details ------------------------

        public function addTimetableDetails($action = null, $id = null) {

            $data = [];

            $academic_year = new Academic_Year();
            $data['academic_years'] = $academic_year->getAcademicYears();
            $data['current_academic_year'] = $academic_year->get_current_academic_year();
            $data['current_academic_year_id'] = $academic_year->get_current_academic_year_id();
            $data['timetable_error'] = '';


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $data = [

                    'academic_year' => trim($_POST['academic_year']),
                    'stream' => trim($_POST['stream']),
                    'year' => trim($_POST['year']),
                    'semester' => trim($_POST['semester']),
                    'added_date' => date("Y-m-d H:i:s"),
                ];


                $timetable = new Timetable_Model();
                $timetables = new Timetables();

                // show($data);die;

                if($timetable->add_timetables($data)) {

                    $data['timetable_error'] = '';

                    if($timetables->create_timetable_table($data['academic_year'], $data['year'], $data['stream'])) {
                        
                        $timetables->fill_timetable($data['academic_year'], $data['year'], $data['stream']);
                        // $timetables->update_semester($data['semester_id']);

                        // $course->send_timetable_details($data);
                        // $data['rooms'] = $room->get_rooms($data);


                        $_SESSION['timetable_data'] = $data;

                        redirect('timetable/addTimetableCourse');

                    }
                    // die("success");
                }
                else {

                    $academic_year = new Academic_Year();
                    $data['academic_years'] = $academic_year->getAcademicYears();
                    $data['current_academic_year'] = $academic_year->get_current_academic_year();
                    $data['current_academic_year_id'] = $academic_year->get_current_academic_year_id();

                    $data['timetable_error'] = "Timetable Already Exists!";

                }

            }


            $this->view('timetables/add_l_timetable_details.view', $data);
        }


        public function addTimetableCourse($action = null) {

            $data = $_SESSION['timetable_data'];

            $data['timetable_name'] = 
                    $data['academic_year'] . " " . 
                    $data['year'] . "_Year " . 
                    $data['stream'] . " " . 
                    $data['semester'] . "_semester timetable";


            $_SESSION['timetable_data'] = $data;
            
            $this->view('timetables/add_l_timetable_courses.view', $data);
        }



        public function addTimeslot($action = null) {

            $course = new Course();
            $data = $_SESSION['timetable_data'];

            // show($data);die;

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                // show($_POST);die;

                $data['day_of_week'] = trim($_POST['day_of_week']);
                $data['start_time'] = trim($_POST['start_time']);
                $data['end_time'] = trim($_POST['end_time']);
                $data['timeslot_id'] = trim($_POST['timeslot_id']);

                // show($data);die;
            }

            $data['course_codes'] = $course->get_courses($data);

            $_SESSION['timetable_data'] = $data;

            // show($_SESSION['timetable_data']);die;

            $this->view('timetables/add_l_timetable_timeslot.view', $data);
        }


        
        public function addLectureType() {

            $course = new Course();

            $data = $_SESSION['timetable_data'];

                
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["lectureType"])) {
                $data['lecture_type'] = $_POST['lectureType'];
                
                $data['course_codes'] = $course->get_courses_by_lecture_type($data);
                echo json_encode($data['course_codes']);

                $_SESSION['timetable_data'] = $data;
                die;
            }

        }



        public function saveTimeslot($action = null, $id = null) {

            $timetables = new Timetables();
            $course = new Course();
            $room = new Room();

            $data = $_SESSION['timetable_data'];

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                // show($_POST);die;

                $data['selected_course_code'] = trim($_POST['course_code']);
                $data['num_of_students'] = trim($_POST['num_of_students']);

                $data['available_rooms'] = $room->get_available_rooms($data);

                
                // $course->course_added($data['selected_course_code']);

                // show($data);die;
                $_SESSION['timetable_data'] = $data;
                // show($_SESSION['timetable_data']);die;
            }

            $this->view('timetables/add_l_timetable_rooms.view', $data);
        }


        public function saveRoom($action = null, $id = null) {

            $timetables = new Timetables();

            $data = $_SESSION['timetable_data'];

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $data['selected_room'] = trim($_POST['room_code']);

                $timetables->update_timetable($data);

                // $timetables->update_lecturebookings_table($data);

                $_SESSION['timetable_data'] = $data;
                
            }

            $this->view('timetables/add_l_timetable_courses.view', $data);

        }
    }

?>
