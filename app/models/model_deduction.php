<?php
    class model_deduction
    {
        private $db;
        public function __construct()
        {
            $this->db =new dataBase();
        }
    public function deduction_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
          //  print_r($data);
            try{
                 $sql ="insert into tbl_deduction_mstr(employment_type_id,provident_fund,esic,professional_tax,tds)
                                            values(:employment_type_id,:provident_fund,:esic,:professional_tax,:tds)";
                 $this->db->query($sql);
                 $this->db->bind('employment_type_id',$data['employment_type_id']);
                 $this->db->bind('provident_fund',$data['provident_fund']);
                 $this->db->bind('esic',$data['esic']);
                 $this->db->bind('professional_tax',$data['professional_tax']);
                 $this->db->bind('tds',$data['tds']);
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
               // print_r($data);
                $sql="update tbl_deduction_mstr
				set
                    employment_type_id =:employment_type_id,
                    provident_fund =:provident_fund,
                    esic =:esic,
                    professional_tax =:professional_tax,
                    tds =:tds
				    where _id =:id";
				     $this->db->query($sql);
                     $this->db->bind('employment_type_id',$data['employment_type_id']);
                     $this->db->bind('provident_fund',$data['provident_fund']);
                     $this->db->bind('esic',$data['esic']);
                     $this->db->bind('professional_tax',$data['professional_tax']);
                     $this->db->bind('tds',$data['tds']);
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
    public function Deduction_list(){
        try{
             $sql="select
				    ded._id,
                    ded.employment_type_id,
                    ded.provident_fund,
                    ded.esic,
                    ded.professional_tax,
                    ded.tds,
                    type.employment_type
				    FROM tbl_deduction_mstr ded
				    left join tbl_employment_type_mstr type on (type._id=ded.employment_type_id)
				    where ded._status=1 order by ded._id desc";
				    $this->db->query($sql);
				    $result = $this->db->resultset();
				    return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateDeductionById($id)
    {
        //echo "ID = ".$id;
            try
            {
                $sql="select
				    ded._id,
                    ded.employment_type_id,
                    ded.provident_fund,
                    ded.esic,
                    ded.professional_tax,
                    ded.tds,
                    type.employment_type
				    FROM tbl_deduction_mstr ded
				    left join tbl_employment_type_mstr type on (type._id=ded.employment_type_id)
				    where ded._status=1 AND ded._id =:id order by ded._id desc;";
				    $this->db->query($sql);
                    $this->db->bind('id',$id);
				    $result = $this->db->single();
				    return $result;
            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
    }
    public function deletebyiddeduction($id)
    {
         try
            {
                $sql="update tbl_deduction_mstr
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
    public function duplicatefunDeduction($data)
    {
        try
            {
               $sql ="select employment_type_id,provident_fund,esic,professional_tax,tds from tbl_deduction_mstr 
               where employment_type_id =:employment_type_id AND provident_fund =:provident_fund AND 
                   esic =:esic AND professional_tax=:professional_tax AND tds=:tds AND _status=1";
                 $this->db->query($sql);
                 $this->db->bind('employment_type_id',$data['employment_type_id']);
                 $this->db->bind('provident_fund',$data['provident_fund']);
                 $this->db->bind('esic',$data['esic']);
                 $this->db->bind('professional_tax',$data['professional_tax']);
                 $this->db->bind('tds',$data['tds']);
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