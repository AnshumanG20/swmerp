<?php

    class DashboardCommon extends Controller{
        function __construct()
        {
            if(!isLoggedIn()){ redirect('Login'); }
            if(!isLoggedIn()){ redirect('Login'); }
            $this->model_login_details = $this->model('model_login_details');
        }
        function Dash(){
            $data = (array)null;
                // if(isset($_SESSION['emp_details'])){
                    // echo '<pre>';print_r($_SESSION['emp_details']);return;

                    $data['emp_details'] = $_SESSION['emp_details'];
                    
                // }
            $emp_code = $_SESSION['emp_details']['employee_code'];
            $empCode = substr($emp_code,-2);
            // echo $empCode;return;
            $getLastLoginDetails1 = $this->model_login_details->getLastLoginDetails($empCode);

            $getAllEmployee = $this->model_login_details->getAllEmployee();
            $data['getAllEmployee'] = json_decode(json_encode($getAllEmployee),true);
            // echo '<pre>';print_r($data['getAllEmployee']);

            $data['getLastLoginDetails'] = json_decode(json_encode($getLastLoginDetails1), true);
            // echo '<pre>';print_r($data['getLastLoginDetails']);
            $getDesignataion = $this->model_login_details->getDesigantaion($data['emp_details']['designation_mstr_id']);
            
            $data['getDesignataion'] =json_decode(json_encode($getDesignataion),true);
            // echo '<pre>';print_r($data);
            $this->view('pages/Dashboard2', $data);
        }
    }




?>