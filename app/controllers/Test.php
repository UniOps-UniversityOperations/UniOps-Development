<?php

    class Test extends Controller{

        public function __construct(){
            $this->RI_postModel = $this->model('M_RoomImages');
        }

        public function viewTest(){

            $data = [];
            $this->view('test/v_uploadImage');
        }

        public function upload(){

            // die('done');

            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $name = $_FILES['image']['name'];
                $type = $_FILES['image']['type'];
                $data = file_get_contents($_FILES['image']['tmp_name']);
                $r_id = 10;
                
                if($this->RI_postModel->upload($r_id, $name, $type, $data)){
                    redirect('Test/viewImages');
                    // die("uploded!");
                }else{
                    die('Something went wrong');
                }
             }else{
                die('No file');
            }
        }


        public function viewImages(){
            $posts = $this->RI_postModel->getImages(10);
            $data = [
                'title' => 'View Images',
                'posts' => $posts
            ];
            $this->view('test/v_uploadImage', $data);
        }

        
    }