<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Leave Cancel</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li class="active">Leave Cancel</li>
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
                                    <h3 class="panel-title">Leave Cancel</h3>
                                </div>
                               <div class="panel-body">
                                   <form method="post" action="<?=URLROOT;?>/LeaveController/leave_cancel/<?=$data['id'];?>" >
                                   <div class="form-group">
                                       <div class="input-group date col-md-5" >
						                  <input type="hidden" id="id" name="id" class="form-control"  value="<?=(isset($data['id']))?$data['id']:"";?>" />
                                           <input type="hidden" id="_status" name="_status" class="form-control"  value="<?=(isset($data["emp_leave_det"]['_status']))?$data["emp_leave_det"]['_status']:"";?>" />
                                           <input type="hidden" id="emp_name" name="emp_name" class="form-control"  value="<?=(isset($data["emp_leave_det"]['emp_name']))?$data["emp_leave_det"]['emp_name']:"";?>" />
                                           <input type="hidden" id="reporting_employee_id" name="reporting_employee_id" class="form-control"  value="<?=(isset($data["emp_leave_det"]['reporting_head_emp_id']))?$data["emp_leave_det"]['reporting_head_emp_id']:"";?>" />

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
                                           <?php
                                           
                                            echo $data["emp_leave_det"]["leave_from_date"];
                                           
                                           ?>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" >Leave to date</label>
                                       <div class="col-md-8">
                                           <?php
                                           
                                            echo $data["emp_leave_det"]["leave_to_date"];
                                           
                                           ?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > No. of leave days : </label>
                                       <div class="col-md-8">
                                           <?php
                                           
                                            echo $data["emp_leave_det"]["leave_days"].' days';
                                           
                                           ?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Type  : </label>
                                       <div class="col-md-8">
                                           <?php

                                            echo $data["emp_leave_type"]["leave_type"];

                                           ?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Reason  : </label>
                                       <div class="col-md-8">
                                           <?=$data["emp_leave_det"]["leave_reason"];?>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                      <label class="col-md-4"> Remarks : </label>
                                       <div class="col-md-8">
                                           <textarea class="form-control m-t-xxs" id="remarks" name="remarks" type="text" maxlength="250"  ></textarea>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4"> &nbsp;</label>
                                       <div class="col-md-8">
                                           <input class="btn btn-mint" type="submit" name="btn_submit" id="btn_submit" value="Submit" />
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
        $("#btn_submit").click(function () {
            var remarks= $('#remarks').val();
            if($(this).val()=="Submit")
            {
                if(remarks=="")
                {
                    alert("Please Enter Remarks!!!");
                     $('#remarks').focus();
                    return false;
                }
                return true;
            }
	    });
    });


</script>


