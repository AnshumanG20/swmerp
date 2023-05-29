<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
 <!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    
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
                    <li><a href="#">Reports </a></li>
                    <li class="active">Customer Invoice List</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!-- <?php echo $data ; ?> -->
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Customer Invoice List</h5>
                                </div>
                                <div class="panel-body">
                                    <!-- <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Invoice/invoice_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Generate New Invoice <i class="fa fa-arrow-right"></i></button></a>
                                    </div> -->
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Invoice/invoice_company">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                    <label class="control-label" for="from_date"><b>From Date</b> <span class="text-danger">*</span></label>
                                                    <div class="input-group date">
                                                        <input type="text" id="from_date" name="from_date" class="form-control mask_date" placeholder="From Date" value="<?=(isset($data["from_date"]))?$data["from_date"]:date('Y-m-d');?>" readonly>
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" for="to_date"><b>To Date</b><span class="text-danger">*</span> </label>
                                                    <div class="input-group date">
                                                        <input type="text" id="to_date" name="to_date" class="form-control mask_date" placeholder="To Date" value="<?=(isset($data["to_date"]))?$data["to_date"]:date('Y-m-d');?>" readonly>
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                 <label class="control-label" for="customer_name_id">Customer Name</label>
                                                    <div>
                                                        <select id="customer_name_id" name="customer_name_id" class="form-control">
                                                            <option value="">--select--</option>
                                                            <?php foreach($data['cust'] as $value):?>
                                                            <option value="<?=$value["_id"]?>" <?=(isset($data["customer_name_id"]))?($data["customer_name_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["contact_name"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                   <div class="col-md-3">
                                                    <label class="control-label" for="invoice_no">Invoice No </label>
                                                    <div class="input-group date">
                                                        <input type="text" id="invoice_no" name="invoice_no" class="form-control" placeholder="Invoice No" value="<?=(isset($data['invoice_no']))?$data['invoice_no']:"";?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                 <label class="control-label" for="invoice_status">Invoice Status <span class="text-danger">*</span></label>
                                                    <div>
                                                        <select id="invoice_status" name="invoice_status" class="form-control">
                                                            <option value="">--select--</option>
                                                             <option value="1" <?=(isset($data['invoice_status']))?($data['invoice_status']=="1")?"selected":"":"";?>>Paid</option>
                                                             <option value="2" <?=(isset($data['invoice_status']))?($data['invoice_status']=="2")?"selected":"":"";?>>Partially Paid</option>
                                                           <option value="3" <?=(isset($data['invoice_status']))?($data['invoice_status']=="3")?"selected":"":"";?>>Unpaid</option>
                                                        </select>
                                                    </div>
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
                                                <th>Invoice Date</th>
                                                <th>Invoice No.</th>
                                                <th>Customer Name</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Balance Due</th>
                                                <th>Status</th>
                                              <!--   <th>Record Payment</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["InvoiceList"])):
                                          if($data["InvoiceList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            foreach ($data["InvoiceList"] as $value):
                                            $today_time = time(); // or your date as well
                                            $payment_due_date_time = strtotime($value['payment_due_date']);
                                            $datediff = $today_time - $payment_due_date_time;

                                            $payment_due_by = round($datediff / (60 * 60 * 24));
                                    ?>
                                            <tr>
                                                <td><?=$value["invoice_date"];?></td>
                                                <td><a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$value["_id"];?>" class="text-danger"><?=$value["invoice_no"];?></a></td>
                                                <td><?=$value["contact_name"];?></td>
                                                <td><?=date('d-m-Y', strtotime($value["payment_due_date"]));?></td>
                                                <td><?=$value["bill_amt"];?></td>
                                                
                                                <td><?php
                                                $bill_due=$value['bill_amt'] -($value["total_payable_amt"] + $value["total_tax_amt"]);
                                                 echo number_format($bill_due, 2);
                                                ?></td>
                                                <td><a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$value["_id"];?>" ><?php
                                                            
                                                        if($value['paid_status']=='1')
                                                        { echo "<span class='text-danger'>PAID</span>"; } else {
                                                            ?><span class='text-success'>OVERDUE BY <?=$payment_due_by;?> DAYS </span><?php
                                                        }
                                                            ?></a></td>
                                               <!--  <td>
                                                <?php
                                                        if($value['paid_status']=='0')
                                                        {
                                                        ?>
                                                    <a class="label label-info" href="<?=URLROOT;?>/InvoicePayment/invoice_payment/<?=$value["_id"];?>" >Click <i class="fa fa-forward"></i></a>
                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </td>     -->
                                                    
                                            </tr>
                                        <?php endforeach;?>
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
<script src="<?=URLROOT;?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
$('#from_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $('#to_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $(document).ready(function() {
        $('#demo_dt_basic').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
              {
                text: 'excel',
                extend: "excel",
                title: "Report",
                footer: { text: '' },
                exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
            }, {
                text: 'pdf',
                extend: "pdf",
                title: "Report",
                download: 'open',
                footer: { text: '' },
                exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
            }]
        });
        $('#btn_search').click(function(){
           //var customer_name = $('#customer_name').val();
            var invoice_status = $('#invoice_status').val();
            var invoice_no = $('#invoice_no').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            /*if(customer_name=="")
            {
                 $("#customer_name").css({"border-color":"red"});
                $("#customer_name").focus();
                return false;
            }*/
            if(invoice_status=="")
            {
                $("#invoice_status").css({"border-color":"red"});
                $("#invoice_status").focus();
                return false;
            }
            if(invoice_no!="")
            {
                var exp = /^[A-Za-z0-9\-\s]+$/;
                    invoice_no = invoice_no.trim();
                if(!exp.test(invoice_no))
                {
                    $("#invoice_no").css({"border-color":"red"});
                    $("#invoice_no").focus();
                    return false;
                } 
            }
            if(from_date=="")
            {
                $("#from_date").css({"border-color":"red"});
                $("#from_date").focus();
                return false;
            }
            if(to_date=="")
            {
                $("#to_date").css({"border-color":"red"});
                $("#to_date").focus();
                return false;
            }
        });
        $("#customer_name_id").change(function(){$(this).css('border-color','');});
        $("#invoice_status").change(function(){$(this).css('border-color','');});
        $("#invoice_no").keyup(function(){$(this).css('border-color','');});
        $("#from_date").change(function(){$(this).css('border-color','');});
        $("#to_date").change(function(){$(this).css('border-color','');});
    });
 
</script>