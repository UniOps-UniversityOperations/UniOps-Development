<?php
class M_Student {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function viewProfile(){
        $uid = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
        $this->db->bind(':user_id', $uid);
        return $this->db->single();
    }
    //update
    public function updateStudent($data){
        $this->db->query('UPDATE students SET
            l_id = :l_id,
            l_name = :l_name,
            l_email = :l_email,
            l_sub1_code = :l_sub1_code,
            l_sub2_code = :l_sub2_code,
            l_sub3_code = :l_sub3_code,
            WHERE l_id = :l_id
        ');
        // Bind values
        $this->db->bind(':l_id', $data['l_id']);
        $this->db->bind(':l_name', $data['l_name']);
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

}

