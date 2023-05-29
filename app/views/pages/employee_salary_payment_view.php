
<form method="post" id="salary_pay_form" action="<?=URLROOT;?>/SalaryController/employee_salary_payment/">
<input type="hidden" name="payment_mode_id" id="payment_mode_id" value="" />
    <input type="hidden" name="other_payment_mode_id" id="other_payment_mode_id" value="" />
    <input type="hidden" name="sal_yr_id" id="sal_yr_id" value="" />
    <input type="hidden" name="sal_mnth_id" id="sal_mnth_id" value="" />
                        <div class="table-responsive">
                            <table id="salary_pay_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Emp Details</th>
                                        <th>Generated Salary<br/><i class="text-danger" style="font-size:10px;">(in Rs.)</i></th>
                                        <th>Paid Salary<br/><i class="text-danger" style="font-size:10px;">(in Rs.)</i></th>
                                        <th>Due Salary<br/><i class="text-danger" style="font-size:10px;">(in Rs.)</i></th>
                                        <?php if($data['payment_mode']!="1"){ ?><th>Cheque No. /<br/>Reference No.</th><?php } ?>
                                        <?php if($data['payment_mode']=="2"){ ?><th>Cheque Date</th><?php } else if($data['payment_mode']!="1" && $data['payment_mode']!="2"){ ?><th>Transaction Date</th><?php } ?>
                                        <?php if($data['payment_mode']!="1"){ ?><th>Bank Details</th><?php } ?>
                                        <th>Payable Amount<br/><i class="text-danger" style="font-size:10px;">(in Rs.)</i></th>
                                        <th><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if(isset($data["emp_list"])):
                                     if(empty($data["emp_list"])):
                                    ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center;">Data Not Available!!</td>
                                    </tr>
                                    <?php else:
                                    $i=0;
                                    $ii=1;
                                    foreach ($data["emp_list"] as $value):
                                    $j=$ii++;


                                    ?>
                                    <tr>
                                        <td><?=++$i;?></td>
                                        <td><?=(isset($value['first_name']))?$value["first_name"]:" ";?>
                                            <?=(isset($value['middle_name']))?$value['middle_name']." ":"";?>
                                            <?=(isset($value['last_name']))?$value['last_name']:"";?>
                                            <input type="hidden" name="employee_id[]" value="<?=$value['_id'];?>" />
                                        </td>
                                        <td><?=$value['final_salary'];?></td>

                                        <td><?=$value['total_collection'];?></td>
                                        <td><?=$value['due_amt'];?>
                                            <input type="text" id="due_amt<?=$j;?>" name="due_amt[]" value="<?=$value['due_amt'];?>"  hidden /></td>
                                        <?php if($data['payment_mode']!="1"){ ?><td><input type="text" class="form-control" id="check_neft_bank_imps_no<?=$j;?>" name="check_neft_bank_imps_no[]" maxlength="15" value="" onkeypress="return isNum(event);" /></td><?php } ?>
                                        <?php if($data['payment_mode']!="1"){ ?><td><input type="date" class="form-control" id="transaction_date<?=$j;?>" name="transaction_date[]" maxlength="2" onkeypress="return isNum(event);" value=""  /></td><?php } ?>
                                        <?php if($data['payment_mode']!="1"){ ?>
                                        <td>
                                            <select id="emp_bank_details_id<?=$j;?>" name="emp_bank_details_id[]" class="form-control">
                                            <?php
                                            if(isset($value['emp_bank_details_list'])){
                                                foreach($value['emp_bank_details_list'] as $bValue){
                                            ?>
                                                <optgroup label="<?=$bValue['bank_name']?>">
                                                    <option value="<?=$bValue['_id']?>"><?=$bValue['branch_name']?></option>
                                                </optgroup>
                                            <?php
                                                }
                                            }else{
                                            ?>
                                                <option value="">Not Available!!</option>
                                            <?php
                                            }
                                            ?>
                                            </select>


                                        </td><?php } ?>

                                        <td><input type="text" class="form-control" id="payable_amt<?=$j;?>" name="payable_amt[]" maxlength="5" onkeypress="return isNum(event);" value="<?=$value['due_amt'];?>" onblur="onchangeofpayableamt(<?=$j;?>);" /></td>
                                        <td><?php if(isset($value['pre_sal'])) { if($value['pre_sal']=='0'){ ?><input type="checkbox" class="chk_check" name="chk[]" value="<?=$j;?>" /><?php } else { echo "<span class='text-danger'>Previous Month Payment Pending</span>"; }} else { ?> <input type="checkbox" class="chk_check" name="chk[]" value="<?=$j;?>" /> <?php } ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif;  ?>
                                    <?php endif;  ?>
                                </tbody>
                            </table>
                        </div>
                         <?php
                        if(isset($data["emp_list"])):
                            if(!empty($data["emp_list"])):

                        ?>
                        <input type="submit" id="btn_bulk_payment" name="btn_bulk_payment" value="Salary Payment" class="btn btn-info" />
                        <?php endif;  ?>
                        <?php endif;  ?>
                        </form>


<script>	
	function onchangeofpayableamt(il)
    {
        var salary =parseFloat($('#net_salary'+il).val());
        var payable_amt =parseFloat($('#payable_amt'+il).val());
		var due_amt =parseFloat($('#due_amt'+il).val());
        if(isNaN(payable_amt))
        {
         $("#payable_amt"+il+"").val('');
        }
        else
          {
            if(payable_amt > due_amt)
               {
                $("#payable_amt"+il+"").val('');
               }
          }


	}
$(document).ready( function() {

    $("#salary_pay_form" ).submit(function( event )
	{ 
       var proceed = true;
        var checkedNum = $('input[name="chk[]"]:checked').length;
       if (!checkedNum) {
            alert("Please Select Atleast One Row Checkbox!!");
            proceed = false;
       }
       if(proceed){
       $('#salary_pay_table').find('.chk_check').each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
			if ($(this).is(":checked")) 
			{ 
				var exp_id = $(this).closest("tr").find('td:eq(0)').text();
                //payment_mode_id
                if($('#payment_mode_id').val()!="1")
                {
                    $('#salary_pay_table').find("#check_neft_bank_imps_no"+exp_id+"").each(function(){
					    $(this).css('border-color','');
					    if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				    });
                    $('#salary_pay_table').find("#transaction_date"+exp_id+"").each(function(){
					    $(this).css('border-color','');
					    if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				    });
                    $('#salary_pay_table').find("#emp_bank_details_id"+exp_id+"").each(function(){
					    $(this).css('border-color','');
					    if(!$.trim($(this).val())){ $(this).css('border-color','red'); 	proceed = false; }
				    });
                }
                $('#salary_pay_table').find("#payable_amt"+exp_id+"").each(function(){
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

	$('#salary_pay_table').find('tr input[type=text]').each(function(){
		$("input[type=text]").keyup(function() { $(this).css('border-color',''); 
		$("#result").slideUp(); 
		});
	});

});
</script>