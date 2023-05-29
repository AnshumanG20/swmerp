<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Salary Management</a></li>
					<li class="active">Generate Salary</li>
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
					                <h3 class="panel-title">Generate Salary Search  of Financial Year <?=$data["financial_year"];?> of Month <?=$name_month=date('F',strtotime($data["date"]));?></h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/SalaryController/Generate_Sal_Emp_List/">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="employment_type">Employment Type</label>
                                            <div class="col-sm-4">
                                                <select id="employment_type_id" name="employment_type_id" class="form-control">
                                                    <option value="-">--SELECT--</option>
                                                    <?php foreach($data["employmentList"] as $value):?>
                                                    <option value="<?=$value["_id"]?>" <?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="grade">Grade</label>
                                            <div class="col-sm-4">
                                                <select id="grade_type_id" name="grade_type_id" class="form-control">
                                                    <option value="-">--SELECT--</option>
                                                    <?php foreach($data["gradeList"] as $value):?>
                                                    <option value="<?=$value["_id"]?>" <?=(isset($data["grade_type_id"]))?($data["grade_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["grade_type"]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="work_type_div">
                                            <label class="col-sm-3 control-label" for="work_type">Work Type</label>
                                            <div class="col-sm-4">
                                                <select id="work_type" name="work_type" class="form-control">
                                                    <option value="">--SELECT--</option>
                                                    <option value="per_hour">PER HOUR</option>
                                                    <option value="per_day">PER DAY</option>
                                                    <option value="per_month">PER MONTH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="stream_name">&nbsp;</label>
                                            <div class="col-sm-4">
                                                <button class="btn btn-success" id="btn_search" name="btn_search" type="submit">Search</button>
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
    $("#work_type_div").css("display", "none");
    $("#employment_type_id").change(function() {
        var employment_type_id = $("#employment_type_id").val();
        if((employment_type_id=="3") || (employment_type_id=="5"))
        {
            $("#work_type_div").css("display", "block");
        }
        else if((employment_type_id=="1") || (employment_type_id=="2") || (employment_type_id=="4"))
        {
            $("#work_type_div").css("display", "none");
            $("#work_type").val("");
        }
        else
        {
            $("#work_type_div").css("display", "none");
            $("#work_type").val("");
        }
    });
    $("#btn_search").click(function() {
        var process = true;
         var employment_type_id = $("#employment_type_id").val();
        if (employment_type_id == '') {
            $("#employment_type_id").css({"border-color":"red"});
            $("#employment_type_id").focus();
            process = false;
          }
        var grade_type_id = $("#grade_type_id").val();
        if (grade_type_id == '') {
            $("#grade_type_id").css({"border-color":"red"});
            $("#grade_type_id").focus();
            process = false;
          }

        return process;
    });
  $("#employment_type_id").change(function(){$(this).css('border-color','');});
  $("#grade_type_id").change(function(){$(this).css('border-color','');});
});
</script>