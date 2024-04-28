<?php

class Reports extends Controller {
    protected $reportModel;
    public function __construct(){
        $this->Rpt_postModel = $this->model('M_Reports');
        $this->AS_postModel = $this->model('M_assignedSubjects');
        $this->RS_postModel = $this->model('M_requestedSubjects');
        $this->RSI_postModel = $this->model('M_requestedSubjectsInstructor');
        $this->ASI_postModel = $this->model('M_assignedSubjectsInstructor');
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

// Instructor----------------------------------------------------------------------------------------------------------------

    public function viewInstructorReportHome(){
        $Instructors = $this->Rpt_postModel->getInstructors();
        $department_count = $this->Rpt_postModel->getDepartmentCountI();
        $assigned_lec_count = $this->Rpt_postModel->getAssignedLecturerCountI();
        $total_subjects_count = $this->Rpt_postModel->getTotalSubjectsCount();
        $assigned_subjects_count = $this->Rpt_postModel->getAssignedSubjectsCountI();
        $variables = $this->Rpt_postModel->getVariables();
        
        $data = [
            'Instructors' => $Instructors,
            'department_count' => $department_count,
            'assigned_lec_count' => $assigned_lec_count,
            'total_subjects_count' => $total_subjects_count,
            'assigned_subjects_count' => $assigned_subjects_count,
            'variables' => $variables
        ];

        $this->view('reports/admin/v_InstructorReportHome', $data);
    }

    public function viewInstructorReport($i_code){
        // die('viewInstructorReport -> ' . $i_code);


        $instructor = $this->Rpt_postModel->getInstructor($i_code);
        $variables = $this->Rpt_postModel->getVariables();
        $postsASI = $this->ASI_postModel->getSubjects($i_code);
        $postsRSI = $this->RSI_postModel->getSubjects($i_code);

        $data = [
            'instructor' => $instructor,
            'variables' => $variables,
            'postsASI' => $postsASI,
            'postsRSI' => $postsRSI
        ];

        $this->view('reports/admin/v_InstructorReport', $data);

    }

// --------------------------------------------------------------------------------------------------------------------------

// overall report------------------------------------------------------------------------------------------------------------
    public function viewOverallReport(){
        // $lecturer_count = count($data['lecturers']);
        // $assigned_lec_count = $data['assigned_lec_count']->assigned_lec_count;

        $lecturers = $this->Rpt_postModel->getLecturers();
        $assigned_lec_count = $this->Rpt_postModel->getAssignedLecturerCount();
        $instructors = $this->Rpt_postModel->getInstructors();
        $assigned_instr_count = $this->Rpt_postModel->getAssignedLecturerCountI();
        $student_count = $this->Rpt_postModel->getStudentCount();

        $data = [
            'lecturers' => $lecturers,
            'assigned_lec_count' => $assigned_lec_count,
            'instructors' => $instructors,
            'assigned_instr_count' => $assigned_instr_count,
            'student_count' => $student_count
            
        ];

        $this->view('reports/admin/v_OverallReport', $data);
    }

//---------------------------------------------------------------------------------------------------------------------------

}