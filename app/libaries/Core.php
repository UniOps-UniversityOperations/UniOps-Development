<?php

    class Core{
        //The URL fromat --> /controller/method/param1/param2

        protected $currentController = 'Users';
        protected $currentMethod = 'login';
        protected $params = [];

        public function __construct(){

            $url = $this->getURL();
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                //If exists, set as controller
                $this->currentController = ucwords($url[0]); 

                //unset the controller from the url
                unset($url[0]);

                //call the controller
                require_once '../app/controllers/' . $this->currentController . '.php'; 

                //instantiate the controller class
                //now this holds a object of the controller class
                $this->currentController = new $this->currentController;

                //chech whether the method exists in the controller

                if(isset($url[1])){
                    if(method_exists($this->currentController, $url[1])){
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
  
                }



                //get params
                $this->params = $url ? array_values($url) : [];
                //call the method with params
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params); 

            }

        }

        public function getURL(){

            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url); 

                return $url;
            }
        }
    }
?>