<?php 
class Earning_Deduction extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_earning_deduction = $this->model('model_earning_deduction');
        $this->Validate_earning_deduction = $this->validator('Validate_earning_deduction');
    }
    public function index()
    {

    }

    public function earning_deduction_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_earning_deduction->earning_deduction_add_update($data);
                if(empty($errMsg))
                {
                    $earning = $this->model_earning_deduction->duplicatefunEarning_Deduction($data);
                    $earning = json_decode(json_encode($earning),true);
                    if($earning)
                    {
                        flashToast("grnetExist","Grade & Employment Type Already Added,Please Select Another Grade And Employment Type");
                        // echo "<script>alert('Grade & Employment Type Already Added,Please Select Another Grade And Employment Type');</script>";
                        //Grade Data.
                        $grade = $this->model_earning_deduction->gate_grade();
                        $grade = json_decode(json_encode($grade),true);
                        $data["grade"] = $grade;
                        //Employment Type data.
                        $employment =$this->model_earning_deduction->gate_employment();
                        $employment = json_decode(json_encode($employment),true);
                        $data["employment"] = $employment;

                        $this->view('pages/earning_deduction_add_update',$data);
                    }
                    else
                    {

                        $result = $this->model_earning_deduction->earning_deduction_add_update($data);
                        if($result)
                        {
                            flashToast("EarningAddSuccess","Earning & Deductions Added Successfuly");
                            echo "<script>window.location.href = '".URLROOT."/Earning_Deduction/Earning_Deduction_List';</script>";
                        }
                        else
                        {
                            flashToast("EarningAddError","Fail To Add Earning & Deduction");
                            // echo "<script>alert('Fail To Add Earning & Deduction');</script>";

                            //Grade Data.
                            $grade = $this->model_earning_deduction->gate_grade();
                            $grade = json_decode(json_encode($grade),true);
                            $data["grade"] = $grade;
                            //Employment Type data.
                            $employment =$this->model_earning_deduction->gate_employment();
                            $employment = json_decode(json_encode($employment),true);
                            $data["employment"] = $employment;

                            $this->view('pages/earning_deduction_add_update',$data);

                        }
                    }

                }
                else
                {
                    //Grade Data.
                    $grade = $this->model_earning_deduction->gate_grade();
                    $grade = json_decode(json_encode($grade),true);
                    $data["grade"] = $grade;
                    //Employment Type data.
                    $employment =$this->model_earning_deduction->gate_employment();
                    $employment = json_decode(json_encode($employment),true);
                    $data["employment"] = $employment;

                    $this->view('pages/earning_deduction_add_update',$errMsg,$data);
                }
            }
            else //update
            {
                $earning = $this->model_earning_deduction->gate_id($data);
                $earning = json_decode(json_encode($earning),true);
                if($earning)
                {
                    flashToast("grnetExist","Grade & Employment Type Already Added,Please Select Another Grade And Employment Type");
                    // echo "<script>alert('Grade & Employment Type Already Added,Please Select Another Grade And Employment Type');</script>";
                    //Grade Data.
                    $grade = $this->model_earning_deduction->gate_grade();
                    $grade = json_decode(json_encode($grade),true);
                    $data["grade"] = $grade;

                    //Employment Type data.
                    $employment =$this->model_earning_deduction->gate_employment();
                    $employment = json_decode(json_encode($employment),true);
                    $data["employment"] = $employment;

                    $this->view('pages/earning_deduction_add_update',$data);
                }
                else
                {
                    $result = $this->model_earning_deduction->earning_deduction_add_update($data,$id);
                    if($result)
                    {
                        flashToast("EarningUpdateSuccess","Earning & Deduction Updated Successfuly");
                        echo "<script>window.location.href = '".URLROOT."/Earning_Deduction/Earning_Deduction_List';</script>";
                    }
                    else
                    {
                        flashToast("EarningUpdateError","Fail To Updated Earning & Deduction");
                        // echo "<script>alert('Fail To Updated Earning & Deduction'); </script>";
                        $this->view('pages/earning_deduction_add_update',$errMsg);
                    }
                }
            }
        }
        else if(isset($id))
        {
            $result = $this->model_earning_deduction->gateEarning_Deduction_By_Id($id);
            $data = json_decode(json_encode($result),true);

            //Grade Data.
            $grade = $this->model_earning_deduction->gate_grade();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;

            //Employment Type data.
            $employment =$this->model_earning_deduction->gate_employment();
            $employment = json_decode(json_encode($employment),true);
            $data["employment"] = $employment;

            $this->view('pages/earning_deduction_add_update',$data);
        }
        else
        {
            //Grade Data.
            $grade = $this->model_earning_deduction->gate_grade();
            $grade = json_decode(json_encode($grade),true);
            $data["grade"] = $grade;

            //Employment Type data.
            $employment =$this->model_earning_deduction->gate_employment();
            $employment = json_decode(json_encode($employment),true);
            $data["employment"] = $employment;

            $this->view('pages/earning_deduction_add_update',$data);
        }

    }
    public function Earning_Deduction_List()
    {
        $result = $this->model_earning_deduction->Earning_Deduction_List();
        $earninglist = json_decode(json_encode($result),true);
        $data["earninglist"] = $earninglist;
        $this->view('pages/earning_deduction_list',$data);
    }
    public function deletebyid_Earning_Deduction($id)
    {
        $result = $this->model_earning_deduction->deletebyid_Earning_Deduction($id);
        if($result)
        {
            flashToast("EarningDeleteSuccess","Record Deleted Successfuly");
            echo "<script>window.location.href = '".URLROOT."/Earning_Deduction/Earning_Deduction_List';</script>";
        }
        else
        {
            echo "<script>alert('Db Error'); window.location.href = '".URLROOT."/Earning_Deduction/Earning_Deduction_List';</script>";

        }
    }
}

?>