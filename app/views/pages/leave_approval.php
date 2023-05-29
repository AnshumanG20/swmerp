<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Leave Approve/Reject</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li class="active">Leave Approve/Reject</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <div id="page-content">

                   <div class="form-horizontal">
                     <div class="form-group">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Leave Approve/Reject</h3>
                                </div>
                               <div class="panel-body">
                                   <form method="post" action="<?=URLROOT;?>/NotificationController/leave_approve_reject_by_head/<?=$data['id'];?>/<?=$data['noti_id'];?>" >
                                   <div class="form-group">
                                       <div class="input-group date col-md-5" >
						                  <input type="hidden" id="id" name="id" class="form-control"  value="<?=(isset($data['id']))?$data['id']:"";?>" />
                                          <input type="hidden" id="noti_id" name="noti_id" class="form-control"  value="<?=(isset($data['noti_id']))?$data['noti_id']:"";?>" />
                                           <input type="hidden" id="rep_employee_id" name="rep_employee_id" class="form-control"  value="<?=(isset($data["empdetList"]['employee_id']))?$data["empdetList"]['employee_id']:"";?>" />  
                                           <input type="hidden" id="noti_title" name="noti_title" class="form-control"  value="<?=(isset($data["empdetList"]['emp_name']))?$data["empdetList"]['emp_name']:"";?>" />
                                           <input type="hidden" id="req_leave_type_id" name="req_leave_type_id" class="form-control"  value="<?=(isset($data["empdetList"]['leave_type_id']))?$data["empdetList"]['leave_type_id']:"";?>" /> 
                                           <input type="hidden" id="req_leave_from_date" name="req_leave_from_date" class="form-control"  value="<?=(isset($data["empdetList"]['leave_from_date']))?$data["empdetList"]['leave_from_date']:"";?>" /> 
                                           <input type="hidden" id="req_leave_to_date" name="req_leave_to_date" class="form-control"  value="<?=(isset($data["empdetList"]['leave_to_date']))?$data["empdetList"]['leave_to_date']:"";?>" />  
                                           <input type="hidden" id="req_leave_days" name="req_leave_days" class="form-control"  value="<?=(isset($data["empdetList"]['leave_days']))?$data["empdetList"]['leave_days']:"";?>" />  
                                           <input type="hidden" id="rep_designation_mstr_id" name="rep_designation_mstr_id" class="form-control"  value="<?=(isset($data["empdetList"]['designation_mstr_id']))?$data["empdetList"]['designation_mstr_id']:"";?>" />  
						               </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" >Employee Name</label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["first_name"]." ". $data["empdetList"]["middle_name"]." ". $data["empdetList"]["last_name"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-md-4" > Gender </label>
                                       <div class="col-md-8">
                                           <?php echo $data["empdetList"]["gender"];?>
                                       </div>
                                    </div>

                                   <div class="form-group">
                                      <label class="col-md-4" >Leave from date </label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["leave_from_date"];?>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" >Leave to date</label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["leave_to_date"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > No. of leave days : </label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["leave_days"].' days';?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Type  : </label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["leave_type"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-4" > Leave Reason  : </label>
                                       <div class="col-md-8">
                                           <?=$data["empdetList"]["leave_reason"];?>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-6 text-danger" > Do you want to approve <?php echo ($data["empdetList"]["gender"]=='Male')?'his':'her'; ?> leave?</label>
                                       <div class="col-md-6 text-danger">
                                           <input type="radio" id="approval_yes" name="radio_approval" value="Yes" /> Yes
                                           <input type="radio" id="approval_no" name="radio_approval" value="No" /> No
                                       </div>
                                   </div>

                                   <div class="form-group" id="leave_type_div">
                                      <label class="col-md-3" > Leave Type <span class="text-danger">*</span></label>
                                       <div class="col-md-9">
                                           <select id="leave_type_id" name="leave_type_id" class="form-control">
                                                 <option value="-">--Select--</option>
                                                 <?php foreach($data["leave"] as $value):?>
                                                 <option value="<?=$value["_id"]?>" <?=(isset($data["empdetList"]["leave_type_id"]))?($data["empdetList"]["leave_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["leave_type"]?></option>
                                                 <?php endforeach;?>
                                             </select>
                                       </div>
                                   </div>
									<div class="form-group" id="avail_leave_div">
										  <label class="col-md-3 " for="leave_type">Available Leave <span class="text-danger">*</span></label>
										 <div class="col-md-9">
											 <input type="text" class="form-control" id="leave_type_days" name="leave_type_days" value="<?=$data["availl_leave"];?>" readonly />

										 </div>
									</div>
                                    <div class="form-group" id="leave_from_date_div">
                                          <label class="col-md-3" >From Date <span class="text-danger">*</span></label>
                                           <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
						                       <input type="text" id="leave_from_date" name="leave_from_date" value="<?=(isset($data['empdetList']['leave_from_date']))?$data['empdetList']['leave_from_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select From Date">
						                       <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                   </div>
                                     </div>
                                     <div class="form-group" id="leave_to_date_div">
                                       <label class="col-md-3" >To Date <span class="text-danger">*</span></label>
                                        <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
						                   <input type="text" id="leave_to_date" name="leave_to_date" value="<?=(isset($data['empdetList']['leave_to_date']))?$data['empdetList']['leave_to_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select To Date">
						                   <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                 </div>
                                     </div>
                                    <div class="form-group" id="leave_days_div">
                                      <label class="col-md-3" > Leave Days <span class="text-danger">*</span></label>
                                       <div class="col-md-9">
                                           
                                           <input class="form-control m-t-xxs" id="approval_leave_days" name="approval_leave_days" type="text" value="<?=$data["empdetList"]["leave_days"];?>" onkeypress="return isNum(event);" maxlength="3" readonly  />
                                       </div>
                                   </div>
                                   <div class="form-group" id="remarks_div">
                                      <label class="col-md-3" > Remarks <span class="text-danger">*</span></label>
                                       <div class="col-md-9">
                                           <textarea class="form-control m-t-xxs" id="remarks" name="remarks" type="text" maxlength="250"  ></textarea>
                                       </div>
                                   </div>
                                   <div class="form-group" id="button_div">
                                      <label class="col-md-3" > &nbsp;</label>
                                       <div class="col-md-9">
                                           <input class="btn btn-mint" type="submit" name="btn_submit" id="btn_submit" value="" />
                                       </div>
                                   </div>
                                    </form>
                                </div>

                            </div>
                         </div>
                         <div class="col-md-6">
					        <div class="panel panel-info">
					            <div class="panel-heading">
					                <h3 class="panel-title">Leave Details Of Current Financial Year-<?=$data['fy'];?></h3>
					            </div>

					                <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Leave Type</th>
                                                        <th>Total Leave</th>
                                                        <th>Available Leave</th>
                                                    </tr>
                                                </thead>

                                                
                                                <tbody>
                                                    <?php
                                                    //print_r($data['leave_details']);
                                                    if(isset($data["leave_details"])):
                                                    if($data["leave_details"]==""):
                                                    ?>
                                                    <tr>
                                                        <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                                    </tr>
                                                    <?php else:
                                                    $i=0;
                                                    foreach ($data["leave_details"] as $value):
                                                    ?>
                                                    <tr>
                                                        <td><?=$value["leave_type"];?></td>
                                                        <td><?=$value["leave_days"];?></td>
                                                        <td><?php
                                                            if(($value["leave_days"]-$value["available"])>0)
                                                            {
                                                                echo ($value["leave_days"]-$value["available"]);
                                                            }
                                                            else
                                                            {
                                                                echo "0";
                                                            }
                                                            ?></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;  ?>
                                                    <?php endif;  ?>
													<tr>
														<td>UnPaid Leave</td>
														<td><?=$data["paidleaveList"]["total_paid_leave"];?></td>
														<td>N/A</td>
													</tr>
                                                </tbody>
                                            </table>
                                        </div>
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
     $('#leave_from_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#leave_to_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
        autoclose:true,
        autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
        }); 
    $(document).ready(function(){
    $('#leave_type_div').css('display','none');
    $('#remarks_div').css('display','none');
    $('#leave_from_date_div').css('display','none');
    $('#leave_to_date_div').css('display','none');
    $('#button_div').css('display','none');
    $('#leave_days_div').css('display','none');
    $('#avail_leave_div').css('display','none');
    $("#approval_yes").click(function(){
        $('#leave_type_div').css('display','block');
        $('#leave_from_date_div').css('display','block');
        $('#leave_to_date_div').css('display','block');
        $('#remarks_div').css('display','block');
        $('#button_div').css('display','block');
        $('#leave_days_div').css('display','block');
        $('#avail_leave_div').css('display','block');
        $('#btn_submit').val('Approve');
    });
    $("#approval_no").click(function(){
        $('#leave_type_div').css('display','none');
        $('#leave_from_date_div').css('display','none');
        $('#leave_to_date_div').css('display','none');
        $('#remarks_div').css('display','block');
        $('#button_div').css('display','block');
        $('#leave_days_div').css('display','none');
        $('#avail_leave_div').css('display','none');
        $('#btn_submit').val('Reject');
    });
        $("#leave_type_id").change(function ()
    {
        var leave_type_id= $("#leave_type_id").val();
        var leave_type_days= $("#leave_type_days").val();
        var rep_employee_id= $("#rep_employee_id").val();
        if(leave_type_id!="")
        {
            $.ajax({

            type:"POST",
            url: "<?=URLROOT;?>/LeaveController/ajaxAvailableleaveListByEmpId",
            dataType: "json",
            data: {"leave_type_id":leave_type_id, "rep_employee_id":rep_employee_id},
            beforeSend: function() {

                //$("#loadingDiv").show();
            },
            success:function(data){
                //console.log(data);
                //$("#loadingDiv").hide();
                if(data.response==true){
                    //alert(data.data.designation_mstr_id);

                    $("#leave_type_days").val(data.data);
                }
            }
         });
        }


    });
        $("#leave_from_date").change(function ()
        {
        var leave_from_date= $("#leave_from_date").val();
        var req_leave_from_date= $("#req_leave_from_date").val();
         var req_leave_to_date= $("#req_leave_to_date").val();
        var leave_to_date= $("#leave_to_date").val();

        var startDay = new Date(leave_from_date);
        var endDay = new Date(leave_to_date);
        var rstartDay = new Date(req_leave_from_date);
        var rendDay = new Date(req_leave_to_date);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        daysDiff = Math.floor(days+1);
        if(leave_to_date!="")
        {
        $("#approval_leave_days").val(daysDiff);
        }
        if(((startDay.getTime())<(rstartDay.getTime())) || ((startDay.getTime())>(rendDay.getTime())))
        {
            alert("Please select valid To Date");
            $("#approval_leave_days").val('');
            $("#leave_from_date").val('');
        }
    });

        $("#leave_to_date").change(function ()
        {
        var leave_from_date= $("#leave_from_date").val();
        var req_leave_from_date= $("#req_leave_from_date").val();
         var req_leave_to_date= $("#req_leave_to_date").val();
        var leave_to_date= $("#leave_to_date").val();

        var startDay = new Date(leave_from_date);
        var endDay = new Date(leave_to_date);
        var rstartDay = new Date(req_leave_from_date);
        var rendDay = new Date(req_leave_to_date);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        daysDiff = Math.floor(days+1);
        if(leave_from_date!="")
        {
        $("#approval_leave_days").val(daysDiff);
        }
        if(((endDay.getTime())<(rstartDay.getTime())) || ((endDay.getTime())>(rendDay.getTime())))
        {
            alert("Please select valid To Date");
            $("#approval_leave_days").val('');
            $("#leave_to_date").val('');
        }
    });

        $("#btn_submit").click(function () {
            var approval_leave_days= $('#approval_leave_days').val();
            var leave_type_id= $('#leave_type_id').val();
            var remarks= $('#remarks').val();
            if($(this).val()=="Approve")
            {
                if(leave_type_id=="-")
                {
                    alert("Please Select Leave Type!!!");
                     $('#leave_type_id').focus();
                    return false;
                }
                if(leave_from_date=="")
                {
                    alert("Please Select From Date!!!");
                     $('#leave_from_date').focus();
                    return false;
                }
                if(leave_to_date=="")
                {
                    alert("Please Select To Date!!!");
                     $('#leave_to_date').focus();
                    return false;
                }
                if(approval_leave_days=="")
                {
                    alert("Please Enter Leave Days!!!");
                     $('#approval_leave_days').focus();
                    return false;
                }
                if(remarks=="")
                {
                    alert("Please Enter Remarks!!!");
                     $('#remarks').focus();
                    return false;
                }
                return true;
            }
            if($(this).val()=="Reject")
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


