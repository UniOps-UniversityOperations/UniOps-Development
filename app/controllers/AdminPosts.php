<?php

    class AdminPosts extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->R_postModel = $this->model('M_Room');
        }

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
                        redirect('AdminPosts/viewRooms');
                        die('done');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    //$this->view('posts/v_createRoom', $data);
                    die('done');
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
                $this->view('AdminPosts/v_createRoom', $data);
            }  
        }


        //show all rooms
        public function viewRooms(){
            $posts = $this->R_postModel->getRooms();
            $data = [
                'title' => 'View Rooms',
                'posts' => $posts
            ];
            $this->view('AdminPosts/v_viewRooms', $data);
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
                $this->view('AdminPosts/v_updateRoom', $data);
            }
               
        }

    }

