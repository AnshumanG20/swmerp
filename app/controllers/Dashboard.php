<?php

  class Dashboard extends Controller {
  	private $db;
  	function __construct(){
        // if(!isLoggedIn()){ redirect('Login'); }

		if(isset($_SESSION['emp_details']) && $_SESSION['emp_details']['designation_mstr_id'] >1){
			$this->view('pages/403');
		}
		
		
		$this->model_dashboard = $this->model('model_dashboard');
  	}
    public function index(){
		
		$data = (array)null;
    	//print_r($_SESSION['emp_details']);
        //$url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];
		//invoice count
		$invcount =$this->model_dashboard->invoice_count($data);
		$invcount = json_decode(json_encode($invcount),true);
		$data["invcount"] = $invcount;
		//invoice bill amt
		$invbillamt =$this->model_dashboard->total_invoice_generated_amt($data);
		$invbillamt = json_decode(json_encode($invbillamt),true);
		$data["invbillamt"] = $invbillamt;
		//invoice payment received
		$invpayreceive =$this->model_dashboard->total_invoice_payable_amt($data);
		$invpayreceive = json_decode(json_encode($invpayreceive),true);
		$data["invpayreceive"] = $invpayreceive;
		$data["invpaydue"]=$data["invbillamt"]["bill_amt"]-$data["invpayreceive"]["payable_amt"];
		//employee count
		$empcount =$this->model_dashboard->employee_count($data);
		$empcount = json_decode(json_encode($empcount),true);
		$data["empcount"] = $empcount;
		//customer count
		$custcount =$this->model_dashboard->customer_count($data);
		$custcount = json_decode(json_encode($custcount),true);
		$data["custcount"] = $custcount;
		//customer count
		$vendorcount =$this->model_dashboard->vendor_count($data);
		$vendorcount = json_decode(json_encode($vendorcount),true);
		$data["vendorcount"] = $vendorcount;
		//income amt
		$incomeamt =$this->model_dashboard->total_income_amt($data);
		$incomeamt = json_decode(json_encode($incomeamt),true);
		$data["incomeamt"] = $incomeamt;
		//expense amt
		$expenseamt =$this->model_dashboard->total_expense_amt($data);
		$expenseamt = json_decode(json_encode($expenseamt),true);
		$data["expenseamt"] = $expenseamt;
		
		// echo "<pre>";
		// print_r($_SESSION);
		// return;

        $this->view('pages/dashboard',$data);
		



		
		
    }
  }