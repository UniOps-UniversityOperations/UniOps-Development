<?php

    class AdminPosts extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->R_postModel = $this->model('M_Room');
            $this->S_postModel = $this->model('M_Subject');
            $this->L_postModel = $this->model('M_Lecturer');
            $this->I_postModel = $this->model('M_Instructor');
            $this->U_postModel = $this->model('M_Users');
            $this->A_postModel = $this->model('M_Asset');
            $this->RS_postModel = $this->model('M_requestedSubjects');
            $this->AS_postModel = $this->model('M_assignedSubjects');
            $this->RSI_postModel = $this->model('M_requestedSubjectsInstructor');
            $this->ASI_postModel = $this->model('M_assignedSubjectsInstructor');
            $this->V_postModel = $this->model('M_variables');
        }

//----- CRUD for User -----------------------------------------------------------------------------------------------------------------------------------
    
        //Add User
        public function addUser(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Add User',

                    'user_id' => trim($_POST['user_id']),
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
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
                        redirect('Pages/administrator_dashboard');
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
                    'password' => '',
                    'role' => '',
                    
                    'user_idError' => '',
                ];
                $this->view('adminPosts/v_addUser', $data);
            }
                

        }

        //show all users
        public function viewUsers(){
            $posts = $this->U_postModel->getUsers();
            $data = [
                'title' => 'View Users',
                'posts' => $posts
            ];
            $this->view('pages/administrator_dashboard', $data);
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
                    'password' => trim($_POST['password']),
                    'role' => trim($_POST['role']),
                    
                ];

                if(1){
                    if($this->U_postModel->updateUser($data)){
                        redirect('AdminPosts/viewUsers');
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
                    'password' => $post->password,
                    'role' => $post->role,
                ];
                $this->view('adminPosts/v_updateUser', $data);
            }
        }

        //Delete User
        public function deleteUser($postId){
            if($this->U_postModel->deleteUser($postId)){
                redirect('AdminPosts/viewUsers');
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
            $data = [
                'title' => 'View Rooms',
                'posts' => $posts
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
                    'sub_isCore' => $post->sub_isCore,
                    'sub_isHaveLecture' => $post->sub_isHaveLecture,
                    'sub_isHaveTutorial' => $post->sub_isHaveTutorial,
                    'sub_isHavePractical' => $post->sub_isHavePractical
                ];
                $this->view('adminPosts/v_updateSubject', $data);
            }
        }

        public function deleteSubject($postId){
            if($this->S_postModel->deleteSubject($postId)){
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
                    
                    'l_codeError' => '',
                ];

                if(empty($data['l_code'])){
                    $data['l_codeError'] = 'Please enter Lecturer Code';
                }

                if(empty($data['l_codeError'])){
                    if($this->L_postModel->createLecturer($data)){
                        //flash('post_message', 'Lecturer Added');
                        //redirect('pages/administrator_dashboard');
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

        public function deleteLecturer($postId){
            if($this->L_postModel->deleteLecturer($postId)){
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

                    
                    'i_codeError' => '',
                ];

                if(empty($data['i_code'])){
                    $data['i_codeError'] = 'Please enter Instructor Name';
                }

                if(empty($data['i_codeError'])){
                    if($this->I_postModel->createInstructor($data)){
                        //flash('post_message', 'Instructor Added');
                        //redirect('pages/administrator_dashboard');
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

        public function deleteInstructor($postId){
            if($this->I_postModel->deleteInstructor($postId)){
                redirect('adminPosts/viewInstructors');
            }else{
                die('Something went wrong');
            }
        }

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
        public function assignSubjects($postId){
            $postsRS = $this->RS_postModel->getSubjects($postId);
            $postsAS = $this->AS_postModel->getSubjects($postId);
            $subjects = $this->AS_postModel->getSubjectDetails();
            $variables = $this->V_postModel->ASPage();
            
            if(!$postsRS){
                $postsRS = "null";
            }

            $data = [
                'postId' => $postId,
                'postsRS' => $postsRS,
                'postsAS' => $postsAS,
                'subjects' => $subjects,
                'variables' => $variables,
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

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

// ----- For Instructor asign Subjects ------------------------------------------------------------------------------------------------------------------------------

        public function assignSubjectsInstructor($postId){
            $postsRS = $this->RSI_postModel->getSubjects($postId);
            $postsAS = $this->ASI_postModel->getSubjects($postId);
            $subjects = $this->ASI_postModel->getSubjectDetails();
            // $variables = $this->V_postModel->ASPage();
            
            if(!$postsRS){
                $postsRS = "null";
            }

            $data = [
                'postId' => $postId,
                'postsRS' => $postsRS,
                'postsAS' => $postsAS,
                'subjects' => $subjects,
                // 'variables' => $variables,
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
        
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
    }

