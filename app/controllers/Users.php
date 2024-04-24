<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('M_Users');
    }
    
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //form is submitted
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => trim($_POST['user_id']),
                'password' => trim($_POST['password']),

                'Error' => FALSE
            ];

            if(empty($data['user_id']) || empty($data['password'])){
                $data['Error'] = TRUE;
            }
            else{
                
                $user = $this->userModel->findUserById($data['user_id']);

                if(!$user){
                    $data['Error'] = TRUE;
                }
                
            }

            //if no errors login user
            if(!$data['Error']){
                //log the user in
                if($data['password'] == $user->pwd){
                    $this->createUserSession($user);
                    $this->redirectByRole($user->role);
                }
                else{
                    $data['Error'] = TRUE;
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

                'Error' => FALSE
            ];

            //load view
            $this->view('v_login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        // $_SESSION['profilePicture'] = $user->profilePicture;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        redirect('users/login');
    }

    public function redirectByRole($role){
        $uppercaseletter = strtoupper($role);
        switch ($uppercaseletter):
            case "L":
                redirect('pages/lecturer_dashboard');
                break;

            case "I":
                redirect('pages/Instructor_dashboard');
                break;

            case "A":
                redirect('AdminPosts/showDashboard');
                break;

            case "S":
                redirect('pages/Student_dashboard');
                break;
            endswitch;
    }
    
}