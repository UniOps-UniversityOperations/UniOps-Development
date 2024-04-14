<?php

class Controller {
    //load the model
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return $this->createInstance($model);
    }

    //instantiate the model
    public function createInstance($model){
        // Split the string to extract the class name
        $parts = explode('/',$model);
        $className = end($parts);// Get the last part after the last '/'
        if(class_exists($className)){
            $instance = new $className();
            return $instance;
        } else {
            echo "Class Name doesn't exist";
            return NULL;
        }
    }

    //load the view
    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die('View does not exist');
        }
    }
}