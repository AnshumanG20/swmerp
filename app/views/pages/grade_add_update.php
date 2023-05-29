<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">General Elements</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Masters</a></li>
            <li class="active">Add/Update Grade</li>
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
                        <h3 class="panel-title">Add/Update Grade</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/grade_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="grade">Grade Type</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="30" placeholder="Enter Grade Type" id="grade_type" name="grade_type" class="form-control" value="<?=(isset($data['grade_type']))?$data['grade_type']:"";?>" >
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label" for="minimum salary">Minimum Salary</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="12" placeholder="Enter Minimum Salary" id="min_salary" name="min_salary" class="form-control" value="<?=(isset($data['min_salary']))?$data['min_salary']:"";?>" onkeypress="return isDecNum(this, event);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="maximum salary">Maximum Salary</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="12" placeholder="Enter Maximum Salary" id="max_salary" name="max_salary" class="form-control" value="<?=(isset($data['max_salary']))?$data['max_salary']:"";?>" onkeypress="return isDecNum(this, event);">
                                </div>
                            </div>//-->
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-success" id="btngrade" name="btngrade" type="submit"><?=(isset($data["_id"]))?"Edit Grade":"Add Grade";?></button>
                            <a href="<?=URLROOT;?>/Masters/GradeList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
        $("#btngrade").click(function() {
            var exp = /^[A-Za-z0-9\s]+$/;
            var process = true;
            var grade = $("#grade_type").val();
            var result = exp.test(grade);
            if(!result)
            {
                $("#grade_type").css({"border-color":"red"});
                $("#grade_type").focus();
                process = false;
            }
            if (grade=='null' || grade == '')
            {
                $("#grade_type").css({"border-color":"red"});
                $("#grade_type").focus();
                process = false;
            }
           /*  var min_salary = $("#min_salary").val();
            if(min_salary =='')
            {
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            if(!$.isNumeric(min_salary))
            {
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            if(min_salary<0)
            {
                alert("Please Enter Positve value,Salary Can't Be Negative");
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            var max_salary = $("#max_salary").val();
            if(max_salary =='')
            {
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            if(!$.isNumeric(max_salary))
            {
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            if(max_salary<min_salary)
            {
                alert("Please Enter Max Salary Greater Than Or Equal to Min Salary");
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
 */            return process;
        });
        $("#grade_type").keyup(function(){$(this).css('border-color','');});
       /*  $("#min_salary").keyup(function(){$(this).css('border-color','');});
        $("#max_salary").keyup(function(){$(this).css('border-color','');}); */
    });
    /* function isDecNum(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    } */
</script>