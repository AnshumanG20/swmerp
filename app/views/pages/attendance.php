<?php require APPROOT . '/views/layout_vertical/header.php'; ?>

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">attendance</li>
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
                        <h3 class="panel-title">ATTENDANCE</h3>

                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <div class="row">
                        <div class="col-md-12" style="margin-left: 20px;">
                            <form id="add_form" class="form-horizontal" onsubmit="show_attendance(event)">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label" for="year"><b>Year</b> </label>
                                        <select id="year" name="year" class="form-control">
                                            <option value="2023" selected>2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label" for="month"><b>Month</b> </label>
                                        <select id="month" name="month" class="form-control">
                                            <option value="01" selected>January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label" for="to_date"><b>Employee</b> </label>
                                        <select id="employee" name="user_id" class="form-control" onchange="set_emp_name(this)">
                                            <option value="" selected>== Select ==</option>

                                            <?php
                                            if (isset($data['emp_list'])) {
                                                foreach ($data['emp_list'] as $user) {
                                            ?>
                                                    <option value="<?= $user['biometric_employee_code']; ?>"><?= $user['first_name'] ?> &nbsp; <?= $user['last_name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                        <button class="btn btn-success btn-block" type="submit">Search</button>
                                    </div>

                                    <div class="col-md-2">
                                        <a href="<?= URLROOT ?>/Attendance/attendance_show2" class="btn btn-info" style="margin-top: 30px;">view all</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="user_dt" style="display: none;">
                        <h4 style="padding-left: 20px;"><span style="opacity: 0.5;">Employee</span> : <span class="border" id="employee_display"></span></h4>
                        <button class="bg-success" onclick="ExportToExcel('xlsx')" style="margin-left: 20px;">Export Excel</button>
                        <!--===================================================-->
                        <!--End Horizontal Form-->
                        <!-- <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                <div class="panel media bg-dark" style="padding-left: 10px;">
                                                                    <div class="media-body">
                                                                        <h6 style="color: white;" class="text-center">Working days : &nbsp;<span class="text-2x mar-no text-semibold"><?= (isset($data["custcount"]["count_customer"])) ? $data["custcount"]["count_customer"] : '0'; ?></span></h6>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                <div class="panel media bg-dark" style="padding-left: 10px;">
                                                                    <div class="media-body">
                                                                        <h6 style="color: white;" class="text-center">Present days : &nbsp;<span class="text-2x mar-no text-semibold"><?= (isset($data["custcount"]["count_customer"])) ? $data["custcount"]["count_customer"] : '10'; ?></span></h6>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                <div class="panel media bg-success" style="padding-left: 10px;">
                                                                    <div class="media-body">
                                                                        <h6 style="color: white;" class="text-center">Attendance % : &nbsp;<span class="text-2x mar-no text-semibold"><?= (isset($data["custcount"]["count_customer"])) ? $data["custcount"]["count_customer"] : '9'; ?></span></h6>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div> -->


                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Employee Name</th> -->
                                    <th>Date</th>
                                    <th>Entry Time</th>
                                    <th>Exit Time</th>
                                </tr>
                            </thead>

                            <tbody id="add_body">

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <h2 id="no_data" class="text-danger text-center"></h2>
    <!--===================================================-->
    <!--End page content-->

</div>

<!--===================================================-->
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<script type="text/javascript">
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('demo_dt_basic');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }



    let gl_emp_name = ""

    function set_emp_name(e) {
        gl_emp_name = e.options[e.selectedIndex].text
        // console.log(e.options[e.selectedIndex].text);
    }

    let add_obj;

    function show_attendance(e) {
        e.preventDefault()
        document.getElementById('add_body').innerHTML = ''
        document.getElementById('user_dt').style.display = 'block'
        $('#employee_display').html('&nbsp;' + gl_emp_name + '&nbsp;')
        $('#no_data').html('')
        if ($('#employee').val() == '') {
            alert('Employee Biometric Code Not Available..')
            $('#no_data').html('No data found !!')
            return
        }

        $.ajax({
            type: "get",
            // url: "http://192.168.0.32/fpAttendance/index.php",
            url: "http://192.168.0.173/fpAttendance/index.php",
            dataType: "json",
            data: $('#add_form').serialize(),
            beforeSend: function() {
                console.log('ready to send substream.............')
            },
            success: function(data) {
                // console.log(data)
                // console.log(data.data)
                if (data.error == true) {
                    alert('no data found for this employee')
                    $('#no_data').html('No data found !!')
                } else {
                    console.log(data.data)


                    data.data.map((emp, index) => {
                        let entry_date_full = emp.entry_date
                        let date = entry_date_full.substring(0, 10)

                        entry_time_full = emp.entry_date
                        let entry_time
                        if (entry_time_full != 'NO PUNCH') {
                            entry_time = entry_time_full.substring(11);
                        } else {
                            entry_time = "<span class='text-danger'>" + entry_time_full.substring(11) + "</span>";
                        }

                        exit_time_full = emp.exist_date
                        let exit_time
                        if (exit_time_full != 'NO PUNCH') {
                            exit_time = exit_time_full.substring(11);
                        } else {
                            exit_time = "<span class='text-danger'>" + exit_time_full + "</span>";
                        }


                        // $('#employee_display').html('&nbsp;'+gl_emp_name+'&nbsp;')
                        document.getElementById('add_body').innerHTML += `<tr><td>${index+1}</td><td>${date}</td><td>${entry_time}</td><td>${exit_time}</td></tr>`
                    })
                    return;
                    // let node = `<tr><td></td><td></td><td></td><td></td></tr>`

                }
                // add_obj=data.data
                // var size = Object.keys(data.data).length;

                // list_add(size)


            }
        });

    }


    function list_add(array_length) {



    }
</script>