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
                    die('SUCCESS');
                }else{
                    $data['passwordError'] = 'Password incorrect';
                    //redirect to login
                    $this->view('V_login', $data);
                }
            }else{
                //load view with errors
                $this->view('V_login', $data);
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
            $this->view('V_login', $data);
        }
    }
}