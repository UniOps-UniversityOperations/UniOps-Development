<?php

class Temp extends Controller {
    protected $tempModel;
    public function __construct(){
        $this->tempModel = $this->model('M_temp');
    }
    

    public function index(){

    }

    public function temp(){
        $temps = $this->tempModel->getTemp();

        $data = [
            'title' => 'Temp',
            'temps' => $temps
        ];
        echo 'Inside temp';

        $this->view('v_temp', $data);
    }
}