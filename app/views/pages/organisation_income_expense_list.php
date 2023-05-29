<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?= URLROOT; ?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?= URLROOT; ?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?= URLROOT; ?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--DataTables [ OPTIONAL ]-->
<link href="<?= URLROOT; ?>/common/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
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
            <li><a href="#">Income/Expense </a></li>
            <li class="active">Organisation's Cash Income/Expense List</li>
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
                        <h5 class="panel-title">Organisation's Cash Income/Expense List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?= URLROOT; ?>/IncomeExpense/add_update_organisation_income_expense"><button id="demo-foo-collapse" class="btn btn-purple">Add New <i class="fa fa-arrow-right"></i></button></a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="post" action="<?= URLROOT; ?>/IncomeExpense/organisation_income_expense_list">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label" for="from_date"><b>From Date</b> </label>
                                            <div class="input-group date">
                                                <input type="text" id="from_date" name="from_date" class="form-control mask_date" placeholder="From Date" value="<?= (isset($data["from_date"])) ? $data["from_date"] : date('Y-m-d'); ?>" readonly>
                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="to_date"><b>To Date</b> </label>
                                            <div class="input-group date">
                                                <input type="text" id="to_date" name="to_date" class="form-control mask_date" placeholder="To Date" value="<?= (isset($data["to_date"])) ? $data["to_date"] : date('Y-m-d'); ?>" readonly>
                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="Account_Type"><b>Account Type</b> </label>
                                            <select id="account_type" name="account_type" class="form-control">
                                                <!-- <option value="'COMPANY_INCOME', 'COMPANY_EXPENSE'">INCOME/EXPENSE</option> -->
                                                <option value="">--SELECT--</option>
                                                <option value="COMPANY_INCOME" <?= (isset($data["COMPANY_INCOME"])) ? ($data["COMPANY_INCOME"] == "'COMPANY_INCOME'") ? "selected" : "" : ""; ?>>INCOME</option>
                                                <option value="COMPANY_EXPENSE" <?= (isset($data["COMPANY_EXPENSE"])) ? ($data["COMPANY_EXPENSE"] == "'COMPANY_EXPENSE'") ? "selected" : "" : ""; ?>>EXPENSE</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="payment_mode"><b>Transaction Mode</b> </label>
                                            <select id="payment_mode" name="payment_mode" class="form-control">
                                                <option value="">--SELECT--</option>
                                                <?php foreach ($data["paymentmodeList"] as $value) : ?>
                                                    <option value="<?= $value["_id"] ?>" <?= (isset($data["paymentmodeList"])) ? ($data["paymentmodeList"] == $value["_id"]) ? "SELECTED" : "" : ""; ?>><?= $value["payment_mode"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                            <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Transaction Date</th>
                                            <th>Income/Expense</th>
                                            <th>Payer/Payee Name</th>
                                            <th>Account Equation</th>
                                            <th>Amount</th>
                                            <th>Bill</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($data["IncomeExpenseCashList"])) :
                                            if ($data["IncomeExpenseCashList"] == "") :
                                        ?>
                                                <tr>
                                                    <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                                </tr>
                                                <?php else :
                                                $i = 0;
                                                // echo '<pre>';
                                                // print_r($data['IncomeExpenseCashList']);
                                                // die();
                                                foreach ($data["IncomeExpenseCashList"] as $value) :
                                                ?>
                                                    <tr>
                                                        <td><?= $value["transaction_date"]; ?></td>
                                                        <td><?= $value["transaction_type"]; ?></td>
                                                        <td><?= $value["payer_payee_name"]; ?></td>
                                                        <td><?= $value["accounting_equation"]; ?></td>
                                                        <td><?= $value["payable_amt"]; ?></td>
                                                        <td> <strong><a href="<?= URLROOT . "/uploads/" . $value["doc_path"]; ?>" target="_blank" class="text-purple"><i class="fa fa-eye"></i></a></strong></td>

                                                        <td><?= $value["remarks"]; ?></td>
                                                        <td>
                                                            <a class="label label-info" href="<?= URLROOT; ?>/IncomeExpense/add_update_organisation_income_expense/<?= $value["transaction_id"]; ?>" role="button">Edit <i class="fa fa-edit"></i></a>
                                                            &nbsp;
                                                            <a class="label label-warning" href="<?= URLROOT; ?>/IncomeExpense/payment_voucher/<?= $value["transaction_id"]; ?>" role="button">View <i class="fa fa-eye"></i></a>
                                                            &nbsp;
                                                            <button type="button" class="label label-danger" onclick="deletefun(<?= $value["transaction_id"]; ?>);">Delete <i class="fa fa-trash"></i></button>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif;  ?>
                                        <?php endif;  ?>
                                    </tbody>
                                </table>
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
<!--DataTables [ OPTIONAL ]-->
<script src="<?= URLROOT; ?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?= URLROOT; ?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    $('#from_date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        clearBtn: true,
        daysOfWeekHighlighted: [0]
    });
    $('#to_date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        clearBtn: true,
        daysOfWeekHighlighted: [0]
    });
    $(document).ready(function() {



        function modelInfo(msg) {
            $.niftyNoty({
                type: 'success',
                icon: 'pli-exclamation icon-2x',
                message: msg,
                container: 'floating',
                timer: 5000
            });
        }

        function modelDanger(msg) {
            $.niftyNoty({
                type: 'danger',
                icon: 'pli-exclamation icon-2x',
                message: msg,
                container: 'floating',
                timer: 5000
            });
        }
        <?php if ($msgg = flashToast("incomeAddSuccess")) { ?>
            modelInfo("<?= $msgg; ?>");
        <?php } ?>
        <?php if ($msgg = flashToast("expenseAddSuccess")) { ?>
            modelInfo("<?= $msgg; ?>");
        <?php } ?>

        <?php if ($msgg = flashToast("incomeUpdateSuccess")) { ?>
            modelInfo("<?= $msgg; ?>");
        <?php } ?>
        <?php if ($msgg = flashToast("expenseUpdateSuccess")) { ?>
            modelInfo("<?= $msgg; ?>");
        <?php } ?>
        <?php if ($msgg = flashToast("expenseDeleteSuccess")) { ?>
            modelInfo("<?= $msgg; ?>");
        <?php } ?>



        $('#demo_dt_basic').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                {
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: {
                        text: ''
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
            ]
        });
        $('#btn_search').click(function() {
            var process = true;
            var payment_mode = $('#payment_mode').val();
            if (payment_mode == "") {
                $("#payment_mode").css({
                    "border-color": "red"
                });
                $("#payment_mode").focus();
                process = false;
            }
            var from_date = $('#from_date').val();
            if (from_date == "") {
                $("#from_date").css({
                    "border-color": "red"
                });
                $("#from_date").focus();
                process = false;
            }
            var to_date = $('#to_date').val();
            if (to_date == "") {
                $("#to_date").css({
                    "border-color": "red"
                });
                $("#to_date").focus();
                process = false;
            }
            if (to_date < from_date) {
                alert('To Date Is Greater Than Or Equals To From Date');
                $("#to_date").css({
                    "border-color": "red"
                });
                $("#to_date").focus();
                process = false;
            }
            /* if(from_date > to_date )
            {
                alert("From Date Is Less Than Or Equals To, To Date");
               $("#from_date").css({"border-color":"red"});
               $("#from_date").focus();
               process = false;
            }*/
            var account_type = $('#account_type').val();
            if (account_type == "") {
                $("#account_type").css({
                    "border-color": "red"
                });
                $("#account_type").focus();
                process = false;
            }
            return process;
        });
        $("#payment_mode").change(function() {
            $(this).css('border-color', '');
        });
        $("#from_date").change(function() {
            $(this).css('border-color', '');
        });
        $("#to_date").change(function() {
            $(this).css('border-color', '');
        });
        $("#account_type").change(function() {
            $(this).css('border-color', '');
        });
    });

    function deletefun(ID) {
        var result = confirm("Do You Want To Delete");
        if (result)
            window.location.replace("<?= URLROOT; ?>/IncomeExpense/IE_DeleteById/" + ID);
    }
</script>