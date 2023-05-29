<?php 
class model_masters
{
    private $db;
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function Dept_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            try{
                $sql ="insert into tbl_department_mstr(dept_name)values(:name)";
                $this->db->query($sql);
                $this->db->bind('name',$data['dept_name']);
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
                $sql="update tbl_department_mstr 
				set dept_name =:dept_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('dept_name',$data['dept_name']);
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
    public function Dept_list(){
        try{
            $sql ="select * from tbl_department_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateDeptById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select _id,dept_name from tbl_department_mstr where _id =:id AND _status=1 order by _id desc";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyiddept($id)
    {
        try
        {
            $sql="update tbl_department_mstr 
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
    public function duplicatefunDept($data)
    {
        try
        {
            $sql = "select dept_name from tbl_department_mstr where dept_name =:dept_name AND _status=1";
            $this->db->query($sql);
            $this->db->bind('dept_name',$data['dept_name']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    //Grade Table Operation

    public function grade_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_grade_mstr(grade_type)
                                        values(:grade_type)";
                $this->db->query($sql);
                $this->db->bind('grade_type',$data['grade_type']);
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
                $sql="update tbl_grade_mstr
				set grade_type =:grade_type
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('grade_type',$data['grade_type']);
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
    public function biometric_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_biometric_mstr(user,code)
                                        values(:user,:code)";
                $this->db->query($sql);
                $this->db->bind('user',$data['biometric_user_name']);
                $this->db->bind('code',$data['biometic_code']);
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
                $sql="update tbl_grade_mstr
				set grade_type =:grade_type
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('grade_type',$data['grade_type']);
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
    public function Grade_list(){
        try{
            $sql ="select * from tbl_grade_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateGradeById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_grade_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidgrade($id)
    {
        try
        {
            $sql="update tbl_grade_mstr 
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
    //ajax call
    public function ajax_gateMinSalaryById($data)
    {
        try
        {

            $sql ="select min_salary,max_salary from tbl_grade_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$data["grade"]);
            $result = $this->db->single();
            // print_r($list);
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicatefunGrade($data)
    {
        try
        {
            $sql = "select grade_type,min_salary,max_salary from tbl_grade_mstr 
                    where grade_type =:grade_type AND _status=1";
            $this->db->query($sql);
            $this->db->bind('grade_type',$data['grade_type']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicatefunGrade_id($data)
    {
        try
        {
            $sql = "select grade_type,min_salary,max_salary from tbl_grade_mstr 
                    where grade_type =:grade_type AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('grade_type',$data['grade_type']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //Course Table Operation

    public function qualification_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_course_mstr(course_name)values(:course_name)";
                $this->db->query($sql);
                $this->db->bind('course_name',$data['course_name']);
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
                $sql="update tbl_course_mstr 
				set course_name =:course_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('course_name',$data['course_name']);
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
    public function Qualification_list(){
        try{
            $sql ="select * from tbl_course_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateQualificationById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select _id,course_name from tbl_course_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidqualification($id)
    {
        try
        {
            $sql="update tbl_course_mstr 
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
    public function duplicatefunQualification($data)
    {
        try
        {
            $sql = "select course_name from tbl_course_mstr where course_name =:course_name AND _status=1";
            $this->db->query($sql);
            $this->db->bind('course_name',$data['course_name']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    //Document table Operation
    public function doc_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_doc_type_mstr(doc_name)values(:doc_name)";
                $this->db->query($sql);
                $this->db->bind('doc_name',$data['doc_name']);
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
                $sql="update tbl_doc_type_mstr 
				set doc_name =:doc_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('doc_name',$data['doc_name']);
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
    public function Doc_list(){
        try{
            $sql ="select * from tbl_doc_type_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateDocById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select _id,doc_name from tbl_doc_type_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyiddoc($id)
    {
        try
        {
            $sql="update tbl_doc_type_mstr 
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
    public function duplicatefunDocument($data)
    {
        try
        {
            $sql = "select doc_name from tbl_doc_type_mstr where doc_name =:doc_name AND _status=1";
            $this->db->query($sql);
            $this->db->bind('doc_name',$data['doc_name']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    //Designation Table Operation
    public function designation_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_designation_mstr(department_mstr_id,grade_mstr_id,designation_name)
                                            values(:department_mstr_id,:grade_mstr_id,:designation_name)";
                $this->db->query($sql);
                $this->db->bind('department_mstr_id',$data['department_mstr_id']);
                $this->db->bind('grade_mstr_id',$data['grade_mstr_id']);
                $this->db->bind('designation_name',$data['designation_name']);
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
                $sql="update tbl_designation_mstr 
				set department_mstr_id =:department_mstr_id,
                    grade_mstr_id =:grade_mstr_id,
                    designation_name =:designation_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('department_mstr_id',$data['department_mstr_id']);
                $this->db->bind('grade_mstr_id',$data['grade_mstr_id']);
                $this->db->bind('designation_name',$data['designation_name']);
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
    public function Designation_list(){
        try{
            $sql="select
				    design._id,
				    design.designation_name,
                    design.grade_mstr_id,
                    design.department_mstr_id,
				    grade.grade_type,
                    dept.dept_name
				    FROM tbl_designation_mstr design
				    left join tbl_grade_mstr grade on (grade._id=design.grade_mstr_id)
				    left join tbl_department_mstr dept on (dept._id=design.department_mstr_id)
				    where design._status=1 order by design._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateDesignationById($id)
    {
        //echo "ID = ".$id;
        try
        {
            $sql="select
				        design._id,
				        design.designation_name,
				        grade.grade_type,
                        design.grade_mstr_id,
                        design.department_mstr_id,
                        dept.dept_name
				        FROM tbl_designation_mstr design
				        left join tbl_grade_mstr grade on (grade._id=design.grade_mstr_id)
				        left join tbl_department_mstr dept on (dept._id=design.department_mstr_id)
				        where design._status=1 AND design._id=:id order by design._id desc";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyiddesignation($id)
    {
        try
        {
            $sql="update tbl_designation_mstr 
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
    public function duplicatefunDesignation($data)
    {
        try
        {
            $sql = "select designation_name,department_mstr_id from tbl_designation_mstr 
                        where designation_name =:designation_name AND department_mstr_id =:department_mstr_id 
                         AND _status=1";
            $this->db->query($sql);
            $this->db->bind('designation_name',$data['designation_name']);
            $this->db->bind('department_mstr_id',$data['department_mstr_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    public function gate_id_data($data)
    {
        try
        {
            $sql = "select designation_name,department_mstr_id from tbl_designation_mstr 
                        where designation_name =:designation_name AND department_mstr_id =:department_mstr_id 
                            AND _id!=:id AND _status=1";
         $this->db->query($sql);
         $this->db->bind('designation_name',$data['designation_name']);
         $this->db->bind('department_mstr_id',$data['department_mstr_id']);
         $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //User Table Operation
    public function user_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_user_mstr(user_name,user_pass,pass_hint)values(:user_name,:user_pass,:pass_hint)";
                $this->db->query($sql);
                $this->db->bind('user_name',$data['user_name']);
                $this->db->bind('user_pass',$data['user_pass']);
                $this->db->bind('pass_hint',$data['pass_hint']);
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
                $sql="update tbl_user_mstr 
				set user_name =:user_name,
                    user_pass =:user_pass,
                    pass_hint =:pass_hint
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('user_name',$data['user_name']);
                $this->db->bind('user_pass',$data['user_pass']);
                $this->db->bind('pass_hint',$data['pass_hint']);
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
    public function User_list(){
        try{
            $sql ="select * from tbl_user_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateUserById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_user_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyiduser($id)
    {
        try
        {
            $sql="update tbl_user_mstr
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
    //Employeement Type table Operation
    public function employeement_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_employment_type_mstr(employment_type)values(:employment_type)";
                $this->db->query($sql);
                $this->db->bind('employment_type',$data['employment_type']);
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
                $sql="update tbl_employment_type_mstr
				set employment_type =:employment_type
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('employment_type',$data['employment_type']);
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
    public function Employeement_list(){
        try{
            $sql ="select * from tbl_employment_type_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateEmployeementById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_employment_type_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidemployeement($id)
    {
        try
        {
            $sql="update tbl_employment_type_mstr
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
    public function duplicatefunEmploy_Ment_Type($data)
    {
        try
        {
            $sql = "select employment_type from tbl_employment_type_mstr where employment_type =:employment_type AND _status=1";
            $this->db->query($sql);
            $this->db->bind('employment_type',$data['employment_type']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //Relation Table Operation
    public function relation_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_relation_mstr(course_name)values(:course_name)";
                $this->db->query($sql);
                $this->db->bind('course_name',$data['course_name']);
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
                $sql="update tbl_relation_mstr 
				set course_name =:course_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('course_name',$data['course_name']);
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
    public function Relation_list(){
        try{
            $sql ="select * from tbl_relation_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateRelationById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select _id,course_name from tbl_relation_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidrelation($id)
    {
        try
        {
            $sql="update tbl_relation_mstr 
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
    public function duplicatefunRelation($data)
    {
        try
        {
            $sql = "select course_name from tbl_relation_mstr where course_name =:course_name AND _status=1";
            $this->db->query($sql);
            $this->db->bind('course_name',$data['course_name']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //Ward Table Operation
    public function ward_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_ward_mstr(ward_name)values(:ward_name)";
                $this->db->query($sql);
                $this->db->bind('ward_name',$data['ward_name']);
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
                $sql="update tbl_ward_mstr 
				set ward_name =:ward_name
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('ward_name',$data['ward_name']);
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
    public function Ward_list(){
        try{
            $sql ="select * from tbl_ward_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateWardById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_ward_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidward($id)
    {
        try
        {
            $sql="update tbl_ward_mstr 
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
    //Project Table Operation
    public function project_mstr_address_status_disable($project_mstr_id){
        $this->db->table("tbl_project_mstr_address")
                ->where('project_mstr_id', '=', $project_mstr_id)
                ->update([
                    "_status"=>0
                ]);
    }
    public function project_mstr_address_add($project_mstr_address_id, $project_mstr_id, $state_dist_city_id){
        if($project_mstr_address_id==""){
            $this->db->table("tbl_project_mstr_address")
                    ->insert([
                        "project_mstr_id"=>$project_mstr_id,
                        "_status"=>1,
                        "state_dist_city_id"=>$state_dist_city_id
                    ]);
        }else{
            $this->db->table("tbl_project_mstr_address")
                    ->where('_id', '=', $project_mstr_address_id)
                    ->update([
                        "_status"=>1,
                        "state_dist_city_id"=>$state_dist_city_id
                    ]);
        }
    }
    public function project_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="INSERT INTO tbl_project_mstr(concept_type,project_name, project_short_name, project_description, latitude, longitude) VALUES (:concept_type, :project_name, :project_short_name, :project_description, :latitude, :longitude)";
                $this->db->query($sql);
                $this->db->bind('concept_type',$data['concept_type']);
                $this->db->bind('project_name',$data['project_name']);
                $this->db->bind('project_short_name',$data['project_short_name']);
                $this->db->bind('project_description',$data['project_description']);
                $this->db->bind('latitude',$data['latitude']);
                $this->db->bind('longitude',$data['longitude']);
                //$this->db->bind('state_dist_city_id',$data['state_dist_city_id']);
                $project_mstr_id = $this->db->insertionGetId();
                //print_r($result);
                if($project_mstr_id){
                    return $project_mstr_id;
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
                $sql="UPDATE tbl_project_mstr SET concept_type =:concept_type, project_name =:project_name, project_short_name =:project_short_name, project_description =:project_description, latitude =:latitude, longitude =:longitude WHERE _id =:id";
                $this->db->query($sql);
                $this->db->bind('concept_type',$data['concept_type']);
                $this->db->bind('project_name', $data['project_name']);
                $this->db->bind('project_short_name', $data['project_short_name']);
                $this->db->bind('project_description', $data['project_description']);
                $this->db->bind('latitude', $data['latitude']);
                $this->db->bind('longitude', $data['longitude']);
                //$this->db->bind('state_dist_city_id', $data['state_dist_city_id']);
                $this->db->bind('id', $data['_id']);
                //print_r($sql);
                $result = $this->db->updation();
                return $result;
                return true;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
    }
    public function Project_list(){
        try{
            $sql ="select * from tbl_project_mstr where _status=1 order by project_name asc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            if($list){
                return json_decode(json_encode($list),true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function joinProjectMstrAddDetailsByProjectMstrId($ID){
        try{
            return $this->db->table('tbl_project_mstr_address')
                    ->join('tbl_state_dist_city', 'tbl_project_mstr_address.state_dist_city_id', '=', 'tbl_state_dist_city._id')
                    ->select('tbl_project_mstr_address._id AS project_mstr_address_id,
                                tbl_project_mstr_address.project_mstr_id,
                                tbl_project_mstr_address.state_dist_city_id,
                                tbl_state_dist_city.state,
                                tbl_state_dist_city.dist AS district,
                                tbl_state_dist_city.city
                            ')
                    ->where('tbl_project_mstr_address.project_mstr_id', '=', $ID)
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateProjectById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_project_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidproject($id)
    {
        try
        {
            $sql="update tbl_project_mstr 
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
    public function duplicatefunProject($data)
    {
        try
        {
            $sql = "SELECT project_name FROM tbl_project_mstr WHERE project_name =:project_name AND _status=:_status";
            $this->db->query($sql);
            $this->db->bind('project_name',$data['project_name']);
            $this->db->bind('_status', 1);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicatefunProject_id($data)
    {
       try
        {
            $sql = "select project_name from tbl_project_mstr 
                    where project_name =:project_name AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('project_name',$data['project_name']);
           $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //Leave Type Table Operation
    public function leave_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            try{
                $sql ="insert into tbl_leave_type_mstr(leave_type,leave_days)values(:leave_type,:leave_days)";
                $this->db->query($sql);
                $this->db->bind('leave_type',$data['leave_type']);
                $this->db->bind('leave_days',$data['leave_days']);
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
                $sql="update tbl_leave_type_mstr 
				set leave_type =:leave_type,
                    leave_days =:leave_days
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('leave_type',$data['leave_type']);
                $this->db->bind('leave_days',$data['leave_days']);
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
    public function Leave_list(){
        try{
            $sql ="select * from tbl_leave_type_mstr where _status=1 order by _id desc";
            $this->db->query($sql);
            $list = $this->db->resultset();
            //  print_r($list);
            return $list;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateLeaveById($id)
    {
        //echo "ID = ".$id;
        try
        {

            $sql ="select * from tbl_leave_type_mstr where _id =:id AND _status=1 order by _id desc";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $list = $this->db->single();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deletebyidleave($id)
    {
        try
        {
            $sql="update tbl_leave_type_mstr 
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
    public function duplicatefunLeaveType($data)
    {
        try
        {
            $sql = "select leave_type from tbl_leave_type_mstr where leave_type =:leave_type AND _status=1";
            $this->db->query($sql);
            $this->db->bind('leave_type',$data['leave_type']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicatefunLeaveType_id($data)
    {
        try
        {
            $sql = "select leave_type from tbl_leave_type_mstr where leave_type =:leave_type AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('leave_type',$data['leave_type']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    //sub Course Table OPeration

    public function sub_qualification_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_sub_course_mstr(stream_name,course_mstr_id)values(:stream_name,:course_mstr_id)";
                $this->db->query($sql);
                $this->db->bind('stream_name',$data['stream_name']);
                $this->db->bind('course_mstr_id',$data['course_mstr_id']);
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
                $sql="update tbl_sub_course_mstr 
				set stream_name =:stream_name,
                    course_mstr_id =:course_mstr_id
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('stream_name',$data['stream_name']);
                $this->db->bind('course_mstr_id',$data['course_mstr_id']);
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
    public function sub_Qualification_list(){
        try
        {
            $sql="select
				        sub._id,
				        sub.stream_name,
                        course.course_name
				        FROM tbl_sub_course_mstr sub
				        left join tbl_course_mstr course on (course._id=sub.course_mstr_id)
				        where sub._status=1 AND course._status=1  order by sub._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function sub_gateQualificationById($id)
    {
        //echo "ID = ".$id;
        try
        {
            $sql="select
				        sub._id,
				        sub.stream_name,
                        course.course_name,
                        sub.course_mstr_id
				        FROM tbl_sub_course_mstr sub
				        left join tbl_course_mstr course on (course._id=sub.course_mstr_id)
				        where sub._status=1 AND sub._id=:id ";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function sub_deletebyidqualification($id)
    {
        try
        {
            $sql="update tbl_sub_course_mstr 
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
    public function sub_duplicatefunQualification($data)
    {
        try
        {
            $sql = "select stream_name,course_mstr_id from tbl_sub_course_mstr where stream_name =:stream_name
                       AND course_mstr_id =:course_mstr_id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('stream_name',$data['stream_name']);
            $this->db->bind('course_mstr_id',$data['course_mstr_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    public function gateCourseList()
    {
        try
        {

            $sql ="select * from tbl_course_mstr where  _status=1 ";
            $this->db->query($sql);
            $list = $this->db->resultset();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}

?>