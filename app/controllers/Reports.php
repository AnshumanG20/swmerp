<?php
class Reports extends Controller {

    function __construct(){
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_job_details = $this->model('model_job_details');
        $this->model_salary = $this->model('model_salary');
        $this->model_task_assign = $this->model('model_task_assign');
        $this->model_termination = $this->model('model_termination');
        $this->model_department_mstr = $this->model('model_department_mstr');
        $this->model_designation_mstr = $this->model('model_designation_mstr');
        $this->model_employment_type_mstr = $this->model('model_employment_type_mstr');
        $this->model_emp_details = $this->model('model_emp_details');
        $this->Validate_Emp = $this->Validator('Validate_Emp');
    }


     public function reportempList()
    {
        $data = (array)null;

        if(isPost())
        {
            $data = postData();
            //  print_r($data);
            $errMsg = [];//$this->Validate_Emp->emp_list_validate($data);
            if(empty($errMsg))
            {
                $search_emp = $this->model_emp_details->search_emp($data);
                if($search_emp)
                {
                    $search_emp = JSON_DECODE(JSON_ENCODE($search_emp),true);
                    $data['emp_list'] = $search_emp;

                    //All tbl_Department_mstr List
                    $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
                    $department_mstr_list = JSON_DECODE(JSON_ENCODE($department_mstr_list),true);
                    $data['dept'] = $department_mstr_list;

                    //All tbl_Employment_Type_mstr List
                    $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
                    $employment_type_mstr_list = JSON_DECODE(JSON_ENCODE($employment_type_mstr_list),true);
                    $data['employment'] = $employment_type_mstr_list;

                    //All tbl_designation_mstr List
                    if($data['department_mstr_id']!=""){
                        $designation = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                        $designation = JSON_DECODE(JSON_ENCODE($designation),true);
                        $data['designationlist'] = $designation;
                    }
                    // print_r($data);
                    $this->view('pages/empReport_list',$data);
                }
                else
                {
                    //All tbl_Department_mstr Listf
                    $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
                    $department_mstr_list = JSON_DECODE(JSON_ENCODE($department_mstr_list),true);
                    $data['dept'] = $department_mstr_list;

                    //All tbl_Employment_Type_mstr List
                    $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
                    $employment_type_mstr_list = JSON_DECODE(JSON_ENCODE($employment_type_mstr_list),true);
                    $data['employment'] = $employment_type_mstr_list;

                    //All tbl_designation_mstr List
                    if($data['department_mstr_id']!=""){
                        $designation = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                        $designation = JSON_DECODE(JSON_ENCODE($designation),true);
                        $data['designationlist'] = $designation;
                    }

                    $this->view('pages/empReport_list',$data);
                }
            }
            else
            {
                //All tbl_Department_mstr List
                $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
                $department_mstr_list = JSON_DECODE(JSON_ENCODE($department_mstr_list),true);
                $data['dept'] = $department_mstr_list;

                //All tbl_Employment_Type_mstr List
                $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
                $employment_type_mstr_list = JSON_DECODE(JSON_ENCODE($employment_type_mstr_list),true);
                $data['employment'] = $employment_type_mstr_list;

                //All tbl_designation_mstr List
                /*  $designation = $this->model_designation_mstr->getDesignationMstrList();
                      $designation = JSON_DECODE(JSON_ENCODE($designation),true);
                      $data['designationlist'] = $designation;  */

                $this->view('pages/empReport_list',$data);
            }

        }
        else
        {
            //All tbl_Department_mstr List
            $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
            $department_mstr_list = JSON_DECODE(JSON_ENCODE($department_mstr_list),true);
            $data['dept'] = $department_mstr_list;

            //All tbl_Employment_Type_mstr List
            $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
            $employment_type_mstr_list = JSON_DECODE(JSON_ENCODE($employment_type_mstr_list),true);
            $data['employment'] = $employment_type_mstr_list;

            //All tbl_designation_mstr List
            /*  $designation = $this->model_designation_mstr->getDesignationMstrList();
          $designation = JSON_DECODE(JSON_ENCODE($designation),true);
          $data['designationlist'] = $designation; */

            //Join Operation for Employee List
            $empDetails = $this->model_emp_details->getJoinEmpDetails();
            if($empDetails){
                $empDetails = JSON_DECODE(JSON_ENCODE($empDetails),true);
                $data['emp_list'] = $empDetails;
                // print_r($empDetails);
                $this->view('pages/empReport_list',$data);

            }
            else
            {
                //All tbl_Department_mstr List
                $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
                $department_mstr_list = JSON_DECODE(JSON_ENCODE($department_mstr_list),true);
                $data['dept'] = $department_mstr_list;

                //All tbl_Employment_Type_mstr List
                $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
                $employment_type_mstr_list = JSON_DECODE(JSON_ENCODE($employment_type_mstr_list),true);
                $data['employment'] = $employment_type_mstr_list;

                //All tbl_designation_mstr List
                /*  $designation = $this->model_designation_mstr->getDesignationMstrList();
              $designation = JSON_DECODE(JSON_ENCODE($designation),true);
              $data['designationlist'] = $designation;
                */
                $this->view('pages/empReport_list',$data);
            }
        }
    }
    
