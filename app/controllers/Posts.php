<?php

    class Posts extends Controller{
        public function __construct(){
            //echo 'This is the posts controller';
            $this->LR_postModel = $this->model('M_LectureRoom');
        }

        public function createLectureRoom(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Lecture Room',

                    'LR_ID' => trim($_POST['LR_ID']),
                    'LR_Name' => trim($_POST['LR_Name']),
                    'LR_Capacity' => trim($_POST['LR_Capacity']),
                    'LR_Current_Avaliability' => trim($_POST['LR_Current_Avaliability']),
                    'LR_No_of_Chairs' => trim($_POST['LR_No_of_Chairs']),
                    'LR_No_of_Tables' => trim($_POST['LR_No_of_Tables']),
                    'LR_No_of_Bords' => trim($_POST['LR_No_of_Bords']),
                    'LR_No_of_Projectors' => trim($_POST['LR_No_of_Projectors']),
                    'LR_is_AC' => isset($_POST['LR_is_AC']) ? '1' : '0',
                    'LR_is_Media' => isset($_POST['LR_is_Media']) ? '1' : '0',
                    'LR_is_Wifi' => isset($_POST['LR_is_Wifi']) ? '1' : '0',
                    'LR_is_Lecture' => isset($_POST['LR_is_Lecture']) ? '1' : '0',
                    'LR_is_Tutorial' => isset($_POST['LR_is_Tutorial']) ? '1' : '0',
                    'LR_is_Lab' => isset($_POST['LR_is_Lab']) ? '1' : '0',
                    'LR_is_Seminar' => isset($_POST['LR_is_Seminar']) ? '1' : '0',         
                    'LR_is_Exam' => isset($_POST['LR_is_Exam']) ? '1' : '0',
                    'LR_is_Meeeting' => isset($_POST['LR_is_Meeeting']) ? '1' : '0',
                    
                    'LR_IDError' => '',
                ];

                if(empty($data['LR_ID'])){
                    $data['LR_IDError'] = 'Please enter Lecture Room ID';
                }

                if(empty($data['LR_IDError'])){
                    if($this->LR_postModel->createLectureRoom($data)){
                        //flash('post_message', 'Lecture Room Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('posts/viewLectureRooms');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createLectureRoom', $data);
                }

            }else{
                $data = [

                    'title' => 'Create Lecture Room',

                    'LR_ID' => '',
                    'LR_Name' => '',
                    'LR_Capacity' => '',
                    'LR_Current_Avaliability' => '',
                    'LR_No_of_Chairs' => '',
                    'LR_No_of_Tables' => '',
                    'LR_No_of_Bords' => '',
                    'LR_No_of_Projectors' => '',
                    'LR_is_AC' => '',
                    'LR_is_Media' => '',
                    'LR_is_Wifi' => '',
                    'LR_is_Lecture' => '',
                    'LR_is_Tutorial' => '',
                    'LR_is_Lab' => '',
                    'LR_is_Seminar' => '',         
                    'LR_is_Exam' => '',
                    'LR_is_Meeeting' => '',
                    
                    'LR_IDError' => '',
                ];
                $this->view('posts/v_createLectureRoom', $data);
            }
        }
      
        //show all lecture rooms
        public function viewLectureRooms(){
            $posts = $this->LR_postModel->getLectureRooms();

            $data = [
                'title' => 'Lecture Rooms',
                'posts' => $posts
            ];

            $this->view('posts/v_viewLectureRooms', $data);
        }


        public function updateLectureRoom($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Lecture Room',
                    'pos_id' => $postId, //added

                    'LR_ID' => trim($_POST['LR_ID']),
                    'LR_Name' => trim($_POST['LR_Name']),
                    'LR_Capacity' => trim($_POST['LR_Capacity']),
                    'LR_Current_Avaliability' => trim($_POST['LR_Current_Avaliability']),
                    'LR_No_of_Chairs' => trim($_POST['LR_No_of_Chairs']),
                    'LR_No_of_Tables' => trim($_POST['LR_No_of_Tables']),
                    'LR_No_of_Bords' => trim($_POST['LR_No_of_Bords']),
                    'LR_No_of_Projectors' => trim($_POST['LR_No_of_Projectors']),
                    'LR_is_AC' => isset($_POST['LR_is_AC']) ? '1' : '0',
                    'LR_is_Media' => isset($_POST['LR_is_Media']) ? '1' : '0',
                    'LR_is_Wifi' => isset($_POST['LR_is_Wifi']) ? '1' : '0',
                    'LR_is_Lecture' => isset($_POST['LR_is_Lecture']) ? '1' : '0',
                    'LR_is_Tutorial' => isset($_POST['LR_is_Tutorial']) ? '1' : '0',
                    'LR_is_Lab' => isset($_POST['LR_is_Lab']) ? '1' : '0',
                    'LR_is_Seminar' => isset($_POST['LR_is_Seminar']) ? '1' : '0',         
                    'LR_is_Exam' => isset($_POST['LR_is_Exam']) ? '1' : '0',
                    'LR_is_Meeeting' => isset($_POST['LR_is_Meeeting']) ? '1' : '0',
                    
                    'LR_IDError' => '',
                ];

                if(empty($data['LR_ID'])){
                    $data['LR_IDError'] = 'Please enter Lecture Room ID';
                }

                if(1){
                    if($this->LR_postModel->updateLectureRoom($data)){
                        //flash('post_message', 'Lecture Room Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('posts/viewLectureRooms');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_updateLectureRoom', $data);
                }

            }else{
                $post = $this->LR_postModel->getLectureRoomById($postId);
                $data = [

                    'title' => 'Create Lecture Room',
                    'LR_ID' => $post->LR_ID,
                    'LR_Name' => $post->LR_Name,
                    'LR_Capacity' => $post->LR_Capacity,
                    'LR_Current_Avaliability' => $post->LR_Current_Avaliability,
                    'LR_No_of_Chairs' => $post->LR_No_of_Chairs,
                    'LR_No_of_Tables' => $post->LR_No_of_Tables,
                    'LR_No_of_Bords' => $post->LR_No_of_Bords,
                    'LR_No_of_Projectors' => $post->LR_No_of_Projectors,
                    'LR_is_AC' => '',
                    'LR_is_Media' => '',
                    'LR_is_Wifi' => '',
                    'LR_is_Lecture' => '',
                    'LR_is_Tutorial' => '',
                    'LR_is_Lab' => '',
                    'LR_is_Seminar' => '',         
                    'LR_is_Exam' => '',
                    'LR_is_Meeeting' => '',
                    
                    'LR_IDError' => '',
                ];
                $this->view('posts/v_updateLectureRoom', $data);
            }
        }

    }
    

/*
    The attributes of Lecture Room are:
        - LR_ID
        - LR_Name
        - LR_Capacity
        - LR_Current_Avaliability
        - LR_No_of_Chairs
        - LR_No_of_Tables
        - LR_No_of_Bords
        - LR_No_of_Projectors
        - LR_is_AC (A/C or Non A/C)
        - LR_is_Media (Media or Non Media)
        - LR_is_Wifi (Wifi or Non Wifi)
        - LR_is_Lecture (is available for lectures or not)
        - LR_is_Tutorial (is available for tutorials or not)
        - LR_is_Lab (is available for labs or not)
        - LR_is_Seminar (is available for seminars or not)
        - LR_is_Exam (is available for exams or not)
        - LR_is_Meeeting (is available for meetings or not)
*/ 
    