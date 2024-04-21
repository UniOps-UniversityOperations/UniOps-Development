<?php

require_once APPROOT . '/controllers/Mail.php';

    class AdminPosts extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->R_postModel = $this->model('M_Room');
            $this->S_postModel = $this->model('M_Subject');
            $this->L_postModel = $this->model('M_Lecturer');
            $this->I_postModel = $this->model('M_Instructor');
            $this->U_postModel = $this->model('M_Users');
            $this->Stu_postModel = $this->model('M_Student');
            $this->A_postModel = $this->model('M_Asset');
            $this->RS_postModel = $this->model('M_requestedSubjects');
            $this->AS_postModel = $this->model('M_assignedSubjects');
            $this->RSI_postModel = $this->model('M_requestedSubjectsInstructor');
            $this->ASI_postModel = $this->model('M_assignedSubjectsInstructor');
            $this->V_postModel = $this->model('M_variables');
            $this->RI_postModel = $this->model('M_RoomImages');
        }



//----- DashBoard-----------------------------------------------------------------------------------------------------------------------------------
    
        //show 
        public function showDashboard(){
            $posts = $this->U_postModel->getUsers();
            $r_count = $this->R_postModel->getCount();
            $s_count = $this->S_postModel->getCount();
            $l_count = $this->L_postModel->getCount();
            $i_count = $this->I_postModel->getCount();
            // number of Students
            $a_count = $this->A_postModel->getCount();
            $vars = $this->V_postModel->getAll();

            $data = [
                'title' => 'View Users',
                'posts' => $posts,
                'r_count' => $r_count,
                's_count' => $s_count,
                'l_count' => $l_count,
                'i_count' => $i_count,
                'a_count' => $a_count,
                'vars' => $vars
            ];
            $this->view('pages/administrator_dashboard', $data);
        }

        //Add User
        public function addUser(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Add User',

                    'user_id' => trim($_POST['user_id']),
                    'username' => trim($_POST['username']),
                    'pwd' => trim($_POST['pwd']),
                    'role' => trim($_POST['role']),
                    
                    'user_idError' => '',
                ];

                if(empty($data['user_id'])){
                    $data['user_idError'] = 'Please enter User ID';
                }

                if(empty($data['user_idError'])){
                    if($this->U_postModel->addUser($data)){
                        //flash('post_message', 'User Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('AdminPosts/showDashboard');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_addUser', $data);
                }
            }else{
                $data = [

                    'title' => 'Add User',

                    'user_id' => '',
                    'username' => '',
                    'pwd' => '',
                    'role' => '',
                    
                    'user_idError' => '',
                ];
                $this->view('adminPosts/v_addUser', $data);
            }
                

        }

        //Update User
        public function updateUser($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update User',
                    'postId' => $postId,

                    'user_id' => trim($_POST['user_id']),
                    'username' => trim($_POST['username']),
                    'pwd' => trim($_POST['pwd']),
                    'role' => trim($_POST['role']),
                    
                ];

                if(1){
                    if($this->U_postModel->updateUser($data)){
                        redirect('AdminPosts/showDashboard');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->U_postModel->getUserById($postId);
                $data = [
                    'title' => 'Update User',

                    'user_id' => $post->user_id,
                    'username' => $post->username,
                    'pwd' => $post->pwd,
                    'role' => $post->role,
                ];
                $this->view('adminPosts/v_updateUser', $data);
            }
        }

        //Delete User
        public function deleteUser($postId){
            if($this->U_postModel->deleteUser($postId)){
                redirect('AdminPosts/showDashboard');
            }else{
                die('Something went wrong');
            }
        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------


//----- CRUD for Room ------------------------------------------------------------------------------------------------------------------------------------

        public function createRoom(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Room',

                    'id' => trim($_POST['id']),
                    'name' => trim($_POST['name']),
                    'type' => trim($_POST['type']),
                    'capacity' => trim($_POST['capacity']),
                    'current_availability' => trim($_POST['current_availability']),
                    'no_of_tables' => trim($_POST['no_of_tables']),
                    'no_of_chairs' => trim($_POST['no_of_chairs']),
                    'no_of_boards' => trim($_POST['no_of_boards']),
                    'no_of_projectors' => trim($_POST['no_of_projectors']),
                    'no_of_computers' => trim($_POST['no_of_computers']),
                    'is_ac' => isset($_POST['is_ac']) ? '1' : '0',
                    'is_wifi' => isset($_POST['is_wifi']) ? '1' : '0',
                    'is_media' => isset($_POST['is_media']) ? '1' : '0',
                    'is_lecture' => isset($_POST['is_lecture']) ? '1' : '0',
                    'is_lab' => isset($_POST['is_lab']) ? '1' : '0',
                    'is_tutorial' => isset($_POST['is_tutorial']) ? '1' : '0',
                    'is_meeting' => isset($_POST['is_meeting']) ? '1' : '0',
                    'is_seminar' => isset($_POST['is_seminar']) ? '1' : '0',         
                    'is_exam' => isset($_POST['is_exam']) ? '1' : '0',
                    
                    'idError' => '',
                ];

                if(empty($data['id'])){
                    $data['idError'] = 'Please enter Room ID';
                }

                if(empty($data['idError'])){
                    if($this->R_postModel->createRoom($data)){
                        //flash('post_message', 'Room Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('adminPosts/viewRooms');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createRoom', $data);
                }
            }  else{
                $data = [

                    'title' => 'Create Room',

                    'id' => '',
                    'name' => '',
                    'type' => '',
                    'capacity' => '',
                    'current_availability' => '',
                    'no_of_tables' => '',
                    'no_of_chairs' => '',
                    'no_of_boards' => '',
                    'no_of_projectors' => '',
                    'no_of_computers' => '',
                    'is_ac' => '',
                    'is_wifi' => '',
                    'is_media' => '',
                    'is_lecture' => '',
                    'is_lab' => '',
                    'is_tutorial' => '',
                    'is_meeting' => '',
                    'is_seminar' => '',         
                    'is_exam' => '',
                    
                    'idError' => '',
                ];
                $this->view('adminPosts/v_createRoom', $data);
            }  
        }

        //show all rooms
        public function viewRooms(){
            $posts = $this->R_postModel->getRooms();
            $images = $this->RI_postModel->getImages();
            $data = [
                'title' => 'View Rooms',
                'posts' => $posts,
                'images' => $images
            ];
            $this->view('adminPosts/v_viewRooms', $data);
        }

        public function updateRoom($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Room',
                    'postId' => $postId,

                    'id' => trim($_POST['id']),
                    'name' => trim($_POST['name']),
                    'type' => trim($_POST['type']),
                    'capacity' => trim($_POST['capacity']),
                    'current_availability' => trim($_POST['current_availability']),
                    'no_of_tables' => trim($_POST['no_of_tables']),
                    'no_of_chairs' => trim($_POST['no_of_chairs']),
                    'no_of_boards' => trim($_POST['no_of_boards']),
                    'no_of_projectors' => trim($_POST['no_of_projectors']),
                    'no_of_computers' => trim($_POST['no_of_computers']),
                    'is_ac' => isset($_POST['is_ac']) ? '1' : '0',
                    'is_wifi' => isset($_POST['is_wifi']) ? '1' : '0',
                    'is_media' => isset($_POST['is_media']) ? '1' : '0',
                    'is_lecture' => isset($_POST['is_lecture']) ? '1' : '0',
                    'is_lab' => isset($_POST['is_lab']) ? '1' : '0',
                    'is_tutorial' => isset($_POST['is_tutorial']) ? '1' : '0',
                    'is_meeting' => isset($_POST['is_meeting']) ? '1' : '0',
                    'is_seminar' => isset($_POST['is_seminar']) ? '1' : '0',         
                    'is_exam' => isset($_POST['is_exam']) ? '1' : '0',
                    
                ];

                if(1){
                    if($this->R_postModel->updateRoom($data)){
                        redirect('AdminPosts/viewRooms');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->R_postModel->getRoomById($postId);
                $data = [
                    'title' => 'Update Room',

                    'id' => $post->id,
                    'name' => $post->name,
                    'type' => $post->type,
                    'capacity' => $post->capacity,
                    'current_availability' => $post->current_availability,
                    'no_of_tables' => $post->no_of_tables,
                    'no_of_chairs' => $post->no_of_chairs,
                    'no_of_boards' => $post->no_of_boards,
                    'no_of_projectors' => $post->no_of_projectors,
                    'no_of_computers' => $post->no_of_computers,
                    'is_ac' => $post->is_ac,
                    'is_wifi' => $post->is_wifi,
                    'is_media' => $post->is_media,
                    'is_lecture' => $post->is_lecture,
                    'is_lab' => $post->is_lab,
                    'is_tutorial' => $post->is_tutorial,
                    'is_meeting' => $post->is_meeting,
                    'is_seminar' => $post->is_seminar,         
                    'is_exam' => $post->is_exam,
                ];
                $this->view('adminPosts/v_updateRoom', $data);
            }
               
        }

        public function deleteRoom($postId){
            if($this->R_postModel->deleteRoom($postId)){
                redirect('AdminPosts/viewRooms');
            }else{
                die('Something went wrong');
            }
        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------


//----- CRUD for Subject -----------------------------------------------------------------------------------------------------------------------------------

                // Structure of the database table:
                // sub_id
                // sub_code
                // sub_name
                // sub_credits
                // sub_year
                // sub_semester
                // sub_stream
                // sub_nStudents
                // sub_isCore
                // sub_isHaveLecture
                // sub_isHaveTutorial
                // sub_isHavePractical
                // sub_isDeleted

        public function createSubject(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Subject',

                    'sub_code' => trim($_POST['sub_code']),
                    'sub_name' => trim($_POST['sub_name']),
                    'sub_credits' => trim($_POST['sub_credits']),
                    'sub_year' => trim($_POST['sub_year']),
                    'sub_semester' => trim($_POST['sub_semester']),
                    'sub_stream' => trim($_POST['sub_stream']),
                    'sub_nStudents' => trim($_POST['sub_nStudents']),
                    'sub_isCore' => isset($_POST['sub_isCore']) ? '1' : '0',
                    'sub_isHaveLecture' => isset($_POST['sub_isHaveLecture']) ? '1' : '0',
                    'sub_isHaveTutorial' => isset($_POST['sub_isHaveTutorial']) ? '1' : '0',
                    'sub_isHavePractical' => isset($_POST['sub_isHavePractical']) ? '1' : '0',

                    'sub_codeError' => ''
                ];

                if(empty($data['sub_code'])){
                    $data['sub_codeError'] = 'Please enter Subject Code';
                }

                if(empty($data['sub_codeError'])){
                    if($this->S_postModel->createSubject($data)){
                        //flash('post_message', 'Subject Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('AdminPosts/viewSubjects');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('adminPosts/v_createSubject', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Subject',

                    'sub_code' => '',
                    'sub_name' => '',
                    'sub_credits' => '',
                    'sub_year' => '',
                    'sub_semester' => '',
                    'sub_stream' => '',
                    'sub_nStudents' => '',
                    'sub_isCore' => '',
                    'sub_isHaveLecture' => '',
                    'sub_isHaveTutorial' => '',
                    'sub_isHavePractical' => '',

                    'sub_codeError' => ''
                ];
                $this->view('adminPosts/v_createSubject', $data);
            }  
        }

        //show all subjects
        public function viewSubjects(){
            $posts = $this->S_postModel->getSubjects();
            $data = [
                'title' => 'View Subjects',
                'posts' => $posts
            ];
            $this->view('adminPosts/v_viewSubjects', $data);
        }

        public function updateSubject($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Subject',
                    'postId' => $postId,

                    'sub_id' => trim($_POST['sub_id']),
                    'sub_code' => trim($_POST['sub_code']),
                    'sub_name' => trim($_POST['sub_name']),
                    'sub_credits' => trim($_POST['sub_credits']),
                    'sub_year' => trim($_POST['sub_year']),
                    'sub_semester' => trim($_POST['sub_semester']),
                    'sub_stream' => trim($_POST['sub_stream']),
                    'sub_nStudents' => trim($_POST['sub_nStudents']),
                    'sub_isCore' => isset($_POST['sub_isCore']) ? '1' : '0',
                    'sub_isHaveLecture' => isset($_POST['sub_isHaveLecture']) ? '1' : '0',
                    'sub_isHaveTutorial' => isset($_POST['sub_isHaveTutorial']) ? '1' : '0',
                    'sub_isHavePractical' => isset($_POST['sub_isHavePractical']) ? '1' : '0'                    
                ];

                if(1){
                    if($this->S_postModel->updateSubject($data)){
                        redirect('AdminPosts/viewSubjects');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->S_postModel->getSubjectById($postId);
                $data = [
                    'title' => 'Update Subject',

                    'sub_id' => $post->sub_id,
                    'sub_code' => $post->sub_code,
                    'sub_name' => $post->sub_name,
                    'sub_credits' => $post->sub_credits,
                    'sub_year' => $post->sub_year,
                    'sub_semester' => $post->sub_semester,
                    'sub_stream' => $post->sub_stream,
                    'sub_nStudents' => $post->sub_nStudents,
                    'sub_isCore' => $post->sub_isCore,
                    'sub_isHaveLecture' => $post->sub_isHaveLecture,
                    'sub_isHaveTutorial' => $post->sub_isHaveTutorial,
                    'sub_isHavePractical' => $post->sub_isHavePractical
                ];
                $this->view('adminPosts/v_updateSubject', $data);
            }
        }

        /*
            The deletion has to be from these tables:
                subjects
                assignedSubjects
                i_assignedSubjects_practical
                i_assignedSubjects_tutorial
                requestedSubjects
                requestedSubjectsInstructor
        */

        public function deleteSubject($postId, $subject_code){
            // die("postID = " . $postId . "    subject_code = " . $subject_code);
            if($this->S_postModel->deleteSubject($postId) && 
                $this->AS_postModel->deleteForSubject($subject_code) && 
                $this->ASI_postModel->deleteForSubject_p($subject_code) &&
                $this->ASI_postModel->deleteForSubject_t($subject_code) &&
                $this->RS_postModel->deleteForSubject($subject_code) &&
                $this->RSI_postModel->deleteForSubject($subject_code)
                ){
                redirect('AdminPosts/viewSubjects');
            }else{
                die('Something went wrong');
            }
        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------


//----- CRUD for Lecturer --------------------------------------------------------------------------------------------------------------------------------
        
        //Create Lecturer
        public function createLecturer(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $sendEmail = isset($_POST['sendEmail']) ? '1' : '0';
                $data = [

                    'title' => 'Create Lecturer',

                    'l_code' => trim($_POST['l_code']),
                    'l_email' => trim($_POST['l_email']),
                    'l_fullName' => trim($_POST['l_fullName']),
                    'l_nameWithInitials' => trim($_POST['l_nameWithInitials']),
                    'l_gender' => trim($_POST['l_gender']),
                    'l_dob' => trim($_POST['l_dob']),
                    'l_contactNumber' => trim($_POST['l_contactNumber']),
                    'l_address' => trim($_POST['l_address']),
                    'l_department' => trim($_POST['l_department']),
                    'l_positionRank' => trim($_POST['l_positionRank']),
                    'l_dateOfJoin' => trim($_POST['l_dateOfJoin']),
                    'l_qualifications' => trim($_POST['l_qualifications']),
                    'l_isExamSupervisor' => isset($_POST['l_isExamSupervisor']) ? '1' : '0',
                    'l_isSecondExaminar' => isset($_POST['l_isSecondExaminar']) ? '1' : '0',

                    //user
                    'user_id' => trim($_POST['l_email']),
                    'username' => trim($_POST['l_nameWithInitials']),
                    'role' => 'L',
                    'pwd' => trim($_POST['pwd']),
                    
                    'l_codeError' => '',
                ];

                if(empty($data['l_code'])){
                    $data['l_codeError'] = 'Please enter Lecturer Code';
                }

                if(empty($data['l_codeError'])){
                    if($this->L_postModel->createLecturer($data) && $this->U_postModel->addUser($data)){
                        //flash('post_message', 'Lecturer Added');
                        //redirect('pages/administrator_dashboard');

                        //if send email is checked then send email to the lecturer
                        //call the send email function
                        if($sendEmail){
                            $email = $data['l_email'];
                            $pwd = $data['pwd'];
                            $name = $data['l_nameWithInitials'];
                            $this->send_acccount_created_email($email, $pwd, $name);
                        }

                        redirect('adminPosts/viewLecturers');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createLecturer', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Lecturer',

                    'l_code' => '',
                    'l_email' => '',
                    'l_fullName' => '',
                    'l_nameWithInitials' => '',
                    'l_gender' => '',
                    'l_dob' => '',
                    'l_contactNumber' => '',
                    'l_address' => '',
                    'l_department' => '',
                    'l_positionRank' => '',
                    'l_dateOfJoin' => '',
                    'l_qualifications' => '',
                    'l_isExamSupervisor' => '',
                    'l_isSecondExaminar' => '',

                    //user
                    'user_id' => '',
                    'username' => '',
                    'pwd' => '',
                    'role' => '',

                    'l_codeError' => '',
                ];
                $this->view('adminPosts/v_createLecturer', $data);
            }  
        }

        //show all lecturers
        public function viewLecturers(){
            $posts = $this->L_postModel->getLecturers();
            $data = [
                'title' => 'View Lecturers',
                'posts' => $posts
            ];
            $this->view('adminPosts/v_viewLecturers', $data);
        }

        public function updateLecturer($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Lecturer',
                    'postId' => $postId,

                    'l_id' => trim($_POST['l_id']),
                    'l_code' => trim($_POST['l_code']),
                    'l_email' => trim($_POST['l_email']),
                    'l_fullName' => trim($_POST['l_fullName']),
                    'l_nameWithInitials' => trim($_POST['l_nameWithInitials']),
                    'l_gender' => trim($_POST['l_gender']),
                    'l_dob' => trim($_POST['l_dob']),
                    'l_contactNumber' => trim($_POST['l_contactNumber']),
                    'l_address' => trim($_POST['l_address']),
                    'l_department' => trim($_POST['l_department']),
                    'l_positionRank' => trim($_POST['l_positionRank']),
                    'l_dateOfJoin' => trim($_POST['l_dateOfJoin']),
                    'l_qualifications' => trim($_POST['l_qualifications']),
                    'l_isExamSupervisor' => isset($_POST['l_isExamSupervisor']) ? '1' : '0',
                    'l_isSecondExaminar' => isset($_POST['l_isSecondExaminar']) ? '1' : '0',                    
                ];

                if(1){
                    if($this->L_postModel->updateLecturer($data)){
                        redirect('adminPosts/viewLecturers');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->L_postModel->getLecturerById($postId);
                $data = [
                    'title' => 'Update Lecturer',

                    'l_id' => $post->l_id, //added
                    'l_code' => $post->l_code,
                    'l_email' => $post->l_email,
                    'l_fullName' => $post->l_fullName,
                    'l_nameWithInitials' => $post->l_nameWithInitials,
                    'l_gender' => $post->l_gender,
                    'l_dob' => $post->l_dob,
                    'l_contactNumber' => $post->l_contactNumber,
                    'l_address' => $post->l_address,
                    'l_department' => $post->l_department,
                    'l_positionRank' => $post->l_positionRank,
                    'l_dateOfJoin' => $post->l_dateOfJoin,
                    'l_qualifications' => $post->l_qualifications,
                    'l_isExamSupervisor' => $post->l_isExamSupervisor,
                    'l_isSecondExaminar' => $post->l_isSecondExaminar,
                ];
                $this->view('adminPosts/v_updateLecturer', $data);
            }
        }

        /*
            The deletion has to be from these tables:
                subjects
                assignedSubjects
                requestedSubjects
        */

        public function deleteLecturer($postId, $lecturer_code){
            // die("postID = " . $postId . "    lecturer_code = " . $lecturer_code);
            if($this->L_postModel->deleteLecturer($postId) &&
                $this->AS_postModel->deleteForLecturer($lecturer_code) &&
                $this->RS_postModel->deleteForLecturer($lecturer_code)
            ){
                redirect('AdminPosts/viewLecturers');
            }else{
                die('Something went wrong');
            }
        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------


//----- CRUD for Instructor --------------------------------------------------------------------------------------------------------------------------------

            //     Structure of the database table:
            // 1	i_id Primary	int(11)				
            // 2	i_code	varchar(50)		
            // 3	i_email	varchar(50)		
            // 4	i_fullName	varchar(50)		
            // 5	i_nameWithInitials	varchar(50)	
            // 6	i_gender	char(1)
            // 7	i_dob	date		
            // 8	i_contactNumber	varchar(20)	
            // 9	i_address	varchar(255)		
            // 10	i_department	varchar(50)		
            // 11	i_positionRank	varchar(50)		
            // 12	i_dateOfJoin	date	
            // 13	i_qualifications	text	
            // 14	i_isExamInvigilator	tinyint(4)	
            // 15	i_isDeleted	tinyint(4)	


        public function createInstructor(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $sendEmail = isset($_POST['sendEmail']) ? '1' : '0';
                $data = [

                    'title' => 'Create Instructor',

                    'i_code' => trim($_POST['i_code']),
                    'i_email' => trim($_POST['i_email']),
                    'i_fullName' => trim($_POST['i_fullName']),
                    'i_nameWithInitials' => trim($_POST['i_nameWithInitials']),
                    'i_gender' => trim($_POST['i_gender']),
                    'i_dob' => trim($_POST['i_dob']),
                    'i_contactNumber' => trim($_POST['i_contactNumber']),
                    'i_address' => trim($_POST['i_address']),
                    'i_department' => trim($_POST['i_department']),
                    'i_positionRank' => trim($_POST['i_positionRank']),
                    'i_dateOfJoin' => trim($_POST['i_dateOfJoin']),
                    'i_qualifications' => trim($_POST['i_qualifications']),
                    'i_isExamInvigilator' => isset($_POST['i_isExamInvigilator']) ? '1' : '0',

                    //user
                    'user_id' => trim($_POST['i_email']),
                    'username' => trim($_POST['i_nameWithInitials']),
                    'role' => 'I',
                    'pwd' => trim($_POST['pwd']),
                    
                    'i_codeError' => '',
                ];

                if(empty($data['i_code'])){
                    $data['i_codeError'] = 'Please enter Instructor Name';
                }

                if(empty($data['i_codeError'])){
                    if($this->I_postModel->createInstructor($data) && $this->U_postModel->addUser($data)){
                        //flash('post_message', 'Instructor Added');
                        //redirect('pages/administrator_dashboard');

                        //if send email is checked then send email to the instructor
                        //call the send email function
                        if($sendEmail){
                            $email = $data['i_email'];
                            $pwd = $data['pwd'];
                            $name = $data['i_nameWithInitials'];
                            $this->send_acccount_created_email($email, $pwd, $name);
                        }

                        redirect('adminPosts/viewInstructors');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createInstructor', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Instructor',

                    'i_code' => '',
                    'i_email' => '',
                    'i_fullName' => '',
                    'i_nameWithInitials' => '',
                    'i_gender' => '',
                    'i_dob' => '',
                    'i_contactNumber' => '',
                    'i_address' => '',
                    'i_department' => '',
                    'i_positionRank' => '',
                    'i_dateOfJoin' => '',
                    'i_qualifications' => '',
                    'i_isExamInvigilator' => '',

                    //user
                    'user_id' => '',
                    'username' => '',
                    'pwd' => '',
                    'role' => '',

                    'i_codeError' => '',

                ];
                $this->view('adminPosts/v_createInstructor', $data);
            }  
        }

        //show all instructors
        public function viewInstructors(){
            $posts = $this->I_postModel->getInstructors();
            $data = [
                'title' => 'View Instructors',
                'posts' => $posts
            ];
            $this->view('adminPosts/v_viewInstructors', $data);
        }

        public function updateInstructor($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Instructor',
                    'postId' => $postId,

                    'i_id' => trim($_POST['i_id']),
                    'i_code' => trim($_POST['i_code']), 
                    'i_email' => trim($_POST['i_email']),
                    'i_fullName' => trim($_POST['i_fullName']),
                    'i_nameWithInitials' => trim($_POST['i_nameWithInitials']),
                    'i_gender' => trim($_POST['i_gender']),
                    'i_dob' => trim($_POST['i_dob']),
                    'i_contactNumber' => trim($_POST['i_contactNumber']),
                    'i_address' => trim($_POST['i_address']),
                    'i_department' => trim($_POST['i_department']),
                    'i_positionRank' => trim($_POST['i_positionRank']),
                    'i_dateOfJoin' => trim($_POST['i_dateOfJoin']),
                    'i_qualifications' => trim($_POST['i_qualifications']),
                    'i_isExamInvigilator' => isset($_POST['i_isExamInvigilator']) ? '1' : '0',    
                ];

                if(1){
                    if($this->I_postModel->updateInstructor($data)){
                        redirect('adminPosts/viewInstructors');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->I_postModel->getInstructorById($postId);
                $data = [
                    'title' => 'Update Instructor',

                    'i_id' => $post->i_id,
                    'i_code' => $post->i_code,
                    'i_email' => $post->i_email,
                    'i_fullName' => $post->i_fullName,
                    'i_nameWithInitials' => $post->i_nameWithInitials,
                    'i_gender' => $post->i_gender,
                    'i_dob' => $post->i_dob,
                    'i_contactNumber' => $post->i_contactNumber,
                    'i_address' => $post->i_address,
                    'i_department' => $post->i_department,
                    'i_positionRank' => $post->i_positionRank,
                    'i_dateOfJoin' => $post->i_dateOfJoin,
                    'i_qualifications' => $post->i_qualifications,
                    'i_isExamInvigilator' => $post->i_isExamInvigilator,                    
                ];
                $this->view('adminPosts/v_updateInstructor', $data);
            }
        }
        
        //Delete Instructor

         /*
            The deletion has to be from these tables:
                subjects
                assignedSubjects
                i_assignedSubjects_practical
                i_assignedSubjects_tutorial
                requestedSubjectsInstructor
        */

        public function deleteInstructor($postId, $instructor_code){
            // die("postID = " . $postId . "    instructor_code = " . $instructor_code);
            if($this->I_postModel->deleteInstructor($postId) &&
                $this->AS_postModel->deleteForInstructor($instructor_code) &&
                $this->ASI_postModel->deleteForInstructor_p($instructor_code) &&
                $this->ASI_postModel->deleteForInstructor_t($instructor_code) &&
                $this->RSI_postModel->deleteForInstructor($instructor_code)
            ){
                redirect('adminPosts/viewInstructors');
            }else{
                die('Something went wrong');
            }
        }
        
//--------------------------------------------------------------------------------------------------------------------------------------------------------
 

//----- Crud for Student ---------------------------------------------------------------------------------------------------------------------------------

            //     Structure of the database table:
            // 1	s_id Primary	int(11)					
            // 3	s_email	varchar(50)		
            // 4	s_fullName	varchar(50)		
            // 5	s_nameWithInitials	varchar(50)	
            // 7	s_dob	date		
            // 8	s_contactNumber	varchar(20)	
            // 9	s_stream	varchar(255)		
            // 10	s_year	varchar(50)		
            // 11	s_semester	varchar(50)		
            // 12	s_isDeleted	date	
        
        //Create Student
        public function createStudent(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Student',

                    // 's_id' => trim($_POST['s_id']),
                    's_code' => trim($_POST['s_code']),
                    's_fullName' => trim($_POST['s_fullName']),
                    's_nameWithInitial' => trim($_POST['s_nameWithInitial']),
                    's_regNumber' => trim($_POST['s_regNumber']),
                    's_indexNumber' => trim($_POST['s_indexNumber']),
                    's_email' => trim($_POST['s_email']),
                    's_dob' => trim($_POST['s_dob']),
                    's_contactNumber' => trim($_POST['s_contactNumber']),
                    's_stream' => trim($_POST['s_stream']),
                    's_year' => trim($_POST['s_year']),
                    's_semester' => trim($_POST['s_semester']),
                    // 's_isDeleted' => isset($_POST['s_isDeleted']) ? '1' : '0',
                    
                    's_codeError' => '',
                ];

                if(empty($data['s_code'])){
                    $data['s_codeError'] = 'Please enter Student Name';
                }

                if(empty($data['s_codeError'])){
                    if($this->Stu_postModel->createStudent($data)){
                        //flash('post_message', 'Student Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('adminPosts/viewStudent');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createStudent', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Student',

                    's_code' => '',
                    's_fullName' => '',
                    's_nameWithInitial' => '',
                    's_regNumber' => '',
                    's_indexNumber' => '',
                    's_email' => '',
                    's_dob' => '',
                    's_contactNumber' => '',
                    's_stream' => '',
                    's_year' => '',
                    's_semester' => '',
                    // 's_isDeleted' => '',
 
                    // 's_codeError' => '',
                ];
                $this->view('adminPosts/v_createStudent', $data);
            }  
        }

        //show all students
        public function viewStudent(){
            $posts = $this->Stu_postModel->getStudent();
            $data = [
                'title' => 'View Student',
                'posts' => $posts
            ];
            $this->view('adminPosts/v_viewStudent', $data);
        }

        public function updateStudent($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Student',
                    'postId' => $postId,

                    's_id' => trim($_POST['s_id']),
                    's_code' => trim($_POST['s_code']),
                    's_fullName' => trim($_POST['s_fullName']),
                    's_nameWithInitial' => trim($_POST['s_nameWithInitial']),
                    's_regNumber' => trim($_POST['s_regNumber']),
                    's_indexNumber' => trim($_POST['s_indexNumber']),
                    's_email' => trim($_POST['s_email']),
                    's_dob' => trim($_POST['s_dob']),
                    's_contactNumber' => trim($_POST['s_contactNumber']),
                    's_stream' => trim($_POST['s_stream']),
                    's_year' => trim($_POST['s_year']),
                    's_semester' => trim($_POST['s_semester']),
                    's_isDeleted' => isset($_POST['s_isDeleted']) ? '1' : '0',                   
                ];

                if(1){
                    if($this->Stu_postModel->updateStudent($data)){
                        redirect('adminPosts/viewStudent');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->Stu_postModel->getStudentById($postId);
                $data = [
                    'title' => 'Update Student',

                    's_id' => $post->s_id, //added
                    's_code' => $post->s_code,
                    's_fullName' => $post->s_fullName,
                    's_nameWithInitial' => $post->s_nameWithInitial,
                    's_regNumber' => $post->s_regNumber,
                    's_indexNumber' => $post->s_indexNumber,
                    's_email' => $post->s_email,
                    's_dob' => $post->s_dob,
                    's_contactNumber' => $post->s_contactNumber,
                    's_stream' => $post->s_stream,
                    's_year' => $post->s_year,
                    's_semester' => $post->s_semester,
                    's_isDeleted' => $post->s_isDeleted,
            
                ];
                $this->view('adminPosts/v_updateStudent', $data);
            }
        }

        public function deleteStudent($postId){
            if($this->Stu_postModel->deleteStudent($postId)){
                redirect('adminPosts/viewStudent');
            }else{
                die('Something went wrong');
            }
        }

    

        // Crud of the Assets (Database)
//--------------------------------------------------------------------------------------------------------------------------------------------------------
        

//----- Crud of the Assets (Database) -------------------------------------------------------------------------------------------------------------------- 
        /* 
            the structure of the assets table

            a_id
            a_code
            a_type
            a_addedDate
            a_isInUse
            a_isDeleted
        */

        public function viewAssets(){
            $posts = $this->A_postModel->getAssets();
            $data = [
                'title' => 'View Assets',
                'posts' => $posts
            ];
            $this->view('adminPosts/v_viewAssets', $data);
        }

        //Create Asset
        public function createAsset(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => 'Create Asset',

                    'a_code' => trim($_POST['a_code']),
                    'a_type' => trim($_POST['a_type']),
                    'a_addedDate' => trim($_POST['a_addedDate']),
                    'a_isInUse' => isset($_POST['a_isInUse']) ? '1' : '0',

                    'a_codeError' => '',
                ];

                if(empty($data['a_code'])){
                    $data['a_codeError'] = 'Please enter Asset Code';
                }

                if(empty($data['a_codeError'])){
                    if($this->A_postModel->createAsset($data)){
                        //flash('post_message', 'Asset Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('adminPosts/viewAssets');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createAsset', $data);

                }
            }  else{
                $data = [
                    'title' => 'Create Asset',

                    'a_code' => '',
                    'a_type' => '',
                    'a_addedDate' => '',
                    'a_isInUse' => '',

                    'a_codeError' => '',
                ];
                $this->view('adminPosts/v_createAsset', $data);
            }  
        }

        //Update Asset
        public function updateAsset($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => 'Update Asset',
                    'postId' => $postId,

                    'a_id' => trim($_POST['a_id']),
                    'a_code' => trim($_POST['a_code']),
                    'a_type' => trim($_POST['a_type']),
                    'a_addedDate' => trim($_POST['a_addedDate']),
                    'a_isInUse' => isset($_POST['a_isInUse']) ? '1' : '0',
                ];

                if(1){
                    if($this->A_postModel->updateAsset($data)){
                        redirect('adminPosts/viewAssets');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->A_postModel->getAssetById($postId);
                $data = [
                    'title' => 'Update Asset',

                    'a_id' => $post->a_id,
                    'a_code' => $post->a_code,
                    'a_type' => $post->a_type,
                    'a_addedDate' => $post->a_addedDate,
                    'a_isInUse' => $post->a_isInUse,
                ];
                $this->view('adminPosts/v_updateAsset', $data);
            }
        }

        //Delete Asset
        public function deleteAsset($postId){
            if($this->A_postModel->deleteAsset($postId)){
                redirect('adminPosts/viewAssets');
            }else{
                die('Something went wrong');
            }
        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------


// ----- For Lecturer asign Subjects -----------------------------------------------------------------------------------------------------------------------------------
        //Assign Subjects to Lecturer
        public function assignSubjects($postId, $popup = 0){
            $postsRS = $this->RS_postModel->getSubjects($postId);
            $postsAS = $this->AS_postModel->getSubjects($postId);
            $subjects = $this->AS_postModel->getSubjectDetails();
            $variables = $this->V_postModel->ASPage();
            // get Lecturer name uing the postId(Lecturer code)
            $lecturerName = $this->L_postModel->getLecturerByCode($postId);
            $email = $this->L_postModel->getEmail($postId);
            
            if(!$postsRS){
                $postsRS = "null";
            }

            $data = [
                'postId' => $postId,
                'postsRS' => $postsRS,
                'postsAS' => $postsAS,
                'subjects' => $subjects,
                'variables' => $variables,
                'lecturerName' => $lecturerName,
                'email' => $email,
                'popup' => $popup
            ];
            $this->view('adminPosts/v_assignSubjects', $data);
        }

        public function addToAssignSubjects($sub_code, $lecturer_code){
            // die($sub_code . "and" . $lecturer_code);
            //add subject to the requestedSubjects table
            if($this->AS_postModel->add($sub_code, $lecturer_code)){
                redirect('AdminPosts/assignSubjects/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function deleteRowAS($lecturer_code, $subject_code){
            //die($lecturer_code . " and " . $subject_code);
            if($this->AS_postModel->deleteRowAS($lecturer_code, $subject_code)){
                redirect('AdminPosts/assignSubjects/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function forceAssignLecturers($sub_code, $lecturer_code){
            if($this->AS_postModel->forceAssignLecturers($sub_code, $lecturer_code)){
                redirect('AdminPosts/assignSubjects/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }

        // Send a request email to the lecturer for rqeuesting to remove the subject
        public function sendDeleteRequestEmail($email, $sub_code, $lecturer_code){

            $subject_details = $this->S_postModel->getSubjectDetailsByCode($sub_code);
            $lecturerName = $this->L_postModel->getLecturerByCode($lecturer_code);

            $to = $email;
            $subject = 'Request to Remove Subject from Teaching Assignment';
            $body = "Dear $lecturerName->l_nameWithInitials, <br><br>

            You are receiving this email because the administration of [University/Organization Name] has requested the removal of a subject from your teaching assignment.<br><br>
            
            Subject Name: $subject_details->sub_name <br>
            Subject Code: $sub_code <br>
            Subject Credits: $subject_details->sub_credits <br>
            Subject Stream: $subject_details->sub_stream <br>
            Subject Year: $subject_details->sub_year <br>
            Subject Semester: $subject_details->sub_semester <br><br>
            
            Due to [reason for removal], it is necessary to adjust the teaching assignments accordingly. We kindly ask for your cooperation in this matter. <br><br>
            
            If you have any questions or concerns regarding this request, please contact the administration at UniOps@gmail.com. <br><br>
            
            Thank you for your attention to this matter. <br><br>
            
            Best regards, <br>
            UniOps Team.";

            $Mail_class = new Mail();
            $Mail_class->sendMail($to, $subject, $body);

            redirect('AdminPosts/assignSubjects/' . $lecturer_code . '/1');

        }

        //send a status email to the lecturer that includes the subject details assigned to him/her
        public function send_AS_status_email($email, $lecturer_code){

            $lecturerName = $this->L_postModel->getLecturerByCode($lecturer_code);
            $postsAS = $this->AS_postModel->getSubjects($lecturer_code);

            $to = $email;
            $subject = 'Subject Assignment Status';
            $body = "Dear $lecturerName->l_nameWithInitials, <br><br>

            You are receiving this email to inform you of the status of the subjects assigned to you for teaching.<br><br>

            The following subjects have been assigned to you for teaching:<br><br>";

            $body .= "<table border='1'>
                        <tr>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Subject Credits</th>
                            <th>Subject Stream</th>
                            <th>Subject Year</th>
                            <th>Subject Semester</th>
                        </tr>";

            foreach ($postsAS as $post) {
                $body .= "<tr>
                            <td>$post->sub_name</td>
                            <td>$post->sub_code</td>
                            <td>$post->sub_credits</td>
                            <td>$post->sub_stream</td>
                            <td>$post->sub_year</td>
                            <td>$post->sub_semester</td>
                        </tr>";
            }

            $body .= "</table>";


            $body .= "If you have any questions or concerns regarding this assignment, please contact the administration at UniOps@gmai.com. <br><br>

            Thank you for your attention to this matter. <br><br>

            Best regards, <br>
            UniOps Team.";

            $Mail_class = new Mail();
            $Mail_class->sendMail($to, $subject, $body);

            redirect('AdminPosts/assignSubjects/' . $lecturer_code . '/2');

        }

        //Send an email to emai_lecturer_code askimg for removing the subject to assign to another lecturer (lecturer_code)
        public function sendForceEmail($send_lecturer_code, $sub_code, $lecturer_code){

            $send_lec_name = '';
            if($this->L_postModel->getLecturerByCode($send_lecturer_code)){
                $send_lec_name = $this->L_postModel->getLecturerByCode($send_lecturer_code)->l_nameWithInitials;
                $send_lec_email = $this->L_postModel->getEmail($send_lecturer_code)->l_email;
            }else{
                $send_lec_name = $this->I_postModel->getInstructorByCode($send_lecturer_code)->i_nameWithInitials;
                $send_lec_email = $this->I_postModel->getEmail($send_lecturer_code)->i_email;
            }

            $lec_name = $this->L_postModel->getLecturerByCode($lecturer_code);
            $subject_details = $this->S_postModel->getSubjectDetailsByCode($sub_code);

            $to = $send_lec_email;
            $subject = 'Request to Remove Subject from Teaching Assignment';

            $body = "Dear $send_lec_name;, <br><br>

            You are receiving this email because the administration of UniOps has requested the removal of a subject for the teaching assignment of $lec_name->l_nameWithInitials.<br><br>

            Subject Name: $subject_details->sub_name <br>
            Subject Code: $sub_code <br>
            Subject Credits: $subject_details->sub_credits <br>
            Subject Stream: $subject_details->sub_stream <br>
            Subject Year: $subject_details->sub_year <br>
            Subject Semester: $subject_details->sub_semester <br><br>

            Due to request of administration / $lec_name->l_nameWithInitials, it is necessary to adjust the teaching assignments accordingly. We kindly ask for your cooperation in this matter. <br><br>

            If you have any questions or concerns regarding this request, please contact the administration at UniOps@gmailcom. <br><br>

            Thank you for your attention to this matter. <br><br>

            Best regards, <br>
            UniOps Team.";

            $Mail_class = new Mail();
            $Mail_class->sendMail($to, $subject, $body );

            redirect('AdminPosts/assignSubjects/' . $lecturer_code . '/1');


        }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------


// ----- For Instructor asign Subjects ------------------------------------------------------------------------------------------------------------------------------

        public function assignSubjectsInstructor($postId){
            $postsRS = $this->RSI_postModel->getSubjects($postId);
            $postsASI = $this->ASI_postModel->getSubjects($postId);
            $subjects = $this->ASI_postModel->getSubjectDetails();
            $variables = $this->V_postModel->getAll();
            // get instructor name uing the postId(instructor code)
            $instructorName = $this->I_postModel->getInstructorByCode($postId);
            $email = $this->I_postModel->getEmail($postId);
            
            if(!$postsRS){
                $postsRS = "null";
            }

            $data = [
                'postId' => $postId,
                'postsRS' => $postsRS,
                'postsASI' => $postsASI,
                'subjects' => $subjects,
                'variables' => $variables,
                'instructorName' => $instructorName,
                'email' => $email
            ];
            $this->view('adminPosts/v_assignSubjectsInstructor', $data);
        }

        public function deleteRowASI($instructor_code, $subject_code){
            //die($lecturer_code . " and " . $subject_code);
            if($this->ASI_postModel->deleteRowASI($instructor_code, $subject_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        //assign lecture...

        public function i_addToAssignSubjects($sub_code, $lecturer_code){
            // die($sub_code . "and" . $lecturer_code);
            //add subject to the requestedSubjects table
            if($this->AS_postModel->add($sub_code, $lecturer_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_deleteRowAS($lecturer_code, $subject_code){
            //die($lecturer_code . " and " . $subject_code);
            if($this->AS_postModel->deleteRowAS($lecturer_code, $subject_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_forceAssignLecturers($sub_code, $lecturer_code){
            if($this->AS_postModel->forceAssignLecturers($sub_code, $lecturer_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $lecturer_code);
            }
            else{
                die('Something went wrong');
            }
        }
        
        //assign practical...

        public function i_addToAssignPractical($sub_code, $instructor_code){
            // die($sub_code . "and" . $lecturer_code);
            //add subject to the requestedSubjects table
            if($this->ASI_postModel->add_p($sub_code, $instructor_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_deleteRow_p($instructor_code, $subject_code){
            // die($instructor_code . " and " . $subject_code);
            if($this->ASI_postModel->deleteRow_p($instructor_code, $subject_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_forceAssignPractical($sub_code, $instructor_code){
            if($this->ASI_postModel->forceAssign_p($sub_code, $instructor_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        //assign tutorial...

        public function i_addToAssignTutorial($sub_code, $instructor_code){
            // die($sub_code . "and" . $lecturer_code);
            //add subject to the requestedSubjects table
            if($this->ASI_postModel->add_t($sub_code, $instructor_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_deleteRow_t($instructor_code, $subject_code){
            // die($instructor_code . " and " . $subject_code);
            if($this->ASI_postModel->deleteRow_t($instructor_code, $subject_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        public function i_forceAssignTutorial($sub_code, $instructor_code){
            if($this->ASI_postModel->forceAssign_t($sub_code, $instructor_code)){
                redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
            }
            else{
                die('Something went wrong');
            }
        }

        //emails

        //send a status email to the instructor that includes the subject details assigned to him/her
        public function send_ASI_status_email($email, $instructor_code){

            $instructorName = $this->I_postModel->getInstructorByCode($instructor_code);
            $postsASI = $this->ASI_postModel->getSubjects($instructor_code);

            $to = $email;
            $subject = 'Subject Assignment Status';
            $body = "Dear $instructorName->i_nameWithInitials, <br><br>

            You are receiving this email to inform you of the status of the subjects assigned to you for teaching.<br><br>

            The following subjects have been assigned to you for teaching:<br><br>";

            $body .= "<table border='1'>
                        <tr>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Subject Credits</th>
                            <th>Subject Stream</th>
                            <th>Subject Year</th>
                            <th>Subject Semester</th>
                            <th>Lecture</th>
                            <th>Practical</th>
                            <th>Tutorial</th>
                        </tr>";

            foreach ($postsASI as $post) {
                $body .= "<tr>
                            <td>$post->sub_name</td>
                            <td>$post->sub_code</td>
                            <td>$post->sub_credits</td>
                            <td>$post->sub_stream</td>
                            <td>$post->sub_year</td>
                            <td>$post->sub_semester</td>";
                            if($post->lecturer_code == $instructor_code){
                                $body .= "<td><p> <span style='color: green;'>&#10004;</span> </p> </td>";
                            }else{
                                $body .= "<td><p> <span style='color: red;'>&#10008;</span> </p> </td>";
                            }
                            if($post->p_instructor_code == $instructor_code){
                                $body .= "<td><p> <span style='color: green;'>&#10004;</span> </p> </td>";
                            }else{
                                $body .= "<td><p> <span style='color: red;'>&#10008;</span> </p> </td>";
                            }
                            if($post->t_instructor_code == $instructor_code){
                                $body .= "<td><p> <span style='color: green;'>&#10004;</span> </p> </td></tr>";
                            }else{
                                $body .= "<td><p> <span style='color: red;'>&#10008;</span> </p> </td></tr>";
                            }
            }

            $body .= "</table>";

            $body .= "If you have any questions or concerns regarding this assignment, please contact the administration at UniOps.@gmail.com. <br><br>

            Thank you for your attention to this matter. <br><br>

            Best regards, <br>
            UniOps Team.";

            $Mail_class = new Mail();
            $Mail_class->sendMail($to, $subject, $body);

            redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
        }

        //Send a lecture request email to the instructor for rqeuesting to remove the subject lecture
        public function sendDeleteRequestEmailLPT($email=0, $sub_code=0, $instructor_code=0, $lpt=0){
            // die("email = $email <br>sub_code = $sub_code <br>instructor_code = $instructor_code <br>lpt = $lpt");

            $subject_details = $this->S_postModel->getSubjectDetailsByCode($sub_code);
            $instructorName = $this->I_postModel->getInstructorByCode($instructor_code);

            $to = $email;

            if($lpt == 1){
                $subject = 'Request to Remove Subject Lecture from Teaching Assignment';
            }else if($lpt == 2){
                $subject = 'Request to Remove Subject Practical from Teaching Assignment';
            }else{
                $subject = 'Request to Remove Subject Tutorial from Teaching Assignment';
            }

            $body = "Dear $instructorName->i_nameWithInitials, <br><br>

            You are receiving this email because the administration of [University/Organization Name] has requested the removal of a subject";
            if($lpt == 1){
                $body .= " lecture";
            }else if($lpt == 2){
                $body .= " practical";
            }else{
                $body .= " tutorial";
            }
            $body .= " from your teaching assignment.<br><br>

            Subject Name: $subject_details->sub_name <br>
            Subject Code: $sub_code <br>
            Subject Credits: $subject_details->sub_credits <br>
            Subject Stream: $subject_details->sub_stream <br>
            Subject Year: $subject_details->sub_year <br>
            Subject Semester: $subject_details->sub_semester <br><br>

            Due to [reason for removal], it is necessary to adjust the teaching assignments accordingly. We kindly ask for your cooperation in this matter. <br><br>

            If you have any questions or concerns regarding this request, please contact the administration at UniOps@gmail.com. <br><br>

            Thank you for your attention to this matter. <br><br>

            Best regards, <br>
            UniOps Team.";

            $Mail_class = new Mail();
            $Mail_class->sendMail($to, $subject, $body);

            redirect('AdminPosts/assignSubjectsInstructor/' . $instructor_code);
        }

        
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
    

     //Send test mail call the view test mail
     public function sendTestMail(){

        //Call the sendMail function to send the mail Controller
        
        $Mail_class = new Mail();
        $response = $Mail_class->sendMail('cltowandl@gmail.com', "test", "test message");

        $response = '';
        // sendMail('cltowandl@gmail.com', "test", "test message");
        $data = [
            'title' => 'Send Test Mail',
            'response' => $response
        ];
        $this->view('test/v_sendTestMail', $data);
    }

    //dummy index
    public function index(){
    }


//Emails --------------------------------------------------------------------------------------------------------------------------------------------------------

    //send created account email
        public function send_acccount_created_email($email, $pwd, $name){
            
            $to = $email;
            $subject = 'Account Created';

            $body = 'Dear ' . $name . ',<br><br>';

            $body .= 'We are pleased to inform you that your account for the UniOps system has been successfully created.<br><br>

            Your login credentials are as follows:<br><br>

            Username: ' . $email . '<br>
            Temporary Password: ' . $pwd . '<br><br>

            We kindly request you to log in to the system using the provided credentials. Upon logging in, you will have the opportunity to change your password for added security.<br><br>

            Should you encounter any difficulties during the login process or have any inquiries regarding the system, please do not hesitate to contact the system administrator for assistance.<br><br>

            Thank you for your attention to this matter.<br><br>

            Best Regards,<br>
            UniOps Team.';


            $mail = new Mail();
            $mail->sendMail($to, $subject, $body);

        }

//--------------------------------------------------------------------------------------------------------------------------------------------------------

}

?>