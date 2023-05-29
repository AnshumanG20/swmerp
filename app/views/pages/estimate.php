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
            <li><a href="#">Estimates</a></li>
            <li class="active">Estimate</li>
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
                        <h5 class="panel-title"> Estimate</h5>
                    </div>
                    <div class="pad-btm">
                        <?php if($data["WorkOrderList"]["work_order_status"]=="0" || $data["WorkOrderList"]["work_order_status"]==""){ 
                                if($data["WorkOrderList"]["estimate_expiry_date"]<$data["date"] || $data["WorkOrderList"]["estimate_expiry_date"]>$data["date"] || $data["WorkOrderList"]["estimate_expiry_date"]==$data["date"]){ ?>
                        <a href="<?=URLROOT;?>/Estimate/estimate_add_update/<?=$data["WorkOrderList"]["_id"];?>"><button id="demo-foo-collapse" class="btn btn-info" style="float:left;margin-left: 25px;"><i class="fa fa-arrow-left"></i> Edit </button></a>
                        <a href="<?=URLROOT;?>/Estimate/estimate_list"><button id="demo-foo-collapse" class="btn btn-purple" style="float:right;margin-right: 25px;"><i class="fa fa-arrow-left"></i> Back </button></a>
                        <?php } else { ?>
                        <a href="<?=URLROOT;?>/Estimate/estimate_list"><button id="demo-foo-collapse" class="btn btn-purple" style="float:right;margin-right: 25px;"><i class="fa fa-arrow-left"></i> Back </button></a>
                        <?php } } else { ?>
                        <a href="<?=URLROOT;?>/Estimate/estimate_list"><button id="demo-foo-collapse" class="btn btn-purple" style="float:right;margin-right: 25px;"><i class="fa fa-arrow-left"></i> Back </button></a>
                        <?php } ?>
                    </div>

                    <div class="panel-body">

                        <form method="post"  id="dvContainer">
                             <?php if(isset($data["WorkOrderList"])): ?>
                            <table style="width:100%;margin-top:30px;">
                                <tr>
                                    <td>
                                        <img src="<?=URLROOT;?>/mfile/assets/img/Main-Logo-min.png" style="width:80px;" />
                                        <br/>
                                        <p style="font-size:12px;margin-bottom:-5px;"><b>Sri Publication</b></p>
                                        <p style="font-size:10px;"><i>Inspired for Excellence</i></p>
                                        <p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                            Ratu Road Ranchi
                                        </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                        Email Id: hajfhahf@gmail.com
                                        </p><p style="line-height: 100%; color:#000000;font-size:11px; margin-top:3px;">
                                        GSTIN:gst555555555555
                                        </p>
                                    </td>
                                    <td style="line-height: 120%; text-align:right;">

                                        <p style="font-size:20px; margin-top:3px;">	<b>Estimate	</b></p>
                                        <p style="font-size:12px; margin-top:2px;">	<b># <?=$data["WorkOrderList"]["estimate_no"];?></b>	</p>


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
                                            <b><u><?=$data["WorkOrderList"]["contact_name"];?></u></b> (<?=$data["WorkOrderList"]["gstin_no"];?>)
                                            <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        Address:<?=$data["WorkOrderList"]["state"];?> 
                                        <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        Place Of Supply: <?=$data["WorkOrderList"]["state"];?>
                                        </p>
                                    </td>

                                    <td style="text-align:right;font-size:11px;">
                                        <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                            Estimate Date :
                                            <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        Estimate Expiry Date :
                                    </td>
                                    <td style="text-align:right;font-size:11px;">
                                        <p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                            <?=date("d/m/Y", strtotime($data["WorkOrderList"]["estimate_date"]));?>
                                            <br /></p><p style="line-height: 100%; color:#000000;font-size:11px;margin-top:2px; ">
                                        <?=date("d/m/Y", strtotime($data["WorkOrderList"]["estimate_expiry_date"]));?>
                                    </td>
                                </tr>
                            </table>
                            <br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">	
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
                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?>
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



                                                ?>
                                                <?php endif;  ?>
                                                <?php
                                                $count=0;
                                                if(isset($data["WorkAssetsList"])):
                                                foreach ($data["WorkAssetsList"] as $value):

                                                ?>
                                                <tr style="font-size:11px;height:90px;">
                                                    <td style="border-bottom: 1pt dotted #E4E2E1;"><?=++$count;?>.</td>
                                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["item_name"];?></td>
                                                    <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["sub_item_name"];?><br><br><small><?=$value["sub_item_description"];?></small></td>
                                                    <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?php echo ($value['item_quantity'] == '')? '0':number_format($value['item_quantity']); ?></td>
                                                    <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_per_rate"],2);?></td>
                                                    <?php if($value["ship_from_state"]==$value["bill_to_state"]){ ?>
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
                                                    <?php }
                                                    $data["eachAssets_amt"] = $value["total_amt"]+$value["cgst_tax_amt"]+$value["sgst_tax_amt"];
                                                    ?>
                                                    <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($data["eachAssets_amt"],2);?></td>
                                                </tr>
                                                <?php endforeach;?>
                                                <?php endif;  ?>
                                                <?php if(isset($data["WorkOrderList"])): ?>
                                                <?php
                                                $sub_cgst_tax_per+=$data["WorkOrderList"]["cgst_tax_per"];
                                                $sub_sgst_tax_per+=$data["WorkOrderList"]["sgst_tax_per"];
                                                $sub_igst_tax_per+=$data["WorkOrderList"]["igst_tax_per"];
                                                $sub_cgst_tax_amt+=$data["WorkOrderList"]["cgst_tax_amt"];
                                                $sub_sgst_tax_amt+=$data["WorkOrderList"]["sgst_tax_amt"];
                                                $sub_igst_tax_amt+=$data["WorkOrderList"]["igst_tax_amt"];
                                                ?>

                                                <tr style="height:30px;">
                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td style="text-align:right;font-size:11px;">
                                                        Sub Total
                                                    </td>
                                                    <td style="text-align:right;font-size:11px;">
                                                        <?=number_format($data["WorkOrderList"]["sub_bill_amt"],2);?>
                                                    </td>
                                                </tr>
                                                <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?>
                                                <tr style="height:30px;">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td style="text-align:right;font-size:11px;">
                                                        CGST (<?=$sub_cgst_tax_per;?>%)
                                                    </td>
                                                    <td style="text-align:right;font-size:11px;">
                                                        <?=number_format($data["WorkOrderList"]["sub_cgst_tax_amt"],2);?>
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
                                                        SGST (<?=$sub_sgst_tax_per;?>%)
                                                    </td>
                                                    <td style="text-align:right;font-size:11px;">
                                                        <?=number_format($data["WorkOrderList"]["sub_sgst_tax_amt"],2);?>
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
                                                        IGST (<?=$sub_igst_tax_per;?>%)
                                                    </td>
                                                    <td style="text-align:right;font-size:11px;">
                                                        <?=number_format($data["WorkOrderList"]["sub_igst_tax_amt"],2);?>
                                                    </td>
                                                </tr>
                                                <?php } 
                                                if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"])
                                                { 
                                                    $sub_bill_tax_amt=$data["WorkOrderList"]["sub_bill_amt"] + $sub_cgst_tax_amt + $sub_sgst_tax_amt;
                                                }
                                                else
                                                {
                                                    $sub_bill_tax_amt=$data["WorkOrderList"]["sub_bill_amt"] + $sub_igst_tax_amt;
                                                }
                                                ?>

                                                <tr style="height:30px;">
                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td style="text-align:right;font-size:11px;">
                                                        Discount
                                                    </td>
                                                    <td style="text-align:right;font-size:11px;">
                                                        <span class="text-danger">(-)</span> <?=$data["WorkOrderList"]["discount_amt"];?>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td style="text-align:right; font-weight:700;font-size:11px;">
                                                        Total
                                                    </td>
                                                    <td style="text-align:right;font-weight:700;font-size:11px;">
                                                        &#x20b9; <?=number_format($data["WorkOrderList"]["bill_amt"],2);?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table>
                                            <tr>
                                                <td style="text-align:right;line-height: 110%;font-size:11px;height:30px;">
                                                    Total In Words: <b><i style="font-weight:600;"><?php echo ucwords(getIndianCurrency($data["WorkOrderList"]["bill_amt"])); ?></i></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:11px;color:#000;height:50px;">
                                                    <p style="font-size:10px">
                                                        Notes
                                                    </p>
                                                    <p style="font-size:10px"><?=$data["WorkOrderList"]["customer_notes"];?></p>
                                                    <br />
                                                    <p style="font-size:10px">
                                                        Terms & Conditions
                                                    </p>
                                                    <div style="font-size:10px;margin-top:10px;">
                                                        <?=$data["WorkOrderList"]["terms_and_conditions"];?>
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
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-md-2 col-lg-12">
                                    <button type="button" id="btnPrint" class="noprint btn  btn-primary" onclick="printData()">Print</button>
                                </div>
                            </div>


                        </form>
                        <?php endif; ?>
                    </div>
    </div>


</div>
</div>
</div>

<!--===================================================-->
<!--End page content-->
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

