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

    public function createStudent($data){
        $this->db->query('INSERT INTO students (
            s_id,
            s_fullName,
            s_nameWithInitial,
            s_regNumber,
            S_indexNumber,
            s_email,
            s_dob,
            s_contactNumber,
            s_stream,
            s_year,
            s_semester,
            s_isDeleted,
        ) VALUES (
            :s_id,
            :s_fullName,
            :s_nameWithInitial,
            :s_regNumber,
            :s_indexNumber,
            :s_email,
            :s_dob,
            :s_contactNumber,
            :s_stream,
            :s_year,
            :s_semester,
            :s_isDeleted,
        )');
        // Bind values
        $this->db->bind(':s_id', $data['s_id']);
        $this->db->bind(':s_fullName', $data['s_fullName']);
        $this->db->bind(':s_nameWithInitial', $data['s_nameWithInitial']);
        $this->db->bind(':s_regNumber', $data['s_regNumber']);
        $this->db->bind(':s_indexNumber', $data['s_indexNumber']);
        $this->db->bind(':s_email', $data['s_email']);
        $this->db->bind(':s_dob', $data['s_dob']);
        $this->db->bind(':s_contactNumber', $data['s_contactNumber']);
        $this->db->bind(':s_stream', $data['s_stream']);
        $this->db->bind(':s_year', $data['s_year']);  
        $this->db->bind(':s_semester', $data['s_semester']); 
        $this->db->bind(':s_isDeleted', $data['s_isDeleted']);   
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getStudentss(){
        $this->db->query('SELECT * FROM students');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getStudentById($id){
        $this->db->query('SELECT * FROM students WHERE l_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    //update
    public function updateStudent($data){
        $this->db->query('UPDATE students SET
            s_id = :s_id
            s_fullName = :s_fullName
            s_nameWithInitial = :s_nameWithInitial
            s_regNumber = :s_regNumber
            s_indexNumber = :s_indexNumber
            s_email = :s_email
            s_dob = :s_dob
            s_contactNumber = :s_contactNumber
            s_stream = :s_stream
            s_year = :s_year
            s_semester = :s_semester
            s_isDeleted = :s_isDeleted
            WHERE s_id = :s_id
        ');
        // Bind values
        $this->db->bind(':s_id', $data['s_id']);
        $this->db->bind(':s_fullName', $data['s_fullName']);
        $this->db->bind(':s_nameWithInitial', $data['s_nameWithInitial']);
        $this->db->bind(':s_regNumber', $data['s_regNumber']);
        $this->db->bind(':s_indexNumber', $data['s_indexNumber']);
        $this->db->bind(':s_email', $data['s_email']);  
        $this->db->bind(':s_dob', $data['s_dob']);
        $this->db->bind(':s_contactNumber', $data['s_contactNumber']);
        $this->db->bind(':s_stream', $data['s_stream']);
        $this->db->bind(':s_year', $data['s_year']);  
        $this->db->bind(':s_semester', $data['s_semester']); 
        $this->db->bind(':s_isDeleted', $data['s_isDeleted']);   
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

