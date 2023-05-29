<?php require APPROOT . '/views/layout_vertical/header.php'; ?>

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">

        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Salary Management</a></li>
            <li class="active">Employee Salary Payment</li>
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
                        <h5 class="panel-title">Employee Salary Payment</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm"></div>
                            <div class ="row">
                                <div class="col-sm-12">
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
                                            <label class="control-label" for="department_mstr_id"> Payment Mode</label>
                                            <select id="payment_mode" name="payment_mode" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <?php foreach($data["paymentmodeList"] as $value):?>
                                            <option value="<?=$value["_id"]?>" <?=(isset($data["paymentmodeList"]))?($data["paymentmodeList"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["payment_mode"]?></option>
                                            <?php endforeach;?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="other_payment_mode_div">
                                        <div class="form-group">
                                            <label class="control-label" for="department_mstr_id"> Other Payment Mode</label>
                                            <input type="text" name="other_payment_mode" id="other_payment_mode" class="form-control" value="" placeholder="Other Payment Mode" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                            <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="button">Search</button>
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
    $("#other_payment_mode_div").css('display','none'); 
	$('#payment_mode').change(function() {
		var status = $(this).val();

		if (status=='7')
		{
			$("#other_payment_mode_div").css('display','block'); 
		}
		else
		{
			$("#other_payment_mode_div").css('display','none');
			$("#other_payment_mode").val('');
		}

	});
    $("#btn_search").click(function() {
        var process = true;
         var payment_mode = $("#payment_mode").val();
         var other_payment_mode = $("#other_payment_mode").val();
         var sal_yr = $("#sal_yr").val();
        var sal_mnth = $("#sal_mnth").val();
        if (sal_mnth == '') {
            $("#sal_mnth").css({"border-color":"red"});
            $("#sal_mnth").focus();
            process = false;
          }
        if (payment_mode == '') {
            $("#payment_mode").css({"border-color":"red"});
            $("#payment_mode").focus();
            process = false;
          }

        if(payment_mode!='')
        {
            $.ajax({
                type:'POST',
                url:'<?=URLROOT;?>/SalaryController/employee_salary_payment_view/',
                data:{payment_mode:payment_mode, other_payment_mode: other_payment_mode, sal_yr:sal_yr, sal_mnth:sal_mnth},
                success:function(html)
                {
                    console.log(html);
                    $('#details').html(html);
                    $('#payment_mode_id').val(payment_mode);
                    $('#other_payment_mode_id').val(other_payment_mode);
                    $('#sal_yr_id').val(sal_yr);
                    $('#sal_mnth_id').val(sal_mnth);
                }
            });
        }
        return process;
    });
  $("#payment_mode_id").change(function(){$(this).css('border-color','');});
});
</script>
