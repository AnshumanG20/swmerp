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
            <li><a href="#">Credit Note</a></li>
            <li class="active">Credit Note</li>
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
                        <h5 class="panel-title">Credit Note</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Invoice/invoice_list"><button id="demo-foo-collapse" class="btn btn-purple" style="float:right;"><i class="fa fa-arrow-left"></i> Back </button></a>

                        </div>



                        <div class ="row">
                            <div class="col-md-12">
                                <form metdod="post"  id="dvContainer">

                                    <table style="width:100%;margin-top:30px;">
                                        <tr>
                                            <td>
                                                <img src="<?=URLROOT;?>/mfile/assets/img/Main-Logo-min.png" style="width:80px;" />
                                                <br/>
                                                <p style="font-size:12px;margin-bottom:-5px;"><b><?=$data["EmpCompLocList"]["company_name"];?></b></p>
                                                <p style="font-size:10px;"><i>Inspired for Excellence</i></p>
                                                <p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                    <?=$data["EmpCompLocList"]["address"];?>
                                                </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                Email Id: <?=$data["EmpCompLocList"]["email_id"];?>
                                                </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                                GSTIN:<?=$data["EmpCompLocList"]["gstin_no"];?>
                                                </p>
                                            </td>
                                            <td style="line-height: 120%; text-align:right;">

                                                <p style="font-size:20px; margin-top:3px;">	<b>CREDIT NOTE	</b></p>
                                                <p style="font-size:12px; margin-top:2px;">	<b># <?=$data["getcreditnote"]["credit_note_no"];?></b>	</p>
                                                <p style="font-size:12px; margin-top:2px;">	<b>Invoice</b>
                                                </p>
                                                <p style="font-size:12px; margin-top:2px;">	<b># <?=$data["EmpTranList"]["invoice_no"];?></b>	</p>
                                                <p style="font-size:12px; margin-top:2px;">	<b>Balance Due</b>
                                                </p>
                                                <p style="font-size:12px; margin-top:2px; "><b>
                                                    &#x20b9; <?=number_format(0,2);?></b>
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
                                                    Credit Note Date :
                                                    <br /></p>
                                                <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                    Invoice Date :
                                                    <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                                Due Date :
                                        </div>
                                        </td>
                                    <td style="text-align:right;font-size:11px;">
                                        <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                            <?=date("d/m/Y", strtotime($data["getcreditnote"]["credit_note_date"]));?>
                                            <br /></p>
                                        <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                            <?=date("d/m/Y", strtotime($data["EmpTranList"]["invoice_date"]));?>
                                            <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        <?=date("d/m/Y", strtotime($data["EmpTranList"]["payment_due_date"]));?>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        <br/>

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
                                    <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?>
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
                                foreach ($data["InvList"] as $value):
                                ?>
                                <tr style="font-size:11px;height:90px;">
                                    <td style="border-bottom: 1pt dotted #E4E2E1;"><?=++$count;?>.</td>
                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["item_name"];?></td>
                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["sub_item_name"];?><br/><small><?=$value["sub_item_description"];?><small></td>
                                        <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_quantity"], 2);?></td>
                                        <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_per_rate"],2);?></td>
                                        <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?>
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
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?><td></td><?php } ?>
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
                                        <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?>
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
                                                IGST (<?=$value["igst_tax_per"];?>%)
                                            </td>
                                            <td style="text-align:right;font-size:11px;">
                                                <?=$sub_igst_tax_amt;?>
                                            </td>
                                        </tr>
                                        <?php } 
                                        if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"])
                                        { 
                                            $sub_bill_tax_amt=$data["EmpTranList"]["sub_bill_amt"] + $sub_cgst_tax_amt + $sub_sgst_tax_amt;
                                        }
                                        else
                                        {
                                            $sub_bill_tax_amt=$data["EmpTranList"]["sub_bill_amt"] + $sub_igst_tax_amt;
                                        }
                                        ?>

                                        <tr style="height:30px;">
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?><td></td><?php } ?>
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
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?><td></td><?php } ?>
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
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?><td></td><?php } ?>	
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
                                            <?php if($data["EmpCompLocList"]["state_dist_city_id"]==$data["BillingList"]["state_name"]){ ?><td></td><?php } ?>	
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td style="text-align:right; font-weight:700;font-size:11px;">
                                                Balance Due
                                            </td>
                                            <td style="text-align:right;font-weight:700;font-size:11px;">
                                                &#x20b9; <?=number_format(0,2);?>
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
        var divToPrint=document.getElementById("dvContainer");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>