<?php

class Reports extends Controller {
    protected $reportModel;
    public function __construct(){
        $this->Rpt_postModel = $this->model('M_Reports');
    }
    

    public function index(){

    }

    public function viewReportsDashboard(){
    
        $this->view('reports/v_reportsDashboardAdmin');
    }

// Lecturer -----------------------------------------------------------------------------------------------------------------
    public function viewLecturerReportHome(){
        $lecturers = $this->Rpt_postModel->getLecturers();
        $department_count = $this->Rpt_postModel->getDepartmentCount();
        $assigned_lec_count = $this->Rpt_postModel->getAssignedLecturerCount();
        $total_subjects_count = $this->Rpt_postModel->getTotalSubjectsCount();
        $assigned_subjects_count = $this->Rpt_postModel->getAssignedSubjectsCount();
        $variables = $this->Rpt_postModel->getVariables();
        
        $data = [
            'lecturers' => $lecturers,
            'department_count' => $department_count,
            'assigned_lec_count' => $assigned_lec_count,
            'total_subjects_count' => $total_subjects_count,
            'assigned_subjects_count' => $assigned_subjects_count,
            'variables' => $variables
        ];

        $this->view('reports/admin/v_LecturerReportHome', $data);
    }

    public function viewLecturerReport($l_code){
        die('viewLecturerReport -> ' . $l_code);
    }
//---------------------------------------------------------------------------------------------------------------------------
}