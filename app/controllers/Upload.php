<?php

class Upload extends Controller{

    public function __construct(){
        $this->RI_postModel = $this->model('M_RoomImages');
    }


    public function uploadImage($id){

        // die('done');

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $data = file_get_contents($_FILES['image']['tmp_name']);
            $r_id = $id;
            
            if($this->RI_postModel->upload($r_id, $name, $type, $data)){
                //redirect to view rooms page
                //go to url adminPosts/viewRooms' page
                header('location: ' . URLROOT . '/AdminPosts/viewRooms');
                //die("uploded!");
            }else{
                die('Something went wrong');
            }
         }else{
            die('No file');
        }
    }
}