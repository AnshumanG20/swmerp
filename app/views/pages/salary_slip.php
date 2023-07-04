<?php require APPROOT . '/views/layout_vertical/header.php';
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(
        0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    );
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
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
            <li class="active">Employee Salary Generate List</li>
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
                        <h5 class="panel-title">Salary Slip</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?= URLROOT; ?>/SalaryController/emp_sal_gen_list"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back To List </button></a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="post" id="dvContainer">
                                    <input type="hidden" id="id" name="id" class="form-control" value="<?= (isset($data['id'])) ? $data['id'] : ""; ?>" />
                                    <table width="978">
                                        <tr>
                                            <td>
                                                <div style="margin-left:190px;">
                                                    <img src="<?= URLROOT; ?>/mfile/assets/img/Main-Logo-min.png" style="width:180px;margin-bottom:5px;" /><br />
                                                    <!-- <span style="font-weight:bold; font-size:1.8em;margin-bottom:6px;"><?php //echo $data["EmpCompLocList"]["company_name"];
                                                                                                                            ?></span><br/> -->
                                                    <span style="font-weight:bold;margin-bottom:5px;"><?= $data["EmpCompLocList"]["address"]; ?><br />Contact No.: <?= $data["EmpCompLocList"]["contact_no"]; ?><br />Email id: <?= $data["EmpCompLocList"]["email_id"]; ?><br />Website: <?= $data["EmpCompLocList"]["website"]; ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:1.5em;">
                                                <center><b>Salary Slip</b></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <table width="600">
                                                        <tr>
                                                            <td width="300"><b>Emp Code /FY /Slip No.:</b>
                                                                <?= (isset($data["EmpSalList"]['employee_code'])) ? $data["EmpSalList"]["employee_code"] . " " : "N/A"; ?> /
                                                                <?= (isset($data["EmpSalList"]['financial_year'])) ? substr($data["EmpSalList"]['financial_year'], 2, 2) . "-" . substr($data["EmpSalList"]['financial_year'], -2) : ""; ?>/
                                                                <?= (isset($data["EmpSalList"]['salary_slip_no'])) ? $data["EmpSalList"]['salary_slip_no'] : ""; ?></td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <td width="300"><b>UAN No. :</b>
                                                                <?= (isset($data["EmpSalList"]['employee_code'])) ? $data["EmpSalList"]["employee_code"] . " " : "N/A"; ?> /
                                                                <?= (isset($data["EmpSalList"]['financial_year'])) ? substr($data["EmpSalList"]['financial_year'], 2, 2) . "-" . substr($data["EmpSalList"]['financial_year'], -2) : ""; ?>/
                                                                <?= (isset($data["EmpSalList"]['salary_slip_no'])) ? $data["EmpSalList"]['salary_slip_no'] : ""; ?>
                                                                
                                                            </td>
                                                        </tr> -->
                                                        <tr>
                                                            <td width="300"><b>Employee Name:</b>
                                                                <?= (isset($data["EmpSalList"]['first_name'])) ? $data["EmpSalList"]["first_name"] . " " : ""; ?>
                                                                <?= (isset($data["EmpSalList"]['middle_name'])) ? $data["EmpSalList"]['middle_name'] . " " : ""; ?>
                                                                <?= (isset($data["EmpSalList"]['last_name'])) ? $data["EmpSalList"]['last_name'] : ""; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Designation:</b> <?= $data["EmpSalList"]["designation_name"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Employment Type:</b> <?= $data["EmpSalList"]["employment_type"]; ?></td>
                                                        </tr>
                                                        <?php
                                                        $mon_yr = explode('-', $data["EmpSalList"]["month_year"]);
                                                        $mn = $mon_yr[1];
                                                        $yr = $mon_yr[0];
                                                        $monthName = date("F", mktime(0, 0, 0, $mn, 10));
                                                        ?>
                                                        <tr>
                                                            <td width="300"><b>Month:</b> <?= $monthName; ?><b> Year:</b> <?= $yr; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                        $basic_sal = $data["EmpSalList"]["basic_salary"];

                                        $da_sal = ($basic_sal * $data["EmpSalList"]["da_percent"]) / 100;
                                        $ta_sal = ($basic_sal * $data["EmpSalList"]["ta_percent"]) / 100;
                                        $hra_sal = ($basic_sal * $data["EmpSalList"]["hra_percent"]) / 100;
                                        $mr_sal = ($basic_sal * $data["EmpSalList"]["mr_percent"]) / 100;

                                        $gross_salary = $basic_sal + $da_sal + $hra_sal + $ta_sal + $mr_sal;
                                        $annual_salary = $gross_salary * 12;

                                        $pf_sal = (($annual_salary * $data["EmpSalList"]["epf_percent"]) / 100) / 12;
                                        $pt_sal = (($annual_salary * $data["EmpSalList"]["other_tax_percent"]) / 100) / 12;
                                        $es_sal = (($annual_salary * $data["EmpSalList"]["esic_percent"]) / 100) / 12;
                                        if ($annual_salary < 300000) {
                                            $tds_sal = 0;
                                        } else if ($annual_salary > 300000 && $annual_salary < 500000) {
                                            $tds_sal = (($annual_salary * 5) / 100) / 12;
                                        } else if ($annual_salary > 500000 && $annual_salary < 1000000) {
                                            $tds_sal = (10000 + ((($annual_salary - 500000) * 20) / 100)) / 12;
                                        } else {
                                            $tds_sal = (110000 + ((($annual_salary - 1000000) * 30) / 100)) / 12;
                                        }

                                        $total_deduct_sal = $pt_sal + $pf_sal + $es_sal + $tds_sal;
                                        $net_salary = $gross_salary - $total_deduct_sal;
                                        ?>
                                        <tr>
                                            <td>
                                                <center>
                                                    <table width="600" border="1">
                                                        <tr>
                                                            <td colspan="2" width="245"><b>&nbsp;&nbsp;Earnings</b></td>
                                                            <td colspan="2" width="245"><b>&nbsp;&nbsp;Deductions</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Basic Salary</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $data["EmpSalList"]["basic_salary"]; ?></td>
                                                            <td>&nbsp;&nbsp;Provident Fund</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= round($pf_sal, 2) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Dearness Allowance</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $da_sal; ?></td>
                                                            <td>&nbsp;&nbsp;ESIC</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $es_sal; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Travel Allowance</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $ta_sal; ?></td>
                                                            <td>&nbsp;&nbsp;Other Tax</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $pt_sal; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Medical Allowance</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $mr_sal; ?></td>
                                                            <td>&nbsp;&nbsp;TDS(Tax Deducted at Source)</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= round($tds_sal, 2); ?></td>
                                                            <!-- $tds_sal -->
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;House Rent Allowance</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $hra_sal; ?></td>
                                                            <td>&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Incentives</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $data["EmpSalList"]["incentive_amt"]; ?></td>
                                                            <td>&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;Total Addition</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= $gross_salary + $data["EmpSalList"]["incentive_amt"]; ?></td>
                                                            <td>&nbsp;&nbsp;Total Deduction</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;<?= round($total_deduct_sal, 2); ?></td>
                                                            <!-- $total_deduct_sal -->
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;</td>
                                                            <td>&nbsp;&nbsp;</td>
                                                            <td>&nbsp;&nbsp;<b>Net Salary</b></td>
                                                            <td style="text-align: right;padding: 2px; font-weight: 800;">&nbsp;&nbsp;<?= $data["EmpSalList"]["prepared_salary"];   ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;</td>
                                                            <td>&nbsp;&nbsp;<b>Final Salary</b></td>
                                                            <td style="text-align: right;padding: 2px; font-weight: bold;">&nbsp;&nbsp;<?= $data["EmpSalList"]["final_prepared_salary"];  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;</td>
                                                            <td>&nbsp;&nbsp;</td>
                                                            <td style="text-align: right;padding: 2px;">&nbsp;&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <table width="600">
                                                        <tr>
                                                            <td><b><?= strtoupper(getIndianCurrency($data["EmpSalList"]["final_prepared_salary"])); ?> ONLY</b></td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <table width="600">
                                                        <tr>
                                                            <td><b>Note :</b> All the benefits and deductions will be applicable to full time employees only.</td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <table width="600">
                                                        <tr>
                                                            <td colspan="2">
                                                                <div style="font-weight: bold;">**This is a computer generated payslip and does not require signature or stamp.</div>
                                                            </td>
                                                            <!-- <td><b><hr style="padding:0px; margin:0px; border-style:solid;width:140px;" />Employee Signature</b></td>
                                                                    <td align="right"><b><hr style="padding:0px; margin:0px; border-style:solid;width:140px;" />Employer Signature</b></td> -->
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>

                                    </table>
                                    <br />

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
    function printData() {
        var divToPrint = document.getElementById("dvContainer");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>