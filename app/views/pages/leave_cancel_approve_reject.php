<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Leave Cancel Approval/Rejection</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li class="active">Leave Cancel Approval/Rejection</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <div id="page-content">

                   <div class="form-horizontal">
                     <div class="form-group">
                        <div class="col-md-8">

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Leave Cancel Approval/Rejection</h3>
                                </div>
                               <div class="panel-body">
                                   <form method="post" action="<?=URLROOT;?>/NotificationController/leave_cancel_approve_reject_by_head/<?=$data['id'];?>/<?=$data['noti_id'];?>" >
                                   <div class="form-group">
                                       <div class="input-group date col-md-5" >
						                  <input type="hidden" id="id" name="id" class="form-control"  value="<?=(isset($data['id']))?$data['id']:"";?>" />
                                           <input type="hidden" id="noti_id" name="noti_id" class="form-control"  value="<?=(isset($data['noti_id']))?$data['noti_id']:"";?>" />
                                           <input type="hidden" id="_status" name="_status" class="form-control"  value="<?=(isset($data["emp_leave_det"]['_status']))?$data["emp_leave_det"]['_status']:"";?>" />
                                           <input type="hidden" id="emp_name" name="emp_name" class="form-control"  value="<?=(isset($data["emp_leave_det"]['emp_name']))?$data["emp_leave_det"]['emp_name']:"";?>" />
                                           <input type="hidden" id="rep_employee_id" name="rep_employee_id" class="form-control"  value="<?=(isset($data["emp_leave_det"]['employee_id']))?$data["emp_leave_det"]['employee_id']:"";?>" />  
                                           <input type="hidden" id="rep_designation_mstr_id" name="rep_designation_mstr_id" class="form-control"  value="<?=(isset($data["emp_leave_det"]['designation_mstr_id']))?$data["emp_leave_det"]['designation_mstr_id']:"";?>" />  
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" >Employee Name</label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["first_name"]." ". $data["emp_leave_det"]["middle_name"]." ". $data["emp_leave_det"]["last_name"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-md-4" >Gender</label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["gender"];?>
                                       </div>
                                    </div>

                                   <div class="form-group">
                                      <label class="col-md-4" >Leave from date </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["leave_from_date"];?>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" >Leave to date</label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["leave_to_date"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > No. of leave days : </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["leave_days"].' days';?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Type  : </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_type"]["leave_type"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Reason  : </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["leave_reason"];?>
                                       </div>
                                   </div>
								   <div class="form-group">
                                      <label class="col-md-4" > Leave Cancel Reason  : </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["cancel_remarks"];?>
                                       </div>
                                   </div>


                                   <div class="form-group">
                                      <label class="col-md-6 text-danger" > Do you want to approve his/her request?</label>
                                       <div class="col-md-6 text-danger">
                                           <input type="radio" id="approval_yes" name="radio_approval" value="Yes" /> Yes
                                           <input type="radio" id="approval_no" name="radio_approval" value="No" /> No
                                       </div>
                                   </div>
                                    <div class="form-group" id="remarks_div">
                                      <label class="col-md-4"> Remarks : </label>
                                       <div class="col-md-8">
                                           <textarea class="form-control m-t-xxs" id="remarks" name="remarks" type="text" maxlength="250"  ></textarea>
                                       </div>
                                   </div>
                                   <div class="form-group" id="button_div">
                                      <label class="col-md-4" > &nbsp;</label>
                                       <div class="col-md-8">
                                           <input class="btn btn-mint" type="submit" name="btn_submit" id="btn_submit" value="" />
                                       </div>
                                   </div>
                                    </form>
                                </div>

                            </div>
                         </div>
                     </div>
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function(){
    $('#remarks_div').css('display','none');
    $('#button_div').css('display','none');
    $("#approval_yes").click(function(){
        $('#remarks_div').css('display','block');
        $('#button_div').css('display','block');
        $('#btn_submit').val('Approve');
    });
    $("#approval_no").click(function(){
        $('#remarks_div').css('display','block');
        $('#button_div').css('display','block');
        $('#btn_submit').val('Reject');
    });

        $("#btn_submit").click(function () {
           var remarks= $('#remarks').val();

                if(remarks=="")
                {
                    alert("Please Enter Remarks!!!");
                     $('#remarks').focus();
                    return false;
                }
                return true;

	    });
    });


</script>


