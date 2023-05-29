<?php
class model_job_details{
    private $db;
    private $tbl_name = "tbl_job_post_detail";

    public function __construct(){
        $this->db = new Database;
    }

    public function checkinsertJobPost($data){
        $result_job_post_detail = $this->db->table('tbl_job_post_detail')
            ->select("_id")
            ->where('designation_mstr_id', '=', $data['designation_mstr_id'])
            ->where('company_location_id', '=', $data['location_details'])
            ->where('expiry_date', '>', $data['entry_date'])
            ->where('_status', '=', 1)
            ->first();
        if($result_job_post_detail){
            return false;
        }else{
            $result_interview_details = $this->db->table('tbl_interview_details')
                ->select("_id")
                ->where('post_name_id', '=', $data['designation_mstr_id'])
                ->where('interview_location_id', '=', $data['location_details'])
                ->where('interview_end_date', '>', $data['entry_date'])
                ->where('_status', '=', 1)
                ->first();
            if($result_interview_details){
                return false;
            }else{
                return true;
            }
        }

    }
    public function insertJobPost($data){
        return $this->db->table('tbl_job_post_detail')->
            insertGetId([
                "designation_mstr_id"=>$data["designation_mstr_id"],
                "job_description"=>$data["job_description"],
                "employment_type_mstr_id"=>$data["employment_type_mstr_id"],
                "required_min_experience"=>$data["from"].".".$data["from1"],
                "required_max_experience"=>$data["to"].".".$data["to1"],
                "key_skills"=>$data["key_skills"],
                "company_location_id"=>$data["location_details"],
                "project_name_id"=>$data["project_name"],
                "no_of_opening"=>$data["no_of_opening"],
                "entry_date"=>$data["entry_date"],
                "expiry_date"=>$data["expiry_date"],
                "job_post_by_emp_detais_id"=>$data["job_post_by_emp_detais_id"],
                "created_on"=>$data["current_date"],
                "_status"=>"1"
            ]);

    }

