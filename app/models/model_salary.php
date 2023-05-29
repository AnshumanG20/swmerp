<?php
    class model_salary
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }

         public function getEmpSalGenList($data)
    {
        try
        {
            $sql="SELECT t._id, e.first_name, e.middle_name, e.last_name, e.employee_code, t.month_year, t.financial_year,
            t.paid_leave, t.working_days, t.present_days, t.prepared_salary, t.final_prepared_salary, m.employment_type, t.work_type, t._status FROM 
            tbl_generate_salary_details t join tbl_emp_details e on(t.employee_id=e._id)
            join tbl_employment_type_mstr m on(t.employment_type_id=m._id)
            where date(t.created_on) between :from_date and :to_date";
            $this->db->query($sql);
            $this->db->bind('from_date',$data['from_date']);
            $this->db->bind('to_date',$data['to_date']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_gradeList()
    {
        try
        {
            $sql="select * from tbl_grade_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_employmentList()
    {
        try
        {
            $sql="select * from tbl_employment_type_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_earning_deductionList($data)
    {
        try
        {
           $sql="select * from tbl_earning_mstr
                 where employment_type_id=:employment_type_mstr_id and grade_id=:grade_mstr_id and _status=:_status";
            $this->db->query($sql);
            $this->db->bind('employment_type_mstr_id',$data['employment_type_id']);
            $this->db->bind('grade_mstr_id',$data['grade_type_id']);
            $this->db->bind('_status', 1);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_paid_leaveList($EMP_ID, $MON, $YR)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_leave,0)),0) as paid_leave from tbl_employee_leave_detail
                 where employee_id='$EMP_ID' and EXTRACT(MONTH FROM leave_from_date) ='$MON' and EXTRACT(YEAR FROM leave_from_date) ='$YR' and _status='2'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function fetch_earning_deductionList($data)
    {
        try
        {
           $sql="select * from tbl_earning_mstr
                 where employment_type_id=:employment_type_mstr_id and grade_id=:grade_mstr_id and _status=:_status";
            $this->db->query($sql);
            $this->db->bind('employment_type_mstr_id',$data['employment_id']);
            $this->db->bind('grade_mstr_id',$data['grade_id']);
            $this->db->bind('_status', 1);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getActiveEmployeeDetails($data)
    {
        try
        {
            //print_r($data);
            //and e.joining_date<=:sel_yr_mn
            $sql ="select e._id, e.first_name, e.middle_name, e.last_name, e.monthly_salary, e.joining_date
			from tbl_emp_details e 
			join tbl_designation_mstr d on(e.designation_mstr_id=d._id) 
                   where e.employment_type_mstr_id=:employment_type_mstr_id
				   and e.joining_date <=:from_date
                   and d.grade_mstr_id=:grade_mstr_id
                   and e._status=:_status
                   and e.step_status='7'
                   and e._id NOT IN (
                    SELECT employee_id
                    FROM   tbl_generate_salary_details where month_year=:month_year)";
            $this->db->query($sql);
            $this->db->bind('employment_type_mstr_id',$data['employment_type_id']);
            $this->db->bind('grade_mstr_id',$data['grade_type_id']);
            $this->db->bind('month_year',$data['month_year']);
            $this->db->bind('from_date',$data['from_sel_yr_mnn']);
			//$this->db->bind('to_date',$data['to_sel_yr_mn']);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getActiveDailywagersDetails($data)
    {
        try
        {
            //print_r($data);
            //and e.joining_date<=:sel_yr_mn
            $sql ="select e._id, e.first_name, e.middle_name, e.last_name, e.monthly_salary, e.joining_date from tbl_emp_details e
                    join tbl_designation_mstr d on(e.designation_mstr_id=d._id) 
                   where e.employment_type_mstr_id=:employment_type_mstr_id
                   and d.grade_mstr_id=:grade_mstr_id
                    and e.work_type=:work_type
                   and e._status=:_status
                   and e.step_status='7'
                   and e._id NOT IN (
                    SELECT employee_id
                    FROM   tbl_generate_salary_details where month_year=:month_year)";
            $this->db->query($sql);
            $this->db->bind('employment_type_mstr_id',$data['employment_type_id']);
            $this->db->bind('grade_mstr_id',$data['grade_type_id']);
            $this->db->bind('work_type',$data['work_type']);
            $this->db->bind('month_year',$data['month_year']);
			//$this->db->bind('sel_yr_mn',$data['sel_yr_mn']);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function generate_salary_full_time($data){
            //generate salary
        //print_r($data['employment_id']);
            $result = $this->db->table('tbl_generate_salary_details')->
              insertGetId([
                  "employee_id"=>$data['employee_id'],
                  "month_year"=>$data["month_year"],
                  "financial_year"=>$data["financial_year"],
                  "working_days"=>$data["working_days"],
                  "present_days"=>$data["present_days"],
                  "paid_leave"=>$data["paid_leave"],
                  "basic_salary"=>($data["basic_salary"]!="")?$data["basic_salary"]:0,
                  "da_percent"=>($data["da_percent"]!="")?$data["da_percent"]:0,
                  "ta_percent"=>($data["ta_percent"]!="")?$data["ta_percent"]:0,
                  "hra_percent"=>($data["hra_percent"]!="")?$data["hra_percent"]:0,
                  "mr_percent"=>($data["mr_percent"]!="")?$data["mr_percent"]:0,
                  "epf_percent"=>($data["epf_percent"]!="")?$data["epf_percent"]:0,
                  "esic_percent"=>($data["esic_percent"]!="")?$data["esic_percent"]:0,
                  "other_tax_percent"=>($data["other_tax_percent"]!="")?$data["other_tax_percent"]:0,
                  "incentive_amt"=>($data["incentive_amt"]!="")?$data["incentive_amt"]:0,
                  "prepared_salary"=>($data["prepared_salary"]!="")?$data["prepared_salary"]:0,
                  "final_prepared_salary"=>($data["final_prepared_salary"]!="")?$data["final_prepared_salary"]:0,
                  "employment_type_id"=>$data["employment_id"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "salary_slip_no"=>$data["salary_slip_no"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }
      public function generate_salary_part_time($data){
            //generate salary
        //print_r($data['employee_id']);
          $result = $this->db->table('tbl_generate_salary_details')->
              insertGetId([
                  "employee_id"=>$data['employee_id'],
                  "month_year"=>$data["month_year"],
                  "financial_year"=>$data["financial_year"],
                  "working_days"=>$data["working_days"],
                  "present_days"=>$data["present_days"],
                  "paid_leave"=>$data["paid_leave"],
                  "basic_salary"=>($data["basic_salary"]!="")?$data["basic_salary"]:0,
                  "incentive_amt"=>($data["incentive_amt"]!="")?$data["incentive_amt"]:0,
                  "da_percent"=>0,
                  "ta_percent"=>0,
                  "hra_percent"=>0,
                  "mr_percent"=>0,
                  "epf_percent"=>0,
                  "esic_percent"=>0,
                  "other_tax_percent"=>0,
                  "prepared_salary"=>($data["prepared_salary"]!="")?$data["prepared_salary"]:0,
                  "final_prepared_salary"=>($data["final_prepared_salary"]!="")?$data["final_prepared_salary"]:0,
                  "employment_type_id"=>$data["employment_id"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "salary_slip_no"=>$data["salary_slip_no"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }

      public function Generatesalary_exists($MY, $EMP)
        {
            try
            {
                $sql = "SELECT * FROM tbl_generate_salary_details
                        where month_year='$MY' and employee_id='$EMP';";
                $this->db->query($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function generate_salary_daily_wage($data){
            //generate salary
          $result = $this->db->table('tbl_generate_salary_details')->
              insertGetId([
                  "employee_id"=>$data['employee_id'],
                  "month_year"=>$data["month_year"],
                  "financial_year"=>$data["financial_year"],
                  "working_days"=>($data["working_days"]!="")?$data["working_days"]:0,
                  "present_days"=>$data["present_days"],
                  "attended_hours"=>$data["attended_hours"],
                  "basic_salary"=>($data["basic_salary"]!="")?$data["basic_salary"]:0,
                  "da_percent"=>0,
                  "ta_percent"=>0,
                  "hra_percent"=>0,
                  "mr_percent"=>0,
                  "epf_percent"=>0,
                  "esic_percent"=>0,
                  "other_tax_percent"=>0,
                  "incentive_amt"=>($data["incentive_amt"]!="")?$data["incentive_amt"]:0,
                  "prepared_salary"=>($data["prepared_salary"]!="")?$data["prepared_salary"]:0,
                  "final_prepared_salary"=>($data["final_prepared_salary"]!="")?$data["final_prepared_salary"]:0,
                  "employment_type_id"=>$data["employment_id"],
                  "work_type"=>$data["work_type_id"],
                  "paid_leave"=>"",
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "salary_slip_no"=>$data["salary_slip_no"],
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

     public function getEmployeePaymentDetails($data)
    {
        try
        {
            $mn=$data["sal_yr"].'-'.$data["sal_mnth"];
            //print_r($mn);
            $sql ="select e._id, e.first_name, e.middle_name, e.last_name
                    from tbl_emp_details e join tbl_generate_salary_details d on(e._id=d.employee_id) 
                   where e._status=:_status and d._status=:_status and d.month_year='".$mn."' group by e._id";
            $this->db->query($sql);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_final_salary($EMP_ID, $generated_month_yr)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (final_prepared_salary,0)),0) as final_salary from tbl_generate_salary_details
                 where employee_id='$EMP_ID' and month_year='$generated_month_yr' and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_emp_final_salary($EMP_ID,$generated_mon_yr)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (final_prepared_salary,0)),0) as final_salary from tbl_generate_salary_details
                 where employee_id='$EMP_ID' and month_year='$generated_mon_yr' and _status in (0,1)";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_total_coll_emp($EMP_ID, $generated_month_yr)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_collection from tbl_collection
                 where generate_id in
                 ( select _id from tbl_generate_salary_details where employee_id='$EMP_ID' and _status='1')
                 and _status='1' and month_year='$generated_month_yr'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_total_collection($EMP_ID, $SAL_ID)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_collection from tbl_collection
                 where payer_payee_id='$EMP_ID' and generate_id='$SAL_ID' and transaction_type='EMPLOYEE_SALARY' and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_emp_bank_details($EMP_ID)
    {
        try
        {
           $sql="select _id, bank_name, branch_name, default_status from tbl_emp_bank_details
                 where emp_details_id='$EMP_ID' and _status='1' order by default_status asc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            if($result)
                return json_decode(json_encode($result), true);
            else
                return false;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_emp_total_collection($EMP_ID,$generated_mon_yr)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_collection from tbl_collection
                 where payer_payee_id='$EMP_ID' and _status='1' and month_year='$generated_mon_yr'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_cash_voucher_no()
    {
        try
        {
           $sql="SELECT cash_voucher_no FROM tbl_transaction
                 WHERE _status='1' and payment_mode_id='1' and transaction_type='EMPLOYEE_SALARY' ORDER BY _id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_salary_slip_no()
    {
        try
        {
           $sql="SELECT salary_slip_no FROM tbl_generate_salary_details
                 ORDER BY employee_id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function insert_salary_transaction($data){
            //generate salary
          $result = $this->db->table('tbl_transaction')->
              insertGetId([
                  "payer_payee_id"=>$data['employee_id'],
				  "transaction_type"=>'EMPLOYEE_SALARY',
                  "payment_date"=>$data["payment_date"],
                  "generated_amt"=>$data["generated_amt"],
                  "payable_amt"=>$data["payable_amt"],
                  "due_amt"=>$data["due_amt"],
                  "payment_mode_id"=>$data["payment_mode_id"],
                  "other_payment_mode"=>$data["other_payment_mode"],
                  "check_neft_bank_imps_no"=>$data["check_neft_bank_imps_no"],
                  "transaction_date"=>$data["payment_date"],
                  "emp_bank_details_id"=>$data["emp_bank_details_id"],
                  "cash_voucher_no"=>$data["cash_voucher_no"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
      public function getEmpSalGenerate($data)
      {
          try
          {
              $sql ="select _id, final_prepared_salary, month_year
                    from tbl_generate_salary_details
                   where employee_id=:employee_id and _status=:_status and month_year=:generated_mon_yr order by _id asc";
              $this->db->query($sql);
              $this->db->bind('employee_id', $data['employee_id']);
              $this->db->bind('generated_mon_yr', $data['generated_mon_yr']);
              $this->db->bind('_status', 1);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }

          /*

          
          */
      }
      public function insrt_pay_trans($EMP_ID, $data,$demand_id,$rest_amt,$month_year){
            //generate salary
           $result = $this->db->table('tbl_collection')->
              insertGetId([
                  "payer_payee_id"=>$EMP_ID,
				  "transaction_type"=>'EMPLOYEE_SALARY',
                  "transaction_id"=>$data,
                  "generate_id"=>$demand_id,
                  "paid_amt"=>$rest_amt,
                  "month_year"=>$month_year,
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
      public function generate_sal_stts_updt($demand_id){
       		 $result =$this->db->table('tbl_generate_salary_details')
                          ->where("_id", "=", $demand_id)
                          ->update([
                              '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}

      public function getEmpSalPaymentList($data)
      {
          try
          {
              $sql ="SELECT t._id, e.first_name, e.middle_name, e.last_name, e.employee_code, t.payment_date, t.payable_amt,
                    t.payment_mode_id, p.payment_mode, t.other_payment_mode, t._status, m.employment_type, e.work_type FROM tbl_transaction t 
                    join tbl_emp_details e on(t.payer_payee_id=e._id)
                    join tbl_payment_mode_mstr p on(p._id=t.payment_mode_id)
                    join tbl_employment_type_mstr m on(m._id=e.employment_type_mstr_id)
                    where date(t.payment_date) between :from_date and :to_date and t._status in(0,1)";
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
      public function gettransactiondetByID($data)
      {
          try
          {
              $sql ="SELECT t._id, e.first_name, e.middle_name, e.last_name, t.payment_date, t.payable_amt, e.employee_code,
                    t.payment_mode_id, e.personal_phone_no, t._status, e.company_location_id, t.cash_voucher_no
                    FROM tbl_transaction t 
                    join tbl_emp_details e on(t.payer_payee_id=e._id)
                    where t._id=:trasaction_id and t._status in(0,1)";
              $this->db->query($sql);
              $this->db->bind('trasaction_id', $data['id']);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function getcomplocdetByID($data)
      {         
        //   echo '<pre>';print_r($data);return;
          try
          {
              $sql ="SELECT c.company_name, l.address, l.email_id, l.contact_no, l.gstin_no, c.website
                    FROM tbl_company_details c 
                    join tbl_company_location l on(c._id=l.company_id)
                    where l._id=:comp_loc_id and l._status in(1)";
              $this->db->query($sql);
              $this->db->bind('comp_loc_id', 1);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function getsalgendetByID($data)
      {
          try
          {
              $sql ="SELECT t._id, t.employee_id, e.first_name, e.middle_name, e.last_name, t.month_year, t.paid_leave, e.employee_code,
                    d.designation_name, t.basic_salary, e.company_location_id, t.da_percent, t.ta_percent, t.financial_year, t.salary_slip_no, t.incentive_amt,
                    t.hra_percent, t.mr_percent, t.epf_percent, t.esic_percent, t.other_tax_percent, t.prepared_salary, t.final_prepared_salary, e.employment_type_mstr_id, m.employment_type
                    FROM tbl_generate_salary_details t 
                    join tbl_emp_details e on(t.employee_id=e._id)
                    join tbl_designation_mstr d on(e.designation_mstr_id=d._id)
                    join tbl_employment_type_mstr m on(e.employment_type_mstr_id=m._id)
                    where t._id=:sal_gen_id and t._status in(0,1)";
              $this->db->query($sql);
              $this->db->bind('sal_gen_id', $data['id']);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function gettranchkdetByID($EMP_ID,$MN_YR)
      {
          try
          {
              //print_r($EMP_ID);
              //print_r($MN_YR);
               $sql ="SELECT t.payment_mode_id, t.check_neft_bank_imps_no, e.bank_name, e.branch_name, t.payment_date
                    FROM tbl_transaction t
                    join tbl_emp_bank_details e on(t.emp_bank_details_id=e._id)
                    join tbl_collection d on(d.transaction_id=t._id)
                    where d.payer_payee_id=:tr_employee_id and d.month_year=:tr_month_year and t._status in(0,1)";
              $this->db->query($sql);
              $this->db->bind('tr_employee_id', $EMP_ID);
              $this->db->bind('tr_month_year', $MN_YR);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }

      public function gettranempdetByID($EMP_ID,$MN_YR)
      {
          try
          {
              //print_r($EMP_ID);
              //print_r($MN_YR);
               $sql ="SELECT t.payment_mode_id, t.check_neft_bank_imps_no, t.payment_date
                    FROM tbl_transaction t
                    join tbl_collection d on(d.transaction_id=t._id)
                    where d.payer_payee_id=:tr_employee_id and d.month_year=:tr_month_year and t._status in(0,1)";
              $this->db->query($sql);
              $this->db->bind('tr_employee_id', $EMP_ID);
              $this->db->bind('tr_month_year', $MN_YR);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	  
	  public function check_previous_month_payment($EMP,$MY)
        {
            try
            {
                $sql = "SELECT _status FROM tbl_generate_salary_details
                        where month_year='$MY' and employee_id='$EMP'";
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