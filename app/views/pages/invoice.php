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
            <li class="active">Invoice</li>
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
                        <h5 class="panel-title">Invoice</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Invoice/invoice_list"><button id="demo-foo-collapse" class="btn btn-purple" style="float:right;"><i class="fa fa-arrow-left"></i> Back </button></a>
                            <?php
                            if($data["EmpTranList"]["paid_status"]=='0')
                            {
                            ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CancelInvoice"> Cancel Invoice </button>
                            <a href="<?=URLROOT;?>/InvoicePayment/invoice_payment/<?=$data["_id"]?>"><button id="demo-foo-collapse" class="btn btn-success" style="float:right;"> Record Payment </button></a>
                            <?php
                            } elseif($data["EmpTranList"]["paid_status"]=='2'){ ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreditNote"> Generate Credit Note </button>
                            <span class="text-danger"><b>* This Invoice Is cancelled on <?=$data["EmpTranList"]["invoice_cancel_date"]; ?>.</b></span>
                            <?php } ?>
                        </div>


                        <!-- The Modal Cancel Invoice-->
                        <div class="modal" id="CancelInvoice">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Cancel Invoice</h4>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="post"  id="cancelInvoice" action="<?=URLROOT;?>/CreditNote/cancelInvoice/<?=$data["_id"];?>">
                                        <div class="modal-body">
                                            <input type="hidden" id="invoice_nos" name="invoice_nos" value="<?=$data['EmpTranList']['invoice_no']; ?>" />
                                            <input type="hidden" id="invoice_dat" name="invoice_dat" value="<?=$data['EmpTranList']['invoice_date']; ?>" />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label text-bold" for="invoice_date">Invoice cancellation Date<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" id="invoice_cancel_dates" name="invoice_cancel_dates" value="<?=(isset($data['invoice_cancel_date']))?$data['invoice_cancel_date']:date('Y-m-d');?>" class="form-control mask_date">

                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
											<div class="col-md-12">&nbsp;</div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Remarks <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <textarea class="form-control m-t-xxs" type="text" name="cancel_invoice_remarks" id="cancel_invoice_remarks" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-12">&nbsp;</div>
                                                <div class="col-md-4">&nbsp;</div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <button type="submit" id="btn_cancel_invoice" name="btn_cancel_invoice" class="btn btn-md btn-success btn-block">Cancel Invoice <i class="fa fa-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>


                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- The Modal Generate Credit Note-->
                        <div class="modal" id="CreditNote">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Generate Credit Note</h4>

                                    </div>

                                    <!-- Modal body -->
                                    <form method="post"  id="cancelInvoice" action="<?=URLROOT;?>/CreditNote/creditNote_add/<?=$data["_id"];?>">
                                        <div class="modal-body">
                                            <input type="hidden" id="cancel_date" name="cancel_date" value="<?=$data['EmpTranList']['invoice_cancel_date']; ?>" />
                                            <input type="hidden" id="invoice_nos" name="invoice_nos" value="<?=$data['EmpTranList']['invoice_no']; ?>" />
                                            <input type="hidden" id="invoice_dates" name="invoice_dates" value="<?=$data['EmpTranList']['invoice_date']; ?>" />
                                            <input type="hidden" id="payment_due_dates" name="payment_due_dates" value="<?=$data['EmpTranList']['payment_due_date']; ?>" />
                                            <input type="hidden" id="sub_bill_amts" name="sub_bill_amts" value="<?=$data['EmpTranList']['sub_bill_amt']; ?>" />
                                            <input type="hidden" id="discount_amts" name="discount_amts" value="<?=$data['EmpTranList']['discount_amt']; ?>" />
                                            <input type="hidden" id="bill_amts" name="bill_amts" value="<?=$data['EmpTranList']['bill_amt']; ?>" />
                                            <input type="hidden" id="cgst_total_taxs" name="cgst_total_taxs" value="<?=$data['EmpTranList']['cgst_total_tax']; ?>" />
                                            <input type="hidden" id="sgst_total_taxs" name="sgst_total_taxs" value="<?=$data['EmpTranList']['sgst_total_tax']; ?>" />
                                            <input type="hidden" id="igst_total_taxs" name="igst_total_taxs" value="<?=$data['EmpTranList']['igst_total_tax']; ?>" />
                                            <table class="table" width="100%" style="margin-top:10px;display:none;">
                                                <tbody>

                                                    <?php $i=0; 
                                                    // echo '<pre>';print_r($data);
                                                    // return;
                                                    foreach ($data["InvList"] as $value):
                                                    $i++;

                                                    ?>
                                                    <tr><td><input type="hidden" id="asset_type<?=$i;?>" name="asset_type[]" value="<?=$value['asset_type']; ?>" /></td>
                                                        <td><input type="hidden" id="item_mstr_ids<?=$i;?>" name="item_mstr_ids[]" value="<?=$value['item_mstr_id']; ?>" /></td>
                                                        <td><input type="hidden" id="sub_item_mstr_ids<?=$i;?>" name="sub_item_mstr_ids[]" value="<?=$value['sub_item_mstr_id']; ?>" /></td>
                                                        <td><input type="hidden" id="item_quantitys<?=$i;?>" name="item_quantitys[]" value="<?=$value['item_quantity']; ?>" /></td>
                                                        <td><input type="hidden" id="item_per_rates<?=$i;?>" name="item_per_rates[]" value="<?=$value['item_per_rate']; ?>" /></td>
                                                        <td><input type="hidden" id="total_amts<?=$i;?>" name="total_amts[]" value="<?=$value['total_amt']; ?>" /></td>
                                                        <td><input type="hidden" id="cgst_tax_pers<?=$i;?>" name="cgst_tax_pers[]" value="<?=$value['cgst_tax_per']; ?>" /></td>
                                                        <td><input type="hidden" id="sgst_tax_pers<?=$i;?>" name="sgst_tax_pers[]" value="<?=$value['sgst_tax_per']; ?>" /></td>
                                                        <td><input type="hidden" id="igst_tax_pers<?=$i;?>" name="igst_tax_pers[]" value="<?=$value['igst_tax_per']; ?>" /></td>
                                                        <td><input type="hidden" id="cgst_tax_amts<?=$i;?>" name="cgst_tax_amts[]" value="<?=$value['cgst_tax_amt']; ?>" /></td>
                                                        <td><input type="hidden" id="sgst_tax_amts<?=$i;?>" name="sgst_tax_amts[]" value="<?=$value['sgst_tax_amt']; ?>" /></td>
                                                        <td><input type="hidden" id="igst_tax_amts<?=$i;?>" name="igst_tax_amts[]" value="<?=$value['igst_tax_amt']; ?>" /></td>
                                                        <td><input type="hidden" id="grande_total_amts<?=$i;?>" name="grande_total_amts[]" value="<?=$value['grande_total_amt']; ?>" /></td>
                                                        <td><input type="hidden" id="sub_item_descriptions<?=$i;?>" name="sub_item_descriptions[]" value="<?=$value['sub_item_description']; ?>" /></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label text-bold" for="invoice_date">Credit Note Date<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" id="invoice_cancel_date" name="invoice_cancel_date" value="<?=(isset($data['invoice_cancel_date']))?$data['invoice_cancel_date']:date('Y-m-d');?>" class="form-control mask_date">

                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="row">
                                                <div class="col-md-12">&nbsp;</div>
                                                <div class="col-md-4">&nbsp;</div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <button type="submit" id="btn_generate_credit_note" name="btn_generate_credit_note" class="btn btn-md btn-success btn-block">Generate Credit Note <i class="fa fa-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>


                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class ="row">
                            <div class="col-md-12">
                                <form metdod="post"  id="dvContainer">

                                    <table style="width:100%;margin-top:30px;">
                                        <tr>
                                            <td>
                                                <img src="<?=URLROOT;?>/mfile/assets/img/Main-Logo-min.png" style="width:80px;" />
                                                <br/>
                                                <p style="font-size:12px;margin-bottom:-5px;"><b><?=$data["EmpCompLocList"]["company_name"]??null;?></b></p>
                                                <p style="font-size:10px;"><i>Inspired for Excellence</i></p>
                                                <p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                    <?=$data["EmpCompLocList"]["address"]??null;?>
                                                </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                Email Id: <?=$data["EmpCompLocList"]["email_id"]??null;?>
                                                </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                GSTIN:<?=$data["EmpCompLocList"]["gstin_no"]??null;?>
                                                </p>
                                            </td>
                                            <td style="line-height: 120%; text-align:right;">

                                                <p style="font-size:20px; margin-top:3px;">	<b>INVOICE	</b></p>
                                                <p style="font-size:12px; margin-top:2px;">	<b># <?=$data["EmpTranList"]["invoice_no"];?></b>	</p>
                                                <p style="font-size:12px; margin-top:2px;">	<b>Balance Due</b>
                                                </p>
                                                <p style="font-size:12px; margin-top:2px; "><b>
                                                    <?php if($data["EmpTranList"]["paid_status"]=='2' || $data["EmpTranList"]["paid_status"]=='3'){ ?>
                                                    &#x20b9; <?=number_format(0,2);?>
													<?php } else { ?>
													&#x20b9; <?=number_format($data["InvoicetrList"]["balance_due"],2);?>
													<?php } ?>
                                                </p>

                                            </td>
                                        </tr>
                                    </table>
                                    <br />
                                    <table width="100%" style="margin-top:10px; ">
                                        <tr>
                                            <td>
                                                <p style="line-height: 100%;color:#000000;margin-top:2px;font-size:11px;  ">
                                                    Bill To</p>
                                                <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                    <b><u><?=$data["EmpTranList"]["contact_name"];?></u></b> (<?=$data["EmpTranList"]["gstin_no"];?>)
                                                    <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                <?=$data["BillingList"]["address"];?> 
                                                <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                Place Of Supply: <?=$data["BillingList"]["state"];?>
                                                </p>
                                            </td>

                                            <td style="text-align:right;font-size:11px;">

                                                <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                    Invoice Date :
                                                    <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                Due Date :
                                        </div>
                                        </td>
                                    <td style="text-align:right;font-size:11px;">

                                        <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                            <?=date("d/m/Y", strtotime($data["EmpTranList"]["invoice_date"]));?>
                                            <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        <?=date("d/m/Y", strtotime($data["EmpTranList"]["payment_due_date"]));?>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        <br />

                        <table class="table" width="100%" style="margin-top:10px;">
                            <thead>
                                <tr style="background-color:#716e6e;font-size:11px;">
                                    <th style="width:10px;height:46px;color:#fff;">
                                        #
                                    </th>
                                    <th style="width:30px;color:#fff;">Item</th>
                                    <th style="width:30px;color:#fff;">Sub Item</th>
                                    <th style="text-align:right;width:40px;color:#fff;">Qty</th>
                                    <th style="text-align:right;width:70px;color:#fff;">Rate</th>
                                    <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null ==$data["BillingList"]["state_name"]??null){ ?>
                                    <th style="text-align:right;width:80px;color:#fff;">
                                        CGST
                                    </th>

                                    <th style="text-align:right;width:80px;color:#fff;">
                                        SGST
                                    </th>
                                    <?php } else { ?>
                                    <th style="text-align:right;width:80px;color:#fff;">
                                        IGST
                                    </th>
                                    <?php } ?>
                                    <th style="text-align:right;width:100px;color:#fff;">
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sub_cgst_tax_per=0;
                                $sub_sgst_tax_per=0;
                                $sub_igst_tax_per=0;
                                $sub_cgst_tax_amt=0;
                                $sub_sgst_tax_amt=0;
                                $sub_igst_tax_amt=0;

                                $count=0;
                                // echo '<pre>';print_r($data['InvList']);return;
                                foreach ($data["InvList"] as $value):
                                ?>
                                <tr style="font-size:11px;height:90px;">
                                    <td style="border-bottom: 1pt dotted #E4E2E1;"><?=++$count;?>.</td>
                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["item_name"];?></td>
                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["sub_item_name"];?><br/><small><?=$value["sub_item_description"];?><small></td>
                                        <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_quantity"], 2);?></td>
                                        <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_per_rate"],2);?></td>
                                        <?php if($data["EmpCompLocList"]["state_dist_city_id"]?? null == $data["BillingList"]["state_name"]??null){ ?>
                                        <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                            <?=$value["cgst_tax_amt"];?><br /><br />
                                            <span style="font-size:10px;"><?=$value["cgst_tax_per"];?>%</span>
                                        </td>

                                        <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                            <?=$value["sgst_tax_amt"];?><br /><br />
                                            <span style="font-size:10px;"><?=$value["sgst_tax_per"];?>%</span>
                                        </td>
                                        <?php } else { ?>

                                        <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                            <?=$value["igst_tax_amt"];?><br /><br />
                                            <span style="font-size:10px;"><?=$value["igst_tax_per"];?>%</span>
                                        </td>
                                        <?php } ?>
                                        <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["grande_total_amt"],2);?></td>
                                        </tr>
                                        <?php
                                        
                                        $sub_cgst_tax_amt+=$value["cgst_tax_amt"];
                                        $sub_sgst_tax_amt+=$value["sgst_tax_amt"];
                                        $sub_igst_tax_amt+=$value["igst_tax_amt"];
                                        ?>
                                        <?php endforeach;?>
                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null == $data["BillingList"]["state_name"]??null){ ?><td></td><?php } ?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                Sub Total
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <?=number_format($data["EmpTranList"]["sub_bill_amt"],2);?>
                                            </td>
                                        </tr>
                                        <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null==$data["BillingList"]["state_name"]??null){ ?>
                                        <tr style="height:30px;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                CGST (<?=$value["cgst_tax_per"];?>%)
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <?=$sub_cgst_tax_amt;?>
                                            </td>
                                        </tr>

                                        <tr style="height:30px;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                SGST (<?=$value["sgst_tax_per"];?>%)
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <?=$sub_sgst_tax_amt;?>
                                            </td>
                                        </tr>
                                        <?php } else { ?>

                                        <tr style="height:30px;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                IGST (<?=$value["igst_tax_per"]??null;?>%)
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <?=$sub_igst_tax_amt;?>
                                            </td>
                                        </tr>
                                        <?php } 
                                        if($data["EmpCompLocList"]["state_dist_city_id"]??null == $data["BillingList"]["state_name"]??null)
                                        { 
                                            $sub_bill_tax_amt=$data["EmpTranList"]["sub_bill_amt"] + $sub_cgst_tax_amt + $sub_sgst_tax_amt;
                                        }
                                        else
                                        {
                                            $sub_bill_tax_amt=$data["EmpTranList"]["sub_bill_amt"] + $sub_igst_tax_amt;
                                        }
                                        ?>

                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null == $data["BillingList"]["state_name"]??null){ ?><td></td><?php } ?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                Discount
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <span class="text-danger">(-)</span> <?=$data["EmpTranList"]["discount_amt"];?>
                                            </td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null == $data["BillingList"]["state_name"]??null){ ?><td></td><?php } ?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right; font-weight:700;font-size:11px;">
                                                Total
                                            </td>
                                            <td style="text-align:right;font-weight:700;font-size:11px;">
                                                &#x20b9; <?=number_format($data["EmpTranList"]["bill_amt"],2);?>
                                            </td>
                                        </tr>
                                        <?php

                                        if(isset($data["InvpayList"]))
                                        {
                                            if($data["InvpayList"]!="")
                                            {

                                        ?>
                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null==$data["BillingList"]["state_name"]??null){ ?><td></td><?php } ?>	
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right;font-size:11px;">
                                                Payment Made
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <span class="text-danger"> (-) <?=number_format($data["InvoicetrList"]["total_payable_amt"],2);?></span>
                                            </td>
                                        </tr>
                                        <?php

                                            }
                                        }

                                        ?>
                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]??null==$data["BillingList"]["state_name"]??null){ ?><td></td><?php } ?>	
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right; font-weight:700;font-size:11px;">
                                                Balance Due
                                            </td>
                                            <td style="text-align:right;font-weight:700;font-size:11px;">
											<?php
											if($data["EmpTranList"]["paid_status"]=='2' || $data["EmpTranList"]["paid_status"]=='3')
											{
											?>
                                                &#x20b9; <?=number_format(0,2);?>
											<?php } else { ?>
												&#x20b9; <?=number_format($data["InvoicetrList"]["balance_due"],2);?>
											<?php }
												?>
                                            </td>
                                        </tr>

                            </tbody>
                        </table>

                        <table>
                            <tr>
                                <td style="text-align:right;line-height: 110%;font-size:11px;height:30px;">
                                    Total In Words: <i style="font-weight:600;"><?php echo ucwords(getIndianCurrency($data["EmpTranList"]["bill_amt"])); ?></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:11px;color:#000;height:50px;">
                                    <p style="font-size:10px">
                                        Notes
                                    </p>
                                    <p style="font-size:10px"><?=$data["EmpTranList"]["customer_note"];?></p>
                                    <br />
                                    <p style="font-size:10px">
                                        Terms & Conditions
                                    </p>
                                    <div style="font-size:10px;margin-top:10px;">
                                        <?=$data["EmpTranList"]["terms_and_conditions"];?>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <br /><p style="font-size:11px;color:#000;">
                                    Authorized Signature <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                            </span>
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
    $('#invoice_cancel_date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $('#invoice_cancel_dates').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    function printData()
    {
        // debugger;
        var divToPrint = document.getElementById("dvContainer").innerHTML;  
       var printWindow = window.open('', '', 'height=600,width=800');  
       printWindow.document.write('<html><head><title>Print Receipt</title>');  
       printWindow.document.write('</head><body >');  
       printWindow.document.write(divToPrint);  
       printWindow.document.write('</body></html>');  
       printWindow.document.close();  
       printWindow.print();  
    }

    $("#btn_cancel_invoice").click(function(){
        process = true;
        var invoice_dat = $("#invoice_dat").val();
		var cancel_invoice_remarks = $("#cancel_invoice_remarks").val();
        var invoice_cancel_dates = $("#invoice_cancel_dates").val();
        if (invoice_dat > invoice_cancel_dates) {
            alert("Cancel date must be greater than Invoice date..");
            $("#invoice_cancel_dates").css('border-color', 'red'); process = false;
        }
		if (cancel_invoice_remarks=="") {
            alert("Please Mention Cancel Remarks..");
            $("#cancel_invoice_remarks").css('border-color', 'red'); process = false;
        }
        return process;
    });
    $("#invoice_cancel_dates").change(function(){ $(this).css('border-color',''); });
	$("#cancel_invoice_remarks").change(function(){ $(this).css('border-color',''); });
	
    $("#btn_generate_credit_note").click(function(){
        process = true;
        var cancel_date = $("#cancel_date").val();
        var invoice_cancel_date = $("#invoice_cancel_date").val();
        if (cancel_date > invoice_cancel_date) {
            alert("Credit note date must be greater than Invoice cancel date..");
            $("#invoice_cancel_date").css('border-color', 'red'); process = false;
        }
        return process;
    });
    $("#invoice_cancel_date").change(function(){ $(this).css('border-color',''); });
</script>