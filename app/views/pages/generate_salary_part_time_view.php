
<form method="post" id="salary_generate_form" action="<?=URLROOT;?>/SalaryController/generate_salary_part_time/">
<input type="hidden" name="employment_id" id="employment_id" value="" />
    <input type="hidden" name="grade_id" id="grade_id" value="" />
    <input type="hidden" name="sal_yr_id" id="sal_yr_id" value="" />
    <input type="hidden" name="sal_mnth_id" id="sal_mnth_id" value="" />
                        <div class="table-responsive">
                            <table id="salary_generate_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Emp Details</th>
                                        <th>Monthly Salary</th>
                                        <th>Working Days</th>
                                        <th>Present Days</th>
                                        <th>Incentives<br/>(If any)</th>
                                        <th>Paid Leaves</th>
                                        <th>Prepared Salary</th>
                                        <th>Final Salary</th>
                                        <th><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if(isset($data["emp_list"])):
                                    if(empty($data["emp_list"])):
                                    ?>
                                    <tr>
                                        <td colspan="15" style="text-align: center;" class="text-danger"><b>Data Not Available!!</b></td>
                                    </tr>
                                    <?php else:
                                             if(($data["sal_mnth"]>=date('n')) && ($data["sal_yr"]==date('Y')))
                                            {
                                                ?>
                                                <tr>
                                                   <td colspan="15" style="text-align: center;" class="text-danger"><b>Can't generate!!</b></td>
                                                 </tr>
                                                 <?php
                                            }
                                            else
                                            {
                                    $i=0;
                                    $ii=1;
                                    foreach ($data["emp_list"] as $value):
                                    $j=$ii++;
                                    ?>
                                    <tr>
                                        <td><?=++$i;?></td>
                                        <td><?=(isset($value['first_name']))?$value["first_name"]:"";?>&nbsp;&nbsp;
                                            <?=(isset($value['middle_name']))?$value['middle_name']:"";?> &nbsp;&nbsp;
                                            <?=(isset($value['last_name']))?$value['last_name']:"";?>
                                            <input type="hidden" name="employee_id[]" value="<?=$value['_id'];?>" />
                                        </td>
                                        <td><input type="text" id="net_salary<?=$j;?>" class="form-control" name="basic_salary[]" value="<?=(isset($value['monthly_salary']))?$value['monthly_salary']:"";?>" readonly  /></td>
                                        <td><input type="text" class="form-control" id="working_days<?=$j;?>" name="working_days[]" value="" onkeypress="return isNum(event);" onblur="onchangeofworkingdays(<?=$j;?>);" maxlength="2" /></td>
                                        <td><input type="text" class="form-control" id="present_days<?=$j;?>" name="present_days[]" value="" onkeypress="return isNum(event);" onblur="onchangeofpresentdays(<?=$j;?>);" maxlength="2" /></td>
                                        <td><input type="text" class="form-control" id="incentive_amt<?=$j;?>" name="incentive_amt[]" maxlength="5" value="0" onkeypress="return isNum(event);" onblur="onchangeofincentive(<?=$j;?>);" /></td>
                                        <td><input type="text" class="form-control" id="paid_leave<?=$j;?>" name="paid_leave[]" onkeypress="return isNum(event);" maxlength="2" value="<?php foreach ($value['paid_leave'] as $key=>$item){  echo $item ;   } ?>" onblur="paid_leave_details(<?=$j;?>);" /></td>
                                        <td><input type="text" class="form-control" id="prepared_salary<?=$j;?>" name="prepared_salary[]" onkeypress="return isNum(event);" value="0" readonly /></td>
                                        <td><input type="text" class="form-control" id="final_prepared_salary<?=$j;?>" name="final_prepared_salary[]" onkeypress="return isNum(event);" value="" maxlength="5" /></td>
                                        <td><input type="checkbox" class="chk_check" name="chk[]" value="<?=$j;?>" /></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php } endif;  ?>
                                    <?php endif;  ?>
                                </tbody>
                            </table>
                        </div>
    <?php
                        if(isset($data["emp_list"])):
                            if(!empty($data["emp_list"])):
                            if(($data["sal_mnth"]<date('n')) && ($data["sal_yr"]==date('Y'))):
                        ?>
                        <input type="submit" id="btn_bulk_payment" name="btn_bulk_payment" value="Generate Salary" class="btn btn-info" />
    <?php endif;  ?>
    <?php endif;  ?>
                                    <?php endif;  ?>
                        </form>
