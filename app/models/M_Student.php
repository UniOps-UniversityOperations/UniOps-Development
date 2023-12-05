<?php

class M_Student extends Database {
    public function_construct(){
        $this->db = new Database();
    }

    public function viewprofile(){
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM students WHERE stud_id = :id";
        $this->query($sql);
        $this->bind(':id',$id);
        return $this->single();


    }
}