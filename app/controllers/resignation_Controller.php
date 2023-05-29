<?php
  class resignation_Controller extends Controller {

    	public function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->obj = $this->model('model_resignation');
            $this->helper('phpMailer');
            $this->helper('phpMpdf');

        }

      // Blank 

      public function emp_resignation(){
          $data = (array)null;
          // echo '<pre>';print_r($_POST);return;
          if(isPost()){
              $data= postData();
              $data["date"] = dateTime();
              $data["employee_id"] = $_SESSION['emp_details']['_id'];
              $emp_resignation = $this->obj->emp_resignation($data);
              if($emp_resignation){
                $data['employee_quit_details_id'] = $emp_resignation;

                // echo '<pre>';print_r($data);return;
                  $emp_hr_notification = $this->obj->emp_hr_notification($data);
                    $data["emp_name"] = $emp_hr_notification["first_name"]." ".$emp_hr_notification["middle_name"]." ".$emp_hr_notification["last_name"];
                    $data["department_mstr_id"] = $emp_hr_notification["department_mstr_id"];
                    $data["company_location_id"] = $emp_hr_notification["company_location_id"];
                    $data["project_mstr_id"] = $emp_hr_notification["project_mstr_id"];
                    $emp_hr_notification_id = $this->obj->emp_hr_notification_id($data);
                    $data["hr_id"] = $emp_hr_notification_id["_id"];
                  //print_r($data);
                  $hr_notification_id = $this->obj->hr_notification_id($data);
              }
              flashToast('resignationSubmitSuccess',"Resignation Submitted Successfully");
              echo "<script>window.location.href = '".URLROOT."/resignation_Controller/emp_resignation';
                       </script>";
          }else{
            $data["employee_id"] = $_SESSION['emp_details']['_id'];
            if($check_emp_self_resignation = $this->obj->check_emp_self_resignation($data)){
              $data['isResignationSubmit'] = true;
              $data['resignationData'] = $check_emp_self_resignation;
              $this->view('pages/emp_resignation', $data);
            }else{
              $this->view('pages/emp_resignation');
            }
          }

      }

      public function notification_employee_resignation($ID=null, $quit_id = null){
           $data = (array)null;
           $data["id"] = $ID;
           $data["quit_id"] = $quit_id;
           if($this->obj->check_resign_details_exist($data)){
              redirect('dashboard');
            }else{
             $resign_details = $this->obj->resign_details($data);
             $resign_details = JSON_DECODE(JSON_ENCODE($resign_details), true);
             $data["resign_details"] = $resign_details;
             $this->view('pages/notification_employee_resignation', $data);
            }
      }

      public function accept_resignation(){
          $data = (array)null;
          if(isPost()){
              $data= postData();
              // echo '<pre>'; print_r($data);
              $data["date"] = dateTime();
              $data["hremp_id"] = $_SESSION['emp_details']['_id'];

              $notification_disable = $this->obj->notification_disable($data);
              
              $accept_resignation = $this->obj->accept_resignation($data);
              $accept_resignation_notification = $this->obj->accept_resignation_notification($data);


              $accept_resignation_notification_reporting_head = $this->obj->accept_resignation_notification_reporting_head($data);
              // echo '<pre>';print_r($accept_resignation_notification_reporting_head);return;

              redirect('DashboardCommon/Dash');
          }
      }
      public function accept_resignation_notification($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $accept_notification_details = $this->obj->accept_notification_details($data);
          $data["accept_notification_details"] = $accept_notification_details;
        $this->view('pages/accept_notification_details', $data);
      }

      public function reject_resignation(){
          if(isPost()){
              $data= postData();
              // echo '<pre>';print_r($data);return;
              $data["date"] = dateTime();
              $data["hremp_id"] = $_SESSION['emp_details']['_id'];
              $notification_disable = $this->obj->notification_disable($data);
              $reject_resignation = $this->obj->reject_resignation($data);
              $data["reject_resignation"] = $reject_resignation;
              $reject_resignation_notification = $this->obj->reject_resignation_notification($data);
            $this->view('pages/reject_notification_details');
          }
      }
      public function reject_resignation_notification($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $reject_notification_details = $this->obj->reject_notification_details($data);
          $data["reject_notification"] = $reject_notification_details;
        $this->view('pages/reject_notification_details', $data);
      }
      
      public function employee_asset_submission($ID=null){
            $data = (array)null;
            $data["id"] = $ID;
            if($this->obj->check_employee_asset_details($data)){
              redirect('dashboard');
            }else{
              $employee_asset_details = $this->obj->employee_asset_details($data);
              $employee_asset_list = $this->obj->employee_asset_list($data);
              $data["employee_asset_list"] = $employee_asset_list;
              $data["employee_asset_details"] = $employee_asset_details;
              $this->view('pages/employee_asset_submission', $data);
            }
      }
      public function employee_performance_ByReporting_head($ID=null){
            $data = (array)null;
            $data["id"] = $ID;
            if($this->obj->check_employee_performance_ByHead($data)){
              redirect('Dashboard');
            }else{
              $employee_performance_ByHead = $this->obj->employee_performance_ByHead($data);
              $data["employee_performance_ByHead"] = $employee_performance_ByHead;
              $this->view('pages/employee_performance_ByReporting_head', $data);
            }
      }
      public function emp_resignation_work_performance(){
            $data = (array)null;
            if(isPost()){
              $data= postData();
              $data["date"] = dateTime();
              $data["rpHeademp_id"] = $_SESSION['emp_details']['_id'];
              $data["hremp_id"] = $_SESSION['emp_details']['_id'];
              $notification_disable = $this->obj->notification_disable($data);
              $emp_resignation_work_performance = $this->obj->emp_resignation_work_performance($data);
              flashtoast('dashboard', "Work Performance Submitted Successfully");
            redirect('dashboard');
          }
      }

       public function emp_resignation_inventory_notification(){
           $data = (array)null;
           if(isPost()){
               $data= postData();

               $data["date"] = dateTime();
               $data["rpInventoryemp_id"] = $_SESSION['emp_details']['_id'];
               $data["hremp_id"] = $_SESSION['emp_details']['_id'];
               $notification_disable = $this->obj->notification_disable($data);
               $len = sizeof($data['assets_name']);
               for($i=0; $i<$len; $i++){
                   $form = [];
                   $date = $data['date'];
                   $rpInventoryemp_id = $data['rpInventoryemp_id'];
                   $quit_id = $data['quit_id'];
                   $assets_name = $data['assets_name'][$i];
                   $assets_sub_name = $data['assets_sub_name'][$i];
                   $assets_serial_no = $data['assets_serial_no'][$i];
                   $condition = $data['condition'][$i];
                   $penalty = $data['penalty'][$i];
                   $form["assets_name"] = $assets_name;
                   $form["assets_sub_name"] = $assets_sub_name;
                   $form["assets_serial_no"] = $assets_serial_no;
                   $form["condition"] = $condition;
                   $form["penalty"] = $penalty;
                   $form["quit_id"] = $quit_id;
                   $form["date"] = $date;
                   $form["rpInventoryemp_id"] = $rpInventoryemp_id;
                   $emp_resignation_inventory_notification = $this->obj->emp_resignation_inventory_notification($form);
               }
               $emp_inventory_notification_detail = $this->obj->emp_inventory_notification_detail($data);
               // echo '<pre>';print_r($emp_inventory_notification_detail);return;
               flashToast('dashboard', 'Assets received successfull !!');
               redirect('DashboardCommon/Dash');
            }
       }

      public function inventoryAssetSubmissionDone($ID=null){
            $data = (array)null;
            $data["id"] = $ID;
            //print_r($ID);
            if($this->obj->checkInventoryAssetSubmissionDone($data)){
              redirect('Dashboard');
            }else{
              $inventoryAssetSubmissionDone = $this->obj->inventoryAssetSubmissionDone($data);
              $data["inventoryAssetSubmissionDone"] = $inventoryAssetSubmissionDone;
              //Total Penalty Amount 
              $penalty_amount = $this->obj->calculate_total_amount($data);
              //print_r($penalty_amount);
              $data["inventoryAssetSubmissionDone"]['penalty_amount'] = $penalty_amount['penalty_amount'];
              $this->view('pages/inventoryAssetSubmissionDone', $data);
            }
      }

      public function finalSettlment(){

            $data = (array)null;
            if(isPost()){

               $data= postData();
               $data["date"] = dateTime();
               $data["rpHremp_id"] = $_SESSION['emp_details']['_id'];
               $data["hremp_id"] = $_SESSION['emp_details']['_id'];
               $notification_disable = $this->obj->notification_disable($data);
               $finalSettlmentdate = $this->obj->finalSettlmentdate($data);
                if($finalSettlmentdate)
                { 
                    // echo '<pre>';print_r($finalSettlmentdate);return;
                    $data['email'] = $data['email_id'];
                    $data['emp_name'] = $data['emp_name'];
                    $data['penalty'] = $data['net_penalty'];
                    $data['finalDate'] = $data['settlment_date'];
                    $data['subject']= 'Full and final settlment of account';
                    $data['body']= 'Dear '.$data['emp_name'].',<br>You have submitted all assets successfull.
                                Your Penalty amount is '.$data['penalty'].'.
                                And your final account settlment date is : '.$data['finalDate'].'.<br>
                                <br><br>
                                Note :- Please check your account on given final settlment date or consult with account department.
                                <br>';
                    $result = fullNdFinalSettlment($data);
                    if($result){
                        flashToast('dashboard', 'Full and final settlment date sent to employee mail and notification to the account department');
                        redirect('DashboardCommon/Dash');
                    }

                }

      }
    }
		public function payment_notification($id=null)
		{
		  $data = (array)null;
		  $data['id'] = $id;
		  //$data["date"] = dateTime();
		  //$data["rpHremp_id"] = $_SESSION['emp_details']['_id'];
		  $gate_payment_emp_details = $this->obj->gate_payment_emp_details($data);
		  $payment = $this->obj->gate_payment_mode($data);
		  if(isPost()){
				  $data= postData();
				   $data["hremp_id"] = $_SESSION['emp_details']['_id'];
				   $notification_disable = $this->obj->notification_disable($data);
				   $data['created_by'] = $_SESSION['emp_details']['_id'];
				  $data['created_on'] = dateTime();
				  
				  $bulk_payment_date= date("Y-m-d");
				  $bulk_month_year= date("Y-m");
				 $data['id'] = $id;
				 $data['gate_payment_emp_details'] = $gate_payment_emp_details;

			  $data['payment'] = $payment;
			  $penalty_amount = $this->obj->calculate_total_amount($data);
			  $data["gate_payment_emp_details"]['penalty_amount'] = $penalty_amount['penalty_amount'];
			  $penalty_amount_all = $this->obj->calculate_amount($data);
			  $data["penalty_amount_all"] = $penalty_amount_all;
				  $mon_of_date=date('m',strtotime($bulk_payment_date));
					 //final salary
			  $final_salary =$this->obj->get_final_salary($data['id']);
			  $data["final_salary"] = $final_salary["final_salary"];
			  //total collection
			  $total_collection =$this->obj->get_total_coll_emp($data['id']);
			  $data["total_collection"] = $total_collection["total_collection"];
			  $data["due_amt"]=($data["final_salary"]-$data["total_collection"])-$data['gate_payment_emp_details']['penalty_amount'];

			  $total_salary_amt =$data["due_amt"];
			  $due_amount=$total_salary_amt-$data['payable_amt'];
				
			  if($total_salary_amt>=$data['payable_amt'])
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
				  //cash voucher code start
					  if($data['payment_mode_id']=='1')
					  {
							$check_neft_bank_imps_no ='';
							$transaction_date ='';
							$emp_bank_details_id ='0';
							$cash_voucher_no='';
							$cash_vouch_no =$this->obj->get_cash_voucher_no();
							$cash_voucher_no = $cash_vouch_no['cash_voucher_no'];
							if($cash_voucher_no=='')
							{
							  $slip_number = 'SPS/E/'.$fy.'/00001';
							}
							else
							{
							  $cash_voucher_noo = substr($cash_voucher_no, 12, 5);
							  $cash_voucher_nooo = $cash_voucher_noo+1;
							  $cash_voucher_nou = str_pad($cash_voucher_nooo, 5, "0", STR_PAD_LEFT);
							  $slip_number = 'SPS/E/'.$fy.'/'.$cash_voucher_nou;
						   }
					  }
					  else
					  {
						  $check_neft_bank_imps_no = $data['check_neft_bank_imps_no'];
						  $transaction_date = $data['transaction_date'];
						  $emp_bank_details_id = $data['emp_bank_details_id'];
						  $slip_number='';
					  }

					  //cash voucher code end
					 $form = ["employee_id"=>$data['_id'], "payment_date"=>$bulk_payment_date, "generated_amt"=>$total_salary_amt, "payable_amt"=>$data['payable_amt'], "due_amt"=>$due_amount, "payment_mode_id"=>$data['payment_mode_id'],  "other_payment_mode"=>$data['other_payment_mode_id'], "check_neft_bank_imps_no"=>$check_neft_bank_imps_no, "transaction_date"=>$transaction_date, "emp_bank_details_id"=>$emp_bank_details_id, "cash_voucher_no"=>$slip_number, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "asset_fine_charge"=>$data['gate_payment_emp_details']['penalty_amount']];

					  //insert data in transaction table
					  $salary_payment_list = $this->obj->insert_salary_transaction($form);
					  $salary_payment_list = JSON_DECODE(JSON_ENCODE($salary_payment_list), true);
					  $data["salary_payment_list"] = $salary_payment_list;
					  //fetch salary generate data
						  $emp_sal_gen_list = $this->obj->getEmpSalGenerate($form);
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
							  $emp_total_col = $this->obj->get_total_collection($data['_id'],$demand_id);
							  $total_collection=$emp_total_col['total_collection'];
							  if($jj==1)
								{
									 $total = $data['payable_amt']+$total_collection;
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
									$asset_fine_charge=0;
								  //insert data in transaction table
								 $payment_tr_insrt = $this->obj->insrt_pay_trans($data['_id'],$data["salary_payment_list"],$demand_id, $rest_amt, $month_year,$asset_fine_charge);
								 $payment_tr_insrt = JSON_DECODE(JSON_ENCODE($payment_tr_insrt), true);
								 $data["payment_tr_insrt"] = $payment_tr_insrt;

								 //fetch total col data
								 $emp_total_cole = $this->obj->get_total_collection($data['_id'],$demand_id);
								 $paid_amtt=$emp_total_cole['total_collection'];

								 if($paid_amtt==$total_sal_demand)
								 {
									  $generate_sal_stts_updt = $this->obj->generate_sal_stts_updt($demand_id);
									  $generate_sal_stts_updt = JSON_DECODE(JSON_ENCODE($generate_sal_stts_updt), true);
									  $data["generate_sal_stts_updt"] = $generate_sal_stts_updt;
								 }
								  if($jj==1){
										$k = $data['payable_amt']-$rest_amt;
									}else{
										$k=$i;
									}
							  }
							  else
							  {
								  if($jj==1)
									{
										$amt=$data['payable_amt'];
									}
									else
									{
										$amt=$total;
									}
								  $asset_fine_charge=$data['gate_payment_emp_details']['penalty_amount'];
								  //insert data in transaction table
								 $payment_tr_insrt = $this->obj->insrt_pay_trans($data['_id'],$data["salary_payment_list"],$demand_id, $amt, $month_year,$asset_fine_charge);
								 $payment_tr_insrt = JSON_DECODE(JSON_ENCODE($payment_tr_insrt), true);
								 $data["payment_tr_insrt"] = $payment_tr_insrt;

								  //fetch total col data
								 $emp_total_cole = $this->obj->get_total_collection($data['_id'],$demand_id);
								 $paid_amttt=$emp_total_cole['total_collection']+$data['gate_payment_emp_details']['penalty_amount'];
								 if($paid_amttt==$total_sal_demand)
								{
									$generate_sl_stts_updt = $this->obj->generate_sal_stts_updt($demand_id);
									$generate_sl_stts_updt = JSON_DECODE(JSON_ENCODE($generate_sl_stts_updt), true);
									$data["generate_sl_stts_updt"] = $generate_sl_stts_updt;
								}
								  $k=0;
							  }
							  if($k==0){
									break;
								}
						  }
					  $data['id'] = $id;
					  $data["date"] = dateTime();
					  $data["rpHremp_id"] = $_SESSION['emp_details']['_id'];
					  $quit_sl_stts_updt = $this->obj->quit_sal_stts_updt($data['_id']);
					  $quit_sl_stts_updt = JSON_DECODE(JSON_ENCODE($quit_sl_stts_updt), true);
						if($quit_sl_stts_updt){ 
							$accountPayment_notification=$this->obj->accountPayment_notification($data);
						}
					  /*****/
						redirect('DashboardCommon/Dash');
					 /*****/

			  }
		}
		else
		{
			if($this->obj->checkSalaryTransaction($data)){
			  redirect('Dashboard');
			}else{
		  $data['gate_payment_emp_details'] = $gate_payment_emp_details;
		  $data['payment'] = $payment;
		  $penalty_amount = $this->obj->calculate_total_amount($data);
		  $data["gate_payment_emp_details"]['penalty_amount'] = $penalty_amount['penalty_amount'];
		  $penalty_amount_all = $this->obj->calculate_amount($data);
		  $data["penalty_amount_all"] = $penalty_amount_all;
		  //month count
		  $month_count =$this->obj->get_months_count($data['id']);
		  $data["month_count"] = $month_count["month_count"];
		   //final salary
		  $final_salary =$this->obj->get_final_salary($data['id']);
		  $data["final_salary"] = $final_salary["final_salary"];
			 //total collection
		  $total_collection =$this->obj->get_total_coll_emp($data['id']);
		  $data["total_collection"] = $total_collection["total_collection"];
		  $data["due_amt"]=($data["final_salary"]-$data["total_collection"])-$data['gate_payment_emp_details']['penalty_amount'];
		  if($bank_details = $this->obj->get_emp_bank_details($data['id'])){
			   //print_r($bank_details);
			$data['emp_bank_details_list'] = $bank_details;
		   }

			//print_r($data['gate_payment_emp_details']['penalty_amount']);
			//print_r($data["emp_bank_details_list"]);
		  $this->view('pages/payment_notification', $data);
		}
			}

		}
		


      public function resignation_List(){
          $data = (array)null;
          $resignation_List = $this->obj->resignation_List();
          $data["resignation_List"] = $resignation_List;
          $this->view('pages/resignation_List', $data);
      }
    public function generate_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        $data["hremp_id"] = $_SESSION['emp_details']['_id'];
        $signatureEmp = $this->obj->signatureEmp($data);
        $data["signatureEmp"] = $signatureEmp;
        $emp_experience = $this->obj->emp_experience($data);
        $data["emp_experience"] = $emp_experience;
        $data["userFirst_name"] = $data["emp_experience"]["_id"];
        $fileName = hashEncrypt($data['userFirst_name'])."."."pdf";
        $subFileName = $fileName;
        $fileName = "c:/xampp/htdocs/swmerp/public/uploads/experience_letter/".$fileName;
        $data['file_name'] = $fileName;
        $data['sub_file_name'] = "experience_letter/".$subFileName;;
        $data["date"] = date("Y/m/d");
        createExperienceLetterPDF($data);
        $create_ExperienceLetter = $this->obj->create_ExperienceLetter($data);
        $termination_ListUpdate = $this->obj->resignation_ListUpdate($data["_id"]);
        flashToast('resignation_List', 'Experience Letter Generated.');
        redirect('resignation_Controller/resignation_List');
    }

    public function upload_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        if(isPost()){
            $data= postData();
            $upload_resignation_experience_letter = $this->obj->upload_resignation_experience_letter($data);
            flashToast('termination_list', 'Experience Letter Uploaded.');
            redirect('resignation_Controller/resignation_List');
        }
        $get_experience_letter = $this->obj->get_experience_letter($data);
        $data["get_experience_letter"] = $get_experience_letter;
        //print_r($data);
        $this->view('pages/upload_resignation_experience_letter', $data);
    }
   public function view_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        $get_experience_letter = $this->obj->get_experience_letter($data);
        $data["get_experience_letter"] = $get_experience_letter;
        //print_r($data);
        $this->view('pages/view_resignation_experience_letter', $data);
    }

     public function account_notification($ID=null)
        {
            $data = (array)null;
            $data["_id"] = $ID;
            $get_account_notification = $this->obj->get_account_notification($data);
            $data["get_account_notification"] = $get_account_notification;
         //print_r($data);
            $this->view('pages/account_notification', $data);
        }

      public function deactivate_Employee()
      {
          $data = (array)null;
          if(isPost()){
              $data= postData();
              $data["hremp_id"] = $_SESSION['emp_details']['_id'];
              $notification_disable = $this->obj->notification_disable($data);
              $deactivate_Employee = $this->obj->deactivate_Employee($data);
              if($deactivate_Employee)
              {
                  $data['email'] = $data['email_id'];
                  $data['emp_name'] = $data['employee_name'];
                  $data['payable_amt'] = $data['payable_amt'];
                  $data['mode_of_payment'] = $data['mode_of_payment'];
                  $data['due_Amount'] = $data['due_Amount'];
                  $data['transaction_No'] = $data['transaction_No'];
                  $data['transaction_Date'] = $data['transaction_Date'];
                  $data['subject']= 'Account settlment Done';
                  $data['body']= 'Dear '.$data['emp_name'].',<br>Your due salary has been cleared successfull.<br>
                                Your salary paid description are:<br>
                                Employee Name : '.$data['emp_name'].'<br>
                                Amount Paid : '.$data['payable_amt'].'<br>
                                Due Amount : '.$data['due_Amount'].'<br>
                                Mode Of Payment : '.$data['mode_of_payment'].'<br>
                                Transaction No. : '.$data['transaction_No'].'<br>
                                Transaction Date : '.$data['transaction_Date'].'
                                <br>
                                <br>';
                  $result = accountPayment($data);
                  if($result){
                      flashToast('dashboard', 'Employee Deactivated.');
                      redirect('Dashboard');
                  }

              }
          }
      }





}