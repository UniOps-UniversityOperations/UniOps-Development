<?php

class Reports extends Controller {
    protected $reportModel;
    public function __construct(){

    }
    

    public function index(){

    }

    public function viewReportsDashboard(){
    
        $this->view('reports/v_reportsDashboard');
    }
}