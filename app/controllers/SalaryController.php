<?php
    class SalaryController extends Controller
    {
        public function __construct()
        {
            if(!isLoggedIn()){ redirect('Login'); }
           $this->model_salary = $this->model('model_salary');
           //$this->Validate_salary = $this->validator('Validate_salary');

        }
        public function index()
        {

        }

        public function emp_sal_gen_list(){
            $data = (array)null;
            if(isPost())
            {
                $data = postData();
               //Employee details data.
                $EmpSalGenList =$this->model_salary->getEmpSalGenList($data);
                $EmpSalGenList = json_decode(json_encode($EmpSalGenList),true);
                $data["EmpSalGenList"] = $EmpSalGenList;
                $this->view('pages/emp_sal_gen_list', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
               //Employee details data.
                $EmpSalGenList =$this->model_salary->getEmpSalGenList($data);
                $EmpSalGenList = json_decode(json_encode($EmpSalGenList),true);
                $data["EmpSalGenList"] = $EmpSalGenList;
                $this->view('pages/emp_sal_gen_list', $data);
            }

      }

        public function Generate_Sal_Emp_List()
        {
           $data = (array)null;
            //Employment Type data.
                $employmentList =$this->model_salary->get_employmentList();
                $employmentList = json_decode(json_encode($employmentList),true);
                $data["employmentList"] = $employmentList;
                //Grade Data.
                $gradeList = $this->model_salary->get_gradeList();
                $gradeList = json_decode(json_encode($gradeList),true);
                $data["gradeList"] = $gradeList;

            if(isPost())
            {
              $data = postData();
              $month=$data['sal_mnth'];
              $year=$data['sal_yr'];
              $data["month_year"]=$year.'-'.$month;

               //current month
                $monthh=date('n');
                $yearr=date('Y');
                $data['curr_month_year']=$yearr.'-'.$monthh;

                //Earning and deduction details
                $earn_deduct_List =$this->model_salary->get_earning_deductionList($data);
                $earn_deduct_List = json_decode(json_encode($earn_deduct_List),true);
                $data["earn_deduct_List"] = $earn_deduct_List;
                //Employee details data.
                $employeeList =$this->model_salary->getActiveEmployeeDetails($data);
                $employeeList = json_decode(json_encode($employeeList),true);

                $data["emp_list"] = $employeeList;
                //print_r($data["emp_list"]);

                $this->view('pages/generate_sal_emp_List',$data);
            }
            else
            {
                $this->view('pages/generate_sal_emp_List',$data);
            }

        }

        public function generate_salary_full_time($ID=null)
        {
            $data = (array)null;
            $data["id"] = $ID;

          if(isPost()){
              $data= postData();
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();

              //Earning and deduction details
               $earn_deduct_List =$this->model_salary->fetch_earning_deductionList($data);
               $earn_deduct_List = json_decode(json_encode($earn_deduct_List),true);
               $data["earn_deduct_List"] = $earn_deduct_List;
              //print_r($data["earn_deduct_List"]);

              if($data['sal_mnth_id'] > 3)
              {
                  $f1 = $data['sal_yr_id'];
                  $f2 = $data['sal_yr_id']+1;
                  $financial_year = $f1."-".$f2;
              }
              else
              {
                  $f1 = $data['sal_yr_id']-1;
                  $f2 = $data['sal_yr_id'];
                  $financial_year = $f1."-".$f2;
              }
              $month_year=$data['sal_yr_id'].'-'.$data['sal_mnth_id'];
              //echo $financial_year;
              //die();
              if(isset($data['chk']))
	          {
                  $ch_count = count($data['chk']);

                  for($i=0; $i<$ch_count; $i++)
                  {
                      $arrCount = $data['chk'][$i]-1;

                      //print_r($arrCount);
                      $bulk_payment_date=date('Y-m-d');
                      //fy yr start
                          $year = date("Y", strtotime($bulk_payment_date));
                          $month = date("m", strtotime($bulk_payment_date));
                          if($month > 3)
                          {
                              $f1 = $year;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year+1;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
                          else
                          {
                              $f1 = $year-1;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
					        //fi yr
                      //salary slip code start
                      $sl_no='';
                      $slr_no =$this->model_salary->get_salary_slip_no();
                      $sl_no = $slr_no['salary_slip_no'];
                      if($sl_no=='')
                      {
                          $salary_slip_no = 'AE/S/'.$fy.'/00001';
                      }
                      else
                      {
                          $sl_noo = substr($sl_no, 12, 5);
                          $sl_nooo = $sl_noo+1;
                          $sl_nou = str_pad($sl_nooo, 5, "0", STR_PAD_LEFT);
                          $salary_slip_no = 'AE/S/'.$fy.'/'.$sl_nou;
                      }
                      //print_r($salary_slip_no );

                      //salary slip code end
                      $employee_id = $data['employee_id'][$arrCount];
                      $working_days = $data['working_days'][$arrCount];
                      $present_days = $data['present_days'][$arrCount];
                      $paid_leave = $data['paid_leave'][$arrCount];
                      $incentive_amt = $data['incentive_amt'][$arrCount];
                      $basic_salary = $data['basic_salary'][$arrCount];
                      $prepared_salary = $data['prepared_salary'][$arrCount];
                      $final_prepared_salary = $data['final_prepared_salary'][$arrCount];
                      $form = ["employee_id"=>$employee_id, "month_year"=>$month_year, "financial_year"=>$financial_year, "working_days"=>$working_days, "present_days"=>$present_days, "paid_leave"=>$paid_leave, "da_percent"=>$data["earn_deduct_List"]["dearness_allowance"], "ta_percent"=>$data["earn_deduct_List"]["transport_allowance"], "hra_percent"=>$data["earn_deduct_List"]["house_rent_allowance"], "mr_percent"=>$data["earn_deduct_List"]["medical_reimbursement"], "epf_percent"=>$data["earn_deduct_List"]["epf"], "esic_percent"=>$data["earn_deduct_List"]["esic"], "other_tax_percent"=>$data["earn_deduct_List"]["other"], "basic_salary"=>$basic_salary, "prepared_salary"=>$prepared_salary, "final_prepared_salary"=>$final_prepared_salary, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "employment_id"=>$data['employment_id'], "salary_slip_no"=>$salary_slip_no, "incentive_amt"=>$incentive_amt];

                      $data_exists = $this->model_salary->Generatesalary_exists($month_year,$employee_id);
                      $data_exists = json_decode(json_encode($data_exists),true);
                      if(!$data_exists)
                     {
                        $generate_salary_list = $this->model_salary->generate_salary_full_time($form);
                        $generate_salary_list = JSON_DECODE(JSON_ENCODE($generate_salary_list), true);
                        $data["generate_salary_list"] = $generate_salary_list; 
                      }
                      
                      //redirect("SalaryController/Generate_Sal_Emp_List");
                      
                      echo "<script>alert('SalaryGenerateSuccess","Salary Generated Successfully');window.location.href = '".URLROOT."/SalaryController/emp_sal_gen_list';</script>";
                  }
              }
          }
          else
          {
            // echo '<pre>';print_r($data);return;
            $this->view('pages/generate_sal_emp_list', $data);
          }
        }

      public function generate_salary_full_time_view(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();

                 $month=$data['sal_mnth'];
                 $year=$data['sal_yr'];
                 $data["month_year"]=$year.'-'.$month;
				
				/******/
				
				$data["mnth_no"]=str_pad($data["sal_mnth"], 2, '0', STR_PAD_LEFT);
				$data["from_sel_yr_mn"]=$data["sal_yr"].'-'.$data["mnth_no"].'-01';
				$data["from_sel_yr_mnn"]=date('Y-m-t',strtotime($data["from_sel_yr_mn"]));
				
				/******/

               //current month
                $monthh=date('n');
                $yearr=date('Y');
                $data['curr_month_year']=$yearr.'-'.$monthh;
               //print_r($data["sal_mnth"]);

                //Earning and deduction details
                $earn_deduct_List =$this->model_salary->get_earning_deductionList($data);
                $earn_deduct_List = json_decode(json_encode($earn_deduct_List),true);
                $data["earn_deduct_List"] = $earn_deduct_List;
                //Employee details data.
                $employeeList =$this->model_salary->getActiveEmployeeDetails($data);
                $employeeList = json_decode(json_encode($employeeList),true);

              if(date('m')=='1')
              {$data['paid_leave_month']='12';}
              else
              {$data['paid_leave_month']=date('m')-1;}
              if(date('m')==1)
              {$data['paid_leave_year']=date('Y')-1;}
              else
              {$data['paid_leave_year']=date('Y');}

               foreach($employeeList as $key => $value){

                   $ID = $value['_id'];
                   $paid_leave = $this->model_salary->get_paid_leaveList($value['_id'], $data['paid_leave_month'], $data['paid_leave_year']);
                   //$paid_leave = 2; // get paid_leave using model.
                   $employeeList[$key]['paid_leave'] = $paid_leave;
               }
               //print_r($employeeList);
               //$data["paid_leave"] = $paid_leave;
               //print_r($data["paid_leave"]);
                $data["emp_list"] = $employeeList;
               //print_r($data["emp_list"]);
                $this->view('pages/generate_salary_full_time_view', $data);
            }
            else
            {

                $this->view('pages/generate_salary_full_time_view', $data);
            }

      }

        public function generate_salary_part_time_view(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();
               $month=$data['sal_mnth'];
                 $year=$data['sal_yr'];
                 $data["month_year"]=$year.'-'.$month;
				 $data["mnth_no"]=str_pad($data["sal_mnth"], 2, '0', STR_PAD_LEFT);
				$data["from_sel_yr_mn"]=$data["sal_yr"].'-'.$data["mnth_no"].'-01';
				$data["from_sel_yr_mnn"]=date('Y-m-t',strtotime($data["from_sel_yr_mn"]));

               //current month
                $monthh=date('n');
                $yearr=date('Y');
                $data['curr_month_year']=$yearr.'-'.$monthh;
               //print_r($data['curr_month_year']);
                //Employee details data.
                $employeeList =$this->model_salary->getActiveEmployeeDetails($data);
                $employeeList = json_decode(json_encode($employeeList),true);
                if(date('m')=='1')
              {$data['paid_leave_month']='12';}
              else
              {$data['paid_leave_month']=date('m')-1;}
              if(date('m')==1)
              {$data['paid_leave_year']=date('Y')-1;}
              else
              {$data['paid_leave_year']=date('Y');}

               foreach($employeeList as $key => $value){

                   $ID = $value['_id'];
                   $paid_leave = $this->model_salary->get_paid_leaveList($value['_id'], $data['paid_leave_month'], $data['paid_leave_year']);
                   //$paid_leave = 2; // get paid_leave using model.
                   $employeeList[$key]['paid_leave'] = $paid_leave;
               }
                $data["emp_list"] = $employeeList;
                $this->view('pages/generate_salary_part_time_view', $data);
            }
            else
            {
                $this->view('pages/generate_salary_part_time_view', $data);
            }

      }
      public function generate_salary_part_time($ID=null)
       {
            $data = (array)null;
            $data["id"] = $ID;

          if(isPost()){
              $data= postData();
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();


              if($data['sal_mnth_id'] > 3)
              {
                  $f1 = $data['sal_yr_id'];
                  $f2 = $data['sal_yr_id']+1;
                  $financial_year = $f1."-".$f2;
              }
              else
              {
                  $f1 = $data['sal_yr_id']-1;
                  $f2 = $data['sal_yr_id'];
                  $financial_year = $f1."-".$f2;
              }
              $month_year=$data['sal_yr_id'].'-'.$data['sal_mnth_id'];

              if(isset($data['chk']))
	          {
                  $ch_count = count($data['chk']);

                  for($i=0; $i<$ch_count; $i++)
                  {
                      $arrCount = $data['chk'][$i]-1;

                      //print_r($arrCount);
                      $bulk_payment_date=date('Y-m-d');
                      //fy yr start
                          $year = date("Y", strtotime($bulk_payment_date));
                          $month = date("m", strtotime($bulk_payment_date));
                          if($month > 3)
                          {
                              $f1 = $year;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year+1;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
                          else
                          {
                              $f1 = $year-1;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
					        //fi yr
                      //salary slip code start
                      $sl_no='';
                      $slr_no =$this->model_salary->get_salary_slip_no();
                      $sl_no = $slr_no['salary_slip_no'];
                      if($sl_no=='')
                      {
                          $salary_slip_no = 'AE/S/'.$fy.'/00001';
                      }
                      else
                      {
                          $sl_noo = substr($sl_no, 12, 5);
                          $sl_nooo = $sl_noo+1;
                          $sl_nou = str_pad($sl_nooo, 5, "0", STR_PAD_LEFT);
                          $salary_slip_no = 'AE/S/'.$fy.'/'.$sl_nou;
                      }
                      $employee_id = $data['employee_id'][$arrCount];
                      $working_days = $data['working_days'][$arrCount];
                      $present_days = $data['present_days'][$arrCount];
                      $paid_leave = $data['paid_leave'][$arrCount];
                      $incentive_amt = $data['incentive_amt'][$arrCount];
                      $basic_salary = $data['basic_salary'][$arrCount];
                      $prepared_salary = $data['prepared_salary'][$arrCount];
                      $final_prepared_salary = $data['final_prepared_salary'][$arrCount];
                      $form = ["employee_id"=>$employee_id, "month_year"=>$month_year, "financial_year"=>$financial_year, "working_days"=>$working_days, "present_days"=>$present_days, "paid_leave"=>$paid_leave,  "basic_salary"=>$basic_salary, "prepared_salary"=>$prepared_salary, "final_prepared_salary"=>$final_prepared_salary, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "employment_id"=>$data['employment_id'], "salary_slip_no"=>$salary_slip_no, "incentive_amt"=>$incentive_amt];
                      $data_exists = $this->model_salary->Generatesalary_exists($month_year,$employee_id);
                      $data_exists = json_decode(json_encode($data_exists),true);
                      if(!$data_exists)
                      {
                         $generate_salary_list = $this->model_salary->generate_salary_part_time($form);
                         $generate_salary_list = JSON_DECODE(JSON_ENCODE($generate_salary_list), true);
                        $data["generate_salary_list"] = $generate_salary_list; 
                      }
                      echo "<script>alert('Salary Generated Successfully!!');window.location.href = '".URLROOT."/SalaryController/emp_sal_gen_list';</script>";
                      //redirect("SalaryController/Generate_Sal_Emp_List");
                  }
              }
          }
          else
          {

            $this->view('pages/generate_sal_emp_list', $data);
          }
        }
        public function generate_salary_daily_wage_view(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();
                $month=$data['sal_mnth'];
                $year=$data['sal_yr'];
                $data["month_year"]=$year.'-'.$month;
				
				$data["mnth_no"]=str_pad($data["sal_mnth"], 2, '0', STR_PAD_LEFT);
				$data["sel_yr_mn"]=$data["sal_yr"].'-'.$data["mnth_no"].'-01';
				//print_r($data["sel_yr_mn"]);

               //current month
                $monthh=date('n');
                $yearr=date('Y');
                $data['curr_month_year']=$yearr.'-'.$monthh;

                //Employee details data.
                $employeeList =$this->model_salary->getActiveDailywagersDetails($data);
                $employeeList = json_decode(json_encode($employeeList),true);
                $data["emp_list"] = $employeeList;
                $this->view('pages/generate_salary_daily_wage_view', $data);
            }
            else
            {
                $this->view('pages/generate_salary_daily_wage_view', $data);
            }

      }

      public function generate_salary_daily_wage($ID=null)
       {
            $data = (array)null;
            $data["id"] = $ID;

          if(isPost()){
              $data= postData();
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();

              if($data['sal_mnth_id'] > 3)
              {
                  $f1 = $data['sal_yr_id'];
                  $f2 = $data['sal_yr_id']+1;
                  $financial_year = $f1."-".$f2;
              }
              else
              {
                  $f1 = $data['sal_yr_id']-1;
                  $f2 = $data['sal_yr_id'];
                  $financial_year = $f1."-".$f2;
              }
              $month_year=$data['sal_yr_id'].'-'.$data['sal_mnth_id'];


              if(isset($data['chk']))
	          {
                  $ch_count = count($data['chk']);

                  for($i=0; $i<$ch_count; $i++)
                  {
                      $arrCount = $data['chk'][$i]-1;

                      //print_r($arrCount);
                      $bulk_payment_date=date('Y-m-d');
                      //fy yr start
                          $year = date("Y", strtotime($bulk_payment_date));
                          $month = date("m", strtotime($bulk_payment_date));
                          if($month > 3)
                          {
                              $f1 = $year;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year+1;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
                          else
                          {
                              $f1 = $year-1;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
					        //fi yr
                      //salary slip code start
                      $sl_no='';
                      $slr_no =$this->model_salary->get_salary_slip_no();
                      $sl_no = $slr_no['salary_slip_no'];
                      if($sl_no=='')
                      {
                          $salary_slip_no = 'AE/S/'.$fy.'/00001';
                      }
                      else
                      {
                          $sl_noo = substr($sl_no, 12, 5);
                          $sl_nooo = $sl_noo+1;
                          $sl_nou = str_pad($sl_nooo, 5, "0", STR_PAD_LEFT);
                          $salary_slip_no = 'AE/S/'.$fy.'/'.$sl_nou;
                      }
                      $employee_id = $data['employee_id'][$arrCount];
                      if($data['work_type_id']=="Per Month")
                      {
                        $working_days = $data['working_days'][$arrCount];
                      }
                      else
                      {
                        $working_days =0;
                      }

                      $present_days = $data['present_days'][$arrCount];
                      if($data['work_type_id']=="Per Hour")
                      {
                        $attended_hours = $data['attended_hours'][$arrCount];
                      }
                      else
                      {
                        $attended_hours =0;
                      }

                      $basic_salary = $data['basic_salary'][$arrCount];
                      $incentive_amt = $data['incentive_amt'][$arrCount];
                      $prepared_salary = $data['prepared_salary'][$arrCount];
                      $final_prepared_salary = $data['final_prepared_salary'][$arrCount];
                      $form = ["employee_id"=>$employee_id, "month_year"=>$month_year, "financial_year"=>$financial_year, "working_days"=>$working_days, "present_days"=>$present_days, "attended_hours"=>$attended_hours,  "basic_salary"=>$basic_salary, "prepared_salary"=>$prepared_salary, "final_prepared_salary"=>$final_prepared_salary, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "employment_id"=>$data['employment_id'], "work_type_id"=>$data['work_type_id'], "salary_slip_no"=>$salary_slip_no,"incentive_amt"=>$incentive_amt];
                      $data_exists = $this->model_salary->Generatesalary_exists($month_year,$employee_id);
                      $data_exists = json_decode(json_encode($data_exists),true);
                      if(!$data_exists)
                      {
                         $generate_salary_list = $this->model_salary->generate_salary_daily_wage($form);
                         $generate_salary_list = JSON_DECODE(JSON_ENCODE($generate_salary_list), true);
                        $data["generate_salary_list"] = $generate_salary_list; 
                      }
                      echo "<script>alert('Salary Generated Successfully!!');window.location.href = '".URLROOT."/SalaryController/emp_sal_gen_list';</script>";
                      //redirect("SalaryController/Generate_Sal_Emp_List");
                  }
              }
          }
          else
          {

            $this->view('pages/generate_sal_emp_list', $data);
          }
        }

        public function employee_salary_payment_list(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();

                //Employee details data.
                $EmpSalPaymentList =$this->model_salary->getEmpSalPaymentList($data);
                $EmpSalPaymentList = json_decode(json_encode($EmpSalPaymentList),true);
                $data["EmpSalPaymentList"] = $EmpSalPaymentList;

                $this->view('pages/employee_salary_payment_list', $data);
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
                $this->view('pages/employee_salary_payment_list', $data);
            }

      }
      public function employee_salary_payment_detail(){
            $data = (array)null;

                //Employee details data.
                $paymentmodeList =$this->model_salary->get_paymentmodeList($data);
                $paymentmodeList = json_decode(json_encode($paymentmodeList),true);
                $data["paymentmodeList"] = $paymentmodeList;
           if(isPost())
            {
                $data = postData();
				
                $this->view('pages/employee_salary_payment', $data);
            }
            else
            {
                $this->view('pages/employee_salary_payment', $data);
            }

      }
        public function employee_salary_payment_view(){
            $data = (array)null;
			
           if(isPost())
            {
                $data = postData();
				$data["generated_month_yr"]=$data["sal_yr"].'-'.$data["sal_mnth"];
				//print_r($data["generated_month_yr"]);
				$data["mnth_no"]=str_pad($data["sal_mnth"], 2, '0', STR_PAD_LEFT);
				$data["sel_yr_mn"]=$data["sal_yr"].'-'.$data["mnth_no"].'-01';
				$prev_month_ts = date('Y-m', strtotime('-1 month', strtotime($data["sel_yr_mn"])));
				$parts = explode('-', $prev_month_ts);
				$part_month=$parts[1];
				$part_yr=$parts[0];
				$pre_month = ltrim($part_month, '0');
				$data["previous_month_yr"]=$part_yr.'-'.$pre_month;
				//print_r($data["previous_month_yr"]);
                //Employee details data.
                $employeeList =$this->model_salary->getEmployeePaymentDetails($data);
                $employeeList = json_decode(json_encode($employeeList),true);
               //get final salary
               foreach($employeeList as $key => $value){
                   $ID = $value['_id'];
				   if($this->model_salary->Generatesalary_exists($data["previous_month_yr"],$value['_id'])){
					   $pre_sal = $this->model_salary->check_previous_month_payment($value['_id'], $data["previous_month_yr"]);
					   $employeeList[$key]['pre_sal'] = $pre_sal['_status'];
				   }
				   $final_salary = $this->model_salary->get_final_salary($value['_id'], $data["generated_month_yr"]);
                   $employeeList[$key]['final_salary'] = $final_salary['final_salary'];
                   $total_collection = $this->model_salary->get_total_coll_emp($value['_id'], $data["generated_month_yr"]);
                   $employeeList[$key]['total_collection'] = $total_collection['total_collection'];
                   $employeeList[$key]['due_amt'] = $final_salary['final_salary'] - $total_collection['total_collection'] ;
                   if($bank_details = $this->model_salary->get_emp_bank_details($value['_id'])){
                       //print_r($bank_details);
                    $employeeList[$key]['emp_bank_details_list'] = $bank_details;
                   }
                  // $employeeList[$key]['branch_name'] = $bank_details['branch_name'];
               }
                $data["emp_list"] = $employeeList;
               //print_r($data["emp_list"]);
                $this->view('pages/employee_salary_payment_view', $data);
            }
            else
            {
                $this->view('pages/employee_salary_payment_view', $data);
            }

      }

      public function employee_salary_payment($ID=null)
      {
            $data = (array)null;
            $data["id"] = $ID;

          if(isPost()){
              $data= postData();
			  $data["generated_mon_yr"]=$data["sal_yr_id"].'-'.$data["sal_mnth_id"];
				//print_r($data["generated_mon_yr"]);
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();
              $bulk_payment_date= date("Y-m-d");
	          $bulk_month_year= date("Y-m");
	          $mon_of_date=date('m',strtotime($bulk_payment_date));

              if(isset($data['chk']))
	          {
                  //print_r($data["check_neft_bank_imps_no"]);
                  //print_r($data["emp_bank_details_id"]);
                  ////die();
                  $ch_count = count($data['chk']);
                  for($a=0; $a<$ch_count; $a++)
                  {
                      $arrCount = $data['chk'][$a]-1;
                      //echo $data["emp_bank_details_id"][$arrCount];
                      //print_r($arrCount);
                      $employee_id = $data['employee_id'][$arrCount];
                      $payable_amt = $data['payable_amt'][$arrCount];
                      if($data['payment_mode_id']=="1")
                      {
                          $check_neft_bank_imps_no ='';
                          $transaction_date ='';
                          $emp_bank_details_id ='0';

                      }
                      else
                      {
                          $check_neft_bank_imps_no = $data['check_neft_bank_imps_no'][$arrCount];
                          $transaction_date = $data['transaction_date'][$arrCount];
                          $emp_bank_details_id = $data['emp_bank_details_id'][$arrCount];

                      }
                      //print_r($data['emp_bank_details_id'][$arrCount]);
                      //die();

                      //Final Salary details
                      $final_salary =$this->model_salary->get_emp_final_salary($employee_id, $data["generated_mon_yr"]);
                      $data['final_salary'] = $final_salary['final_salary'];


                      //Total Collection details
                      $total_collection =$this->model_salary->get_emp_total_collection($employee_id, $data["generated_mon_yr"]);
                      $data['total_collection'] = $total_collection['total_collection'];


                      //Total Salary
                      $total_salary_amt = $final_salary["final_salary"] - $total_collection["total_collection"];

                      //Total Due Amount
				      $due_amount=$total_salary_amt-$payable_amt;
                      if($total_salary_amt>=$payable_amt)
				      {
                          //fy yr start
                          $year = date("Y", strtotime($bulk_payment_date));
                          $month = date("m", strtotime($bulk_payment_date));
                          if($month > 3)
                          {
                              $f1 = $year;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year+1;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
                          else
                          {
                              $f1 = $year-1;
                              $f1 = substr($f1, 2, 2);
                              $f2 = $year;
                              $f2 = substr($f2, 2, 2);
                              $fy = $f1."-".$f2;
                          }
					        //fi yr
                      }
                      //cash voucher code start
                      if($data['payment_mode_id']=='1')
					  {
                            $cash_voucher_no='';
                            $cash_vouch_no =$this->model_salary->get_cash_voucher_no();
                            $cash_voucher_no = $cash_vouch_no['cash_voucher_no'];
                            if($cash_voucher_no=='')
                            {
                              $slip_number = 'AE/E/'.$fy.'/00001';
                            }
                            else
                            {
                              $cash_voucher_noo = substr($cash_voucher_no, 12, 5);
                              $cash_voucher_nooo = $cash_voucher_noo+1;
                              $cash_voucher_nou = str_pad($cash_voucher_nooo, 5, "0", STR_PAD_LEFT);
                              $slip_number = 'AE/E/'.$fy.'/'.$cash_voucher_nou;
                           }
                      }
                      else
					  {
						$slip_number='';
					  }

                      //cash voucher code end

                      $form = ["employee_id"=>$employee_id, "payment_date"=>$bulk_payment_date, "generated_amt"=>$total_salary_amt, "payable_amt"=>$payable_amt, "due_amt"=>$due_amount, "payment_mode_id"=>$data['payment_mode_id'],  "other_payment_mode"=>$data['other_payment_mode_id'], "check_neft_bank_imps_no"=>$check_neft_bank_imps_no, "transaction_date"=>$transaction_date, "emp_bank_details_id"=>$emp_bank_details_id, "cash_voucher_no"=>$slip_number, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "generated_mon_yr"=>$data['generated_mon_yr']];

                      //insert data in transaction table
                      $salary_payment_list = $this->model_salary->insert_salary_transaction($form);
                      $salary_payment_list = JSON_DECODE(JSON_ENCODE($salary_payment_list), true);
                      $data["salary_payment_list"] = $salary_payment_list;

                      //fetch salary generate data
                      $emp_sal_gen_list = $this->model_salary->getEmpSalGenerate($form);
                      $emp_sal_gen_list = JSON_DECODE(JSON_ENCODE($emp_sal_gen_list), true);
                      $data["emp_sal_gen_list"] = $emp_sal_gen_list;

                      $dataTbl=$data["emp_sal_gen_list"];
                      $i=0;
					  $jj=0;
					  $k=0;
                      foreach($dataTbl as $values){

                          $jj++;
                          $demand_id=$values['_id'];
                          $total_sal_demand=$values['final_prepared_salary'];
                          $month_year=$values['month_year'];

                          //fetch total col data
                          $emp_total_col = $this->model_salary->get_total_collection($employee_id,$demand_id);
                          $total_collection=$emp_total_col['total_collection'];
                          if($jj==1)
							{
								 $total = $payable_amt+$total_collection;
							}
							else
							{
								$total = $i;
							}
                         if($total_sal_demand <= $total)
						 {
								$rest_amt = $total_sal_demand - $total_collection;
								if($total_sal_demand < $total)
								{
									$i = $total-$total_sal_demand;
								}
								else
								{
									$i = $total-$rest_amt;
								}
                              //insert data in transaction table
                             $payment_tr_insrt = $this->model_salary->insrt_pay_trans($employee_id,$data["salary_payment_list"],$demand_id, $rest_amt, $month_year);
                             $payment_tr_insrt = JSON_DECODE(JSON_ENCODE($payment_tr_insrt), true);
                             $data["payment_tr_insrt"] = $payment_tr_insrt;

                             //fetch total col data
                             $emp_total_cole = $this->model_salary->get_total_collection($employee_id,$demand_id);
                             $paid_amtt=$emp_total_cole['total_collection'];


                             if($paid_amtt==$total_sal_demand)
                             {

                                  $generate_sal_stts_updt = $this->model_salary->generate_sal_stts_updt($demand_id);
                                  $generate_sal_stts_updt = JSON_DECODE(JSON_ENCODE($generate_sal_stts_updt), true);
                                  $data["generate_sal_stts_updt"] = $generate_sal_stts_updt;

                             }
                             if($jj==1){
									$k = $payable_amt-$rest_amt;
								}else{
									$k=$i;
								}
                           }
                          else
                          {
                                if($jj==1)
								{
									$amt=$payable_amt;
								}
								else
								{
									$amt=$total;
								}
                                //insert data in transaction table
                             $payment_tr_insrt = $this->model_salary->insrt_pay_trans($employee_id,$data["salary_payment_list"],$demand_id, $amt, $month_year);
                             $payment_tr_insrt = JSON_DECODE(JSON_ENCODE($payment_tr_insrt), true);
                             $data["payment_tr_insrt"] = $payment_tr_insrt;

                              //fetch total col data
                             $emp_total_cole = $this->model_salary->get_total_collection($employee_id,$demand_id);
                             $paid_amttt=$emp_total_cole['total_collection'];

                            if($paid_amttt==$total_sal_demand)
                            {

                                $generate_sl_stts_updt = $this->model_salary->generate_sal_stts_updt($demand_id);
                                $generate_sl_stts_updt = JSON_DECODE(JSON_ENCODE($generate_sl_stts_updt), true);
                                $data["generate_sl_stts_updt"] = $generate_sl_stts_updt;
                            }
                              $k=0;
                        }
                            if($k==0){
								break;
							}
                      }
                      echo "<script>alert('Salary Paid Successfully!!');window.location.href = '".URLROOT."/SalaryController/employee_salary_payment_list';</script>";
                     //redirect("SalaryController/employee_salary_payment_list");
                  }
              }
          }
          else
          {

            $this->view('pages/employee_salary_payment', $data);
          }
        }

        public function cash_voucher($ID=null){
            $data = (array)null;
            $data["id"] = $ID;

            //Employee details data.
            $EmpTranList =$this->model_salary->gettransactiondetByID($data);
            $EmpTranList = json_decode(json_encode($EmpTranList),true);
            $data["EmpTranList"] = $EmpTranList;
            //print_r($data["EmpTranList"]["company_location_id"]);

            //Company Location Details
            $EmpCompLocList =$this->model_salary->getcomplocdetByID($data["EmpTranList"]["company_location_id"]);
            $EmpCompLocList = json_decode(json_encode($EmpCompLocList),true);
            $data["EmpCompLocList"] = $EmpCompLocList;
            $this->view('pages/cash_voucher', $data);

      }
      public function salary_slip($ID=null){
            $data = (array)null;
            $data["id"] = $ID;
            
            //Employee details data.
            $EmpSalList =$this->model_salary->getsalgendetByID($data);
            $EmpSalList = json_decode(json_encode($EmpSalList),true);
            $data["EmpSalList"] = $EmpSalList;
            //print_r($data["EmpSalList"]);
            // echo '<pre>';print_r($data["EmpSalList"]);return;
          //Company Location Details
            $EmpCompLocList =$this->model_salary->getcomplocdetByID($data["EmpSalList"]["company_location_id"]);
            $EmpCompLocList = json_decode(json_encode($EmpCompLocList),true);
            $data["EmpCompLocList"] = $EmpCompLocList;
            // echo '<pre>';print_r($data["EmpCompLocList"]);return;

          //PAyment mode Details
            $EmpTrList =$this->model_salary->gettranempdetByID($data["EmpSalList"]["employee_id"],$data["EmpSalList"]["month_year"]);
            $EmpTrList = json_decode(json_encode($EmpTrList),true);
            $data["EmpTrList"] = $EmpTrList;

          //Cheque Details
            $EmpTrChkList =$this->model_salary->gettranchkdetByID($data["EmpSalList"]["employee_id"],$data["EmpSalList"]["month_year"]);
            $EmpTrChkList = json_decode(json_encode($EmpTrChkList),true);
            $data["EmpTrChkList"] = $EmpTrChkList;
            //print_r($data["EmpTrList"]);
            
            $this->view('pages/salary_slip', $data);

      }


  }

?>