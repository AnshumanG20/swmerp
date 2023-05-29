<?php
    class LeaveDays extends Controller
    {
        public function __construct()
        {
            if(!isLoggedIn()){ redirect('Login'); }
             $this->model_masters = $this->model('model_masters');
            $this->model_leavedays = $this->model('model_leavedays');
            $this->Validate_leavedays = $this->validator('Validate_leavedays');
        }
        public function index()
        {

        }
          public function leavetype_add_update($id=null)
        {
            $data =(array)null;
                if(isPost())
                {
                    $data = postData();
                   //print_r($data);
                    if($data['_id']=="") // insert
                    {
                         $errMsg = $this->Validate_leavedays->leavetype_add_update($data);
                          if(empty($errMsg))
                         {
                              $leaveDays = $this->model_leavedays->duplicatefunLeaveDays($data);
                              $leaveType = json_decode(json_encode($leaveDays),true);
                              if($leaveDays)
                              {
                                  echo "<script>alert('Leave Days Already Added'); window.location.href = '".URLROOT."/LeaveDays/LeaveList';</script>";
                                 $this->view('pages/leave_add_update');
                              }
                              else
                              {
                                  $result = $this->model_leavedays->leavetype_add_update($data);
                                  if($result)
                                  {
                                      echo "<script>alert('Leave Days Added Successfuly'); window.location.href = '".URLROOT."/LeaveDays/LeaveList';</script>";
                                  }
                                  else
                                  {
                                       echo "<script>alert('Fail To Add Leave Days'); window.location.href = '".URLROOT."/LeaveDays/LeaveList';</script>";

                                  }
                              }
                           }
                           else
                           {
                             //  echo "Hiiiiii";
                              $this->view('pages/leavetype_add_update',$errMsg);
                           }
                    }
                    else //Update
                    {
                        $leaveDays = $this->model_leavedays->duplicatefunLeaveDays($data);
                        $leaveType = json_decode(json_encode($leaveDays),true);
                        if($leaveDays)
                        {
                             echo "<script>alert('Leave Days Already Added'); window.location.href = '".URLROOT."/LeaveDays/LeaveList';</script>";
                         }
                        else
                        {
                            $result = $this->model_leavedays->leavetype_add_update($data,$id);
                            if($result)
                            {
                                  echo "<script>alert('Leave Days Updated Successfuly'); window.location.href = '".URLROOT."/LeaveDays/LeaveList';</script>";
                            }
                        }
                    }
              }
          else if(isset($id))
         {
              $result = $this->model_leavedays->gateLeaveById($id);
              $data = json_decode(json_encode($result),true);

              $dept = $this->model_masters->Leave_list();
              $dept = json_decode(json_encode($dept),true);
              $data["leave"] = $dept;
              $grade = $this->model_masters->Grade_list();
              $grade = json_decode(json_encode($grade),true);
              $data["grade"] = $grade;

              $this->view('pages/leavetype_add_update',$data);
          }
          else
        {
              $dept = $this->model_masters->Leave_list();
              $dept = json_decode(json_encode($dept),true);
              $data["leave"] = $dept;
              //print_r($dept);

              $grade = $this->model_masters->Grade_list();
              $grade = json_decode(json_encode($grade),true);
              $data["grade"] = $grade;
              //print_r($grade);
          $this->view('pages/leavetype_add_update',$data);
        }

    }
     public function LeaveList()
        {
           $result = $this->model_leavedays->Leave_list();
           $result = json_decode(json_encode($result),true);
           $data["leavelist"] = $result;
       //  print_r($result);
           $this->view('pages/leavedays_list',$data);
        }
        public function DeleteByIdLeave($id)
        {
           $result = $this->model_leavedays->deletebyidleave($id);
            if($result)
            {
                redirect('LeaveDays/LeaveList');
            }
            else
            {
                echo "<script>alert('Db Error');</script>";
               redirect('LeaveDays/LeaveList');

            }
        }

    }
?>