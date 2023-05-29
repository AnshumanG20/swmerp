<?php
class model_emp_document_details
{
    private $db;
    private $tbl_name = "tbl_emp_document_details";
    public function __construct(){
         $this->db = new dataBase();
    }
    
    public function existEmpDocDetails($dbConn, $data){
        echo "asfdg";
        return $result = false;/* $dbConn->table($this->tbl_name)
                            ->where('emp_details_id', '=', $data['emp_details_id'])
                            ->where('doc_type_mstr_id', '=', $data['doc_type_mstr_id'])
                            ->first(); */
        /* if($result){
            return true;
        }else {
            return false;
        } */
    }


    public function getEmpDocumentDetailsByEmpDetailsId($ID){
        $result = $this->db->table($this->tbl_name)
                    ->select('*')
                    ->where("emp_details_id", "=", $ID)
                    ->where('_status', '=', 1)
                    ->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function getJoinEmpDocumentDetailsByEmpDetailsId($ID){
        $result = $this->db->table('tbl_emp_document_details')
                                ->leftJoin('tbl_doc_type_mstr', 'tbl_emp_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                ->select('tbl_emp_document_details._id As emp_document_details_id, tbl_emp_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_emp_document_details.other_doc_name As other_doc_name, tbl_emp_document_details.doc_no As doc_no, tbl_emp_document_details.date_of_issue As date_of_issue, tbl_emp_document_details.place_of_issue As place_of_issue, tbl_emp_document_details.valid_upto As valid_upto, tbl_emp_document_details.doc_path As doc_path')
                                ->where('tbl_emp_document_details.emp_details_id', '=', $ID)
                                ->where('tbl_emp_document_details._status', '=', 1)
                                ->orderByDesc('tbl_emp_document_details.created_on')
                                ->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function getJoinCandidateDocumentDetailsByCandidateDetailsId($ID){
        $result = $this->db->table('tbl_candidate_document_details')
                                ->leftJoin('tbl_doc_type_mstr', 'tbl_candidate_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                ->select('tbl_candidate_document_details._id As candidate_document_details_id, tbl_candidate_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_candidate_document_details.other_doc_name As other_doc_name, tbl_candidate_document_details.doc_no As doc_no, tbl_candidate_document_details.date_of_issue As date_of_issue, tbl_candidate_document_details.place_of_issue As place_of_issue, tbl_candidate_document_details.valid_upto As valid_upto, tbl_candidate_document_details.doc_path As doc_path')
                                ->where('tbl_candidate_document_details.candidate_details_id', '=', $ID)
                                ->where('tbl_candidate_document_details._status', '=', 1)
                                ->orderByDesc('tbl_candidate_document_details.created_on')
                                ->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}