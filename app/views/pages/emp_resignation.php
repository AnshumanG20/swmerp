<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
		<li><a href="#"><i class="demo-pli-home"></i></a></li>
		<li class="active">Self Resignation</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel">
		            <div class="panel-heading">
		                <h3 class="panel-title">Self Resignation</h3>
		            </div>
		            <!--Horizontal Form-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/resignation_Controller/emp_resignation">
                        <div class="panel-body">
                            <div class="form-group">
                            <?php
                            if(isset($data['isResignationSubmit']) && $data['isResignationSubmit']==true){
                            ?>
                                
                                <div class="input-group date col-sm-12"  >
                                    <h5 class="text-center text-primary" for="design">Notice Period :  <?php echo $data['resignationData']['notice_period'];?></h5>
                                    <h5 class="text-center text-primary" for="dept"> Reason : <?php echo $data['resignationData']['terminate_resign_reason'];?></h5>
                                    <h5 class="text-danger text-center" >You have already submitted your resignation.</h5>
                                        <!-- <input type="text" id="resign_date" name="resign_date" class="form-control mask_date" placeholder="Resignation Notice Period" value="<?php //echo $data['resignationData']['notice_period'];?>" readonly>
                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span> -->
                                </div>
                            </div>
                            <!-- <div class="form-group">
                               
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="resignation_reason" name="resignation_reason" placeholder="Resignation Reason" readonly><?php //echo $data['resignationData']['terminate_resign_reason'];?></textarea>  -->
                                <!-- </div>
                            </div> --> 
                            <div class="form-group">
                                
                            </div>
                            <?php
                            }else{
                            ?>
                                <input type="hidden" id="today_date" name="today_date" value="<?=date("Y-m-d");?>"/>
                                <label class="col-sm-3 control-label" for="design">Notice Period <small class="text-danger"> *</small></label>
                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
                                    <input type="text" id="resign_date" name="resign_date" class="form-control mask_date" placeholder="Resignation Notice Period" value="" required>
			                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="dept"> Reason <small class="text-danger"> *</small></label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="resignation_reason" name="resignation_reason" placeholder="Resignation Reason" required></textarea> 
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="col-sm-3">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="apply_resignation" name="apply_resignation" type="submit" onclick="return submitResignation()">Submit Resignation</button>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </form>
		            <!--End Horizontal Form-->
		        </div>
		    </div>
		</div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript">
    $('#resign_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $(document).ready(function(){

        
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
        <?php if ($msgg = flashToast("resignationSubmitSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("msgDanger")) { ?>
            //modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        



        $('#apply_resignation').click(function(){
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var resign_date = $('#resign_date').val();
            if(resign_date=='')
            {
                $("#resign_date").css({"border-color":"red"});
                $("#resign_date").focus();
                process = false;
            }
            var resignation_reason = $("#resignation_reason").val();
            if (resignation_reason == '') {
                $("#resignation_reason").css({"border-color":"red"});
                $("#resignation_reason").focus();
                process = false;
            }else{
                if(!exp.test(resignation_reason))
                {
                    $("#resignation_reason").css({"border-color":"red"});
                    $("#resignation_reason").focus();
                    process = false;
                }
            }
            var today_date = $('#today_date').val();
            if(resign_date<=today_date)
            {
                alert('Notice Period Date Must Be Greater Than Current Date');
                $("#resign_date").css({"border-color":"red"});
                $("#resign_date").focus();
                process = false;
            }
            return process;
        });
        $("#resignation_reason").keyup(function(){$(this).css('border-color','');});
        $("#resign_date").change(function(){$(this).css('border-color','');});
    });
</script>

<script>
    function submitResignation(){
       return confirm("You are about to submit your Resignation");
    }
</script>
