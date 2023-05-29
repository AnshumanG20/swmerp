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
					<li><a href="#">Invoice</a></li>
					<li class="active">Payment Receipt</li>
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
					                <h5 class="panel-title">Payment Receipt</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Invoice/invoice_list"><button id="demo-foo-collapse" class="btn btn-success" style="float:right;"><i class="fa fa-arrow-left"></i> Back </button></a>
										<?php
										if($data["EmpTranList"]["_id"]==$data["EmpLastTranList"]["transaction_id"])
										{
										?>
										<a href="<?=URLROOT;?>/InvoicePayment/invoice_payment/<?=$data["EmpTranList"]["generate_id"];?>/<?=$data["EmpTranList"]["_id"];?>/" style="float:right;"><button class="btn btn-primary">Edit </button></a>
										<?php
										}
										?>
                                    </div>
									
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form method="post" id="dvContainer">
													<div style="padding-bottom:10px;border-bottom:1px solid #eee;width:100%;">
													  <table>
														<tbody>
														  <tr>
															<td style="vertical-align:top;padding-left:30px">
															<img src="<?=URLROOT;?>/mfile/assets/img/Main-Logo-min.png" style="width:180px;" />
															<br />
															<?php //echo '<pre>'; print_r($data); return; ?>
																<p><span><b><?=($data["EmpCompLocList"]["company_name"]??null);?></b><br></span></p>
																<span style="white-space: pre-wrap;color:#999;" id="tmp_org_address"><?=($data["EmpCompLocList"]["address"]??null);?><br />India<br />GSTIN:<?=($data["EmpCompLocList"]["gstin_no"]??null);?></span>
															</td>
														  </tr>
														</tbody>
													  </table>
													</div>
													<div style="padding:15px 0 15px;text-align:center">
													  <span style="border-bottom:1px solid #eee;font-size:13pt;font-weight:bold;">PAYMENT RECEIPT</span>
													</div>
													<div style="width: 70%;float: left;">
														<div style="width: 100%;padding: 11px 0;">
															<div style="width:35%;float:left;">Payment Date</div>
															<div style="width:65%;border-bottom:1px solid #eee;float:right;"><b><?=$data["EmpTranList"]["payment_date"];?></b></div>
															<div style="clear:both;"></div>
														</div>

														<div style="width: 100%;padding: 10px 0;">
															<div style="width:35%;float:left;" class="pcs-label">Payment Number</div>
															<div style="width:65%;border-bottom:1px solid #eee;float:right;min-height:22px"><b>#<?=$data["EmpTranList"]["payment_no"];?></b></div>
															<div style="clear:both;"></div>
														</div>
														<div style="width: 100%;padding: 11px 0;">
														  <div style="width:35%;float:left;" class="pcs-label">Payment Mode</div>
														  <div style="width:65%;border-bottom:1px solid #eee;float:right;"><b><?php if($data["EmpTranList"]["payment_mode_id"]=='1') { ?><?=$data["EmpTranList"]["payment_mode"];?><?php } else { echo $data["EmpTranList"]["payment_mode"]; } ?></b></div>
														  <div style="clear:both;"></div>
														</div>
														<div style="width: 100%;padding: 11px 0;">
															<div style="width:35%;float:left;" class="pcs-label">Amount Received In Words</div>
															<div style="width:65%;border-bottom:1px solid #eee;float:right;"><b><?php echo ucwords(getIndianCurrency($data["EmpTranList"]["payable_amt"])); ?> </b></div>
															<div style="clear:both;"></div>
														</div>
													</div>
													<div style="text-align:center;color:#ffffff;float:right;background:#78ae54;width: 25%; padding: 34px 5px;">
													  <span> Amount Received</span><br>
													  <span> ₹<?=$data["EmpTranList"]["payable_amt"];?> </span>
													</div>
													<div style="clear:both;"></div>
													<div style="margin-top:20px">
													  <table style="width:100%">
														<tbody>
														  <tr>
															<td>
															   <div><p style="font-weight:600">Bill To</p>
																	<span style="white-space: pre-wrap;" ><strong><span><?=$data["EmpTranList"]["contact_name"];?></span></strong> ( <?=$data["EmpTranList"]["gstin_no"];?>)<br /></span>
																</div>
															</td>
															<td style="text-align: right;vertical-align:top">
																<p>Authorized Signature</p>
																  <p></p><div style="float:right;width: 200px;border-bottom: 1px solid #ededed;margin-top: 50px;"></div><p></p>
															</td>
														  </tr>
														</tbody>
													  </table>
													</div>
													<div style="margin-top:15px;page-break-inside: avoid;">
														<h4 style="margin-bottom:14px;">Payment for</h4>

														<table style="width:100%;table-layout:fixed;" border="0" cellspacing="0" cellpadding="0">
															<thead>
																<tr style="height:40px;">

																	<td style="padding:5px 10px 5px 10px;word-wrap: break-word;">
																	 Invoice Number
																	</td>

																	<td style="padding:5px 10px 5px 5px;word-wrap: break-word;">
																	  Invoice Date
																	</td>

																	<td align="right" style="padding:5px 10px 5px 5px;word-wrap: break-word;">
																	  Invoice Amount
																	</td>


																	<td align="right" style="padding:5px 10px 5px 5px;word-wrap: break-word;">
																	   Payment Amount
																	</td>

																</tr>
															 </thead>
															 <tbody>
															   <tr style="border-top:1px solid #ededed">

																	<td valign="top" style="padding: 10px 0px 10px 10px;word-wrap: break-word;"><span><a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$data["EmpTranList"]["generate_id"];?>" style="color:red;"><?=$data["EmpTranList"]["invoice_no"];?></a></span></td>

																	<td valign="top" style="padding: 10px 10px 5px 10px;word-wrap: break-word;"><?=$data["EmpTranList"]["invoice_date"];?>   </td>

																	<td valign="top" style="padding: 10px 10px 5px 10px; text-align:right; word-wrap: break-word;">
																	  <i class="fa fa-rupee"></i> <?=$data["EmpTranList"]["bill_amt"];?>
																	</td>


																	<td valign="top" style="text-align:right;padding: 10px 10px 10px 5px;word-wrap: break-word;">
																	 <i class="fa fa-rupee"></i> <?=$data["EmpTranList"]["payable_amt"];?>
																	</td>
																</tr>
															</tbody>
															</table>
													</div>
													
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
   var divToPrint = document.getElementById("dvContainer").innerHTML;  
       var printWindow = window.open('', '', 'height=600,width=800');  
       printWindow.document.write('<html><head><title>Print Receipt</title>');  
       printWindow.document.write('</head><body >');  
       printWindow.document.write(divToPrint);  
       printWindow.document.write('</body></html>');  
       printWindow.document.close();  
       printWindow.print();  
}
</script>