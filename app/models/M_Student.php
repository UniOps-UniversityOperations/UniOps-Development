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
}
?>
