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

        //for the sbjects
        $total_subjects_count = $this->Rpt_postModel->getTotalSubjectsCount() ? $this->Rpt_postModel->getTotalSubjectsCount()->total_subjects_count : 0; 
        $cs_1yr_sub_count = $this->Rpt_postModel->getCS1yrSubjectCount() ? $this->Rpt_postModel->getCS1yrSubjectCount()->cs_1yr_sub_count : 0;
        $cs_2yr_sub_count = $this->Rpt_postModel->getCS2yrSubjectCount() ? $this->Rpt_postModel->getCS2yrSubjectCount()->cs_2yr_sub_count : 0;
        $cs_3yr_sub_count = $this->Rpt_postModel->getCS3yrSubjectCount() ? $this->Rpt_postModel->getCS3yrSubjectCount()->cs_3yr_sub_count : 0;
        $cs_4yr_sub_count = $this->Rpt_postModel->getCS4yrSubjectCount() ? $this->Rpt_postModel->getCS4yrSubjectCount()->cs_4yr_sub_count : 0;
        $is_1yr_sub_count = $this->Rpt_postModel->getIS1yrSubjectCount() ? $this->Rpt_postModel->getIS1yrSubjectCount()->is_1yr_sub_count : 0;
        $is_2yr_sub_count = $this->Rpt_postModel->getIS2yrSubjectCount() ? $this->Rpt_postModel->getIS2yrSubjectCount()->is_2yr_sub_count : 0;
        $is_3yr_sub_count = $this->Rpt_postModel->getIS3yrSubjectCount() ? $this->Rpt_postModel->getIS3yrSubjectCount()->is_3yr_sub_count : 0;
        $is_4yr_sub_count = $this->Rpt_postModel->getIS4yrSubjectCount() ? $this->Rpt_postModel->getIS4yrSubjectCount()->is_4yr_sub_count : 0; 
        $sem1_sub_count = $this->Rpt_postModel->getSem1SubjectCount() ? $this->Rpt_postModel->getSem1SubjectCount()->sem1_sub_count : 0;
        $sem2_sub_count = $this->Rpt_postModel->getSem2SubjectCount() ? $this->Rpt_postModel->getSem2SubjectCount()->sem2_sub_count : 0;
        $sem1and2_sub_count = $this->Rpt_postModel->getSem1and2SubjectCount() ? $this->Rpt_postModel->getSem1and2SubjectCount()->sem1and2_sub_count : 0;
        $core_sub_count = $this->Rpt_postModel->getCoreSubjectCount() ? $this->Rpt_postModel->getCoreSubjectCount()->core_sub_count : 0;
        $credit1_sub_count = $this->Rpt_postModel->getCredit1SubjectCount() ? $this->Rpt_postModel->getCredit1SubjectCount()->credit1_sub_count : 0;
        $credit2_sub_count = $this->Rpt_postModel->getCredit2SubjectCount() ? $this->Rpt_postModel->getCredit2SubjectCount()->credit2_sub_count : 0;
        $credit3_sub_count = $this->Rpt_postModel->getCredit3SubjectCount() ? $this->Rpt_postModel->getCredit3SubjectCount()->credit3_sub_count : 0;
        $credit4_sub_count = $this->Rpt_postModel->getCredit4SubjectCount() ? $this->Rpt_postModel->getCredit4SubjectCount()->credit4_sub_count : 0;
        $credit8_sub_count = $this->Rpt_postModel->getCredit8SubjectCount() ? $this->Rpt_postModel->getCredit8SubjectCount()->credit8_sub_count : 0;
        
        // die('total_subjects_count -> ' . $total_subjects_count . '<br>'
        //     . 'cs_1yr_sub_count -> ' . $cs_1yr_sub_count . '<br>'
        //     . 'cs_2yr_sub_count -> ' . $cs_2yr_sub_count . '<br>'
        //     . 'cs_3yr_sub_count -> ' . $cs_3yr_sub_count . '<br>'
        //     . 'cs_4yr_sub_count -> ' . $cs_4yr_sub_count . '<br>'
        //     . 'is_1yr_sub_count -> ' . $is_1yr_sub_count . '<br>'
        //     . 'is_2yr_sub_count -> ' . $is_2yr_sub_count . '<br>'
        //     . 'is_3yr_sub_count -> ' . $is_3yr_sub_count . '<br>'
        //     . 'is_4yr_sub_count -> ' . $is_4yr_sub_count . '<br>'
        //     . 'sem1_sub_count -> ' . $sem1_sub_count . '<br>'
        //     . 'sem2_sub_count -> ' . $sem2_sub_count . '<br>'
        //     . 'sem1and2_sub_count -> ' . $sem1and2_sub_count . '<br>'
        //     . 'core_sub_count -> ' . $core_sub_count . '<br>'
        //     . 'credit1_sub_count -> ' . $credit1_sub_count . '<br>'
        //     . 'credit2_sub_count -> ' . $credit2_sub_count . '<br>'
        //     . 'credit3_sub_count -> ' . $credit3_sub_count . '<br>'
        //     . 'credit4_sub_count -> ' . $credit4_sub_count . '<br>'
        //     . 'credit8_sub_count -> ' . $credit8_sub_count . '<br>'
        // );

        $rooms = $this->Rpt_postModel->getRooms();

        $data = [
            'lecturers' => $lecturers,
            'assigned_lec_count' => $assigned_lec_count,
            'instructors' => $instructors,
            'assigned_instr_count' => $assigned_instr_count,
            'student_count' => $student_count,
            'total_subjects_count' => $total_subjects_count,
            'cs_1yr_sub_count' => $cs_1yr_sub_count,
            'cs_2yr_sub_count' => $cs_2yr_sub_count,
            'cs_3yr_sub_count' => $cs_3yr_sub_count,
            'cs_4yr_sub_count' => $cs_4yr_sub_count,
            'is_1yr_sub_count' => $is_1yr_sub_count,
            'is_2yr_sub_count' => $is_2yr_sub_count,
            'is_3yr_sub_count' => $is_3yr_sub_count,
            'is_4yr_sub_count' => $is_4yr_sub_count,
            'sem1_sub_count' => $sem1_sub_count,
            'sem2_sub_count' => $sem2_sub_count,
            'sem1and2_sub_count' => $sem1and2_sub_count,
            'core_sub_count' => $core_sub_count,
            'credit1_sub_count' => $credit1_sub_count,
            'credit2_sub_count' => $credit2_sub_count,
            'credit3_sub_count' => $credit3_sub_count,
            'credit4_sub_count' => $credit4_sub_count,
            'credit8_sub_count' => $credit8_sub_count,
            'rooms' => $rooms
            
        ];

        $this->view('reports/admin/v_OverallReport', $data);
    }

//---------------------------------------------------------------------------------------------------------------------------

}