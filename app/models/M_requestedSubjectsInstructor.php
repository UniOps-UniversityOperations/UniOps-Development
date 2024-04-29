<?php

class M_requestedSubjectsInstructor{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSubjects($code){
        $this->db->query('SELECT requestedSubjectsInstructor.*, subjects.sub_year, subjects.sub_stream, subjects.sub_credits, subjects.sub_semester, subjects.sub_name
                            FROM requestedSubjectsInstructor 
                            INNER JOIN subjects ON requestedSubjectsInstructor.subject_code = subjects.sub_code 
                            WHERE requestedSubjectsInstructor.asi_isDeleted = 0 AND requestedSubjectsInstructor.instructor_code = :code');
        $this->db->bind(':code', $code);
        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteForSubject($subject_code){
        $this->db->query('DELETE FROM requestedSubjectsInstructor WHERE subject_code = :subject_code');
        $this->db->bind(':subject_code', $subject_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //deleteForInstructor
    public function deleteForInstructor($instructor_code){
        $this->db->query('DELETE FROM requestedSubjectsInstructor WHERE instructor_code = :instructor_code');
        $this->db->bind(':instructor_code', $instructor_code);
        if ($this->db->execute()) {
            // If a new row was inserted
            return true;
        } else {
            return false;
        }
    }

    //getPreferencetoPractical
    public function getPreference($sub_code, $instructor_code){
        $this->db->query('SELECT pref_level FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code = :instructor_code AND practical = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->single();
        if($results){
            return $results->pref_level;
        }else{
            return 0;
        }
    }

    //getPreferencetoPractical
    public function getPreferencetoPractical($sub_code, $instructor_code){
        $this->db->query('SELECT pref_level FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code = :instructor_code AND practical = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->single();
        if($results){
            return $results->pref_level;
        }else{
            return 0;
        }
    }

    //getPreferencetoTutorial
    public function getPreferencetoTutorial($sub_code, $instructor_code){
        $this->db->query('SELECT pref_level FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code = :instructor_code AND tutorial = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->single();
        if($results){
            return $results->pref_level;
        }else{
            return 0;
        }
    }

    //getOtherHighestPreference_p
    public function getOtherHighestPreference_p($sub_code, $instructor_code){
        $this->db->query('SELECT * FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code != :instructor_code AND practical = 1
                            AND pref_level = (SELECT MIN(pref_level) FROM requestedSubjectsInstructor WHERE subject_code = :sub_code 
                            AND instructor_code != :instructor_code AND practical = 1)');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->resultSet();
        return $results;
    }

    //getOtherHighestPreference_t
    public function getOtherHighestPreference_t($sub_code, $instructor_code){
        $this->db->query('SELECT * FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code != :instructor_code AND tutorial = 1
                            AND pref_level = (SELECT MIN(pref_level) FROM requestedSubjectsInstructor WHERE subject_code = :sub_code 
                            AND instructor_code != :instructor_code AND tutorial = 1)');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->resultSet();
        return $results;
    }

    //getMinPrefLevel_p
    public function getMinPrefLevel_p($sub_code, $instructor_code){
        $this->db->query('SELECT MIN(pref_level) as min_pref FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code != :instructor_code AND practical = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->single();
        if($results){
            return $results->min_pref;
        }else{
            return 0;
        }
    }

    //getMinPrefLevel_t
    public function getMinPrefLevel_t($sub_code, $instructor_code){
        $this->db->query('SELECT MIN(pref_level) as min_pref FROM requestedSubjectsInstructor 
                            WHERE subject_code = :sub_code AND instructor_code != :instructor_code AND tutorial = 1');
        $this->db->bind(':sub_code', $sub_code);
        $this->db->bind(':instructor_code', $instructor_code);
        $results = $this->db->single();
        if($results){
            return $results->min_pref;
        }else{
            return 0;
        }
    }

}


 /*
    he structure of the table
    instructor_code
    subject_code
    lecture
    practical
    tutorial
    asi_isDeleted

  */