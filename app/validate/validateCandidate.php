<?php
require_once("validate.php");
class validateCandidate extends validate
{
	function __construct(){}

    function candidateAddUpdateStepOne($validate){
        $errMsg = (array)null;

        if(!isset($validate["job_post_details_id"]) || $validate["job_post_details_id"]=="")
            $errMsg["job_post_details_id"] = "job_post_details_id field is required";

		if(!isset($validate["department_mstr_id"]) || $validate["department_mstr_id"]=="")
            $errMsg["designation_mstr_id"] = "designation field is required";

        if(!isset($validate["designation_mstr_id"]) || $validate["designation_mstr_id"]=="")
            $errMsg["designation_mstr_id"] = "designation field is required";

        if(!isset($validate["first_name"]) || $validate["first_name"]=="")
            $errMsg["first_name"] = "first name field is required";

        if(!isset($validate["last_name"]) || $validate["last_name"]=="")
            $errMsg["last_name"] = "last name field is required";

        /*if(!isset($validate["blood_group"]) || $validate["blood_group"]=="")
            $errMsg["blood_group"] = "blood group field is required";*/

        if(!isset($validate["gender"]) || $validate["gender"]=="")
            $errMsg["gender"] = "gender field is required";

        if(!isset($validate["marital_status"]) || $validate["marital_status"]=="")
            $errMsg["marital_status"] = "marital status field is required";
        else{
            if($validate["marital_status"]!="Single"){
                if(!isset($validate["spouse_name"]) || $validate["spouse_name"]=="")
                    $errMsg["spouse_name"] = "spouse name field is required";
            }
        }

        if(!isset($validate["d_o_b"]) || $validate["d_o_b"]=="")
            $errMsg["d_o_b"] = "date of birth field is required";

        /*if(!isset($validate["height"]) || $validate["height"]=="")
            $errMsg["height"] = "height field is required";

        if(!isset($validate["weight"]) || $validate["weight"]=="")
            $errMsg["weight"] = "weight field is required";*/

        if(!isset($validate["is_image"]))
            $errMsg["is_image"] = "is image field is required";

        return $errMsg;
    }

