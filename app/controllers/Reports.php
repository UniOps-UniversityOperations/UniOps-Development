<?php

class Reports extends Controller {
    protected $reportModel;
    public function __construct(){
        $this->Rpt_postModel = $this->model('M_Reports');
        $this->AS_postModel = $this->model('M_assignedSubjects');
        $this->RS_postModel = $this->model('M_requestedSubjects');

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
        // die('viewLecturerReport -> ' . $l_code);

        $lecturer = $this->Rpt_postModel->getLecturer($l_code);
        $variables = $this->Rpt_postModel->getVariables();
        $postsAS = $this->AS_postModel->getSubjects($l_code);
        $postsRS = $this->RS_postModel->getSubjects($l_code);

        $data = [
            'lecturer' => $lecturer,
            'variables' => $variables,
            'postsAS' => $postsAS,
            'postsRS' => $postsRS
        ];

        $this->view('reports/admin/v_LecturrerReport', $data);
    }
//---------------------------------------------------------------------------------------------------------------------------
}