<script>
    function onchangeofworkingdays(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
		var working_days =parseInt($('#working_days'+il).val());
        var present_days =parseInt($('#present_days'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());
		var absent_days =working_days-present_days;
		var paid_leave =parseInt($('#paid_leave'+il).val());
		var salary_per_day=salary/working_days;
		var salary_of_absent_days=absent_days*salary_per_day;
		var salary_of_paid_leave=paid_leave*salary_per_day;
		var prepared_salary=salary+incentive_amt+(salary_of_paid_leave-salary_of_absent_days);
		var net_salary=prepared_salary.toFixed(0);
        if(working_days>30)
                {
                    $("#working_days"+il+"").val('');
                    $("#paid_leave"+il+"").val('0');
                    $("#prepared_salary"+il+"").val('0');
                     $("#final_prepared_salary"+il+"").val('');
                }
                else{
        if(isNaN(paid_leave) || isNaN(present_days) || isNaN(incentive_amt))
        {
            $("#prepared_salary"+il+"").val('0');
            }else
            {
                if(working_days < (paid_leave + (working_days-absent_days)))
                {
                    //alert("Paid Leave is greater than working days.");
                    $("#working_days"+il+"").val('');
                    $("#paid_leave"+il+"").val('0');
                    $("#prepared_salary"+il+"").val('0');
                }
                else
                {
                    if(net_salary<0)
                    {
                        $("#prepared_salary"+il+"").val('0');
                    }
                    else
                    {
                        $("#prepared_salary"+il+"").val(net_salary);
                        $("#final_prepared_salary"+il+"").val(net_salary);
                    }

                }
            }
        }
	}
    function onchangeofpresentdays(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
		var working_days =parseInt($('#working_days'+il).val());
        var present_days =parseInt($('#present_days'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());
		var absent_days =working_days-present_days;
		var paid_leave =parseInt($('#paid_leave'+il).val());
		var salary_per_day=salary/working_days;
		var salary_of_absent_days=absent_days*salary_per_day;
		var salary_of_paid_leave=paid_leave*salary_per_day;
		var prepared_salary=salary+incentive_amt+(salary_of_paid_leave-salary_of_absent_days);
		var net_salary=prepared_salary.toFixed(0);
        if(isNaN(paid_leave) || isNaN(working_days) || isNaN(incentive_amt))
        {
            $("#prepared_salary"+il+"").val('0');
            }else{
            if(working_days < (paid_leave + (working_days-absent_days)))
            {
               // alert("Paid Leave is greater than working days.");
                $("#present_days"+il+"").val('');
                $("#paid_leave"+il+"").val('0');
                $("#prepared_salary"+il+"").val('0');
            }
            else
            {
                if(net_salary<0)
                {
                    $("#prepared_salary"+il+"").val('0');
                }
                else
                {
                    $("#prepared_salary"+il+"").val(net_salary);
                    $("#final_prepared_salary"+il+"").val(net_salary);
                }

            }
        }
	}
	function paid_leave_details(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
		var working_days =parseInt($('#working_days'+il).val());
        var present_days =parseInt($('#present_days'+il).val());
		var absent_days =working_days-present_days;
		var paid_leave =parseInt($('#paid_leave'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());
		var salary_per_day=salary/working_days;
		var salary_of_absent_days=absent_days*salary_per_day;
		var salary_of_paid_leave=paid_leave*salary_per_day;
		var prepared_salary=salary+incentive_amt+(salary_of_paid_leave-salary_of_absent_days);
		var net_salary=prepared_salary.toFixed(0);
        if(isNaN(working_days) || isNaN(present_days) || isNaN(incentive_amt))
        {
            $("#prepared_salary"+il+"").val('0');
            }else{
            if(working_days < (paid_leave + (working_days-absent_days)))
            {
                //alert("Paid Leave is greater than working days.");
                $("#paid_leave"+il+"").val('0');
                $("#prepared_salary"+il+"").val('0');
            }
            else
            {
                if(net_salary<0)
                {
                    $("#prepared_salary"+il+"").val('0');
                }
                else
                {
                    $("#prepared_salary"+il+"").val(net_salary);
                    $("#final_prepared_salary"+il+"").val(net_salary);
                }
            }
        }
	}
    function onchangeofincentive(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
		var working_days =parseInt($('#working_days'+il).val());
        var present_days =parseInt($('#present_days'+il).val());
		var absent_days =working_days-present_days;
		var paid_leave =parseInt($('#paid_leave'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());
		var salary_per_day=salary/working_days;
		var salary_of_absent_days=absent_days*salary_per_day;
		var salary_of_paid_leave=paid_leave*salary_per_day;
		var prepared_salary=salary+incentive_amt+(salary_of_paid_leave-salary_of_absent_days);
		var net_salary=prepared_salary.toFixed(0);
        if(isNaN(working_days) || isNaN(present_days) || isNaN(paid_leave))
        {
            $("#prepared_salary"+il+"").val('0');
            }else{
            if(working_days < (paid_leave + (working_days-absent_days)))
            {
                //alert("Paid Leave is greater than working days.");
                $("#paid_leave"+il+"").val('0');
                $("#prepared_salary"+il+"").val('0');
            }
            else
            {
                if(net_salary<0)
                {
                    $("#prepared_salary"+il+"").val('0');
                }
                else
                {
                    $("#prepared_salary"+il+"").val(net_salary);
                    $("#final_prepared_salary"+il+"").val(net_salary);
                }
            }
        }
	}
 /******************/
$(document).ready( function() {

    $("#salary_generate_form" ).submit(function( event )
	{ 
       var proceed = true;
        var checkedNum = $('input[name="chk[]"]:checked').length;
       if (!checkedNum) {
            alert("Please Select Atleast One Row Checkbox!!");
            proceed = false;
       }
       if(proceed){
       $('#salary_generate_table').find('.chk_check').each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
			if ($(this).is(":checked")) 
			{ 
				var exp_id = $(this).closest("tr").find('td:eq(0)').text();
                $('#salary_generate_table').find("#working_days"+exp_id+"").each(function(){
					$(this).css('border-color',''); 
					if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				});
				$('#salary_generate_table').find("#present_days"+exp_id+"").each(function(){
					$(this).css('border-color',''); 
					if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				});
				$('#salary_generate_table').find("#paid_leave"+exp_id+"").each(function(){
					$(this).css('border-color',''); 
					if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				});
				$('#salary_generate_table').find("#prepared_salary"+exp_id+"").each(function(){
					$(this).css('border-color',''); 
					if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				});
				$('#salary_generate_table').find("#final_prepared_salary"+exp_id+"").each(function(){
					$(this).css('border-color',''); 
					if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				});

			}

		});
       }

	    if(proceed)
			{ 
				if(confirm("Do you want to Continue?"))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
        event.preventDefault(); 
    });

	$('#salary_generate_table').find('tr input[type=text]').each(function(){
		$("input[type=text]").keyup(function() { $(this).css('border-color',''); 
		$("#result").slideUp(); 
		});
	});

});
</script>