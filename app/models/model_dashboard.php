<?php
    class model_dashboard
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
		
	
    public function invoice_count($data)
    {
        // print_r($data);
        try
        {
            $sql="select count(_id) as count_invoice from tbl_invoice";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function employee_count($data)
    {
        try
        {
            $sql="select count(_id) as count_employee from tbl_emp_details where _status='1' and step_status='7'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function customer_count($data)
    {
        try
        {
            $sql="select count(_id) as count_customer from tbl_contact_details where _status='1' and contact_type_id='1'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function vendor_count($data)
    {
        try
        {
            $sql="select count(_id) as count_vendor from tbl_contact_details where _status='1' and contact_type_id='2'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function total_invoice_generated_amt()
    {
        try
        {
            $sql="SELECT COALESCE(sum(COALESCE (bill_amt,0)),0) as bill_amt
                     FROM tbl_invoice
                     where _status='1'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
	public function total_invoice_payable_amt()
    {
        try
        {
            $sql="SELECT COALESCE(sum(COALESCE (payable_amt,0)),0) as payable_amt
                     FROM tbl_transaction
                     where _status='1' and transaction_type='INVOICE'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function total_income_amt()
    {
        try
        {
            $sql="SELECT COALESCE(sum(COALESCE (payable_amt,0)),0) as payable_amt
                     FROM tbl_transaction
                     where _status='1' and transaction_type in ('INVOICE','PAYMENT_VOUCHER_INCOME','COMPANY_INCOME')";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function total_expense_amt()
    {
        try
        {
            $sql="SELECT COALESCE(sum(COALESCE (payable_amt,0)),0) as payable_amt
                     FROM tbl_transaction
                     where _status='1' and transaction_type in ('EMPLOYEE_SALARY','INVOICE','PAYMENT_VOUCHER_EXPENSE','COMPANY_EXPENSE')";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    }

?>