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
					<li class="active">Add/Update Earning</li>
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
					                <h3 class="panel-title">Add/Update Earning</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/earning_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <input type="text" id="min_salary" name="min_salary" hidden /> 
                                    <input type="text" id="max_salary" name="max_salary" hidden />
					                <div class="panel-body">
                                    <div class="form-group">
                                                <label class="col-sm-3 control-label" for="employment_type_id">Employment Type</label>
                                        <div class="col-sm-4">
                                             <select id="employment_type_id" name="employment_type_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["employment"] as $value):?>
   	                                             <option value="<?=$value["_id"]?>" <?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="basic_salary">Basic Salary</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="9" placeholder="Enter Basic Salary" id="basic_salary" name="basic_salary" class="form-control" value="<?=(isset($data['basic_salary']))?$data['basic_salary']:"";?>">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="dearness_allowance">Dearness Allowance</label>
					                        <div class="col-sm-4">
                                                <input type="text" maxlength="6" placeholder="Enter Dearness Allowance In Percent" id="dearness_allowance" name="dearness_allowance" class="form-control" value="<?=(isset($data['dearness_allowance']))?$data['dearness_allowance']:"";?>" >
					                        </div>
					                    </div>
                                          <div class="form-group">
					                        <label class="col-sm-3 control-label" for="transport_allowance">Transport Allowance</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="6" placeholder="Enter Transport Allowance In Percent" id="transport_allowance" name="transport_allowance" class="form-control" value="<?=(isset($data['transport_allowance']))?$data['transport_allowance']:"";?>" >
					                        </div>
					                    </div>
                                          <div class="form-group">
					                        <label class="col-sm-3 control-label" for="house_rent_allowance">House Rent Allowance</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="6" placeholder="Enter House Rent Allowance In Percent" id="house_rent_allowance" name="house_rent_allowance" class="form-control" value="<?=(isset($data['house_rent_allowance']))?$data['house_rent_allowance']:"";?>" >
					                        </div>
					                    </div>
                                         <div class="form-group">
					                        <label class="col-sm-3 control-label" for="medical_reimbursement">Medical Reimbursement</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="6" placeholder="Enter medical Reimbursement In Percent" id="medical_reimbursement" name="medical_reimbursement" class="form-control" value="<?=(isset($data['medical_reimbursement']))?$data['medical_reimbursement']:"";?>" >
					                        </div>
					                    </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btnearning" name="btnearning" type="submit"><?=(isset($data["_id"]))?"Edit Earning":"Add Earning";?></button>
                                        <a href="<?=URLROOT;?>/Masters/EarningList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
    console.log('working')
     var process = true;
    /* $("#basic_salary").change(function(){
         var max_salary = $("#max_salary").val();
        var min_salary = $("#min_salary").val();
        var basic_salary = $("#basic_salary").val();
        if(basic_salary>max_salary)
        {
            alert("Salary Between "+min_salary+""+"-"+""+max_salary);
            $("#basic_salary").css({"border-color":"red"});
            $("#basic_salary").focus();
            process = false;
        }
        if(basic_salary<min_salary)
        {
            alert("Salary Between"+min_salary+""+"-"+""+max_salary);
            $("#basic_salary").css({"border-color":"red"});
            $("#basic_salary").focus();
            process = false;
        }
    return process;
    }); */
    $("#btnearning").click(function() {
        var process = true;
         var employment_type_id = $("#employment_type_id").val();
        if (employment_type_id == '-') {
            $("#employment_type_id").css({"border-color":"red"});
            $("#employment_type_id").focus();
            process = false;
          }
          var basic_salary = $("#basic_salary").val();
        if (basic_salary =='null' || basic_salary=='') {
            $("#basic_salary").css({"border-color":"red"});
            $("#basic_salary").focus();
            process = false;
          }
        if(!$.isNumeric(basic_salary))
        {
            $("#basic_salary").css({"border-color":"red"});
            $("#basic_salary").focus();
            process = false;
        }
         var dearness_allowance = $("#dearness_allowance").val();
        if (dearness_allowance =='null' || dearness_allowance=='') {
            $("#dearness_allowance").css({"border-color":"red"});
            $("#dearness_allowance").focus();
            process = false;
          }
        if(!$.isNumeric(dearness_allowance))
        {
            $("#dearness_allowance").css({"border-color":"red"});
            $("#dearness_allowance").focus();
            process = false;
        }
          var transport_allowance = $("#transport_allowance").val();
        if (transport_allowance =='null' || transport_allowance=='') {
            $("#transport_allowance").css({"border-color":"red"});
            $("#transport_allowance").focus();
            process = false;
          }
        if(!$.isNumeric(transport_allowance))
        {
            $("#transport_allowance").css({"border-color":"red"});
            $("#transport_allowance").focus();
            process = false;
        }
         var house_rent_allowance = $("#house_rent_allowance").val();
        if (house_rent_allowance =='null' || house_rent_allowance=='') {
            $("#house_rent_allowance").css({"border-color":"red"});
            $("#house_rent_allowance").focus();
            process = false;
          }
        if(!$.isNumeric(house_rent_allowance))
        {
            $("#house_rent_allowance").css({"border-color":"red"});
            $("#house_rent_allowance").focus();
            process = false;
        }
         var medical_reimbursement = $("#medical_reimbursement").val();
        if (medical_reimbursement =='null' || medical_reimbursement=='') {
            $("#medical_reimbursement").css({"border-color":"red"});
            $("#medical_reimbursement").focus();
            process = false;
          }
        if(!$.isNumeric(medical_reimbursement))
        {
            $("#medical_reimbursement").css({"border-color":"red"});
            $("#medical_reimbursement").focus();
            process = false;
        }
        return process;
    });
});
    //Ajax call on change Grade
 /*  function ajaxCallMinSalary()
    {
        var grade = $("#grade_id").val();
        if(grade!='-')
        {
         //  alert(grade);
            $.ajax({
                type: "POST",
                url: "<?=URLROOT;?>/Masters/ajaxgateMinSalaryById",
                dataType:"json",
                data:{
                        grade:grade
                },
                success: function(data)
                {
                   // alert(data.min_salary);
                     if(data.min_salary!='')
                     {
                        // alert(data.min_salary);
                         $("#basic_salary").val(data.min_salary);
                         $("#max_salary").val(data.max_salary);
                         $("#min_salary").val(data.min_salary);
                       }
                       else
                      {
                          $("#grade_id").html('<option value="-">== SELECT ==</option>');
                      }
                }
            });
        }
        else
        {
            $("#grade_id").html("<option value='-'>--select--</option>");
        }
  }
 */
</script>