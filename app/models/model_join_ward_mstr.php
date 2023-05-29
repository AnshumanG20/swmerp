<?php
    class model_join_ward_mstr{
        private $db;
        public function __construct(){
            $this->db = new dataBase();
        }

	    public function getAssignWardNameByEmpID($ID){
	    	$sql = "SELECT tbl_project_ward_permission_mstr._id, tbl_ward_mstr.ward_name FROM tbl_project_ward_permission_mstr INNER JOIN tbl_ward_mstr ON tbl_ward_mstr._id=tbl_project_ward_permission_mstr.ward_mstr_id WHERE emp_details_id=$ID AND tbl_project_ward_permission_mstr._status=1";
	    	$this->db->query($sql);
	    	$result = $this->db->resultSet();
	    	if($result){
	    		return json_decode(json_encode($result), true);
	    	}else{
	    		return false;
	    	}

	    }
	}	