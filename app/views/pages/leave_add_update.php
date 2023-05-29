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
        <li><a href="#">Masters</a></li>
        <li class="active">Add/Update Leave Type</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add/Update Leave Type</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/leave_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="leave_type">Leave Type</label>
                                <div class="col-sm-6">
                                    <input  class="form-control" type="text" id="leave_type" name="leave_type" maxlength="50"  placeholder="Enter Leave Type" value="<?=(isset($data['leave_type']))?$data['leave_type']:"";?>" onkeypress="return isAlpha(event);"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="leave_days">Leave Days</label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="3" placeholder="Enter No Of Leave Days" id="leave_days" name="leave_days" class="form-control" value="<?=(isset($data['leave_days']))?$data['leave_days']:"";?>" onkeypress="return isNum(event);" >
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-success" id="btnleave" name="btnleave" type="submit"><?=(isset($data["_id"]))?"Edit Leave Type":"Add Leave Type";?></button>
                                <a href="<?=URLROOT;?>/Masters/LeaveList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>

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
                    <!--===================================================-->
                    <!--End Horizontal Form-->

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
        <?php if ($msgg = flashToast("leaveTypeExist")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        



    $("#btnleave").click(function() {
        var process = true;
        var leave_type = $("#leave_type").val();
            leave_type = leave_type.trim();
        if (leave_type=='null' || leave_type == '') {
            $("#leave_type").css({"border-color":"red"});
            $("#leave_type").focus();
            process = false;
          }
         var leave_days = $("#leave_days").val();
            leave_days =leave_days.trim();
        if (leave_days=='null' || leave_days == '') {
            $("#leave_days").css({"border-color":"red"});
            $("#leave_days").focus();
            process = false;
          }
        return process;
    });
    $("#leave_type").keyup(function(){$(this).css('border-color','');});
    $("#leave_days").keyup(function(){$(this).css('border-color','');});
});
</script>