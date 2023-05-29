<?php
class Masters extends Controller
{
    public function __construct(){
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_masters = $this->model('model_masters');
        $this->Validate_masters = $this->validator('Validate_masters');
        $this->model_deduction = $this->model('model_deduction');
        $this->model_state_dist_city = $this->model('model_state_dist_city');
    }
    public function index()
    {

    }
    public function biometric_user_add_update()
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // echo "<pre>";
            // print_r($data);
            // return;
            if($data['_id']=="") // insert
            {
                // echo "ready to insert";
                // return;
                $errMsg = $this->Validate_masters->biometric_add_update($data);
                if(empty($errMsg))
                {
                    // $grade = $this->model_masters->duplicatefunGrade($data);
                    // $grade = json_decode(json_encode($grade),true);
                    // if($grade)
                    // {
                    //     echo "<script>alert('Grade Already Added'); </script>";
                    //     $this->view('pages/grade_add_update',$data);
                    // }
                    // else
                    // {
                        $result = $this->model_masters->biometric_add_update($data);
                        if($result)
                        {
                            echo "<script>alert('Biometric User Added Successfully'); window.location.href = '".URLROOT."/Masters/biometric_user_list';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Fail To Add Biometric User'); </script>";
                            $this->view('pages/biometric_user_add_update',$data);
                        }
                    // }

                }
                else
                {
                    $this->view('pages/biometric_user_add_update',$errMsg);
                }
            }
            else //Update
            {
                $grade = $this->model_masters->duplicatefunGrade_id($data);
                $grade = json_decode(json_encode($grade),true);
                if($grade)
                {
                    echo "<script>alert('User Already Added'); </script>";
                    $this->view('pages/biometric_user_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->grade_add_update($data,$id);
                    if($result)
                    {
                        echo "<script>alert('Grade Updated Successfully'); window.location.href = '".URLROOT."/Masters/GradeList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateGradeById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/grade_add_update',$data);
        }
        else
        {
            $this->view('pages/biometric_user_add_update');
        }
    }
    public function biometric_user_list(){
        $this->view('pages/biometric_list');
    }

    public function dept_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->dept_add_update($data);
                if(empty($errMsg))
                {
                    $dept = $this->model_masters->duplicatefunDept($data);
                    $dept = json_decode(json_encode($dept),true);
                    if($dept)
                    {
                        flashToast("deptExist","Department Exist");
                        // echo "<script>alert('Department Already Added');</script>";
                        $this->view('pages/dept_add_update',$data);
                    }
                    else
                    {

                        $result = $this->model_masters->dept_add_update($data);
                        if($result)
                        {
                            flashToast("deptAddSuccess","Department Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/DeptList';</script>";
                        }
                        else
                        {
                            flashToast("deptAddError","Fail To Add Department");
                            // echo "<script>alert('Fail To Add Department');</script>";
                            $this->view('pages/dept_add_update',$data);

                        }
                    }

                }
                else
                {
                    $this->view('pages/dept_add_update',$errMsg);
                }
            }
            else //update
            {
                $dept = $this->model_masters->duplicatefunDept($data);
                $dept = json_decode(json_encode($dept),true);
                if($dept)
                {
                    flashToast("deptExist","Department Exist");
                    // echo "<script>alert('Department Already Added');</script>";
                    $this->view('pages/dept_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->dept_add_update($data,$id);
                    if($result)
                    {
                        flashToast("deptUpdateSuccess","Department Updated Successfully");
                        echo "<script> window.location.href = '".URLROOT."/Masters/DeptList';</script>";
                    }
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateDeptById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/dept_add_update',$data);
        }
        else
        {
            $result = $this->model_masters->Dept_list();
            $data = json_decode(json_encode($result),true);
            //$data["deptlist"] = $result;
            // print_r($data);
            $this->view('pages/dept_add_update',$data);
        }

    }
    public function DeptList()
    {
        $result = $this->model_masters->Dept_list();
        $result = json_decode(json_encode($result),true);
        $data["deptlist"] = $result;
        //  print_r($result);
        $this->view('pages/Department_List',$data);
    }
    public function DeleteByIdDept($id)
    {
        $result = $this->model_masters->deletebyiddept($id);
        if($result)
        {
            flashToast("deleteSuccess","Departement Deleted");
            redirect('Masters/DeptList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            // redirect('Masters/DeptList');

        }
    }
    //Grade table operation

    public function grade_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->grade_add_update($data);
                if(empty($errMsg))
                {
                    $grade = $this->model_masters->duplicatefunGrade($data);
                    $grade = json_decode(json_encode($grade),true);
                    if($grade)
                    {
                        echo "<script>alert('Grade Already Added'); </script>";
                        $this->view('pages/grade_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->grade_add_update($data);
                        if($result)
                        {
                            echo "<script>alert('Grade Added Successfully'); window.location.href = '".URLROOT."/Masters/GradeList';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Fail To Add Grade'); </script>";
                            $this->view('pages/grade_add_update',$data);
                        }
                    }

                }
                else
                {
                    $this->view('pages/grade_add_update',$errMsg);
                }
            }
            else //Update
            {
                $grade = $this->model_masters->duplicatefunGrade_id($data);
                $grade = json_decode(json_encode($grade),true);
                if($grade)
                {
                    echo "<script>alert('Grade Already Added'); </script>";
                    $this->view('pages/grade_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->grade_add_update($data,$id);
                    if($result)
                    {
                        echo "<script>alert('Grade Updated Successfully'); window.location.href = '".URLROOT."/Masters/GradeList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateGradeById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/grade_add_update',$data);
        }
        else
        {
            $this->view('pages/grade_add_update');
        }

    }
    public function GradeList()
    {
        $result = $this->model_masters->Grade_list();
        $result = json_decode(json_encode($result),true);
        $data["gradelist"] = $result;
        //  print_r($result);
        $this->view('pages/grade_list',$data);
    }
    public function DeleteByIdGrade($id)
    {
        $result = $this->model_masters->deletebyidgrade($id);
        if($result)
        {
            redirect('Masters/GradeList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/GradeList');

        }
    }
    public function ajaxgateMinSalaryById()
    {
        //print_r($id);
        //$data['grade']=6;
        if(isPost())
        {
            $data = postData();
            $result = $this->model_masters->ajax_gateMinSalaryById($data);
            //print_r($result);
            $result = json_decode(json_encode($result),true);
            echo json_encode($result);

        }
    }
    //Course Table Operation

    public function qualification_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->qualification_add_update($data);
                if(empty($errMsg))
                {
                    $course = $this->model_masters->duplicatefunQualification($data);
                    $course = json_decode(json_encode($course),true);
                    if($course)
                    {
                        flashToast("QualExist","Qualification Already Added");
                        // echo "<script>alert('Qualification Already Added');</script>";
                        $this->view('pages/qualification_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->qualification_add_update($data);
                        if($result)
                        {
                            flashToast("QualAddSuccess","Qualification Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/QualificationList';</script>";
                        }
                        else
                        {
                            flashToast("QualAddError","Fail To Add Qualification");
                            $this->view('pages/qualification_add_update',$data);
                        }
                    }
                }
                else
                {
                    $this->view('pages/qualification_add_update',$errMsg);
                }
            }
            else //Update
            {
                $course = $this->model_masters->duplicatefunQualification($data);
                $course = json_decode(json_encode($course),true);
                if($course)
                {
                    flashToast("QualExist","Qualification Already Added");
                    $this->view('pages/qualification_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->qualification_add_update($data,$id);
                    if($result)
                    {
                        flashToast("QualUpdateSuccess","Qualification Updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Masters/QualificationList';</script>";
                    }
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateQualificationById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/qualification_add_update',$data);
        }
        else
        {
            $this->view('pages/qualification_add_update');
        }

    }
    public function QualificationList()
    {
        $result = $this->model_masters->Qualification_list();
        $result = json_decode(json_encode($result),true);
        $data["qualificationlist"] = $result;
        //  print_r($result);
        $this->view('pages/qualification_list',$data);
    }
    public function DeleteByIdQualification($id)
    {
        $result = $this->model_masters->deletebyidqualification($id);
        if($result)
        {
            flashToast("QualDeleteSuccess","Qualification Deleted Successfully");
            redirect('Masters/QualificationList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/QualificationList');

        }
    }
    //Document Table Operation
    public function doc_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->doc_add_update($data);
                if(empty($errMsg))
                {
                    $doc = $this->model_masters->duplicatefunDocument($data);
                    $doc = json_decode(json_encode($doc),true);
                    if($doc)
                    {
                        flashToast("documentExist","Document Already Added");
                        // echo "<script>alert('Document Already Added');</script>";
                        $this->view('pages/doc_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->doc_add_update($data);
                        if($result)
                        {
                            flashToast("documentAddSuccess","Document Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/DocList';</script>";
                        }
                        else
                        {
                            flashToast("documentAddError","Fail To Add Document");
                            // echo "<script>alert('Fail To Add Document');</script>";
                            $this->view('pages/doc_add_update',$data);
                        }
                    }
                }
                else
                {
                    $this->view('pages/doc_add_update',$errMsg);
                }
            }
            else //Update
            { 
                $doc = $this->model_masters->duplicatefunDocument($data);
                $doc = json_decode(json_encode($doc),true);
                if($doc)
                {
                    flashToast("documentExist","Document Already Added");
                    // echo "<script>alert('Document Already Added'); </script>";
                    $this->view('pages/doc_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->doc_add_update($data,$id);
                    if($result)
                    {
                        flashToast("documentUpdateSuccess","Document Updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Masters/DocList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateDocById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/doc_add_update',$data);
        }
        else
        {
            $this->view('pages/doc_add_update');
        }

    }
    public function DocList()
    {
        $result = $this->model_masters->Doc_list();
        $result = json_decode(json_encode($result),true);
        $data["doclist"] = $result;
        //  print_r($result);
        $this->view('pages/doc_list',$data);
    }
    public function DeleteByIdDoc($id)
    {
        $result = $this->model_masters->deletebyiddoc($id);
        if($result)
        {
            flashToast("deleteSuccess","Document Deleted Successfully");
            redirect('Masters/DocList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/DocList');
        }
    }
    //Designation Table Operation

    public function designation_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->designation_add_update($data);
                if(empty($errMsg))
                {
                    $desg = $this->model_masters->duplicatefunDesignation($data);
                    $desg = json_decode(json_encode($desg),true);
                    if($desg)
                    {
                        flashToast("designationExist","Designation Already Exist");
                        // echo "<script>alert('Designation Already Exist');</script>";
                        $this->view('pages/designation_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->designation_add_update($data);
                        if($result)
                        {
                            flashToast("designationAddSuccess","Designation Added Successfully");
                            echo "<script>window.location.href = '".URLROOT."/Masters/DesignationList';</script>";
                        }
                        else
                        {
                            flashToast("designationAddError","Designation Not Added");
                            echo "<script>window.location.href = '".URLROOT."/Masters/DeptList';</script>";
                        }
                    }
                }
                else
                {
                    //  echo "Hiiiiii";
                    $this->view('pages/designation_add_update',$errMsg);
                }
            }
            else //Update
            {
                $desg = $this->model_masters->gate_id_data($data);
                $desg = json_decode(json_encode($desg),true);
                if($desg)
                {
                    echo "<script>alert('Designation Already Exist');</script>";
                    $dept = $this->model_masters->Dept_list();
                    $dept = json_decode(json_encode($dept),true);
                    $data["dept"] = $dept;

                    $grade = $this->model_masters->Grade_list();
                    $grade = json_decode(json_encode($grade),true);
                    $data["grade"] = $grade;

                    $this->view('pages/designation_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->designation_add_update($data,$id);
                    if($result)
                    {
                        flashToast("designationUpdatedSuccess","Designation Updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Masters/DesignationList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateDesignationById($id);
            $data = json_decode(json_encode($result),true);
            //Gate Department List
            $dept = $this->model_masters->Dept_list();
            $dept = json_decode(json_encode($dept),true);
            $data["dept"] = $dept;
            //Gate Grade List
            $grade = $this->model_masters->Grade_list();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;

            $this->view('pages/designation_add_update',$data);
        }
        else
        {
            $dept = $this->model_masters->Dept_list();
            $dept = json_decode(json_encode($dept),true);
            $data["dept"] = $dept;
            //print_r($dept);

            $grade = $this->model_masters->Grade_list();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;
            //print_r($grade);
            $this->view('pages/designation_add_update',$data);
        }

    }
    public function DesignationList()
    {
        $result = $this->model_masters->Designation_list();
        $result = json_decode(json_encode($result),true);
        $data["designationlist"] = $result;
        //  print_r($result);
        $this->view('pages/designation_list',$data);
    }
    public function DeleteByIdDesignation($id)
    {
        $result = $this->model_masters->deletebyiddesignation($id);
        if($result)
        {
            flashToast("deleteSuccess","Designation Deleted successfully");
            redirect('Masters/DesignationList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/DesignationList');

        }
    }
    //User Table Operation
    public function user_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->user_add_update($data);
                if(empty($errMsg))
                {
                    //echo "hi";
                    $result = $this->model_masters->user_add_update($data);
                    if($result)
                    {
                        //echo "<script>alert('User Added Successfuly');</script>";
                        flashToast("userAddSuccess","User Added Successfully");
                        redirect("Masters/UserList");
                    }
                    else
                    {
                        //echo "askjak";
                        flashToast("userAddError","Fail To Add User");
                        redirect("Masters/UserList");

                    }
                }
                else
                {
                    $this->view('pages/user_add_update',$errMsg);
                }
            }else{ //update
                $result = $this->model_masters->user_add_update($data,$id);
                if($result)
                {
                    flashToast("userUpdateSuccess","User Updated Successfully");
                    redirect("Masters/UserList");
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateUserById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/user_add_update',$data);
        }
        else
        {
            $this->view('pages/user_add_update');
        }

    }
    public function UserList()
    {
        $result = $this->model_masters->User_list();
        $result = json_decode(json_encode($result),true);
        $data["userlist"] = $result;
        //  print_r($result);
        $this->view('pages/user_list',$data);
    }
    public function DeleteByIdUser($id)
    {
        $result = $this->model_masters->deletebyiduser($id);
        if($result)
        {
            flashToast("userDeleteSuccess","User Deleted Successfully");
            redirect('Masters/UserList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/UserList');

        }
    }
    //Employeement Type table Operation
    public function employeement_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->employeement_add_update($data);
                if(empty($errMsg))
                {
                    $employ = $this->model_masters->duplicatefunEmploy_Ment_Type($data);
                    $employ = json_decode(json_encode($employ),true);
                    if($employ)
                    {
                        flashToast("EmpTypeExist","Employment Type Already Added");
                        // echo "<script>alert('Employment Type Already Added');</script>";
                        $this->view('pages/employment_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->employeement_add_update($data);
                        if($result)
                        {
                            flashToast("EmpAddSuccess","Employment Type Added Successfully");
                            echo "<script>window.location.href = '".URLROOT."/Masters/EmployeementList';</script>";
                        }
                        else
                        {
                            flashToast("EmpAddError","Fail To Add Employment Type");
                            // echo "<script>alert('Fail To Add Employment Type'); </script>";
                            $this->view('pages/employment_add_update',$data);
                        }
                    }
                }
                else
                {
                    $this->view('pages/employment_add_update',$errMsg);
                }
            }
            else //Update
            {
                $employ = $this->model_masters->duplicatefunEmploy_Ment_Type($data);
                $employ = json_decode(json_encode($employ),true);
                if($employ)
                {
                    flashToast("EmpTypeExist","Employment Type Already Added");
                    // echo "<script>alert('Employment Type Already Added'); </script>";
                    $this->view('pages/employment_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->employeement_add_update($data,$id);
                    if($result)
                    {
                        flashToast("EmpTypeUpdateSuccess","Employment Type Updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Masters/EmployeementList';</script>";

                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateEmployeementById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/employment_add_update',$data);
        }
        else
        {
            $this->view('pages/employment_add_update');
        }

    }
    public function EmployeementList()
    {
        $result = $this->model_masters->Employeement_list();
        $result = json_decode(json_encode($result),true);
        $data["employeementlist"] = $result;
        //  print_r($result);
        $this->view('pages/employment_list',$data);
    }
    public function DeleteByIdEmployeement($id)
    {
        $result = $this->model_masters->deletebyidemployeement($id);
        if($result)
        {
            flashToast("EmpDeleteSuccess","Employment Deleted Successfully");
            redirect('Masters/EmployeementList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/EmployeementList');

        }
    }
    //Relation Table Operation
    public function relation_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->relation_add_update($data);
                if(empty($errMsg))
                {
                    $relation = $this->model_masters->duplicatefunRelation($data);
                    $relation = json_decode(json_encode($relation),true);
                    if($relation)
                    {
                        echo "<script>alert('Relation Already Added'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
                    }
                    else
                    {
                        $result = $this->model_masters->relation_add_update($data);
                        if($result)
                        {
                            echo "<script>alert('Relation Added Successfully'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Fail To Add Relation'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
                        }
                    }
                }
                else
                {
                    $this->view('pages/relation_add_update',$errMsg);
                }
            }
            else //Update
            {
                $relation = $this->model_masters->duplicatefunRelation($data);
                $relation = json_decode(json_encode($relation),true);
                if($relation)
                {
                    echo "<script>alert('Relation Already Added'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
                }
                else
                {
                    $result = $this->model_masters->relation_add_update($data,$id);
                    if($result)
                    {
                        echo "<script>alert('Relation Record Updated Successfully'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateRelationById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/relation_add_update',$data);
        }
        else
        {
            $this->view('pages/relation_add_update');
        }

    }
    public function RelationList()
    {
        $result = $this->model_masters->Relation_list();
        $result = json_decode(json_encode($result),true);
        $data["relationlist"] = $result;
        //  print_r($result);
        $this->view('pages/relation_list',$data);
    }
    public function DeleteByIdRelation($id)
    {
        $result = $this->model_masters->deletebyidrelation($id);
        if($result)
        {
            redirect('Masters/RelationList');
        }
        else
        {
            echo "<script>alert('Db Error'); window.location.href = '".URLROOT."/Masters/RelationList';</script>";
        }
    }
    //Ward Table Operation

    public function ward_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->ward_add_update($data);
                if(empty($errMsg))
                {
                    //echo "hi";
                    $result = $this->model_masters->ward_add_update($data);
                    if($result)
                    {
                        echo "<script>alert('Ward Added Successfully');</script>";
                        redirect("Masters/WardList");
                    }
                    else
                    {
                        redirect("Masters/WardList");

                    }
                }
                else
                {
                    //  echo "Hiiiiii";
                    $this->view('pages/ward_add_update',$errMsg);
                }
            }else{ //update
                $result = $this->model_masters->ward_add_update($data,$id);
                if($result)
                {
                    redirect("Masters/WardList");
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateWardById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/ward_add_update',$data);
        }
        else
        {
            $this->view('pages/ward_add_update');
        }

    }
    public function WardList()
    {
        $result = $this->model_masters->Ward_list();
        $result = json_decode(json_encode($result),true);
        $data["wardlist"] = $result;
        //  print_r($result);
        $this->view('pages/ward_list',$data);
    }
    public function DeleteByIdWard($id)
    {
        $result = $this->model_masters->deletebyidward($id);
        if($result)
        {
            redirect('Masters/WardList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/WardList');

        }
    }
    //Project Table Operation

    public function project_add_update($id=null)
    {
        $response = httpPost('Api_StateDistCity/getState');
        $response = json_decode($response, true);
        if($response['response']==true){
            $stateList = $response['data'];
        }
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->project_add_update($data);
                if(empty($errMsg))
                {
                    $project = $this->model_masters->duplicatefunProject($data);
                    //$project = json_decode(json_encode($project),true);
                    if($project){
                        flashToast("projectExist","Project Already Exits");
                        // echo "<script>alert('Project Already Exits'); </script>";
                        $data['stateList'] = $stateList;
                        $len = sizeof($data['state']);
                        $data['project_mstr_address_list'] = array();
                        for($i=0; $i<$len; $i++){
                            //echo $data['district'][$i];
                            $data['project_mstr_address_list'][$i]['project_mstr_address_id'] = $data['project_mstr_address_id'][$i];
                            $data['project_mstr_address_list'][$i]['state'] = $data['state'][$i];
                            $data['project_mstr_address_list'][$i]['district'] = $data['district'][$i];
                            $data['project_mstr_address_list'][$i]['state_dist_city_id'] = $data['state_dist_city_id'][$i];
                            $form = ['state'=>$data['state'][$i]];
                            $response = httpPostFile('Api_StateDistCity/getDistByState', $form);
                            $response = json_decode($response, true);
                            if($response['response']==true){
                                $data['project_mstr_address_list'][$i]['distList'] = $response['data'];
                            }
                            $form = ['dist'=>$data['district'][$i]];
                            //print_r($form);
                            $response = httpPostFile('Api_StateDistCity/getCityByDist', $form);
                            $response = json_decode($response, true);
                            if($response['response']==true){
                                $data['project_mstr_address_list'][$i]['cityList'] = $response['data'];
                            }
                        }
                        
                        $this->view('pages/project_add_update',$data);
                    }else{
                        $project_mstr_id = $this->model_masters->project_add_update($data);
                        if($project_mstr_id)
                        {
                            $len = sizeof($data['state_dist_city_id']);
                            for($i=0; $i<$len; $i++){
                                $project_mstr_address_id = $data['project_mstr_address_id'][$i];
                                $state_dist_city_id = $data['state_dist_city_id'][$i];
                                $this->model_masters->project_mstr_address_add($project_mstr_address_id, $project_mstr_id, $state_dist_city_id);
                            }
                            flashToast("projectAddSuccess","Project Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/ProjectList';</script>";
                        }
                        else
                        {
                            flashToast("projectAddError","Fail To Add Project");
                            // echo "<script>alert('Fail To Add Project'); </script>";
                            $data['stateList'] = $stateList;
                            $form = ['state'=>$data['state']];
                            $response = httpPostFile('Api_StateDistCity/getDistByState', $form);
                            $response = json_decode($response, true);
                            if($response['response']==true){
                                $data['distList'] = $response['data'];
                            }
                            $form = ['dist'=>$data['district']];
                            $response = httpPostFile('Api_StateDistCity/getCityByDist', $form);
                            $response = json_decode($response, true);
                            if($response['response']==true){
                                $data['cityList'] = $response['data'];
                            }
                            $this->view('pages/project_add_update',$data);
                        }
                    }
                }
                else
                {
                    //  echo "Hiiiiii";
                    $data['stateList'] = $stateList;
                    // echo "<pre>";
                    // print_r($data);
                    // return;
                    $this->view('pages/project_add_update', $data, $errMsg);
                }
            }
            else //Update
            {
                $project = $this->model_masters->duplicatefunProject_id($data);
                $project = json_decode(json_encode($project),true);
                if($project)
                {
                    flashToast("projectExist","Project Already Exits");
                    // echo "<script>alert('Project Already Added'); </script>";
                    $data['stateList'] = $stateList;
                    $len = sizeof($data['state']);
                    $data['project_mstr_address_list'] = array();
                    for($i=0; $i<$len; $i++){
                        $data['project_mstr_address_list'][$i]['project_mstr_address_id'] = $data['project_mstr_address_id'][$i];
                        $data['project_mstr_address_list'][$i]['state'] = $data['state'][$i];
                        $data['project_mstr_address_list'][$i]['district'] = $data['district'][$i];
                        $data['project_mstr_address_list'][$i]['state_dist_city_id'] = $data['state_dist_city_id'][$i];
                        $form = ['state'=>$data['state'][$i]];
                        $response = httpPostFile('Api_StateDistCity/getDistByState', $form);
                        $response = json_decode($response, true);
                        if($response['response']==true){
                            $data['project_mstr_address_list'][$i]['distList'] = $response['data'];
                        }
                        $form = ['dist'=>$data['district'][$i]];
                        $response = httpPostFile('Api_StateDistCity/getCityByDist', $form);
                        $response = json_decode($response, true);
                        if($response['response']==true){
                            $data['project_mstr_address_list'][$i]['cityList'] = $response['data'];
                        }
                    }
                    $this->view('pages/project_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->project_add_update($data,$id);
                    if($result)
                    {
                        $this->model_masters->project_mstr_address_status_disable($id);
                        $len = sizeof($data['state_dist_city_id']);
                        for($i=0; $i<$len; $i++){
                            $project_mstr_address_id = $data['project_mstr_address_id'][$i];
                            $state_dist_city_id = $data['state_dist_city_id'][$i];
                            $this->model_masters->project_mstr_address_add($project_mstr_address_id, $id, $state_dist_city_id);
                        }
                        flashToast("projectUpdateSuccess","Project Updated Successfully");
                        echo "<script> window.location.href = '".URLROOT."/Masters/ProjectList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateProjectById($id);
            $data = json_decode(json_encode($result),true);
            $projectMstrAddDetails = $this->model_masters->joinProjectMstrAddDetailsByProjectMstrId($id);
            if($projectMstrAddDetails){
                foreach ($projectMstrAddDetails as $key => $values) {
                    $form = ['state'=>$values['state']];
                    $response = httpPostFile('Api_StateDistCity/getDistByState', $form);
                    $response = json_decode($response, true);
                    if($response['response']==true){
                        $projectMstrAddDetails[$key]['distList'] = $response['data'];
                    }
                    $form = ['dist'=>$values['district']];
                    $response = httpPostFile('Api_StateDistCity/getCityByDist', $form);
                    $response = json_decode($response, true);
                    if($response['response']==true){
                        $projectMstrAddDetails[$key]['cityList'] = $response['data'];
                    }
                }
                $data['project_mstr_address_list'] = $projectMstrAddDetails;
            }
            
            $data['stateList'] = $stateList;
            $this->view('pages/project_add_update',$data);
        }
        else
        {
            $data['stateList'] = $stateList;
            // echo "<pre>";
            // print_r($data);
            // return;
            $this->view('pages/project_add_update', $data);
        }

    }
    public function ProjectList()
    {
        $data = array(null);
        $result = $this->model_masters->Project_list();
        if($result){
            $data["projectlist"] = $result;
            foreach ($data["projectlist"] as $key => $getValues) {
                $ID =  $getValues['_id'];
                $add = $this->model_masters->joinProjectMstrAddDetailsByProjectMstrId($ID);
                $data["projectlist"][$key]['fullAdd'] = $add;
            }
        }
        $this->view('pages/project_list',$data);
    }
    public function DeleteByIdProject($id)
    {
        $result = $this->model_masters->deletebyidproject($id);
        if($result)
        {
            flashToast("projectDeleteSuccess","Project Deleted Successfully");
            redirect('Masters/ProjectList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/ProjectList');

        }
    }
    //Leave Type Table Operation

    public function leave_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->leave_add_update($data);
                if(empty($errMsg))
                {
                    $leaveType = $this->model_masters->duplicatefunLeaveType($data);
                    $leaveType = json_decode(json_encode($leaveType),true);
                    if($leaveType)
                    {
                        flashToast("leaveTypeExist","Leave Type Already Added");
                        // echo "<script>alert('Leave Type Already Added');</script>";
                        $this->view('pages/leave_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->leave_add_update($data);
                        if($result)
                        {
                            flashToast("leaveTypeAddSuccess","Leave Type Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/LeaveList';</script>";
                        }
                        else
                        {
                            flashToast("leaveTypeAddError","Fail To Add Leave Type");
                            $this->view('pages/leave_add_update',$data);
                        }
                    }
                }
                else
                {
                    $this->view('pages/leave_add_update',$errMsg);
                }
            }
            else //Update
            {
                $leaveType = $this->model_masters->duplicatefunLeaveType_id($data);
                $leaveType = json_decode(json_encode($leaveType),true);
                if($leaveType)
                {
                    flashToast("leaveTypeExist","Leave Type Already Added");
                    // echo "<script>alert('Leave Type Already Added');</script>";
                    $this->view('pages/leave_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->leave_add_update($data);
                    if($result)
                    {
                        flashToast("leaveTypeUpdateSuccess","Leave Type Updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Masters/LeaveList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_masters->gateLeaveById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/leave_add_update',$data);
        }
        else
        {
            $this->view('pages/leave_add_update');
        }

    }
    public function LeaveList()
    {
        $result = $this->model_masters->Leave_list();
        $result = json_decode(json_encode($result),true);
        $data["leavelist"] = $result;
        //  print_r($result);
        $this->view('pages/leave_list',$data);
    }
    public function DeleteByIdLeave($id)
    {
        $result = $this->model_masters->deletebyidleave($id);
        if($result)
        {
            flashToast("leaveDeletSuccess","Leave Deleted Successfully");
            echo "<script> window.location.href = '".URLROOT."/Masters/LeaveList'</script>";
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/LeaveList');

        }
    }
    //Deduction table Operation
    public function deduction_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->deduction_add_update($data);
                if(empty($errMsg))
                {
                    $deduction = $this->model_deduction->duplicatefunDeduction($data);
                    $deduction = json_decode(json_encode($deduction),true);
                    if($deduction)
                    {
                        echo "<script>alert('Deduction Already Added'); window.location.href = '".URLROOT."/Masters/DeductionList';</script>";
                    }
                    else
                    {
                        $result = $this->model_deduction->deduction_add_update($data);
                        if($result)
                        {
                            echo "<script>alert('Deduction Added Successfully'); window.location.href = '".URLROOT."/Masters/DeductionList';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Fail To Add Deduction'); window.location.href = '".URLROOT."/Masters/DeductionList';</script>";

                        }
                    }
                }
                else
                {
                    //  echo "Hiiiiii";
                    $this->view('pages/deduction_add_update',$errMsg);
                }
            }
            else //Update
            {
                $deduction = $this->model_deduction->duplicatefunDeduction($data);
                $deduction = json_decode(json_encode($deduction),true);
                if($deduction)
                {
                    echo "<script>alert('Deduction Already Added'); window.location.href = '".URLROOT."/Masters/DeductionList';</script>";
                }
                else
                {
                    $result = $this->model_deduction->deduction_add_update($data,$id);
                    if($result)
                    {
                        echo "<script>alert('Deduction Updated Successfully'); window.location.href = '".URLROOT."/Masters/DeductionList';</script>";
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_deduction->gateDeductionById($id);
            $data = json_decode(json_encode($result),true);

            $employment = $this->model_masters->Employeement_list();
            $employment = json_decode(json_encode($employment),true);
            $data["employment"] = $employment;
            $grade = $this->model_masters->Grade_list();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;

            $this->view('pages/deduction_add_update',$data);
        }
        else
        {
            $employment = $this->model_masters->Employeement_list();
            $employment = json_decode(json_encode($employment),true);
            $data["employment"] = $employment;
            //print_r($dept);

            $grade = $this->model_masters->Grade_list();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;
            //print_r($grade);
            $this->view('pages/deduction_add_update',$data);
        }

    }
    public function DeductionList()
    {
        $result = $this->model_deduction->Deduction_list();
        $result = json_decode(json_encode($result),true);
        $data["deductionlist"] = $result;
        //  print_r($result);
        $this->view('pages/deduction_list',$data);
    }
    public function DeleteByIdDeduction($id)
    {
        $result = $this->model_deduction->deletebyiddeduction($id);
        if($result)
        {
            redirect('Masters/DeductionList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/DeductionList');

        }
    }
    //Sub Course Table Operation

    public function sub_qualification_add_update($id=null,$runtime_add=null,$walk_id=null,$step=null,$jpd=null)
    {
      
        $data=array(null);
       
        if(isPost())
        {
            
            
            $data = postData();
            if($id=='runtime'){
                $data['_id']="";
            }

            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_masters->sub_qualification_add_update($data);
                if(empty($errMsg))
                {
                    $course = $this->model_masters->sub_duplicatefunQualification($data);
                    $course = json_decode(json_encode($course),true);
                    if($course)
                    {
                        if($id=='runtime'){
                            echo "duplicate";
                            return;
                        }
                        flashToast("subQualExist","SubQualification Already Added");
                        // echo "<script>alert('Sub Qualification Already Added');</script>";
                        $this->view('pages/sub_qualification_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_masters->sub_qualification_add_update($data);
                        if($result)
                        {
                            if($id=='runtime'){
                                echo "success";
                                return;
                            }
                            flashToast("subQualAddSuccess","Stream Added Successfully");
                            echo "<script> window.location.href = '".URLROOT."/Masters/sub_QualificationList';</script>";
                        }
                        else
                        {
                            if($runtime_add=='radd'){
                                if($id=='runtime'){
                                    echo "fail";
                                    return;
                                }
                                header("Location:". URLROOT.'/Candidate/walkincandidateAddUpdate/');
                                return;
                            }
                            // echo "<script>alert('Fail To Add Stream');</script>";
                            flashToast("subQualAddError","Fail To Add Stream");
                            $this->view('pages/sub_qualification_add_update',$data);
                        }
                    }
                }
                else
                {
                    if($runtime_add=='radd'){
                        if($walk_id!=null){
                            $this->view('pages/walkin_candidate_add_update/'.$walk_id.'/3/'.$jpd);
                            header("Location:". URLROOT.'/Candidate/walkincandidateAddUpdate/'.$jpd.'/3/'.$walk_id);
                            return;
                        }
                        header("Location:". URLROOT.'/Candidate/walkincandidateAddUpdate/');
                        return;
                    }
                    $this->view('pages/sub_qualification_add_update',$errMsg);
                }
            }
            else //Update
            {
                $course = $this->model_masters->sub_duplicatefunQualification($data);
                $course = json_decode(json_encode($course),true);
                if($course)
                {
                    flashToast("subQualExist","Stream Already Added");
                    // echo "<script>alert('Stream Already Added'); </script>";
                    $course = $this->model_masters->gateCourseList();

                    $course = json_decode(json_encode($course),true);
                    $data["courselist"] = $course;
                    $this->view('pages/sub_qualification_add_update',$data);
                }
                else
                {
                    $result = $this->model_masters->sub_qualification_add_update($data,$id);
                    if($result)
                    {
                        flashToast("subQualUpdateSuccess","Stream Updated Successfully");
                        echo "<script> window.location.href = '".URLROOT."/Masters/sub_QualificationList';</script>";
                    }
                }

            }
        }
        else if(isset($id))
        {

            $result = $this->model_masters->sub_gateQualificationById($id);
            $data = json_decode(json_encode($result),true);

            $course = $this->model_masters->gateCourseList();
            $course = json_decode(json_encode($course),true);
            $data["courselist"] = $course;

            $this->view('pages/sub_qualification_add_update',$data);
        }
        else
        {
            $course = $this->model_masters->gateCourseList();
            $course = json_decode(json_encode($course),true);
            $data["courselist"] = $course;
            $this->view('pages/sub_qualification_add_update',$data);
        }

    }
    public function sub_QualificationList()
    {
        $result = $this->model_masters->sub_Qualification_list();
        $result = json_decode(json_encode($result),true);
        $data["sub_qualificationlist"] = $result;
        //  print_r($result);
        $this->view('pages/sub_qualification_list',$data);
    }
    public function sub_DeleteByIdQualification($id)
    {
        $result = $this->model_masters->sub_deletebyidqualification($id);
        if($result)
        {
            flashToast("subQualDeleteSuccess","SubQualification Deleted Successfully");
            redirect('Masters/sub_QualificationList');
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            redirect('Masters/sub_QualificationList');

        }
    }
    public function earning_deduction_add_update()
    {
        $data = (array)null;
        $this->view('pages/earning_deduction_add_update',$data);
    }
}
?>