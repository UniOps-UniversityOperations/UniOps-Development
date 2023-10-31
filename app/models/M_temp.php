<?php

class M_temp {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getTemp() {
        $this->db->query("SELECT * FROM temp");
        return $this->db->resultSet();
    }
}