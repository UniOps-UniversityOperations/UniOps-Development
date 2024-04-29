<?php

require_once APPROOT . '/controllers/Mail.php';

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
        $_SESSION['profilePicture'] = $user->profilePicture;
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


    //All the below Functions are for forgot password functionality.
    
    public function resetPasswordPage() {
        $this->view('v_resetPassword');
    }

    public function resetPassword() {

        if(isset($_POST['resetrequest'])) {

            $email = $_POST["email"];
            if(!$this->userModel->findUserById($email)){
                die('User Does not exist.');
            }


            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "localhost/UniOps/users/createnewpwd/".$selector."/".bin2hex($token);

            $expires = date("U") + 5*60;
           

            $to = $email;
            $subject = "Reset Your Password for UniOps";
            $body = "<p>We recieved a password reset request.The link to reset your password is below.If you did not make this request
             you can ignore this email.</p>";

            $body .= "<p>Here is your password reset link : </br>";
            $body .= "<a href='".$url."'>".$url."</a></p>";

            $result = $this->userModel->resetpwd($email,$selector,$token,$expires);
            if($result) {
                $Mail_class = new Mail();
                $result = $Mail_class->sendMail($to, $subject, $body);
                $this->view('v_resetPassword',$result);
                
            } else{
                die("Something went wrong :-(");
            }

        } else {
            redirect('users/resetPasswordPage');
        }

    }

    public function createnewpwd() {
        $this->view('v_createNewPassword');
    }

    public function resetpasswordsubmit() {

        if(isset($_POST['reset-password-submit'])) {

            $selector = $_POST['selector'];
            $validator = $_POST['validator'];
            $pwd = $_POST['pwd'];
            $pwdRepeat = $_POST['pwd-repeat'];

            if(empty($pwd) || empty($pwdRepeat)) {
                die("No password entered.");
            } else if($pwd != $pwdRepeat) {
                die("Password entered does not match password repeat.");
            }

            $currentDate = date('U');

            $result = $this->userModel->resetpasswordsubmit($selector,$currentDate);

            if(!$result){
                die("You need to resubmit your reset request.");
            } else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin,$result->pwdResetToken);

                if($tokenCheck) {

                    $tokenemail = $result->pwdResetEmail;
                    if(!$this->userModel->findUserById($tokenemail)){
                        die('You need to resubmit your reset request.');
                    } else {
                        $this->userModel->updatePassword($pwd,$tokenemail);
                        redirect('users/login/PasswordReset');
                    }

                } else {
                    die("You need to resubmit your reset request.");
                }
            }


        }else {
            redirect('users/login');
        }

    }
}