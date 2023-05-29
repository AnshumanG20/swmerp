
<form method="post" id="salary_generate_form" action="<?=URLROOT;?>/SalaryController/generate_salary_daily_wage/">
    <input type="hidden" name="employment_id" id="employment_id" value="" />
    <input type="hidden" name="grade_id" id="grade_id" value="" />
    <input type="hidden" name="work_type_id" id="work_type_id" value="" />
    <input type="hidden" name="sal_yr_id" id="sal_yr_id" value="" />
    <input type="hidden" name="sal_mnth_id" id="sal_mnth_id" value="" />
    <!--<span id="salary_work_type_show"></span>-->
                        <div class="table-responsive">
                            <table id="salary_generate_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Emp Details</th>
                                        <th><?=$data['work_type'];?> Salary<br/><small class="text-danger"><i>(in Rs.)</i></small></th>
                                        <?php if($data['work_type']=="Per Month"){ ?><th>Working Days</th><?php } ?>
                                        <th>Present Days</th>
                                        <?php if($data['work_type']=="Per Hour"){ ?><th>Attended Hours</th><?php } ?>
                                        <th>Incentives<br/>(If any)</th>
                                        <th>Prepared Salary<br/><small class="text-danger"><i>(in Rs.)</i></small></th>
                                        <th>Final Salary<br/><small class="text-danger"><i>(in Rs.)</i></small></th>
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
                                        <?php if($data['work_type']=="Per Month"){ ?><td><input type="text" class="form-control" id="working_days<?=$j;?>" onkeypress="return isNum(event);" maxlength="2" name="working_days[]" value="" onblur="onchangeofworkingdays(<?=$j;?>);" /></td><?php } ?>
                                        <td><input type="text" class="form-control" id="present_days<?=$j;?>" name="present_days[]" value="" onkeypress="return isNum(event);" maxlength="2" onblur="onchangeofpresentdays(<?=$j;?>);" /></td>
                                        <?php if($data['work_type']=="Per Hour"){ ?><td><input type="text" class="form-control" id="attended_hours<?=$j;?>" name="attended_hours[]" value="" maxlength="4" onkeypress="return isNum(event);" onblur="onchangeofattendedhours(<?=$j;?>);" /></td><?php } ?>
                                        <td><input type="text" class="form-control" id="incentive_amt<?=$j;?>" name="incentive_amt[]" maxlength="5" value="0" onkeypress="return isNum(event);" onblur="onchangeofincentive(<?=$j;?>);" /></td>
                                        <td><input type="text" class="form-control" id="prepared_salary<?=$j;?>" name="prepared_salary[]" value="0" onkeypress="return isNum(event);" readonly /></td>
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

