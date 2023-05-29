<?php
  class model_job_post_qualification_details{
    private $db;
    private $tbl_name = "tbl_job_post_qualification_details";

    public function __construct(){
      $this->db = new Database;
    }

      public function insertQualification($data){

          return $result = $this->db->table('tbl_job_post_qualification_details')->
              insert([
                  "job_post_details_id"=>$data["jobpostid"],
                  "course_mstr_id"=>$data["degree"],
                  "sub_course_mstr_id"=>($data["stream"]!="")?$data["stream"]:null,
                  "sub_stream_mstr_id"=>($data["sub_stream"]!="")?$data["sub_stream"]:null,
                  "_status"=>"1"
              ]);
          //return json_decode(json_encode($result), true);
      }
      
      public function updatechangestatus($data){
          $result = $this->db->table('tbl_job_post_qualification_details')->
              WHERE("job_post_details_id", "=", $data["id"])->
              update([
                  "_status"=>2
              ]);
        }
      
      public function updateinsert($data){

          return $result = $this->db->table('tbl_job_post_qualification_details')->
              insert([
                  "job_post_details_id"=>$data["id"],
                  "course_mstr_id"=>$data["degree"],
                  "sub_course_mstr_id"=>($data["stream"]!="")?$data["stream"]:null,
                  "sub_stream_mstr_id"=>($data["sub_stream"]!="")?$data["sub_stream"]:null,
                  "_status"=>"1"
              ]);
          //return json_decode(json_encode($result), true);
      }

      public function updateQualification($data){
          $result = $this->db->table('tbl_job_post_qualification_details')->
              WHERE("_id", "=", $data['job_post_qualification_details_id'])->
              WHERE("_status", "=", 2)->
              update([
                  "course_mstr_id"=>$data["degree"],
                  "sub_course_mstr_id"=>($data["stream"]!="")?$data["stream"]:null,
                  "sub_stream_mstr_id"=>($data["sub_stream"]!="")?$data["sub_stream"]:null,
                  "_status"=>1
              ]);
        }
      
      public function updatestatuschange(){
          $result = $this->db->table('tbl_job_post_qualification_details')->
              WHERE("_status", "=", 2)->
              update([
                  "_status"=>0
              ]);
        }

      public function job_details_qualification_view($data){
            $sql = "SELECT * FROM tbl_job_post_qualification_details
				WHERE job_post_details_id =:id AND _status =:status";
            $this->db->query($sql);
            $this->db->bind("id", $data["job_post_detail_id"]);
            $this->db->bind("status", '1');
            $result = $this->db->resultset();
            return json_decode(json_encode($result), true);
        }
       /* public function job_details_qualification_view($data){
            $sql = "SELECT tbl_job_post_qualification_details._id AS job_post_qualification_details_id,
                tbl_course_mstr._id._id AS course_mstr_id,
                tbl_course_mstr.course_name,
                tbl_sub_course_mstr._id AS sub_course_mstr_id,
                tbl_sub_course_mstr.stream_name,
                tbl_sub_stream_mstr._id AS ,
                tbl_sub_stream_mstr.
                FROM tbl_job_post_qualification_details
                LEFT JOIN  ON tbl_job_post_qualification_details. = ._id
                LEFT JOIN  ON tbl_job_post_qualification_details. = ._id
				WHERE tbl_job_post_detail._id =:id";
            $this->db->query($sql);
            $this->db->bind("id", $data["id"]);
            $result = $this->db->single();
            return $result;
        } */
      
 }
?>