    public function updateJobPost($data){
        //print_r($data);
        $result = $this->db->table('tbl_job_post_detail')->
            WHERE("_id", "=", $data['id'])->
            update([
                "designation_mstr_id"=>$data["designation_mstr_id"],
                "job_description"=>$data["job_description"],
                "employment_type_mstr_id"=>$data["employment_type_mstr_id"],
                "required_min_experience"=>$data["from"].".".$data["from1"],
                "required_max_experience"=>$data["to"].".".$data["to1"],
                "key_skills"=>$data["key_skills"],
                "company_location_id"=>$data["location_details"],
                "project_name_id"=>$data["project_name"],
                "no_of_opening"=>$data["no_of_opening"],
                "entry_date"=>$data["entry_date"],
                "expiry_date"=>$data["expiry_date"],
                "job_post_by_emp_detais_id"=>$data["job_post_by_emp_detais_id"],
                "updated_on"=>$data["current_date"],
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);
    }
    public function jobedit($data){
        $sql = "SELECT tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.designation_mstr_id,
                tbl_job_post_detail.job_description,
                tbl_job_post_detail.required_min_experience,
                tbl_job_post_detail.required_max_experience,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_job_post_detail.company_location_id,
                tbl_job_post_detail.project_name_id,
                tbl_job_post_detail.entry_date,
                tbl_job_post_detail.key_skills,
                tbl_job_post_detail.no_of_opening,
                tbl_job_post_detail.expiry_date,
                tbl_job_post_detail.employment_type_mstr_id AS employment_type_mst_id,
                tbl_employment_type_mstr.employment_type,
                tbl_designation_mstr.designation_name
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_job_post_detail.company_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_employment_type_mstr ON tbl_job_post_detail.employment_type_mstr_id = tbl_employment_type_mstr._id
				WHERE tbl_job_post_detail._id =:id";
        $this->db->query($sql);
        $this->db->bind("id", $data["id"]);
        $result = $this->db->single();
        return $result;
    }
    public function sub_course_list($data){
        $sql = "SELECT _id AS sub_course_mstr_id,stream_name
                FROM tbl_sub_course_mstr
				WHERE course_mstr_id =:id";
        $this->db->query($sql);
        $this->db->bind("id", $data["course_mstr_id"]);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
    }
    public function sub_stream_list($data){
        $sql = "SELECT _id AS sub_stream_mstr_id,sub_stream_name
                FROM tbl_sub_stream_mstr
				WHERE sub_course_mstr_id =:id";
        $this->db->query($sql);
        $this->db->bind("id", $data["sub_course_mstr_id"]);
        $result = $this->db->resultset();
        // print_r($result);
        return json_decode(json_encode($result), true);
    }


    public function jobList($data){
        $sql = "SELECT  tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.designation_mstr_id,
                tbl_job_post_detail.job_description,
                tbl_job_post_detail.required_min_experience,
                tbl_job_post_detail.required_max_experience,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_job_post_detail.entry_date,
                tbl_job_post_detail.expiry_date,
                tbl_designation_mstr.designation_name
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
				WHERE tbl_job_post_detail.expiry_date >=:date
                ORDER BY job_post_detail_id DESC ";
        $this->db->query($sql);
        $this->db->bind("date", $data['date']);
        $result = $this->db->resultset();
        return $result;
    }
    public function job_details_view($data){
        $sql = "SELECT tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.job_description,
                tbl_job_post_detail.required_min_experience,
                tbl_job_post_detail.required_max_experience,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_job_post_detail.entry_date,
                tbl_job_post_detail.key_skills,
                tbl_job_post_detail.no_of_opening,
                tbl_job_post_detail.expiry_date,
                tbl_employment_type_mstr.employment_type,
                tbl_job_post_detail.designation_mstr_id,
                tbl_designation_mstr.designation_name
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_employment_type_mstr ON tbl_job_post_detail.employment_type_mstr_id = tbl_employment_type_mstr._id
				WHERE tbl_job_post_detail._id =:_id";
        $this->db->query($sql);
        $this->db->bind("_id", $data['job_post_detail_id']);
        $result = $this->db->single();
        return json_decode(json_encode($result), true);
    }
    public function job_details_qualification_view($data){
        try{
            $sql = "SELECT tbl_job_post_qualification_details._id AS job_post_qualification_details_id,
                tbl_course_mstr.course_name,
                tbl_sub_course_mstr.stream_name,
                tbl_sub_stream_mstr.sub_stream_name
                FROM tbl_job_post_qualification_details
                LEFT JOIN tbl_course_mstr ON tbl_job_post_qualification_details.course_mstr_id = tbl_course_mstr._id
                LEFT JOIN tbl_sub_course_mstr ON tbl_job_post_qualification_details.sub_course_mstr_id = tbl_sub_course_mstr._id
                LEFT JOIN tbl_sub_stream_mstr ON tbl_job_post_qualification_details.sub_stream_mstr_id = tbl_sub_stream_mstr._id
				WHERE tbl_job_post_qualification_details.job_post_details_id =:id AND tbl_job_post_qualification_details._status =:status";
            $this->db->query($sql);
            $this->db->bind("id", $data);
            $this->db->bind("status", 1);
            $result = $this->db->resultset();
            return json_decode(json_encode($result), true);
        }catch(Exception $e){
            echo $e->getMessage();

        }
    }

    public function job_applied_applicant_view($data){
        $sql = "SELECT COUNT(*) FROM tbl_candidate_details WHERE job_post_details_id =:job_post_details_id";
        $this->db->query($sql);
        $this->db->bind("job_post_details_id", $data["job_post_detail_id"]);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
    }

    public function career($data){
        $sql = "SELECT  tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.designation_mstr_id,
                tbl_job_post_detail.job_description,
                tbl_job_post_detail.no_of_opening,
                tbl_job_post_detail.required_min_experience,
                tbl_job_post_detail.required_max_experience,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_job_post_detail.entry_date,
                tbl_job_post_detail.expiry_date,
                tbl_designation_mstr.designation_name
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_job_post_detail.company_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
				WHERE tbl_job_post_detail.expiry_date >=:date
                ORDER BY job_post_detail_id DESC ";
        $this->db->query($sql);
        $this->db->bind("date", $data['date']);
        $result = $this->db->resultset();
        return $result;
    }
    public function career_details_view($data){
        $sql = "SELECT tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.designation_mstr_id,
                tbl_job_post_detail.job_description,
                tbl_job_post_detail.required_min_experience,
                tbl_job_post_detail.required_max_experience,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_job_post_detail.entry_date,
                tbl_job_post_detail.key_skills,
                tbl_job_post_detail.no_of_opening,
                tbl_job_post_detail.expiry_date,
                tbl_employment_type_mstr.employment_type,
                tbl_designation_mstr.designation_name
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_job_post_detail.company_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_employment_type_mstr ON tbl_job_post_detail.employment_type_mstr_id = tbl_employment_type_mstr._id
				WHERE tbl_job_post_detail._id =:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
    }
    public function career_details_qualification_view($data){
        $sql = "SELECT tbl_job_post_qualification_details._id AS job_post_qualification_details_id,
                tbl_course_mstr.course_name,
                tbl_sub_course_mstr.stream_name,
                tbl_sub_stream_mstr.sub_stream_name
                FROM tbl_job_post_qualification_details
                LEFT JOIN tbl_course_mstr ON tbl_job_post_qualification_details.course_mstr_id = tbl_course_mstr._id
                LEFT JOIN tbl_sub_course_mstr ON tbl_job_post_qualification_details.sub_course_mstr_id = tbl_sub_course_mstr._id
                LEFT JOIN tbl_sub_stream_mstr ON tbl_job_post_qualification_details.sub_stream_mstr_id = tbl_sub_stream_mstr._id
				WHERE tbl_job_post_qualification_details.job_post_details_id =:id AND tbl_job_post_qualification_details._status =:status";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $this->db->bind("status", 1);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
    }

    public function activejobList(){
        $sql = "SELECT _id, job_title
                FROM tbl_job_post_detail
                where _status='1'";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return $result;
    }

    public function jobApply($data){
        $sql = "SELECT designation_mstr_id, _id AS job_post_detail_id
                FROM tbl_job_post_detail
                WHERE _id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->single();
        return $result;
    }

    public function getJobPostDetailsById($ID){
        $job_post_detail = $this->db->table('tbl_job_post_detail')
            ->select('_id AS job_post_details_id, designation_mstr_id')
            ->where('_id', '=', $ID)
            ->first();
        if($job_post_detail){
            $designation_mstr = $this->db->table('tbl_designation_mstr')
                ->select('department_mstr_id, designation_name')
                ->where('_id', '=', $job_post_detail['designation_mstr_id'])
                ->first();
            if($designation_mstr){
                return $result = ["job_post_details_id"=>$job_post_detail['job_post_details_id'], 
                                  "department_mstr_id"=>$designation_mstr['department_mstr_id'],
                                  "designation_mstr_id"=>$job_post_detail['designation_mstr_id'],
                                  "designation_name"=>$designation_mstr['designation_name']
                                 ];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getDeptListByJobPostId($data){
        $sql = "SELECT j._id, j.designation_mstr_id, d.department_mstr_id
                FROM tbl_job_post_detail j join tbl_designation_mstr d on(j.designation_mstr_id=d._id)
                where j._status='1'
                and j._id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data);
        $result = $this->db->single();
        return $result;
    }

    public function designationList(){
        $sql = "SELECT _id AS designation_mstr_id, designation_name
                FROM tbl_designation_mstr
                WHERE _status =:status";
        $this->db->query($sql);
        $this->db->bind("status", "1");
        $result = $this->db->resultset();
        return $result;
    }
    public function jobLocation(){
        $sql = "SELECT tbl_company_location._id AS company_location_id, 
                tbl_state_dist_city.state,tbl_state_dist_city.dist,tbl_state_dist_city.city
                FROM tbl_company_location
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                WHERE tbl_company_location._status =:status";
        $this->db->query($sql);
        $this->db->bind("status", "1");
        $result = $this->db->resultset();
        return $result;
    }
    public function courseList(){
        $sql = "SELECT _id AS course_name_id ,course_name
                FROM tbl_course_mstr
                WHERE _status =:status";
        $this->db->query($sql);
        $this->db->bind("status", "1");
        $result = $this->db->resultset();
        return $result;
    }
    public function stream($data){
        $sql = "SELECT _id AS stream_name_id ,stream_name
                FROM tbl_sub_course_mstr
                WHERE course_mstr_id =:course_mstr_id AND
                _status =:status";
        $this->db->query($sql);
        $this->db->bind("course_mstr_id", $data["course_mstr_id"]);
        $this->db->bind("status", "1");
        $result = $this->db->resultset();
        return $result;
    }

    public function sub_stream($data){
        $sql = "SELECT _id AS sub_stream_name_id ,sub_stream_name
                FROM tbl_sub_stream_mstr
                WHERE sub_course_mstr_id =:sub_course_mstr_id AND
                _status =:status";
        $this->db->query($sql);
        $this->db->bind("sub_course_mstr_id", $data["sub_course_mstr_id"]);
        $this->db->bind("status", "1");
        $result = $this->db->resultset();
        return $result;
    }



    public function employeeType(){
        $sql = "SELECT _id AS employment_type_mst_id, employment_type
                FROM tbl_employment_type_mstr where _status='1'";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return $result;
    }

    public function applyJobStepOne($data){
        $result = $this->db->table('tbl_candidate_details')->
            insert([
                "job_title"=>$data["designation_mstr_id"],
                "job_post_details_id"=>$data["job_post_detail_id"],
                "first_name"=>$data["first_name"],
                "middle_name"=>$data["middle_name"],
                "last_name"=>$data["last_name"],
                "father_name"=>$data["father_name"],
                "mother_name"=>$data["mother_name"],
                "blood_group"=>$data["blood_group"],
                "gender"=>$data["gender"],
                "marital_status"=>$data["marital_status"],
                "spouse_name"=>$data["spouse_name"],
                "d_o_b"=>$data["date_of_birth"],
                "created_on"=>$data["age"],
                "height"=>$data["height"],
                "weight"=>$data["weight"],
                "aadhar_no"=>$data["aadhar_no"],
                "email_id"=>$data["email_id"],
                "photo_path"=>$data["photo_path"],
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);
    }

    public function applied_applicant_list($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,
                tbl_candidate_details._status,
                tbl_candidate_details.personal_phone_no,
                tbl_designation_mstr.designation_name,
                tbl_job_post_detail.company_location_id,
                tbl_project_mstr.project_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id = tbl_project_mstr._id
                WHERE tbl_candidate_details.job_post_details_id =:id AND tbl_candidate_details._status=1";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);

    }

    public function candidateReport_list(){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,
                tbl_candidate_details._status,
                tbl_candidate_details.personal_phone_no,
                tbl_candidate_details.job_post_details_id,
                tbl_designation_mstr.designation_name,
                tbl_job_post_detail.company_location_id,
                tbl_project_mstr.project_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id = tbl_project_mstr._id WHERE tbl_candidate_details._status>0 and tbl_candidate_details.deactivate_status=0
                ";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);

    }
    public function deactivatedCandidateReport_list(){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,tbl_candidate_details.deactivate_comment,
                tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,
                tbl_candidate_details._status,
                tbl_candidate_details.personal_phone_no,
                tbl_candidate_details.job_post_details_id,
                tbl_candidate_details.deactivate_comment,
                tbl_designation_mstr.designation_name,
                tbl_job_post_detail.company_location_id,
                tbl_project_mstr.project_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id = tbl_project_mstr._id WHERE tbl_candidate_details._status=1 and tbl_candidate_details.deactivate_status=1
                ";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);

    }

    public function designation_id(){
        $sql = "SELECT _id,designation_name
                FROM tbl_designation_mstr
                WHERE _status =1 ";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);

    }
    public function search_applicantReport_list($data){
       
        try
        {
            $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,
                tbl_candidate_details._status,
                tbl_candidate_details.personal_phone_no,
                tbl_candidate_details.deactivate_comment,
                tbl_designation_mstr.designation_name,
                tbl_job_post_detail.company_location_id,
                tbl_project_mstr.project_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id = tbl_project_mstr._id
                ";
        if($data['status']!=""){
            $sql .= " AND tbl_candidate_details._status=".$data['status'];
        }
            if($data['designation_idd']!=""){
            $sql .= " AND tbl_candidate_details.designation_mstr_id=".$data['designation_idd'];
        }

        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function search_applicant_list($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,
                tbl_candidate_details._status,
                tbl_candidate_details.personal_phone_no,
                tbl_designation_mstr.designation_name,
                tbl_job_post_detail.company_location_id,
                tbl_project_mstr.project_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
                LEFT JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id = tbl_project_mstr._id
                WHERE tbl_candidate_details.job_post_details_id =:id";
        if($data['status']!=""){
            $sql .= " AND tbl_candidate_details._status=".$data['status'];
        }
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);

    }
    public function companyLocation(){
        $sql = "SELECT  _id AS company_location_company_id,
                address AS company_location_address,
                city AS company_location_city
                FROM tbl_company_location";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return $result;
    }
    public function interviewPlace($data){
        $sql = "SELECT city
                FROM tbl_state_dist_city
                WHERE _id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['place_of_interview']);
        $result = $this->db->single();
        return $result;
    }
    public function interviewcallDetails($data){
        
        $sql = "SELECT tbl_state_dist_city.city, tbl_designation_mstr.designation_name, tbl_candidate_details.job_post_details_id,
                tbl_candidate_interview_call_details.interview_venue_id,tbl_candidate_interview_call_details.designation_id
                FROM tbl_candidate_interview_call_details
                LEFT JOIN tbl_state_dist_city ON tbl_candidate_interview_call_details.interview_venue_id = tbl_state_dist_city._id
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_interview_call_details.designation_id = tbl_designation_mstr._id
                LEFT JOIN tbl_candidate_details ON tbl_candidate_interview_call_details.candidate_id = tbl_candidate_details._id
                WHERE tbl_candidate_interview_call_details.candidate_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['name_id']);
        $result = $this->db->single();
        return $result;
    }
    public function employmentType($data){
        $sql = "SELECT tbl_employment_type_mstr.employment_type
                FROM tbl_job_post_detail
                LEFT JOIN tbl_employment_type_mstr ON tbl_job_post_detail.employment_type_mstr_id = tbl_employment_type_mstr._id
                WHERE tbl_job_post_detail._id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['job_post_detail_id']);
        $result = $this->db->single();
        return $result;
    }
    public function postName($data){
        $sql = "SELECT designation_name AS designation_mstr_designation_name
                FROM tbl_designation_mstr
                WHERE _id=:post_name";
        $this->db->query($sql);
        $this->db->bind("post_name", $data['post_name']);
        $result = $this->db->single();
        return $result;
    }

    public function empDesignation(){
        $sql = "SELECT  _id AS designation_mstr_id,
                designation_name AS designation_mstr_designation_name
                FROM tbl_designation_mstr";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return $result;
    }

    public function candidateDetails($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
				tbl_candidate_details.first_name AS candidate_details_first_name,
				tbl_candidate_details.middle_name AS candidate_details_middle_name,
				tbl_candidate_details.last_name AS candidate_details_last_name,
                tbl_candidate_details.photo_path AS candidate_details_photo_path,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_candidate_details._status,
                tbl_designation_mstr._id AS designation_mstr_id,
                tbl_designation_mstr.designation_name AS designation_mstr_designation_name
				FROM tbl_candidate_details
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
				LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
				LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
				WHERE tbl_candidate_details._id=:id
				ORDER BY tbl_candidate_details._id DESC";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }

    public function interviewDateTime(){
        $sql = "SELECT tbl_interview_details.interview_start_date,
                tbl_interview_details.interview_end_date,
                tbl_interview_details.interview_start_time,
                tbl_interview_details.interview_end_time,
                tbl_designation_mstr.designation_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_interview_details
                LEFT JOIN tbl_designation_mstr ON tbl_interview_details.post_name_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_interview_details.interview_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                ";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return $result;
    }

    public function candidateProfile($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
				tbl_candidate_details.first_name AS candidate_details_first_name,
				tbl_candidate_details.middle_name AS candidate_details_middle_name,
				tbl_candidate_details.last_name AS candidate_details_last_name,
                tbl_candidate_details.photo_path AS candidate_details_photo_path,
                tbl_candidate_details._status,
                tbl_candidate_details.email_id AS candidate_details_email_id,
                tbl_interview_details.interview_start_date,
                tbl_interview_details.interview_end_date,
                tbl_interview_details.interview_start_time,
                tbl_interview_details.interview_end_time,tbl_interview_details.job_post_detail_id AS interview_details_job_post_detail_id,
                tbl_state_dist_city._id AS location_id,tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_designation_mstr._id AS designation_mstr_id,
                tbl_job_post_detail.company_location_id,
                tbl_job_post_detail._id AS job_post_detail_id,
                tbl_job_post_detail.job_description,
                tbl_designation_mstr.designation_name AS designation_mstr_designation_name
				FROM tbl_candidate_details
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
				LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_interview_details ON tbl_job_post_detail._id = tbl_interview_details.job_post_detail_id
                LEFT JOIN tbl_company_location ON tbl_interview_details.interview_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
				WHERE tbl_candidate_details._id=:id
				ORDER BY tbl_candidate_details._id DESC";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }

    public function interviewStatus($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
				tbl_candidate_details.first_name AS candidate_details_first_name,
				tbl_candidate_details.middle_name AS candidate_details_middle_name,
				tbl_candidate_details.last_name AS candidate_details_last_name,
                tbl_candidate_details.d_o_b AS candidate_details_d_o_b,
                tbl_candidate_details.email_id AS candidate_details_email_id,
                tbl_candidate_details.present_address AS candidate_details_present_address,
                tbl_candidate_details.gender AS candidate_details_gender,
                tbl_candidate_details.personal_phone_no AS candidate_details_personal_phone_no,
                tbl_candidate_details.spouse_name AS candidate_details_spouse_name,
                tbl_candidate_details.photo_path AS candidate_details_photo_path,
                tbl_candidate_details.blood_group AS candidate_details_blood_group,
                tbl_candidate_details.marital_status AS candidate_details_marital_status,
                tbl_candidate_details._status AS candidate_details_status,
                tbl_candidate_document_details.doc_path AS candidate_details_doc_path,
                tbl_candidate_family_backbgound.father_name AS candidate_father_name,
                tbl_candidate_family_backbgound.mother_name AS candidate_mother_name
				FROM tbl_candidate_details
				LEFT JOIN tbl_candidate_family_backbgound ON tbl_candidate_details._id=tbl_candidate_family_backbgound.candidate_details_id
                LEFT JOIN tbl_candidate_document_details ON tbl_candidate_details._id=tbl_candidate_document_details.candidate_details_id
				WHERE tbl_candidate_details._id=:id
				ORDER BY tbl_candidate_details._id DESC";
        $this->db->query($sql);
        $this->db->bind("id", $data["id"]);
        $result = $this->db->resultset();
        return $result;
    }

    public function interviewCall($data){
        $result = $this->db->table('tbl_candidate_interview_call_details')->
            insert([
                "candidate_id"=>$data["name"],
                "interview_venue_id"=>$data["place_of_interview"],
                "designation_id"=>$data["post_name"],
                "interview_date"=>$data["interview_date"],
                "interview_time"=>$data["interview_time"],
                "date_time"=>$data["created_on"],
                "_status"=>"2"
            ]);
        return json_decode(json_encode($result), true);
    }

    public function interviewCallStatus($dataci){
        return $result = $this->db->table('tbl_candidate_details')->
            where("_id", "=", $dataci['name'])->
            update(["_status"=>"2"]);
        get();

    }

    public function candidate_cancel_interview($dataci){
        return $result = $this->db->table('tbl_candidate_details')->
            where("_id", "=", $dataci['id'])->
            update(["_status"=>"3"]);
        get();
    }

    public function check_status($dataci){
        $sql = "SELECT  _status
                FROM tbl_candidate_details
                WHERE _id =:id";
        $this->db->query($sql);
        $this->db->bind("id", $dataci['id']);
        $result = $this->db->single();
        $result = $this->db->single();
        return $result;
    }
    public function interview_accept($dataci){
        return $result = $this->db->table('tbl_candidate_details')->
            where("_id", "=", $dataci['id'])->
            update(["_status"=>"4"]);
        get();
    }

    public function interview_accept_status($dataci){
        return $result = $this->db->table('tbl_candidate_interview_call_details')->
            where("candidate_id", "=", $dataci['id'])->
            update(["_status"=>"4"]);
        get();
    }
    public function interview_reject($dataci){
        return $result = $this->db->table('tbl_candidate_details')->
            where("_id", "=", $dataci['id'])->
            update(["_status"=>"5"]);
        get();
    }

    public function interview_reject_status($dataci){
        return $result = $this->db->table('tbl_candidate_interview_call_details')->
            where("candidate_id", "=", $dataci['id'])->
            update(["_status"=>"5"]);
        get();
    }
    public function interview_reshedule($dataci){
        return $result = $this->db->table('tbl_candidate_details')->
            where("_id", "=", $dataci['id'])->		
            update(["_status"=>"6"]);
        get();
    }
    public function interview_reshedule_status($dataci){
        return $result = $this->db->table('tbl_candidate_interview_call_details')->
            where("candidate_id", "=", $dataci['id'])->
            update(["_status"=>"6"]);
        get();
    }
    public function candidate_brief_description($data){
        $sql = "SELECT * FROM tbl_candidate_details
                WHERE tbl_candidate_details._id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_ex($data){
        $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,tbl_candidate_details.middle_name,
                tbl_candidate_details.last_name,tbl_designation_mstr.designation_name,
                tbl_candidate_details.photo_path,
                tbl_job_post_detail.company_location_id,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_candidate_details
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
				LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                WHERE tbl_candidate_details._id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_family($data){
        $sql = "SELECT * FROM tbl_candidate_family_backbgound
                WHERE tbl_candidate_family_backbgound.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_qualification($data){
        $sql = "SELECT 
                tbl_candidate_qualification_details.medium_type,
                tbl_candidate_qualification_details.passing_year,
                tbl_candidate_qualification_details.school_college_institute_name,
                tbl_candidate_qualification_details.board_university_name,
                tbl_candidate_qualification_details.marks_percent,
                tbl_candidate_qualification_details.course_mstr_id,
                tbl_course_mstr.course_name,
                tbl_sub_course_mstr.stream_name,
                tbl_sub_stream_mstr.sub_stream_name
                FROM tbl_candidate_qualification_details
                LEFT JOIN tbl_course_mstr ON tbl_candidate_qualification_details.course_mstr_id = tbl_course_mstr._id
                LEFT JOIN tbl_sub_course_mstr ON tbl_candidate_qualification_details.sub_course_mstr_id = tbl_sub_course_mstr._id
                LEFT JOIN tbl_sub_stream_mstr ON tbl_candidate_qualification_details.sub_stream_mstr_id = tbl_sub_stream_mstr._id
                WHERE tbl_candidate_qualification_details.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_document($data){
        $sql = "SELECT tbl_candidate_document_details.doc_no,
                tbl_candidate_document_details.date_of_issue,
                tbl_candidate_document_details.place_of_issue,
                tbl_candidate_document_details.valid_upto,
                tbl_candidate_document_details.doc_path,
                tbl_candidate_document_details.doc_type_mstr_id,
                tbl_doc_type_mstr.doc_name
                FROM tbl_candidate_document_details
                LEFT JOIN tbl_doc_type_mstr ON tbl_candidate_document_details.doc_type_mstr_id = tbl_doc_type_mstr._id
                WHERE tbl_candidate_document_details.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_Prnemployment($data){
        $sql = "SELECT * FROM tbl_candidate_present_employment
                WHERE tbl_candidate_present_employment.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_Prvemployment($data){
        $sql = "SELECT * FROM tbl_candidate_previous_employment_details
                WHERE tbl_candidate_previous_employment_details.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }
    public function candidate_Refemployment($data){
        $sql = "SELECT * FROM tbl_candidate_references
                WHERE tbl_candidate_references.candidate_details_id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data['id']);
        $result = $this->db->resultset();
        return $result;
    }


}