<script type="text/javascript">
/**********/
function onchangeofworkingdays(il)
{

    var salary =parseFloat($('#net_salary'+il).val());
    var working_days =parseInt($('#working_days'+il).val());
    var present_days =parseInt($('#present_days'+il).val());
    var incentive_amt =parseFloat($('#incentive_amt'+il).val());
    var absent_days =working_days-present_days;
    var work_type_id =$('#work_type_id').val();
    var salary_per_day=salary/working_days;
    var salary_of_absent_days=absent_days*salary_per_day;

    if(work_type_id=="Per Month")
    {
        var prepared_salary=(salary+incentive_amt)-salary_of_absent_days;
    }

    var net_salary=prepared_salary.toFixed(0);
    if(working_days>30)
    {
        $("#working_days"+il+"").val('');
        $("#paid_leave"+il+"").val('0');
        $("#prepared_salary"+il+"").val('0');
         $("#final_prepared_salary"+il+"").val('');
    }
    else{
        if(isNaN(present_days))
        {
            $("#prepared_salary"+il+"").val('0');
            $("#final_prepared_salary"+il+"").val('');
        }else
        {
            if(working_days < present_days)
            {
                $("#working_days"+il+"").val('');
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
/**********/
/**********/
function onchangeofpresentdays(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
        var work_type_id =$('#work_type_id').val();
        var present_days =parseInt($('#present_days'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());

        if(work_type_id=="Per Month")
        {
            var working_days =parseInt($('#working_days'+il).val());
            var absent_days =working_days-present_days;
            var salary_per_day=salary/working_days;
            var salary_of_absent_days=absent_days*salary_per_day;

            var prepared_salary=(salary+incentive_amt)-salary_of_absent_days;
            var net_salary=prepared_salary.toFixed(0);
            if(isNaN(working_days))
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }else{
                //alert();
                if(present_days!='')
                {
                    if(working_days < present_days)
                    {
                        $("#working_days"+il+"").val('');
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
                else
                {
                        $("#prepared_salary"+il+"").val('0');
                        $("#final_prepared_salary"+il+"").val('');
                }

            }
        }
        if(work_type_id=="Per Hour")
        {
            var attended_hours =parseInt($('#attended_hours'+il).val());
            var prepared_salary=(salary*attended_hours)+incentive_amt;
            var net_salary=prepared_salary.toFixed(2);
            if(isNaN(attended_hours))
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }else{

                if(attended_hours < present_days)
                {
                    $("#attended_hours"+il+"").val('');
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
        if(work_type_id=="Per Day")
        {
            var prepared_salary=(salary*present_days)+incentive_amt;
            var net_salary=prepared_salary.toFixed(0);
            if(present_days!='')
            {
                $("#prepared_salary"+il+"").val(net_salary);
                $("#final_prepared_salary"+il+"").val(net_salary);
            }
            else
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }

        }
	}
    /**********/
function onchangeofincentive(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
        var work_type_id =$('#work_type_id').val();
        var present_days =parseInt($('#present_days'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());

        if(work_type_id=="Per Month")
        {
            var working_days =parseInt($('#working_days'+il).val());
            var absent_days =working_days-present_days;
            var salary_per_day=salary/working_days;
            var salary_of_absent_days=absent_days*salary_per_day;

            var prepared_salary=(salary+incentive_amt)-salary_of_absent_days;
            var net_salary=prepared_salary.toFixed(0);
            if(isNaN(working_days))
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }else{
                //alert();
                if(present_days!='')
                {
                    if(working_days < present_days)
                    {
                        $("#working_days"+il+"").val('');
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
                else
                {
                        $("#prepared_salary"+il+"").val('0');
                        $("#final_prepared_salary"+il+"").val('');
                }

            }
        }
        if(work_type_id=="Per Hour")
        {
            var attended_hours =parseInt($('#attended_hours'+il).val());
            var prepared_salary=(salary*attended_hours)+incentive_amt;
            var net_salary=prepared_salary.toFixed(2);
            if(isNaN(attended_hours))
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }else{

                if(attended_hours < present_days)
                {
                    $("#attended_hours"+il+"").val('');
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
        if(work_type_id=="Per Day")
        {
            var prepared_salary=(salary*present_days)+incentive_amt;
            var net_salary=prepared_salary.toFixed(0);
            if(present_days!='')
            {
                $("#prepared_salary"+il+"").val(net_salary);
                $("#final_prepared_salary"+il+"").val(net_salary);
            }
            else
            {
                $("#prepared_salary"+il+"").val('0');
                $("#final_prepared_salary"+il+"").val('');
            }

        }
	}
/**********/
/**********/
function onchangeofattendedhours(il)
	{
        var salary =parseFloat($('#net_salary'+il).val());
        var work_type_id =$('#work_type_id').val();
        var present_days =parseInt($('#present_days'+il).val());
        var incentive_amt =parseFloat($('#incentive_amt'+il).val());
        if(work_type_id=="Per Hour")
        {

            var attended_hours =parseInt($('#attended_hours'+il).val());
            var prepared_salary=(salary*attended_hours)+incentive_amt;
            var net_salary=prepared_salary.toFixed(0);
            if(isNaN(present_days))
            {
                $("#prepared_salary"+il+"").val('0');
            }else{
                if(attended_hours < present_days)
                {
                    $("#attended_hours"+il+"").val('');
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
/**********/
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
                if($('#work_type_id').val()=="Per Month")
                {
                    $('#salary_generate_table').find("#working_days"+exp_id+"").each(function(){
					    $(this).css('border-color',''); 
					    if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				    });
                }
                if($('#work_type_id').val()=="Per Hour")
                {
                    $('#salary_generate_table').find("#attended_hours"+exp_id+"").each(function(){
					    $(this).css('border-color',''); 
					    if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				    });
                }

                $('#salary_generate_table').find("#present_days"+exp_id+"").each(function(){
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