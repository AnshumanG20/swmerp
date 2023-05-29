<?php
class IncomeExpense extends Controller
{
	public function __construct()
	{
		if (!isLoggedIn()) {
			redirect('Login');
		}
		$this->model_income = $this->model('model_income');
	}
	public function add_update_organisation_income_expense($ID = null)
	{
		$data = (array)null;
		$data["_id"] = $ID;
		if (isPost()) {
			$data = postData();
			if ($data['_id'] == '') //Insert Opertion
			{
				$data['created_by'] = $_SESSION['emp_details']['_id'];
				$data['created_on'] = dateTime();
				$bulk_payment_date = date("Y-m-d");
				$date_time = date("Y-m-d H:i:s");
				if ($data["account_type"] == "INCOME") {
					/************/
					//fy yr start
					$year = date("Y", strtotime($bulk_payment_date));
					$month = date("m", strtotime($bulk_payment_date));
					if ($month > 3) {
						$f1 = $year;
						$f1 = substr($f1, 2, 2);
						$f2 = $year + 1;
						$f2 = substr($f2, 2, 2);
						$fy = $f1 . "-" . $f2;
					} else {
						$f1 = $year - 1;
						$f1 = substr($f1, 2, 2);
						$f2 = $year;
						$f2 = substr($f2, 2, 2);
						$fy = $f1 . "-" . $f2;
					}
					//fi yr
					$serial_number = "";
					$serial_no = '';
					if ($data["payment_mode"] == 1) {
						$ser_no = $this->model_income->get_cash_voucher_no();
						$serial_no = $ser_no['cash_voucher_no'];
						if ($serial_no == '') {
							$serial_number = 'SPS/C/' . $fy . '/00001';
						} else {
							$serial_no = substr($serial_no, 12, 5);
							$serial_no = $serial_no + 1;
							$serial_no = str_pad($serial_no, 5, "0", STR_PAD_LEFT);
							$serial_number = 'SPS/C/' . $fy . '/' . $serial_no;
						}
					}
					/************/
					$form = ["account_type" => $data['account_type'], "payment_date" => $bulk_payment_date, "generated_amt" => $data["income_withdraw_amt"], "payable_amt" => $data["income_withdraw_amt"], "due_amt" => 0, "payment_mode_id" => $data['payment_mode'], "transaction_date" => $data["transaction_date"], "serial_number" => $serial_number, "created_by" => $data['created_by'], "created_on" => $data['created_on'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "descriptions" => $data['descriptions'], "transaction_type" => 'COMPANY_INCOME'];

					//insert data in transaction table
					$cash_payment_list = $this->model_income->insert_cash_transaction($form);
					$cash_payment_list = JSON_DECODE(JSON_ENCODE($cash_payment_list), true);
					$data["cash_payment_list"] = $cash_payment_list;
					if ($data["cash_payment_list"]) {
						$form_data = ["account_type" => $data['account_type'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "transaction_id" => $data["cash_payment_list"], "descriptions" => $data['descriptions'], "paid_amt" => $data["income_withdraw_amt"], "payment_mode_id" => $data['payment_mode'], "created_by" => $data['created_by'], "date_time" => $date_time, "transaction_type" => 'COMPANY_INCOME', "bill_voucher_no" => '', "profit_amount" => $data["income_withdraw_amt"], "loss_amount" => 0, "income_expense" => 'INCOME'];

						$cash_coll_list = $this->model_income->insert_cash_collection($form_data);
						$cash_coll_list = JSON_DECODE(JSON_ENCODE($cash_coll_list), true);
						$data["cash_payment_list"] = $cash_coll_list;

						$cash_income_expense = $this->model_income->insert_account_income_expense($form_data);
						$cash_income_expense = JSON_DECODE(JSON_ENCODE($cash_income_expense), true);
						$data["cash_income_expense"] = $cash_income_expense;
					}

					flashToast("incomeAddSuccess", "Income Added Successfully");
					redirect("IncomeExpense/organisation_income_expense_list");
				} else if ($data["account_type"] == "EXPENSE") {
					/************/
					//fy yr start
					$year = date("Y", strtotime($bulk_payment_date));
					$month = date("m", strtotime($bulk_payment_date));
					if ($month > 3) {
						$f1 = $year;
						$f1 = substr($f1, 2, 2);
						$f2 = $year + 1;
						$f2 = substr($f2, 2, 2);
						$fy = $f1 . "-" . $f2;
					} else {
						$f1 = $year - 1;
						$f1 = substr($f1, 2, 2);
						$f2 = $year;
						$f2 = substr($f2, 2, 2);
						$fy = $f1 . "-" . $f2;
					}
					//fi yr
					$serial_number = "";
					$serial_no = '';
					if ($data["payment_mode"] == 1) {
						$ser_no = $this->model_income->get_expense_cash_voucher_no();
						$serial_no = $ser_no['cash_voucher_no'];
						if ($serial_no == '') {
							$serial_number = 'SPS/E/' . $fy . '/00001';
						} else {
							$serial_no = substr($serial_no, 12, 5);
							$serial_no = $serial_no + 1;
							$serial_no = str_pad($serial_no, 5, "0", STR_PAD_LEFT);
							$serial_number = 'SPS/E/' . $fy . '/' . $serial_no;
						}
					}
					/************/
					$form = ["account_type" => $data['account_type'], "payment_date" => $bulk_payment_date, "generated_amt" => $data["income_withdraw_amt"], "payable_amt" => $data["income_withdraw_amt"], "due_amt" => 0, "payment_mode_id" => $data['payment_mode'], "transaction_date" => $data["transaction_date"], "serial_number" => $serial_number, "created_by" => $data['created_by'], "created_on" => $data['created_on'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "descriptions" => $data['descriptions'], "transaction_type" => 'COMPANY_EXPENSE'];

					//insert data in transaction table
					$cash_payment_list = $this->model_income->insert_cash_transaction($form);
					$cash_payment_list = JSON_DECODE(JSON_ENCODE($cash_payment_list), true);
					$data["cash_payment_list"] = $cash_payment_list;
					if ($data["cash_payment_list"]) {
						$form_data = ["account_type" => $data['account_type'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "transaction_id" => $data["cash_payment_list"], "descriptions" => $data['descriptions'], "paid_amt" => $data["income_withdraw_amt"], "payment_mode_id" => $data['payment_mode'], "created_by" => $data['created_by'], "date_time" => $date_time, "transaction_type" => 'COMPANY_EXPENSE', "profit_amount" => 0, "loss_amount" => $data["income_withdraw_amt"], "bill_voucher_no" => $data["bill_voucher_no"], "income_expense" => 'EXPENSE'];

						$cash_coll_list = $this->model_income->insert_cash_collection($form_data);
						$cash_coll_list = JSON_DECODE(JSON_ENCODE($cash_coll_list), true);
						if ($cash_coll_list) {
							if (isset($_FILES['doc_attach'])) {
								if ($_FILES['doc_attach']['name'] != "") {
									$file = $_FILES['doc_attach'];
									$path = "company_expense_doc";
									$newFileName = md5($data["cash_payment_list"]);
									$extensions = ['png', 'jpg', 'jpeg', 'pdf'];
									$photo_status = uploader($file, $path, $newFileName, $extensions);
									if ($photo_status) {
										$file_name = $file['name'];
										$tmp = explode('.', $file_name);
										$file_ext = strtolower(end($tmp));
										$attachment_path = $path . "/" . $newFileName . '.' . $file_ext;
										//update data in asset details table
										$expense_upload_doc = $this->model_income->upload_document($cash_coll_list, $attachment_path);
										$expense_upload_doc = JSON_DECODE(JSON_ENCODE($expense_upload_doc), true);
									}
								}
							}
						}

						$cash_income_expense = $this->model_income->insert_account_income_expense($form_data);
						$cash_income_expense = JSON_DECODE(JSON_ENCODE($cash_income_expense), true);
						$data["cash_income_expense"] = $cash_income_expense;
					}
					flashToast("expenseAddSuccess", "Expense Added Successfully");
					redirect("IncomeExpense/organisation_income_expense_list");
				}
			} else //Update Operation
			{
				$bulk_payment_date = date("Y-m-d");
				if ($data["account_type"] == "INCOME") {
					/************/
					$form = ["account_type" => $data['account_type'], "payment_date" => $bulk_payment_date, "generated_amt" => $data["income_withdraw_amt"], "payable_amt" => $data["income_withdraw_amt"], "due_amt" => 0, "payment_mode_id" => $data['payment_mode'], "transaction_date" => $data["transaction_date"], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "descriptions" => $data['descriptions'], "transaction_type" => 'COMPANY_INCOME', "tran_id" => $data['_id']];

					//insert data in transaction table
					$cash_payment_list = $this->model_income->update_transaction_details($form);
					$cash_payment_list = JSON_DECODE(JSON_ENCODE($cash_payment_list), true);
					//$data["cash_payment_list"] = $cash_payment_list;
					if ($cash_payment_list) {
						$form_data = ["account_type" => $data['account_type'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "transaction_id" => $data['_id'], "descriptions" => $data['descriptions'], "paid_amt" => $data["income_withdraw_amt"], "payment_mode_id" => $data['payment_mode'],  "transaction_type" => 'COMPANY_INCOME', "bill_voucher_no" => '', "profit_amount" => $data["income_withdraw_amt"], "loss_amount" => 0, "income_expense" => 'INCOME', "doc_path" => ''];

						$cash_coll_list = $this->model_income->update_collection_details($form_data);
						$cash_coll_list = JSON_DECODE(JSON_ENCODE($cash_coll_list), true);
						$data["cash_payment_list"] = $cash_coll_list;

						$cash_income_expense = $this->model_income->update_account_income_expense_details($form_data);
						$cash_income_expense = JSON_DECODE(JSON_ENCODE($cash_income_expense), true);
						$data["cash_income_expense"] = $cash_income_expense;
					}
					flashToast("incomeUpdateSuccess", "Inocome Updated Successfully");
					redirect("IncomeExpense/organisation_income_expense_list");
				} else if ($data["account_type"] == "EXPENSE") {
					// print_var($data);
					// return;	
					/************/
					$form = ["account_type" => $data['account_type'], "payment_date" => $bulk_payment_date, "generated_amt" => $data["income_withdraw_amt"], "payable_amt" => $data["income_withdraw_amt"], "due_amt" => 0, "payment_mode_id" => $data['payment_mode'], "transaction_date" => $data["transaction_date"], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "descriptions" => $data['descriptions'], "transaction_type" => 'COMPANY_EXPENSE', "tran_id" => $data['_id']];

					//insert data in transaction table
					$cash_payment_list = $this->model_income->update_transaction_details($form);
					$cash_payment_list = JSON_DECODE(JSON_ENCODE($cash_payment_list), true);
					//$data["cash_payment_list"] = $cash_payment_list;
					if ($cash_payment_list) {
						$form_data = ["account_type" => $data['account_type'], "accounting_equation" => $data['accounting_equation'], "payer_payee_name" => $data['payer_payee_name'], "transaction_id" => $data['_id'], "descriptions" => $data['descriptions'], "paid_amt" => $data["income_withdraw_amt"], "payment_mode_id" => $data['payment_mode'],  "transaction_type" => 'COMPANY_EXPENSE', "profit_amount" => 0, "loss_amount" => $data["income_withdraw_amt"], "descriptions" => $data['descriptions'], "bill_voucher_no" => $data["bill_voucher_no"], "income_expense" => 'EXPENSE'];

						$cash_coll_list = $this->model_income->update_collection_details($form_data);
						$cash_coll_list = JSON_DECODE(JSON_ENCODE($cash_coll_list), true);
						if ($cash_coll_list) {
							if (isset($_FILES['doc_attach'])) {
								if ($_FILES['doc_attach']['name'] != "") {
									$file = $_FILES['doc_attach'];
									$path = "company_expense_doc";
									$newFileName = md5($data["_id"]);
									$extensions = ['png', 'jpg', 'jpeg', 'pdf'];
									$photo_status = uploader($file, $path, $newFileName, $extensions);
									if ($photo_status) {
										$file_name = $file['name'];
										$tmp = explode('.', $file_name);
										$file_ext = strtolower(end($tmp));
										$attachment_path = $path . "/" . $newFileName . '.' . $file_ext;
										//update data in asset details table
										$expense_upload_doc = $this->model_income->upload_document_update($data['_id'], $attachment_path);
										$expense_upload_doc = JSON_DECODE(JSON_ENCODE($expense_upload_doc), true);
									}
								}
							}
						}

						$cash_income_expense = $this->model_income->update_account_income_expense_details($form_data);
						$cash_income_expense = JSON_DECODE(JSON_ENCODE($cash_income_expense), true);
						$data["cash_income_expense"] = $cash_income_expense;
					}
					flashToast("expenseUpdateSuccess", "Expense Updated Successfully");
					redirect("IncomeExpense/organisation_income_expense_list");
				}
			}
		} else if (isset($ID)) {

			$result = $this->model_income->getIncomeExpenseDetailsbyId($ID);
			$data = json_decode(json_encode($result), true);

			$this->view('pages/add_update_organisation_income_expense', $data);
		} else {
			$this->view('pages/add_update_organisation_income_expense', $data);
		}
	}
	public function organisation_income_expense_list()
	{
		$data = (array)null;
		//Employee details data.
		$paymentmodeList = $this->model_income->get_paymentmodeList($data);
		$paymentmodeList = json_decode(json_encode($paymentmodeList), true);
		$data["paymentmodeList"] = $paymentmodeList;
		//$this->view('pages/organisation_income_expense_list',$data);
		if (isPost()) {
			$data = postData();
			//print_r($data);
			//Employee details data.
			$IncomeExpenseCashList = $this->model_income->search_getIncomeExpenseCashList($data);
			$IncomeExpenseCashList = json_decode(json_encode($IncomeExpenseCashList), true);
			$data["IncomeExpenseCashList"] = $IncomeExpenseCashList;
			$data["paymentmodeList"] = $paymentmodeList;
			//print_r($IncomeExpenseCashList);
			// echo '<pre>';print_r($data);die();
			$this->view('pages/organisation_income_expense_list', $data);
		} else {
			$data['from_date'] = date('Y-m-d');
			$data['to_date'] = date('Y-m-d');
			//Employee details data.
			$IncomeExpenseCashList = $this->model_income->getIncomeExpenseCashList($data);
			$IncomeExpenseCashList = json_decode(json_encode($IncomeExpenseCashList), true);
			$data["IncomeExpenseCashList"] = $IncomeExpenseCashList;
			//print_r($data["IncomeExpenseCashList"]);
			// echo '<pre>';print_r($data);die();
			$this->view('pages/organisation_income_expense_list', $data);
		}
	}
	public function payment_voucher($ID = null)
	{
		$data = (array)null;
		$data["id"] = $ID;

		//Employee details data.
		$EmpTranList = $this->model_income->gettransactiondetByID($data);
		$EmpTranList = json_decode(json_encode($EmpTranList), true);
		$data["EmpTranList"] = $EmpTranList;
		//print_r($data["EmpTranList"]["company_location_id"]);

		//Company Location Details
		$EmpCompLocList = $this->model_income->getcomplocdetByID();
		$EmpCompLocList = json_decode(json_encode($EmpCompLocList), true);
		$data["EmpCompLocList"] = $EmpCompLocList;
		// echo '<pre>';
		// print_r($data);
		$this->view('pages/payment_voucher', $data);
	}
	public function IE_DeleteById($id)
	{
		$result = $this->model_income->IE_DeleteById($id);
		if ($result) {
			flashToast("expenseDeleteSuccess", "Record Deleted Successfuly");
			echo "<script> window.location.href = '" . URLROOT . "/IncomeExpense/organisation_income_expense_list';</script>";
		} else {

			echo "<script>alert('Db Error'); window.location.href = '" . URLROOT . "/IncomeExpense/organisation_income_expense_list';</script>";
		}
	}
}
