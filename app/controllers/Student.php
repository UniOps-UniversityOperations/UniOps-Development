<?php

    class Student extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->S_postModel = $this->model('M_Student');
            $this->U_postModel = $this->model('M_Users');



            
        }

        //CRUD for User
        
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

        //CRUD for Student
        
        //Create Student
        public function createStudent(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Student',

                    // 's_id' => trim($_POST['s_id']),
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

                if(empty($data['s_fullName'])){
                    $data['s_codeError'] = 'Please enter Student Code';
                }

                if(empty($data['s_codeError'])){
                    if($this->S_postModel->createStudent($data)){
                        //flash('post_message', 'Student Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('student/viewStudent');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('student/v_createStudent', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Student',

                    // 's_id' => '',
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
                $this->view('student/v_createStudent', $data);
            }  
        }

        //show all students
        public function viewStudent(){
            $posts = $this->S_postModel->getStudent();
            $data = [
                'title' => 'View Student',
                'posts' => $posts
            ];
            $this->view('student/v_viewStudent', $data);
        }

        public function updateStudent($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Student',
                    'postId' => $postId,

                    's_id' => trim($_POST['s_id']),
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
                    if($this->S_postModel->updateStudent($data)){
                        redirect('student/viewStudent');


                        
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->S_postModel->getStudentById($postId);
                $data = [
                    'title' => 'Update Student',

                    's_id' => $post->s_id, //added
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
                $this->view('student/v_updateStudent', $data);
            }
        }

        public function deleteStudent($postId){
            if($this->S_postModel->deleteStudent($postId)){
                redirect('student/viewStudent');
            }else{
                die('Something went wrong');
            }
        }

    }
?>