    public function ajax_reportdesignation()
    {
        if(isPost())
        {
            $data = postData();
            if(strlen($data['department_mstr_id'])==1){
                $result = $this->model_emp_details->gatedesignation($data);
                if(!empty($result)){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>All</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['designation_name']."</option>";
                    }
                    $response = ['response'=>true, 'data'=>$option];
                }else{
                    $response = ['response'=>false];
                }
            }else{
                $option = "<option value=''>All</option>";
                $response = ['response'=>true, 'data'=>$option];
            }
            echo json_encode($response);
        }
    }
    
    public function candidateReport_list(){
        $data = (array)null;
        if(isPost()){
            $data= postData();
            $designation_id = $this->model_job_details->designation_id();
            $designation_id = JSON_DECODE(JSON_ENCODE($designation_id), true);
            $data["designation_id"] = $designation_id;
            $applied_applicant_list = $this->model_job_details->search_applicantReport_list($data);
            // echo '<pre>';print_r($applied_applicant_list);
            $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
            $data["applied_applicant_list"] = $applied_applicant_list;
            //print_r($data);
            $this->view('pages/candidateReports', $data);
        }
        else {
            $designation_id = $this->model_job_details->designation_id();
            $designation_id = JSON_DECODE(JSON_ENCODE($designation_id), true);
            $data["designation_id"] = $designation_id;
            $applied_applicant_list = $this->model_job_details->candidateReport_list();
            $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
            $data["applied_applicant_list"] = $applied_applicant_list;
            // echo "<pre>";
            // print_r($data);
            // return;
            $this->view('pages/candidateReports', $data);
        }

    }
    public function deactivatedCandidateReport_list(){
        $data = (array)null;
        if(isPost()){
            $data= postData();
            $designation_id = $this->model_job_details->designation_id();
            $designation_id = JSON_DECODE(JSON_ENCODE($designation_id), true);
            $data["designation_id"] = $designation_id;
            $applied_applicant_list = $this->model_job_details->search_applicantReport_list($data);
            // echo '<pre>';print_r($applied_applicant_list);
            $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
            $data["applied_applicant_list"] = $applied_applicant_list;
            // echo '<pre>';print_r($data);
            $this->view('pages/deactivated_candidate_list', $data);
        }
        else {
            $designation_id = $this->model_job_details->designation_id();
            $designation_id = JSON_DECODE(JSON_ENCODE($designation_id), true);
            $data["designation_id"] = $designation_id;
            $applied_applicant_list = $this->model_job_details->deactivatedCandidateReport_list();
            $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
            $data["applied_applicant_list"] = $applied_applicant_list;
            // echo "<pre>";
            // print_r($data);
            // return;
            $this->view('pages/deactivated_candidate_list', $data);
        }

    }
    
    
    public function emp_sal_gen_report_list(){
            $data = (array)null;
            if(isPost())
            {
                $data = postData();
               //Employee details data.
                $EmpSalGenList =$this->model_salary->getEmpSalGenList($data);
                $EmpSalGenList = json_decode(json_encode($EmpSalGenList),true);
                $data["EmpSalGenList"] = $EmpSalGenList;
                $this->view('pages/emp_sal_gen_report_list', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
               //Employee details data.
                $EmpSalGenList =$this->model_salary->getEmpSalGenList($data);
                $EmpSalGenList = json_decode(json_encode($EmpSalGenList),true);
                $data["EmpSalGenList"] = $EmpSalGenList;
                $this->view('pages/emp_sal_gen_report_list', $data);
            }

      }
    
     public function employee_salary_payment_report_list(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();

                //Employee details data.
                $EmpSalPaymentList =$this->model_salary->getEmpSalPaymentList($data);
                $EmpSalPaymentList = json_decode(json_encode($EmpSalPaymentList),true);
                $data["EmpSalPaymentList"] = $EmpSalPaymentList;

                $this->view('pages/employee_salary_payment_report_list', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
                //Employee details data.
                $EmpSalPaymentList =$this->model_salary->getEmpSalPaymentList($data);
                $EmpSalPaymentList = json_decode(json_encode($EmpSalPaymentList),true);
                $data["EmpSalPaymentList"] = $EmpSalPaymentList;
               //print_r($data["EmpSalPaymentList"]);
                $this->view('pages/employee_salary_payment_report_list', $data);
            }

      }
    
    public function employee_full_final_report_list(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();
                //Employee details data.
                $EmpFullFinalList =$this->model_termination->getEmpFullFinalSearchList($data);
                $EmpFullFinalList = json_decode(json_encode($EmpFullFinalList),true);
                $data["EmpFullFinalList"] = $EmpFullFinalList;
               //print_r($data);
                $this->view('pages/emp_full_final_report_list', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
                $EmpFullFinalList =$this->model_termination->getEmpFullFinalList($data);
                $EmpFullFinalList = json_decode(json_encode($EmpFullFinalList),true);
                $data["EmpFullFinalList"] = $EmpFullFinalList;
               //print_r($data["EmpSalPaymentList"]);
                $this->view('pages/emp_full_final_report_list', $data);
            }
        }
    
    
    public function task_assign_report_list()
    {
        $data = array(null);
        if(isPost())
            {
                $data = postData();
                //Employee details data.
                $TaskSearchList =$this->model_task_assign->getTaskSearchList($data);
                $TaskSearchList = json_decode(json_encode($TaskSearchList),true);
                $data["tasklist"] = $TaskSearchList;
               //print_r($data);
                $this->view('pages/taskReport_List', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
                $TaskList =$this->model_task_assign->getTaskList($data);
                $TaskList = json_decode(json_encode($TaskList),true);
                $data["tasklist"] = $TaskList;
               //print_r($data["EmpSalPaymentList"]);
                $this->view('pages/taskReport_List', $data);
            }
    }


 }