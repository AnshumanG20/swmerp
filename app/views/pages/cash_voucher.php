<?php require APPROOT . '/views/layout_vertical/header.php';

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                       <!-- <h1 class="page-header text-overflow">Department List</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Salary Management</a></li>
					<li class="active">Employee Salary Payment List</li>
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
					                <h5 class="panel-title">Cash Voucher</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/SalaryController/employee_salary_payment_list"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back To List  </button></a>
                                    </div>
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" id="dvContainer">
                                                <input type="hidden" id="id" name="id" class="form-control"  value="<?=(isset($data['id']))?$data['id']:"";?>" />
                                                <table style="width:100%;">
														<tr>
															<td>
																<img src="<?=URLROOT;?>/mfile/assets/img/Main-Logo-min.png" style="width:180px;" />
																<br />
																<span style="font-weight:bold; color:#000000;font-size:1em;"><?=$data["EmpCompLocList"]["company_name"];?></span><br>
																<span style="line-height: 100%; color:#000000;font-size:0.9em;">
																<?=$data["EmpCompLocList"]["address"];?>
                                                                <br />
																Emailid: <?=$data["EmpCompLocList"]["email_id"];?>
																<br />
																Phone No.:<?=$data["EmpCompLocList"]["contact_no"];?>
																<br />
																GSTIN:<?=$data["EmpCompLocList"]["gstin_no"];?>
																</span>
															</td>

															<td style="line-height: 120%; text-align:right;">
																<span style="font-size:20px; font-weight:bold; margin:0px; padding:0px;color:#78B4C6">
																CASH VOUCHER
																</span><br /><br />
																<table border="1px" style="font-size:0.9em;float:right;">
																	<tr>
																		<td><b>DATE</b></td>
																		<td><?=$data["EmpTranList"]["payment_date"];?></td>
																	</tr>
																	<tr>
																		<td><b>CASH VOUCHER NO.</b></td>
																		<td><?=$data["EmpTranList"]["cash_voucher_no"];?></td>
																	</tr>
																	<tr>
																		<td><b>VOUCHER AMOUNT</b></td>
																		<td>Rs. <?=$data["EmpTranList"]["payable_amt"];?></td>
																	</tr>

																</table>
															</td>
														</tr>

															<tr>

																<td colspan="2"> <br/><span style="font-weight:bold; color:#000000;font-size:1em;">Pay To - : </span>
																	<br />


																	<span style="color:#000000;font-size:0.9em;">
																	Employee Name :<?=(isset($data["EmpTranList"]['first_name']))?$data["EmpTranList"]["first_name"]." ":"";?>
                                            <?=(isset($data["EmpTranList"]['middle_name']))?$data["EmpTranList"]['middle_name']." ":"";?>
                                            <?=(isset($data["EmpTranList"]['last_name']))?$data["EmpTranList"]['last_name']:"";?><br />
																	Employee code :<?=(isset($data["EmpTranList"]['employee_code']))?$data["EmpTranList"]['employee_code']:"<span class='text-danger'>N/A</span>";?><br />
																	Contact No. :<?=$data["EmpTranList"]["personal_phone_no"];?><br />
																	<br />
																</span>
													    	</td>
															</tr>

														<tr>
															<td colspan="2"><span style="font-weight:bold; color:#000000;font-size:1em;">In Words - <u><?=strtoupper(getIndianCurrency($data["EmpTranList"]["payable_amt"]));?></u></span></td>
														</tr>			
													</table>
			<br/>
			<table>
				<tr height="60px">
					<td width="150px" valign="bottom" style="text-align:center;color:#000000;">
						<hr style="padding:0px; margin:0px; border-style:solid;" />
						Approved By
					</td>
					<td width="40px"></td>
					<td width="150px" valign="bottom" style="text-align:center;color:#000000;">
						<hr style="padding:0px; margin:0px; border-style:solid;" />
						Payer Signature
					</td>
					<td width="40px"></td>
					<td width="210px" valign="bottom" style="text-align:center;color:#000000;">
						<hr style="padding:0px; margin:0px; border-style:solid;" />
						Payee Signature
					</td>
				</tr>
			</table>
                                            </form>
                                            <div class="row" style="margin-top:1%;">
												<div class="col-md-2 col-lg-12">
													<button type="button" id="btnPrint" class="noprint btn  btn-primary" onclick="printData()">Print</button>
												</div>
											</div>
                                        </div>
                                    </div>

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
<script>
function printData()
{
   var divToPrint=document.getElementById("dvContainer");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>