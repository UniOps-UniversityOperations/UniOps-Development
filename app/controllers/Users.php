<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('M_Users');
    }
    
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //form is submitted
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $CB_administrator = isset($_POST['CB_administrator']) ? $_POST['CB_administrator'] : 'false';
            $CB_lecturer = isset($_POST['CB_lecturer']) ? $_POST['CB_lecturer'] : 'false';
            $CB_instructor = isset($_POST['CB_instructor']) ? $_POST['CB_instructor'] : 'false';
            $CB_student = isset($_POST['CB_student']) ? $_POST['CB_student'] : 'false';


            $data = [
                'user_id' => trim($_POST['user_id']),
                'password' => trim($_POST['password']),

                'user_idError' => '',
                'passwordError' => ''
            ];

            //validate usernamepassword
            if(empty($data['user_id'])){
                $data['user_idError'] = 'Please enter username';
            }else{
                if($this->userModel->findUserById($data['user_id'])){
                    //user found

                }else{
                    //user not found
                $data['user_idError'] = 'User not found';
                }
            }

            //validate password
            if(empty($data['password'])){
                $data['passwordError'] = 'Please enter password';
            }

            //if no errors login user
            if(empty($data['user_idError']) && empty($data['passwordError']) ){
                //log the user in
                $loggedInUser = $this->userModel->login($data['user_id'], $data['password']);
                error_log('login');

                if($loggedInUser){
                    //user athunticated
                    //create session
                    if($CB_administrator == 'true'){
                        
                        //check role
                        if($this->userModel->checkRole($data['user_id'], 1)){
                            $this->createUserSession($loggedInUser);
                        }else{
                            $data['passwordError'] = 'Role incorrect';
                            //redirect to login
                            $this->view('v_login', $data);
                        }

                        //$this->createUserSession($loggedInUser);
                    }else if($CB_lecturer == 'true'){
                        die('lecturer');
                    }else if($CB_instructor == 'true'){
                        die('instructor');
                    }else if($CB_student == 'true'){
                        die('student');
                    }else{
                        die('no role');
                    }

                }else{
                    $data['passwordError'] = 'Password incorrect';
                    //redirect to login
                    $this->view('v_login', $data);
                }
            }else{
                //load view with errors
                $this->view('v_login', $data);
            }

            
        }else{
            //initial form
            $data = [
                'user_id' => '',
                'password' => '',

                'user_idError' => '',
                'passwordError' => ''
            ];

            //load view
            $this->view('v_login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;

        redirect('AdminPosts/showDashboard');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
    
}