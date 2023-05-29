<?php
class OnReportingList extends Controller {

	function __construct(){
		if(!isLoggedIn()){ redirect('Login'); }
		$this->model_department_mstr = $this->model('model_department_mstr');
        $this->model_designation_mstr = $this->model('model_designation_mstr');
		$this->db = new Database;
	}
    public function index(){
	    $data = array(null);
		 
        $getRepHeadDetail = $this->model_designation_mstr->getRepHeadDetail();
        $getRortingHeadListData = json_decode(json_encode($getRepHeadDetail), true);
        $data['getRepHeadDetail'] = $getRortingHeadListData;
        //  echo '<pre>'; print_r( $data['getRepHeadDetail']);//return;
        $getReporteeDetail = $this->model_designation_mstr->getReporteeDetail();
        $getRortingHeadListData = json_decode(json_encode($getReporteeDetail), true);
        $data['getReporteeDetail'] = $getRortingHeadListData;
        // echo '<pre>'; print_r( $data['getReporteeDetail']);return;
        $this->view('pages/OnReportingList',$data);
               
        } 
        // echo '<pre>';print_r($data['rpHeadName']);


    public function DeleteDesgByEmpId($ID=null){
        $data = (array)null;
		$data["_id"] = $ID;

        $deleteResponse = $this->model_designation_mstr->deleteReportingHeadData($data["_id"]);
        // print_r($deleteResponse);return;
        if($deleteResponse){
            // echo '<script>alert("Reporting Data Deleted Successfully")</script>';
            flashToast("ReportingDeleteSuccess","Reproting Data Deleted Successfully");
            redirect('OnReportingList');
        }else{
            echo '<script>alert("Reporting Data Not Deleted")</script>';
            redirect('OnReportingList');
        }
		
    }
}
