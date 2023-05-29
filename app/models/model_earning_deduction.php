<?php
class model_earning_deduction
{
    private $db;
    public function __construct()
    {
        $this->db =new dataBase();
    }
    public function earning_deduction_add_update($data)
    {
        if($data['dearness_allowance']==""){
            $data['dearness_allowance'] = null;
        }
        if($data['dearness_allowance']==""){
            $data['dearness_allowance'] = null;
        }
        if($data['transport_allowance']==""){
            $data['transport_allowance'] = null;
        }
        if($data['house_rent_allowance']==""){
            $data['house_rent_allowance'] = null;
        }
        if($data['medical_reimbursement']==""){
            $data['medical_reimbursement'] = null;
        }
        if($data['epf']==""){
            $data['epf'] = null;
        }
        if($data['esic']==""){
            $data['esic'] = null;
        }
        if($data['work_type']=="-"){
            $data['work_type'] = null;
        }
        if($data['other']==""){
            $data['other'] = null;
        }
        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                //echo $sql ="insert into tbl_earning_mstr(grade_id,employment_type_id,dearness_allowance,transport_allowance,house_rent_allowance,medical_reimbursement,min_salary,max_salary,epf,esic,other,work_type)
                //    values(".$data['grade_id'].", ".$data['employment_type_id'].",".$data['dearness_allowance'].",".$data['transport_allowance'].",".$data['house_rent_allowance'].",".$data['medical_reimbursement'].",".$data['min_salary'].",".$data['max_salary'].",".$data['epf'].",".$data['esic'].",".$data['other'].",'".$data['work_type']."'";
                $sql ="insert into tbl_earning_mstr(grade_id,employment_type_id,dearness_allowance,transport_allowance,house_rent_allowance,medical_reimbursement,min_salary,max_salary,epf,esic,other,work_type)
                                            values(:grade_id,:employment_type_id,:dearness_allowance,:transport_allowance,:house_rent_allowance,:medical_reimbursement,:min_salary,:max_salary,:epf,:esic,:other,:work_type)";
                $this->db->query($sql);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                $this->db->bind('dearness_allowance',$data['dearness_allowance']);
                $this->db->bind('transport_allowance',$data['transport_allowance']);
                $this->db->bind('house_rent_allowance',$data['house_rent_allowance']);
                $this->db->bind('medical_reimbursement',$data['medical_reimbursement']);
                $this->db->bind('min_salary',$data['min_salary']);
                $this->db->bind('max_salary',$data['max_salary']);
                $this->db->bind('epf',$data['epf']);
                $this->db->bind('esic',$data['esic']);
                $this->db->bind('work_type',$data['work_type']);
                $this->db->bind('other',$data['other']);
                $result = $this->db->insertion();
                //print_r($result);
                if($result){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else //update
        {
            try
            {
                $sql="update tbl_earning_mstr set
                    employment_type_id =:employment_type_id,
                    dearness_allowance =:dearness_allowance,
                    transport_allowance =:transport_allowance,
                    house_rent_allowance =:house_rent_allowance,
                    medical_reimbursement =:medical_reimbursement,
                    min_salary =:min_salary,
                    max_salary =:max_salary,
                    epf =:epf,
                    esic =:esic,
                    other =:other,
                    work_type =:work_type,
                    grade_id =:grade_id
				    where _id =:id";
                $this->db->query($sql);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                $this->db->bind('dearness_allowance',$data['dearness_allowance']);
                $this->db->bind('transport_allowance',$data['transport_allowance']);
                $this->db->bind('house_rent_allowance',$data['house_rent_allowance']);
                $this->db->bind('medical_reimbursement',$data['medical_reimbursement']);
                $this->db->bind('min_salary',$data['min_salary']);
                $this->db->bind('max_salary',$data['max_salary']);
                $this->db->bind('epf',$data['epf']);
                $this->db->bind('esic',$data['esic']);
                $this->db->bind('work_type',$data['work_type']);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('other',$data['other']);
                $this->db->bind('id',$data['_id']);
                //print_r($sql);
                $result = $this->db->updation();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
    }
    public function Earning_Deduction_List(){
        try{
            $sql="select
				    earn._id,
                    earn.employment_type_id,
                    earn.dearness_allowance,
                    earn.transport_allowance,
                    earn.house_rent_allowance,
                    earn.medical_reimbursement,
                    earn.min_salary,
                    earn.max_salary,
                    earn.epf,
                    earn.esic,
                    earn.other,
                    earn.work_type,
                    earn.grade_id,
                    grade.grade_type,
                    type.employment_type
				    FROM tbl_earning_mstr earn
				    left join tbl_employment_type_mstr type on (type._id=earn.employment_type_id)
                    left join tbl_grade_mstr grade on (grade._id=earn.grade_id)
				    where earn._status=1 order by earn._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateEarning_Deduction_By_Id($id)
    {
        try
        {
            $sql="select
				    earn._id,
                    earn.employment_type_id,
                    earn.dearness_allowance,
                    earn.transport_allowance,
                    earn.house_rent_allowance,
                    earn.medical_reimbursement,
                    earn.min_salary,
                    earn.max_salary,
                    earn.grade_id,
                    type.employment_type,
                    grade.grade_type,
                    earn.epf,
                    earn.work_type,
                    earn.esic,
                    earn.other
				    FROM tbl_earning_mstr earn
				    left join tbl_employment_type_mstr type on (type._id=earn.employment_type_id)
                    left join tbl_grade_mstr grade on (grade._id=earn.grade_id)
				    where earn._status=1 AND earn._id =:id order by earn._id desc";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            // print_r($result);
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyid_Earning_Deduction($id)
    {
        try
        {
            $sql="update tbl_earning_mstr
				set _status=0
				where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            //print_r($sql);
            $result = $this->db->updation();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicatefunEarning_Deduction($data)
    {
        if($data['employment_type_id']==3 || $data['employment_type_id']==5)
        {
            try
            {
                $sql="select grade_id,employment_type_id,work_type
                    from tbl_earning_mstr where
                    grade_id =:grade_id AND
                    employment_type_id =:employment_type_id AND
                    work_type =:work_type AND
                    _status=1";
                $this->db->query($sql);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                $this->db->bind('work_type',$data['work_type']);
                //print_r($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            try
            {
                $sql="select grade_id,employment_type_id
                    from tbl_earning_mstr where
                    grade_id =:grade_id AND
                    employment_type_id =:employment_type_id AND
                    _status=1";
                $this->db->query($sql);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                //print_r($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }
    public function gate_grade()
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
    public function gate_employment()
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
    public function gate_id($data)
    {
        if($data['employment_type_id']==3 || $data['employment_type_id']==5 )
        {
            try
            {
                $sql="select grade_id,employment_type_id,work_type
                    from tbl_earning_mstr where
                    grade_id =:grade_id AND
                    employment_type_id =:employment_type_id AND
                    work_type =:work_type AND
                    _id!=:id AND
                    _status=1";
                $this->db->query($sql);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                $this->db->bind('work_type',$data['work_type']);
                $this->db->bind('id',$data["_id"]);
                //print_r($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            try
            {
                $sql="select grade_id,employment_type_id
                    from tbl_earning_mstr where
                    grade_id =:grade_id AND
                    employment_type_id =:employment_type_id AND
                    _id!=:id AND
                    _status=1";
                $this->db->query($sql);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('employment_type_id',$data['employment_type_id']);
                $this->db->bind('id',$data["_id"]);
                //print_r($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

    }
}
?>