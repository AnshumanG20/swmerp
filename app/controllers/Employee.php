<?php
class Employee extends Controller {

    function __construct(){
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_course_mstr = $this->model('model_course_mstr');
        $this->model_department_mstr = $this->model('model_department_mstr');
        $this->model_project_mstr_address = $this->model('model_project_mstr_address');
        $this->model_designation_mstr = $this->model('model_designation_mstr');
        $this->model_employment_type_mstr = $this->model('model_employment_type_mstr');
        $this->model_doc_type_mstr = $this->model('model_doc_type_mstr');
        $this->model_emp_details = $this->model('model_emp_details');
        $this->model_emp_family_backbgound = $this->model('model_emp_family_backbgound');
        $this->model_emp_qualification_details = $this->model('model_emp_qualification_details');
        $this->model_emp_present_employment = $this->model('model_emp_present_employment');
        $this->model_emp_previous_employment_details = $this->model('model_emp_previous_employment_details');
        $this->model_emp_references = $this->model('model_emp_references');
        $this->model_emp_bank_details = $this->model('model_emp_bank_details');
        $this->model_emp_document_details = $this->model('model_emp_document_details');
        $this->model_sub_course_mstr = $this->model('model_sub_course_mstr');
        $this->model_sub_stream_mstr = $this->model('model_sub_stream_mstr');
        $this->model_company_location = $this->model('model_company_location');
        $this->model_project_mstr = $this->model('model_project_mstr');
        $this->model_join_ward_mstr = $this->model('model_join_ward_mstr');
        $this->Validate_Emp = $this->Validator('Validate_Emp');
        $this->model_state_dist_city = $this->model('model_state_dist_city');
    }

    // Blank
    public function empAddUpdate($step=null, $_ID=null){
        if($step==null){
            $step = 1;
        }
        $course_mstr_list = $this->model_course_mstr->getCourseMstrList();
        $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
        $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
        $doc_type_mstr_list = $this->model_doc_type_mstr->getDocTypeMstrList();
        $company_location_list = $this->model_company_location->getCompanyDetailsIdCity();

        
        $project_mstr_list = $this->model_project_mstr->projectMstrList();
        $data = array(null);
        if($_ID!=null){
            $empDetails = $this->model_emp_details->getEmpDetailsById($_ID);
            if($empDetails){
                $data = $empDetails;
                if($data['project_mstr_id']!=null){
                    $company_location_list = $this->model_project_mstr_address->getProjectAddByProjectMstrId($data['project_mstr_id']);
                    if($company_location_list){
                        $data['company_location_list'] = $company_location_list;
                    }
                }
                $designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                if($designation_mstr_list){
                    $data['designation_mstr_list'] = $designation_mstr_list;
                }
                $emp_family_backbgound = $this->model_emp_family_backbgound->getEmpFamilyBackbgoundByEmpDetailsId($data['_id']);
                if($emp_family_backbgound){
                    $data['emp_family_backbgound'] = $emp_family_backbgound;
                }
                $emp_qualification_details = $this->model_emp_qualification_details->getEmpQualificationDetailsByEmpDetailsId($data['_id']);
                if($emp_qualification_details){

                    foreach ($emp_qualification_details as $key => $value) {
                        $sub_course_mstr_list = $this->model_sub_course_mstr->getSubCourseByCourseMstrId($value['course_mstr_id']);
                        $sub_stream_mstr_list = $this->model_sub_stream_mstr->getSubStreamBySubCourseMstrId($value['sub_course_mstr_id']);
                        $emp_qualification_details[$key]['sub_course_mstr_list'] = $sub_course_mstr_list;
                        $emp_qualification_details[$key]['sub_stream_mstr_list'] = $sub_stream_mstr_list;
                    }

                    $data['emp_qualification_details'] = $emp_qualification_details;
                }
                $emp_present_employment = $this->model_emp_present_employment->getEmpPresentEmploymentByEmpDetailsId($data['_id']);
                if($emp_present_employment){
                    $data['emp_present_employment'] = $emp_present_employment;
                }
                // print_r($data['_id']);
               
                $emp_previous_employment_details = $this->model_emp_previous_employment_details->getEmpPreviousEmploymentDetailsByEmpDetailsId($data['_id']);
                // print_r($emp_previous_employment_details);
                // return;
                if($emp_previous_employment_details){
                    $data['emp_previous_employment_details'] = $emp_previous_employment_details;
                }
                $emp_references = $this->model_emp_references->getEmpReferencesByEmpDetailsId($data['_id']);
                if($emp_references){
                    $data['emp_references'] = $emp_references;
                }

                
                $emp_bank_details = $this->model_emp_bank_details->getEmpBankDetailsByEmpDetailsId($data['_id']);
                if($emp_bank_details){
                    $data['emp_bank_details'] = $emp_bank_details;
                }

                $emp_document_details = $this->model_emp_document_details->getJoinEmpDocumentDetailsByEmpDetailsId($data['_id']);
                if($emp_document_details){
                    $data['emp_document_details'] = $emp_document_details;
                }
            }else{
                $this->view('pages/403');
                die();
            }
        }
        $data['course_mstr_list'] = $course_mstr_list;
        $data['department_mstr_list'] = $department_mstr_list;
        $data['employment_type_mstr_list'] = $employment_type_mstr_list;
        $data['doc_type_mstr_list'] = $doc_type_mstr_list;
        $data['project_mstr_list'] = $project_mstr_list;
        $data['step'] = $step;

        $city_list = $this->model_state_dist_city->getAllCity();
			if($city_list){
				$data['city_list']=$city_list;
			}
            $state_list = $this->model_state_dist_city->getState();
			if($state_list){
				$data['state_list']=$state_list;
			}
        // echo "<pre>";
        // print_r($data);
        // return;
        $this->view('pages/emp_add_update', $data);
    }
    public function empList()
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
                    $this->view('pages/emp_list',$data);
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
                    if($data['department_mstr_id']!=""){
                        $designation = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                        $designation = JSON_DECODE(JSON_ENCODE($designation),true);
                        $data['designationlist'] = $designation;
                    }