    function candidateAddUpdateStepTwo($validate){
        $errMsg = (array)null;

        if(!isset($validate["present_address"]) || $validate["present_address"]=="")
            $errMsg["present_address"] = "present address field is required";

        if(!isset($validate["present_city"]) || $validate["present_city"]=="")
            $errMsg["present_city"] = "present city field is required";

        if(!isset($validate["present_district"]) || $validate["present_district"]=="")
            $errMsg["present_district"] = "present district field is required";

        if(!isset($validate["present_state"]) || $validate["present_state"]=="")
            $errMsg["present_state"] = "present state field is required";

        if(!isset($validate["present_pin_code"]) || $validate["present_pin_code"]=="")
            $errMsg["present_pin_code"] = "present pin code field is required";

        if(!isset($validate["permanent_address"]) || $validate["permanent_address"]=="")
            $errMsg["permanent_address"] = "permanent address field is required";

        if(!isset($validate["permanent_city"]) || $validate["permanent_city"]=="")
            $errMsg["permanent_city"] = "permanent city field is required";

        if(!isset($validate["permanent_district"]) || $validate["permanent_district"]=="")
            $errMsg["permanent_district"] = "permanent district field is required";

        if(!isset($validate["permanent_state"]) || $validate["permanent_state"]=="")
            $errMsg["permanent_state"] = "permanent state field is required";

        if(!isset($validate["permanent_pin_code"]) || $validate["permanent_pin_code"]=="")
            $errMsg["permanent_pin_code"] = "permanent pin code field is required";

        if(!isset($validate["father_name"]) || $validate["father_name"]=="")
            $errMsg["father_name"] = "father name field is required";

        if(!isset($validate["father_name"]) || $validate["father_occupation"]=="")
            $errMsg["father_occupation"] = "father occupation field is required";

        if(!isset($validate["father_contact_no"]) || $validate["father_contact_no"]=="")
            $errMsg["father_contact_no"] = "father contact no field is required";

        if(!isset($validate["father_address"]) || $validate["father_address"]=="")
            $errMsg["father_address"] = "father address field is required";

        return $errMsg;
    }
    function candidateAddUpdateStepThree($validate){
        $errMsg = (array)null;
        $course_mstr_status = $other_course_staus = $sub_course_mstr_status = $sub_stream_mstr_status = true;
        $medium_type_status = $passing_year_status = $school_college_institute_name_status = true;
        $board_university_name_status = $marks_percent_status = true;

        $academicLength = sizeof($validate['course_mstr_id']);
        for($i=0; $i<$academicLength; $i++){
            $candidate_qualification_details_id = $validate['candidate_qualification_details_id'][$i];
            $course_mstr_id = $validate['course_mstr_id'][$i];
            $other_course = $validate['other_course'][$i];
            $sub_course_mstr_id = $validate['sub_course_mstr_id'][$i];
            $sub_stream_mstr_id = $validate['sub_stream_mstr_id'][$i];
            $medium_type = $validate['medium_type'][$i];
            $passing_year = $validate['passing_year'][$i];
            $school_college_institute_name = $validate['school_college_institute_name'][$i];
            $board_university_name = $validate['board_university_name'][$i];
            $marks_percent = $validate['marks_percent'][$i];

            if($course_mstr_id==""){
                if($course_mstr_status==true){
                    $errMsg["course_mstr_id"] = "SSC/HSC/DIPLOMA/DEGREE/Additional Course field is required";
                    $course_mstr_status = false;
                }
            }
            if($course_mstr_id==0){
                if($other_course==""){
                    if($other_course_staus==true){
                        $errMsg["other_course"] = "other course field is required";
                        $other_course_staus = false;
                    }
                }
            }
            if($sub_course_mstr_id==""){
                if($sub_course_mstr_status==true){
                    $errMsg["sub_course_mstr_id"] = "stream field is required";
                    $sub_course_mstr_status = false;
                }
            }
            if($sub_stream_mstr_id==""){
                if($sub_stream_mstr_status==true){
                    $errMsg["sub_stream_mstr_id"] = "sub steam field is required";
                    $sub_stream_mstr_status = false;
                }
            }
            if($medium_type==""){
                if($medium_type_status==true){
                    $errMsg["medium_type"] = "Medium: English/Vernacular field is required";
                    $medium_type_status = false;
                }
            }
            if($passing_year==""){
                if($passing_year_status==true){
                    $errMsg["passing_year"] = "Year Of Passing field is required";
                    $passing_year_status = false;
                }
            }
            if($school_college_institute_name==""){
                if($school_college_institute_name_status==true){
                    $errMsg["school_college_institute_name"] = "Name Of School/College/Institute And Place field is required";
                    $school_college_institute_name_status = false;
                }
            }
            if($board_university_name==""){
                if($board_university_name_status==true){
                    $errMsg["board_university_name"] = "Name Of Board/University Affiliated field is required";
                    $board_university_name_status = false;
                }
            }
            if($marks_percent==""){
                if($marks_percent_status==true){
                    $errMsg["marks_percent"] = "Class/% Of Marks Awarded field is required";
                    $marks_percent_status = false;
                }
            }
        }
        return $errMsg;
    }
    function candidateAddUpdateStepFour($validate){
        $errMsg = (array)null;

        return $errMsg;
    }
    function candidateAddUpdateStepFive($validate){
        $errMsg = (array)null;

        if(!isset($validate["candidate_details_id"]) || $validate["candidate_details_id"]=="")
            $errMsg["candidate_details_id"] = "candidate_details_id field is required";

        if(!isset($validate["doc_type_mstr_id"]) || $validate["doc_type_mstr_id"]=="")
            $errMsg["doc_type_mstr_id"] = "doc_type_mstr_id field is required";
        else{
            if($validate["doc_type_mstr_id"]=="0"){
                if(!isset($validate["other_doc_name"]) || $validate["other_doc_name"]=="")
                    $errMsg["other_doc_name"] = "other_doc_name field is required";
            }
        }

        if(!isset($validate["doc_no"]) || $validate["doc_no"]=="")
            $errMsg["doc_no"] = "doc_no field is required";

        if(!isset($validate["place_of_issue"]))
            $errMsg["place_of_issue"] = "place_of_issue field is required";

        if(!isset($validate["date_of_issue"]))
            $errMsg["date_of_issue"] = "date_of_issue field is required";

        if(!isset($validate["valid_upto"]))
            $errMsg["valid_upto"] = "valid_upto field is required";

        return $errMsg;
    }
}