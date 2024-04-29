<?php

class Model
{
    protected $db;
    protected $table = "";
    protected $allowed_columns = [];
    protected $after_select = [];
    protected $before_update = [];

    public function __construct(){
        $this->db = new Database;
    }

    public function insert($data)
    {
        // remove unwanted columns
        if(!empty($this->allowed_columns))
        {
            foreach($data as $key => $value)
            {
                
                if(!in_array($key, $this->allowed_columns))
                {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        
        $query = "insert into ". $this->table;
        $query .= "(" .implode(", ", $keys) .") values (:" .implode(", :", $keys) .")";

        $this->db->query($query);
        // $results = $this->db->resultSet();
    }


    public function update($id, $data)
    {
        // remove unwanted columns
        if(!empty($this->allowed_columns))
        {
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowed_columns)) {

                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        
        $query = "update ". $this->table . " set ";

        foreach($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where id = :id ";
        
        $data['id'] = $id;
        $this->db->query($query);
        $results = $this->db->resultSet();
    }


    public function where($data, $order = 'desc')
    {
        $keys = array_keys($data);
        $query = "select * from " .$this->table ." where ";

        foreach($keys as $key)
        {
            $query .= $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $query .= " order by id $order ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        if(is_array($result))
        {
            // run after select functions
            if(property_exists($this, 'after_select'))
            {
                foreach($this->after_select as $func) {
                    $result = $this->$func($result);
                }
            }
            return $result;
        }
        return false;
    }


    public function get_name($id, $table) {
        $query = "select * from " . $table ." where id = ". $id;
        $this->db->query($query);
        $row = $this->db->resultSet();
        return $row;
    }
    

    public function findAll($order = 'asc')
    {

        $query = "select * from " .$this->table ." order by id $order ";

        $this->db->query($query);
        $result = $this->db->resultSet();

        if(is_array($result))
        {
            if(property_exists($this, 'after_select'))
            {
                foreach($this->after_select as $func) {
                    $result = $this->$func($result);
                }
            }
            return $result;
        }

        return false;
        
    }


    // Get the first row of all that is available according to specified details

    public function first($data, $order = 'desc')
    {
        $keys = array_keys($data);

        $query = "select * from " .$this->table ." where ";

        foreach($keys as $key)
        {
            $query .= $key ."=:" .$key ." && ";
        }

        $query = trim($query, "&& ");
        $query .= " order by id $order limit 1";
        $this->db->query($query);
        $result = $this->db->resultSet();

        if(is_array($result))
        {
            if(property_exists($this, 'after_select'))
            {
                foreach($this->after_select as $func) {
                    $result = $this->$func($result);
                }
            }
            return $result[0];
        }

        return false;
        
    }
}