                    $this->view('pages/emp_list',$data);
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

                $this->view('pages/emp_list',$data);
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
                // return;
                // echo "<pre>";
                // print_r($data);
                // return;
                $this->view('pages/emp_list',$data);

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
                $this->view('pages/emp_list',$data);
            }
        }
    }

    public function ajax_gatedesignation()
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
    public function emp_view_details($_ID=null)
    {
        $course_mstr_list = $this->model_course_mstr->getCourseMstrList();
        $department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
        $employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
        $doc_type_mstr_list = $this->model_doc_type_mstr->getDocTypeMstrList();
        $project_mstr_list = $this->model_project_mstr->projectMstrList();
        $data = array(null);
        if($_ID!=null){
            $empDetails = $this->model_emp_details->getEmpDetailsById($_ID);
            if($empDetails){
                $data = $empDetails;
                if($data['project_mstr_id']!=null){
                    $company_location_list = $this->model_project_mstr_address->getProjectAddByProjectMstrId($data['project_mstr_id']);
                    if($company_location_list){
                        $data['company_location_list'] = $company_location_list;
                    }
                }
                if($data['project_concept_type']="WARD"){
                    $ward_name_list = $this->model_join_ward_mstr->getAssignWardNameByEmpID($data['_id']);
                    if($ward_name_list){
                        $data['ward_name_list'] = $ward_name_list;
                    }
                }
                $designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                if($designation_mstr_list){
                    $data['designation_mstr_list'] = $designation_mstr_list;
                }
                $emp_family_backbgound = $this->model_emp_family_backbgound->getEmpFamilyBackbgoundByEmpDetailsId($data['_id']);
                if($emp_family_backbgound){
                    $data['emp_family_backbgound'] = $emp_family_backbgound;
                }
                $emp_qualification_details = $this->model_emp_qualification_details->getEmpQualificationDetailsByEmpDetailsId($data['_id']);
                if($emp_qualification_details){

                    foreach ($emp_qualification_details as $key => $value) {
                        $sub_course_mstr_list = $this->model_sub_course_mstr->getSubCourseByCourseMstrId($value['course_mstr_id']);
                        $sub_stream_mstr_list = $this->model_sub_stream_mstr->getSubStreamBySubCourseMstrId($value['sub_course_mstr_id']);
                        $emp_qualification_details[$key]['sub_course_mstr_list'] = $sub_course_mstr_list;
                        $emp_qualification_details[$key]['sub_stream_mstr_list'] = $sub_stream_mstr_list;
                    }

                    $data['emp_qualification_details'] = $emp_qualification_details;
                }
                $emp_present_employment = $this->model_emp_present_employment->getEmpPresentEmploymentByEmpDetailsId($data['_id']);
                
                if($emp_present_employment){
                    $data['emp_present_employment'] = $emp_present_employment;
                }
                $emp_previous_employment_details = $this->model_emp_previous_employment_details->getEmpPreviousEmploymentDetailsByEmpDetailsId($data['_id']);
                
                if($emp_previous_employment_details){
                    $data['emp_previous_employment_details'] = $emp_previous_employment_details;
                }
                $emp_references = $this->model_emp_references->getEmpReferencesByEmpDetailsId($data['_id']);
                if($emp_references){
                    $data['emp_references'] = $emp_references;
                }
                $emp_bank_details = $this->model_emp_bank_details->getEmpBankDetailsByEmpDetailsId($data['_id']);
                if($emp_bank_details){
                    $data['emp_bank_details'] = $emp_bank_details;
                }
                $emp_document_details = $this->model_emp_document_details->getJoinEmpDocumentDetailsByEmpDetailsId($data['_id']);
                if($emp_document_details){
                    $data['emp_document_details'] = $emp_document_details;
                }
            }else{
                $this->view('pages/403');
                die();
            }
        }

        $data['course_mstr_list'] = $course_mstr_list;
        $data['department_mstr_list'] = $department_mstr_list;
        $data['employment_type_mstr_list'] = $employment_type_mstr_list;
        $data['doc_type_mstr_list'] = $doc_type_mstr_list;
        $data['project_mstr_list'] = $project_mstr_list;
        //$data['company_location_list'] = $company_location_list;
        //print_r($data['emp_previous_employment_details']);
       //print_r($emp_document_details);
        $this->view('pages/emp_view_details',$data);

    }

    public function empActivate($ID = null){
        if($ID==null){
            $this->view('pages/403');
        }else{
            if($this->model_emp_details->empActivate($ID)){
                echo "<script>alert('Employee Activated !!'); window.location.href='".URLROOT."/Employee/empList';</script>";
            }else{
                echo "<script>alert('Something Wrong !!'); window.location.href='".URLROOT."/Employee/empList';</script>";
            }
        }
    }

    public function empDeactivate($ID = null){
        if($ID==null){
            $this->view('pages/403');
        }else{
            if($this->model_emp_details->empDeactivate($ID)){
                echo "<script>alert('Employee Deactivated !!'); window.location.href='".URLROOT."/Employee/empList';</script>";
            }else{
                echo "<script>alert('Something Wrong !!'); window.location.href='".URLROOT."/Employee/empList';</script>";
            }
        }
    }
}