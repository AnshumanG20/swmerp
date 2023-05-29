<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Self Service</a></li>
        <li class="active">Leave Request </li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Leave Request</h3>
                    </div>

                        <div class="panel-body">
                            <div class="pad-btm">
                            <a href="<?=URLROOT;?>/LeaveController/LeaveList"><button id="demo-foo-collapse" class="btn btn-purple">View List<i class="fa fa-arrow-right"></i></button></a>
                            </div>
                            <!--Horizontal Form-->
                                <!--===================================================-->
                            <?php
                            //print_r($data);
                            ?>
                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/LeaveController/leaverequest_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                            <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                            <input type="hidden" id="grade_id" name="grade_id" value="<?=(isset($data["gradeList"]['grade_id']))?$data["gradeList"]['grade_id']:"";?>" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="grade" style="display: none;">Grade</label>
                            <div class="col-sm-9">
                                    <input type="hidden" id="grade_name" name="grade_name" class="form-control" value="<?=(isset($data["gradeList"]['grade_type']))?$data["gradeList"]['grade_type']:"";?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label" >From Date <span class="text-danger">*</span></label>
                                <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
                                    <input type="text" id="leave_from_date" name="leave_from_date" value="<?=(isset($data['leave_from_date']))?$data['leave_from_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select From Date">
                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label" >To Date <span class="text-danger">*</span></label>
                            <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
                                <input type="text" id="leave_to_date" name="leave_to_date" value="<?=(isset($data['leave_to_date']))?$data['leave_to_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select To Date">
                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="leave_days">Days <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" maxlength="4" placeholder="" id="leave_days" name="leave_days" class="form-control" value="<?=(isset($data['leave_days']))?$data['leave_days']:"";?>" readonly>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="leave_type">Leave Type <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select id="leave_type_id" name="leave_type_id" class="form-control">
                                            <option value="-">--Select--</option>
                                            <?php foreach($data["leave"] as $value):?>
                                            <option value="<?=$value["_id"]?>" <?=(isset($data["leave_type_id"]))?($data["leave_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["leave_type"]?></option>
                                            <?php endforeach;?>

                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label" for="leave_type">Available Leave <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="leave_type_days" name="leave_type_days" value="" readonly />

                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Reason <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" type="text" id="leave_reason" name="leave_reason" placeholder="Please Enter Reason" maxlength="250" ><?=(isset($data['leave_reason']))?$data['leave_reason']:"";?></textarea>
                                </div>
                            </div>
                                <?php
                                if(isset($data["reportheadList"]['first_name']))
                                { 
                                ?>
                                <div class="form-group">
                                <label class="col-sm-3" >Reporting Person </label>
                                <div class="col-sm-9 text-danger" style="font-weight:bold;">
                                    <?=(isset($data["reportheadList"]['first_name']))?$data["reportheadList"]["first_name"]." ":"";?>
                                <?=(isset($data["reportheadList"]['middle_name']))?$data["reportheadList"]['middle_name']." ":"";?>
                                <?=(isset($data["reportheadList"]['last_name']))?$data["reportheadList"]['last_name']:"";?>

                                <input type="hidden" name="reporting_head_employee_mstr_id" value="<?= $data['reportheadList']['_id'] ?>">

                                </div>
                            </div>
                                <?php
                                    }
                                if($_SESSION['emp_details']['designation_mstr_id']=="15")
                                {
                                ?>
                                <div class="form-group">
                                <label class="col-sm-3" >Team Leader</label>
                                <div class="col-sm-9">
                                <?=(isset($data["reporttlList"]['first_name']))?$data["reporttlList"]["first_name"]." ":"";?>
                                <?=(isset($data["reporttlList"]['middle_name']))?$data["reporttlList"]['middle_name']." ":"";?>
                                <?=(isset($data["reporttlList"]['last_name']))?$data["reporttlList"]['last_name']:"";?>
                                    
                                </div>
                            </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                <label class="col-sm-3 control-label" >&nbsp;</label>
                                <div class="col-sm-9">
                                    <?php
                                    if($data['reporting_designation_id']!='')
                                    {
                                        if($data["reportheadList"]['_id']!="")
                                        {
                                            
                                    ?>
                                    <button class="btn btn-success" id="btnrequest" name="btnrequest" type="submit">Leave Request</button>
                                    <a href="<?=URLROOT;?>/LeaveController/leaverequest_add_update" class="btn btn-danger"><!--<i class="fa fa-arrow-left"></i>//--> Cancel </a>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <h4 class="text-danger"><b>Reporting Person Is Not Assigned!!!</b></h4>
                                    <?php
                                        } 
                                    }
                                    else
                                        {
                                    ?>
                                    <h4 class="text-danger"><b>Reporting Person Is Not Assigned...</b></h4>
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="color: red; text-align: center;">
                                    <?php
                                        if(isset($error))
                                        {
                                            foreach ($error as $value)
                                            {
                                                echo $value;
                                                echo "<br />";
                                            }
                                        }
                                    ?>
                                    </div>
                            </div>
                            </form>
                    </div>

                    <!--===================================================-->
                    <!--End Horizontal Form-->

                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Leave Type Details Of Current Financial Year-<?=$data['fy'];?></h3>
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
                                            <td colspan="2" style="text-align: center;">Leave Requests are Not Available!!</td>
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
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Leave Type</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //print_r($data['leavetknList']);
                                        if(isset($data["leavetknList"])):
                                        if(empty($data["leavetknList"])):
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Leave Requests are Not Available!!</td>
                                        </tr>
                                        <?php else:
                                        $i=0;
                                        foreach ($data["leavetknList"] as $value):
                                        ?>
                                        <tr>
                                            <td><?=$value["leave_from_date"];?></td>
                                            <td><?=$value["leave_to_date"];?></td>
                                            <td><?=$value["leave_type"];?></td>
                                            <td><?=$value["leave_reason"];?></td>
                                            <?php if($value["_status"]==1)
                                        { ?>
                                            <td class="text-bold text-info">Approval Pending</td>

                                        <?php }
                                        elseif($value["_status"]==2)
                                        { ?>
                                                <td class="text-bold text-success">Approval Pending for HR</td>
                                        <?php }
                                        elseif($value["_status"]==3)
                                        { ?>
                                                <td class="text-bold text-primary">Leave Request Cancelled</td>
                                        <?php }
                                        elseif($value["_status"]==4)
                                        { ?>
                                                <td class="text-bold text-primary">Leave Cancel Request</td>
                                        <?php }
                                    elseif($value["_status"]==5)
                                        { ?>
                                                <td class="text-bold text-primary">Leave Cancel Request Approved</td>
                                        <?php }
                                    elseif($value["_status"]==6)
                                        { ?>
                                                <td class="text-bold text-primary">Leave Cancel Request Rejected</td>
                                        <?php }
                                        elseif($value["_status"]==0)
                                        { ?>
                                                <td class="text-bold text-danger">Leave Request Rejected</td>
                                        <?php }
                                        elseif($value["_status"]==7)
                                        { ?>
                                                <td class="text-bold">
                                                <?php
                                                $t_date= date("Y-m-d");
                                                $today_date = strtotime($t_date);
                                                $from_date=strtotime($value["leave_from_date"]);
                                                $to_date=strtotime($value["leave_to_date"]);
                                                if($today_date==$from_date)
                                                {
                                                    echo "<span class='text-danger'>Leave period started</span>";
                                                }
                                                else if($today_date>$to_date)
                                                {
                                                    echo "<span class='text-danger'>Leave period is over</span>";
                                                }
                                                else
                                                {
                                                echo "Leave Approved by HR";  
                                                }
                                                ?>
                                                </td>
                                        <?php }
                                        ?>
                                        </tr>
                                        <?php endforeach;?>
                                        <?php endif;  ?>
                                        <?php endif;  ?>
                                    </tbody>
                                </table>
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
$(document).ready( function () {

    
    function modelInfo(msg)
        {
            $.niftyNoty({
                type: 'success',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        function modelDanger(msg)
        {
            $.niftyNoty({
                type: 'danger',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        <?php if ($msgg = flashToast("msgSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("dateExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("insertSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("updateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        
    $("#btnrequest").click(function(){
            var leave_from_date = $("#leave_from_date").val();
            var leave_to_date = $("#leave_to_date").val();
            var leave_days = $("#leave_days").val();
			var leave_reason = $("#leave_reason").val();
			var leave_type = $("#leave_type_id").val();
			var leave_type_days = $("#leave_type_days").val();

			if(leave_from_date=="")
			{
				alert("Please Select Leave From Date");
				$('#leave_from_date').focus();
				return false;
			}

			if(leave_to_date=="")
			{
				alert("Please Select Leave To date");
				$('#leave_to_date').focus();
				return false;
			}

			if(leave_days=="")
			{
				alert("Please Enter The leave_days");
				$('#leave_days').focus();
				return false;
			}
			if(leave_type=="")
			{
				alert("Please Select The Leave Type");
				$('#leave_type_id').focus();
				return false;
			}
			if((leave_type_days=="")|| (leave_type_days=="0"))
			{
				alert("No leave is available in this category!!");
				$('#leave_type_id').focus();
				return false;
			}

			if(leave_reason=="")
			{
				alert("Please Enter Leave Reason");
				$('#leave_reason').focus();
				return false;
			}


		 });
    $("#leave_to_date").change(function ()
    {   
        var leave_from_date= $("#leave_from_date").val();
        var leave_to_date= $("#leave_to_date").val();

        var startDay = new Date(leave_from_date);
        var endDay = new Date(leave_to_date);
        var todayDay = new Date();
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        daysDiff = Math.floor(days+1);
        if(leave_from_date!="")
        {
        $("#leave_days").val(daysDiff);
        }
        if((startDay.getTime())>(endDay.getTime()) || (startDay.getTime())<(todayDay.getTime()))
        {
            alert("Please select valid To Date");
            $("#leave_days").val('');
            $("#leave_to_date").val('');
        }
    });
    $("#leave_from_date").change(function ()
    {   
        var leave_from_date= $("#leave_from_date").val();
        var leave_to_date= $("#leave_to_date").val();

        var startDay = new Date(leave_from_date);     
        var endDay = new Date(leave_to_date);
        var todayDay = new Date();
        //alert(startDay);
        //alert(todayDay);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        daysDiff = Math.floor(days+1);
        if(leave_to_date!="")
        {
        $("#leave_days").val(daysDiff);

        }
        if((startDay.getTime())>(endDay.getTime()) || (startDay.getTime())<(todayDay.getTime()))
        {
            alert("Please select valid To Date!!");
            $("#leave_days").val('');
            $("#leave_from_date").val('');
        }
    });
    $("#leave_type_id").change(function ()
    {
        var leave_type_id= $("#leave_type_id").val();
        var leave_type_days= $("#leave_type_days").val();
        if(leave_type_id!="")
        {
            $.ajax({

            type:"POST",
            url: "<?=URLROOT;?>/LeaveController/ajaxAvailableleaveListByLeaveTypeId",
            dataType: "json",
            data: {"leave_type_id":leave_type_id},
            beforeSend: function() {

                //$("#loadingDiv").show();
            },
            success:function(data){
                //console.log(data);
                $("#loadingDiv").hide();
                if(data.response==true){
                    //alert(data.data.designation_mstr_id);

                    $("#leave_type_days").val(data.data);
                }
            }
         });
        }


    });
    $("#leave_type_id").trigger("change");
});
</script>