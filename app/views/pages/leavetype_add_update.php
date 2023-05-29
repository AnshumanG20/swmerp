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
					<li class="active">Add/Update Leave Days</li>
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
					                <h3 class="panel-title">Add/Update Leave Days</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/LeaveDays/leavetype_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label" for="dept">Grade</label>
                                        <div class="col-sm-4">
                                             <select id="grade_id" name="grade_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["grade"] as $value):?>
   	                                           <option value="<?=$value["_id"]?>" <?=(isset($data["grade_id"]))?($data["grade_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["grade_type"]?></option>

  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
                                    <div class="form-group">
                                                <label class="col-sm-3 control-label" for="leave_type">Leave Type</label>
                                        <div class="col-sm-4">
                                             <select id="leave_type_id" name="leave_type_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["leave"] as $value):?>
   	                                             <option value="<?=$value["_id"]?>" <?=(isset($data["leave_type_id"]))?($data["leave_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["leave_type"]?></option>
  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="design">Leave Days</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="4" placeholder="Enter No Of Leave Days" id="leave_days" name="leave_days" class="form-control" value="<?=(isset($data['leave_days']))?$data['leave_days']:"";?>" onkeypress="return isNum(event);" >
					                        </div>
					                    </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btnleavedays" name="btnleavedays" type="submit"><?=(isset($data["_id"]))?"Edit Leave Days":"Add Leave Days";?></button>
                                        <a href="<?=URLROOT;?>/LeaveDays/LeaveList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
    $("#btnleavedays").click(function() {
        var process = true;
        var leave_days = $("#leave_days").val();
        if (leave_days=='null' || leave_days == '') {
            $("#leave_days").css({"border-color":"red"});
            $("#leave_days").focus();
            process = false;
          }
        var grade_id = $("#grade_id").val();
        if (grade_id == '-') {
            $("#grade_id").css({"border-color":"red"});
            $("#grade_id").focus();
            process = false;
          }
         var leave_type_id = $("#leave_type_id").val();
        if (leave_type_id == '-') {
            $("#leave_type_id").css({"border-color":"red"});
            $("#leave_type_id").focus();
            process = false;
          }
        return process;
    });
});
</script>