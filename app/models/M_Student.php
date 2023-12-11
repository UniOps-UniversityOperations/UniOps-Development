<?php
class M_Student {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function viewProfile(){
        $uid = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM students WHERE user_id = :user_id");
        $this->db->bind(':user_id', $uid);
        return $this->db->single();
    }
    //update
    public function updateStudent($data){
        $this->db->query('UPDATE students SET
            s_id = :s_id
            s_indexNumber = :s_indexNumber,
            s_registrationNumber = :s_registrationNumber,
            s_name = :s_name,
            s_email = :s_email,
            WHERE s_id = :s_id
        ');
        // Bind values
        $this->db->bind(':s_id', $data['l_id']);
        $this->db->bind(':s_name', $data['l_name']);
        $this->db->bind(':l_email', $data['l_email']);
        $this->db->bind(':l_sub1_code', $data['l_sub1_code']);
        $this->db->bind(':l_sub2_code', $data['l_sub2_code']);
        $this->db->bind(':l_sub3_code', $data['l_sub3_code']);   
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    //delete
    public function deleteStudent($id){
        $this->db->query('DELETE FROM students WHERE s_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}

