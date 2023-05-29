<?php require APPROOT . '/views/layout_vertical/header.php'; ?>

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Generate Salary</h1>
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
                        <h5 class="panel-title">Generate Salary Search </h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm"></div>
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="sal_yr"> Year</label>
                                                    <select id="sal_yr" name="sal_yr" class="form-control">
                                                    <!--<option value="">--SELECT--</option>-->
                                                    <?php
                                                        $year = date("Y");
                                                        $previousyear = $year -1;
                                                        for($i=$year;$i>=$previousyear;$i--) { ?>
                                               <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                               <?php } ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="department_mstr_id"> Month</label>
                                                    <select id="sal_mnth" name="sal_mnth" class="form-control">
                                                    <option value="">--SELECT--</option>
                                                    <?php for($i=1;$i<=12;$i++) {
                                                        $monthName = date("F", mktime(0, 0, 0, $i, 10));
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $monthName; ?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="department_mstr_id"> Employment Type</label>
                                                    <select id="employment_type_id" name="employment_type_id" class="form-control">
                                                    <option value="">--SELECT--</option>
                                                    <?php foreach($data["employmentList"] as $value):?>
                                                    <option value="<?=$value["_id"]?>" <?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="designation">Grade</label>
                                                    <select id="grade_type_id" name="grade_type_id" class="form-control">
                                                        <option value="">--SELECT--</option>
                                                        <?php foreach($data["gradeList"] as $value):?>
                                                        <option value="<?=$value["_id"]?>" <?=(isset($data["grade_type_id"]))?($data["grade_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["grade_type"]?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-right: 40px;" id="work_type_div">
                                                <div class="form-group">
                                                    <label class="control-label" for="designation">Work Type</label>
                                                <select id="work_type" name="work_type" class="form-control">
                                                    <option value="">--SELECT--</option>
                                                    <option value="Per Hour">PER HOUR</option>
                                                    <option value="Per Day">PER DAY</option>
                                                    <option value="Per Month">PER MONTH</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="btnsearch">&nbsp;</label>
                                                    <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="button">Search</button>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                           <div class="row" id="details"></div>


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
<script language="JavaScript">
	function selectAll(source)
	{
		checkboxes = document.getElementsByName('chk[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>
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
        var sal_mnth = $("#sal_mnth").val();
        if (sal_mnth == '') {
            $("#sal_mnth").css({"border-color":"red"});
            $("#sal_mnth").focus();
            process = false;
          }
         var employment_type_id = $("#employment_type_id").val();
        //  console.log("employment type id    ",employment_type_id);
        //  return;
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
        var work_type = $("#work_type").val();
        var sal_yr = $("#sal_yr").val();
        var sal_mnth = $("#sal_mnth").val();
        if((employment_type_id=="3") || (employment_type_id=="5"))
        {
            if (work_type == '') {
            $("#work_type").css({"border-color":"red"});
            $("#work_type").focus();
            process = false;
          }
        }
        if(employment_type_id!='' && grade_type_id!='')
        {
            
            if(employment_type_id=='1')
            {
                $.ajax({
                    type:'POST',
                    url:'<?=URLROOT;?>/SalaryController/generate_salary_full_time_view/',
                    data:{employment_type_id:employment_type_id, grade_type_id:grade_type_id, sal_yr:sal_yr, sal_mnth:sal_mnth},
                    success:function(html)
                    {
                        console.log(html);
                        $('#details').html(html);
                        $('#employment_id').val(employment_type_id);
                        $('#grade_id').val(grade_type_id);
                        $('#sal_yr_id').val(sal_yr);
                        $('#sal_mnth_id').val(sal_mnth);
                    }
                });
            }
            if((employment_type_id=='2') || (employment_type_id=='4'))
            {
                $.ajax({
                    type:'POST',
                    url:'<?=URLROOT;?>/SalaryController/generate_salary_part_time_view/',
                    data:{employment_type_id:employment_type_id, grade_type_id:grade_type_id, sal_yr:sal_yr, sal_mnth:sal_mnth},
                    success:function(html)
                    {
                        console.log(html);
                        $('#details').html(html);
                        $('#employment_id').val(employment_type_id);
                        $('#grade_id').val(grade_type_id);
                        $('#sal_yr_id').val(sal_yr);
                        $('#sal_mnth_id').val(sal_mnth);
                    }
                });
            }
            if((employment_type_id=='3') || (employment_type_id=='5'))
            {

                $.ajax({
                    type:'POST',
                    url:'<?=URLROOT;?>/SalaryController/generate_salary_daily_wage_view/',
                    data:{employment_type_id:employment_type_id, grade_type_id:grade_type_id, work_type:work_type, sal_yr:sal_yr, sal_mnth:sal_mnth},
                    success:function(html)
                    {


                        $('#details').html(html);
                        $('#employment_id').val(employment_type_id);
                        $('#grade_id').val(grade_type_id);
                        $('#work_type_id').val(work_type);
                        $('#sal_yr_id').val(sal_yr);
                        $('#sal_mnth_id').val(sal_mnth);
                        //$('#salary_work_type_show').html(work_type);
                    }
                });
            }
        }


        return process;
    });
  $("#employment_type_id").change(function(){$(this).css('border-color','');});
  $("#grade_type_id").change(function(){$(this).css('border-color','');});
});
</script>
