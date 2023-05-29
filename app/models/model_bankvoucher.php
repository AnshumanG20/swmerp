<?php
    class model_bankvoucher
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
       
    public function get_cash_voucher_no()
    {
        try
        {
           $sql="SELECT cash_voucher_no FROM tbl_transaction WHERE transaction_type='PAYMENT_VOUCHER_INCOME' AND payment_mode_id='1' AND _status='1' ORDER BY _id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
	public function get_expense_cash_voucher_no()
    {
        try
        {
           $sql="SELECT cash_voucher_no FROM tbl_transaction WHERE transaction_type='PAYMENT_VOUCHER_INCOME' AND payment_mode_id='1' AND _status='1' ORDER BY _id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function insert_cash_transaction($data){
            //generate salary
          $result = $this->db->table('tbl_transaction')->
              insertGetId([
                  "transaction_type"=>$data["transaction_type"],
                  "payment_date"=>$data["payment_date"],
                  "generated_amt"=>$data["generated_amt"],
                  "payable_amt"=>$data["payable_amt"],
                  "due_amt"=>$data["due_amt"],
                  "payment_mode_id"=>$data["payment_mode_id"],
                  "payer_payee_id"=>$data["payer_payee_name"],
                  "asset_fine_charge"=>"0",
                  "other_payment_mode"=>"",
                  "check_neft_bank_imps_no"=>"",
                  "transaction_date"=>$data["transaction_date"],
                  "bank_name"=>$data["bank_name"],
                  "emp_bank_details_id"=>"0",
                  "cash_voucher_no"=>$data["serial_number"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "remarks"=>$data["descriptions"],
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
	  public function insert_cash_collection($data){
            //generate salary
          $result = $this->db->table('tbl_collection')->
              insertGetId([
                  "transaction_type"=>$data["transaction_type"],
                  "transaction_id"=>$data["transaction_id"],
				  "payer_payee_id"=>$data["payer_payee_name"],
				  "generate_id"=>"0",
				  "month_year"=>"",
				  "asset_fine_charge"=>"0",
                  "payer_payee_name"=>'',
                  "accounting_equation"=>$data["accounting_equation"],
                  "paid_amt"=>$data["paid_amt"],
                  "doc_path"=>"",
                  "bill_voucher_no"=>$data["bill_voucher_no"],
                  "remarks"=>$data["descriptions"],
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
      
    public function insert_account_income_expense($data){
            //generate salary
          $result = $this->db->table('tbl_account_income_expense_details')->
              insertGetId([
                  "income_expense"=>$data["income_expense"],
                  "transaction_type"=>$data["transaction_type"],
				  "transaction_date_time"=>$data["date_time"],
				  "transaction_id"=>$data["transaction_id"],
				  "account_type"=>"0",
				  "payment_mode_id"=>$data["payment_mode_id"],
                  "payer_payee_name"=>$data["payer_payee_name"],
                  "profit_amount"=>$data["profit_amount"],
                  "loss_amount"=>$data["loss_amount"],
                  "created_by"=>$data["created_by"],
                  "loss_amount"=>'0',
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
	  
	public function get_paymentmodeList()
    {
        try
        {
            $sql="select * from tbl_payment_mode_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function getIncomeExpenseCashList($data)
      {
          try
          {
              $sql ="select tbl_transaction._id AS transaction_id,tbl_transaction.transaction_type AS transaction_type,tbl_transaction.transaction_date AS transaction_date,tbl_transaction.payable_amt AS payable_amt,tbl_contact_details.contact_name AS payer_payee_name,tbl_transaction.cash_voucher_no AS cash_voucher_no,tbl_transaction.remarks AS remarks,tbl_collection.accounting_equation AS accounting_equation,tbl_collection._status AS transaction_details_status,tbl_transaction._status AS transaction_status,tbl_transaction.created_by AS transaction_user_id from ((tbl_transaction join tbl_collection on((tbl_transaction._id = tbl_collection.transaction_id))) join tbl_contact_details on((tbl_transaction.payer_payee_id = tbl_contact_details._id)))
              where date(tbl_transaction.transaction_date) between :from_date and :to_date and tbl_transaction._status='1' and tbl_transaction.transaction_type in ('PAYMENT_VOUCHER_INCOME', 'PAYMENT_VOUCHER_EXPENSE')";
              $this->db->query($sql);
              $this->db->bind('from_date', $data['from_date']);
              $this->db->bind('to_date', $data['to_date']);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function search_getIncomeExpenseCashList($data)
      {
          try
          {
              $sql ="select tbl_transaction._id AS transaction_id,
                    tbl_transaction.transaction_type AS transaction_type,
                    tbl_transaction.transaction_date AS transaction_date,
                    tbl_transaction.payable_amt AS payable_amt,
                    tbl_contact_details.contact_name AS payer_payee_name,
                    tbl_transaction.cash_voucher_no AS cash_voucher_no,
                    tbl_transaction.remarks AS remarks,
                    tbl_collection.accounting_equation AS accounting_equation,
                    tbl_collection._status AS transaction_details_status,
                    tbl_transaction._status AS transaction_status,
                    tbl_transaction.created_by AS transaction_user_id from ((tbl_transaction join tbl_collection on((tbl_transaction._id = tbl_collection.transaction_id))) 
                    join tbl_contact_details on((tbl_transaction.payer_payee_id = tbl_contact_details._id)))
                   where tbl_transaction.transaction_date between :from_date and :to_date and tbl_transaction._status=1 and tbl_transaction.payment_mode_id =:payment_mode_id and tbl_transaction.transaction_type =:account_type";
              $this->db->query($sql);
              $this->db->bind('from_date', $data['from_date']);
              $this->db->bind('to_date', $data['to_date']);
              $this->db->bind('account_type',$data['account_type']);
              $this->db->bind('payment_mode_id',$data['payment_mode']);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	  public function get_contactList()
    {
        try
        {
            $sql="select * from tbl_contact_details where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function getBankVoucherDetailsbyId($tr_id)
      {
          try
          {
                $sql ="select tbl_transaction._id AS _id,tbl_transaction.transaction_type AS transaction_type,tbl_transaction.transaction_date AS transaction_date,tbl_transaction.payable_amt AS income_withdraw_amt,tbl_transaction.payment_mode_id,tbl_collection.bill_voucher_no AS bill_voucher_no,tbl_transaction.remarks AS descriptions,tbl_collection.accounting_equation AS accounting_equation,tbl_transaction.payer_payee_id AS payer_payee_id,tbl_transaction._status AS transaction_status,tbl_transaction.bank_name AS bank_name from ((tbl_transaction join tbl_collection on((tbl_transaction._id = tbl_collection.transaction_id))))
              where tbl_transaction._id='$tr_id' and tbl_transaction._status='1'  and tbl_transaction.transaction_type in ('PAYMENT_VOUCHER_INCOME', 'PAYMENT_VOUCHER_EXPENSE')";
              $this->db->query($sql);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	  public function update_transaction_details($data){
       		 $result =$this->db->table('tbl_transaction')
                          ->where("_id", "=", $data['tran_id'])
                          ->update([
                              'transaction_type'=>$data['transaction_type'],
                              'payment_date'=>$data['payment_date'],
                              'generated_amt'=>$data['generated_amt'],
                              'payable_amt'=>$data['payable_amt'],
                              'due_amt'=>$data['due_amt'],
                              'payer_payee_id'=>$data['payer_payee_name'],
                              'payment_mode_id'=>$data['payment_mode_id'],
                              'transaction_date'=>$data['transaction_date'],
                              'payment_mode_id'=>$data['payment_mode_id']
                                ]);
             return json_decode(json_encode($result), true);
		}  
		public function update_collection_details($data){
       		$result =$this->db->table('tbl_collection')
                          ->where("transaction_id", "=", $data['transaction_id'])
                          ->update([
                              'transaction_type'=>$data['transaction_type'],
                              'transaction_id'=>$data['transaction_id'],
                              'generate_id'=>0,
                              'paid_amt'=>$data['paid_amt'],
                              'payer_payee_id'=>$data['payer_payee_name'],
                              'accounting_equation'=>$data['accounting_equation'],
                              'remarks'=>$data['descriptions'],
                              'bill_voucher_no'=>$data['bill_voucher_no']
                                ]);
            return json_decode(json_encode($result), true);
		}  
		public function update_account_income_expense_details($data){
       		$result =$this->db->table('tbl_account_income_expense_details')
                          ->where("transaction_id", "=", $data['transaction_id'])
                          ->update([
                              'income_expense'=>$data['income_expense'],
							  'transaction_type'=>$data['transaction_type'],
                              'transaction_id'=>$data['transaction_id'],
                              'profit_amount'=>$data['profit_amount'],
                              'loss_amount'=>$data['loss_amount'],
                              'payer_payee_name'=>$data['payer_payee_name']
                                ]);
            return json_decode(json_encode($result), true);
		}
		public function upload_document_update($tr_id, $attachment_path){
       		 $result =$this->db->table('tbl_collection')
                          ->where("transaction_id", "=", $tr_id)
                          ->update([
                              'doc_path'=>$attachment_path
                                ]);
             return json_decode(json_encode($result), true);
		}
		public function IE_DeleteById($id)
    {
        try
        {
            $sql="DELETE FROM tbl_transaction where _id ='$id'";
            $this->db->query($sql);
            $result = $this->db->deletion();
			if($result)
			{
				$sql_col="DELETE FROM tbl_collection where transaction_id ='$id'";
				$this->db->query($sql_col);
				$result_col = $this->db->deletion();
				if($result_col)
				{
					$sql_ie="DELETE FROM tbl_account_income_expense_details where transaction_id ='$id'";
					$this->db->query($sql_ie);
					$result_ie = $this->db->deletion();
				}
			}
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
    }

?>